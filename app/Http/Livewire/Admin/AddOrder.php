<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Buyer;
use App\Facades\AdminCart;
use App\Models\Balance;
use Illuminate\Support\Facades\DB;

class AddOrder extends Component
{
    public $search_user;
    public $search_product;
    public $filter_product_category;
    public $filter_product_type;

    public $reseller_id;
    public $users;
    // public $products;
    public $products_mounted;
    public $categories;
    public $types = [
        'best_seller' => 'Best Seller',
        'top_seller' => 'Top Seller',
    ];
    public $content_state = 'product';
    public $selected_cat;
    public $selected_type;
    public $showDropdown = false;
    public $perPage = 10;

    public $total_price;
    public $total_qty;
    public $best_seller_item;
    public $top_seller_item;
    public $discount_type;
    public $total_discount = 0;
    public $price_after_discount;
    public $total_price_with_ongkir;
    public $content;
    public array $quantity = [];

    public $buyer_name;
    public $buyer_phone;
    public $ongkir;
    public $full_address;
    public $status;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->updateCart();
        $this->products_mounted = Product::with('category')->get()
        ->each(function($product){
            if($this->content->has($product->id)){
                $this->quantity[$product->id] = $this->content[$product->id]['quantity'];
            }
        });

    }

    public function render()
    {
        // $this->users = User::role('reseller')->where('id', 'like', '%'.$this->search_user.'%')->whereNotNull('validated_at')->get();
        $this->users = User::role('reseller')->where('id',$this->search_user)->whereNotNull('validated_at')->get();
        $products = $this->products_mounted->toQuery()->where('name', 'like', '%'.$this->search_product.'%')
        ->where('type', 'like', '%'.$this->filter_product_type.'%')
        ->with('category', function($query){
            $query->where('id', 'like', '%'.$this->filter_product_category.'%');
        })
        ->paginate($this->perPage);
        return view('livewire.admin.add-order', [
            // 'users' => $this->users,
            'products' => $products,
        ]);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function updateCategory($catId = null, $catName = null)
    {
        $this->selected_cat = $catName;
        $this->filter_product_category = $catId;
    }

    public function updateType($type = null, $typeName = null)
    {
        $this->selected_type = $typeName;
        $this->filter_product_type = $type;
    }


    public function selectReseller($id)
    {
        $this->reseller_id = $id;
        $this->search_user = $id;
        $this->showDropdown = false;
        $this->reset('users');
    }

    public function updatedSearchUser()
    {
        if($this->search_user != null){
            $this->showDropdown = true;
        }else{
            $this->showDropdown = false;
        }
    }
    public function updatedFilterUser()
    {
        $this->reset('search_user','users');
    }

    public function addToCart($product)
    {
        $this->validate([
            'quantity.'.$product['id'] => 'required|numeric|min:1',
        ]);
        AdminCart::add($product['id'], $product['name'], $product['type'], $product['price'], $this->quantity[$product['id']]);
        $this->emit('productAddedToCart');
    }

    public function updateCart()
    {
        $this->total_price = AdminCart::total();
        $this->content = AdminCart::content();
    }

    public function incrementQty(string $id)
    {
        AdminCart::increment($id);
        $this->getSummaryContent();
        $this->quantity[$id] = $this->content[$id]['quantity'];
    }

    public function decrementQty(string $id)
    {
        AdminCart::decrement($id);
        $this->getSummaryContent();
        $this->quantity[$id] = $this->content[$id]['quantity'];
    }

    public function updateQuantity($product)
    {
        $this->validate([
            'quantity.'.$product['id'] => 'required|numeric|min:1',
        ]);
        AdminCart::updateQty($product['id'], $this->quantity[$product['id']]);
        $this->getSummaryContent();
    }

    public function removeFromCart(string $id): void
    {
        AdminCart::remove($id);
        $this->getSummaryContent();
    }

    public function clearCart(): void
    {
        AdminCart::clear();
        $this->reset('quantity');
        $this->getSummaryContent();
    }

    public function updatedContentState()
    {
        if($this->content_state == 'cart')
        {
            $this->getSummaryContent();
        }
    }

    public function getSummaryContent()
    {
        $this->content = AdminCart::content();
        $this->total_discount = 0;
        $this->total_price = AdminCart::total();
        $this->total_qty = AdminCart::totalQuantity();
        $this->price_after_discount = $this->total_price - $this->total_discount;
        $this->total_price_with_ongkir = $this->price_after_discount + $this->ongkir;
        $this->best_seller_item = AdminCart::countBestSellerItem();
        $this->top_seller_item = AdminCart::countTopSellerItem();
    }

    public function saveOrder()
    {
        $r_id = User::role('reseller')->where('id',$this->search_user)->whereNotNull('validated_at')->first();
        if(empty($r_id)){
            $this->addError('reseller_id', 'Reseller Tidak Valid');
            return;
        }
        $this->validate([
            'reseller_id' => 'required',
            'buyer_name' => 'required',
            'buyer_phone' => 'required',
            'ongkir' => 'required',
            'full_address' => 'required',
        ]);

        $this->content = AdminCart::content();
        if(!empty($this->content->all())){
                $this->reseller_id = $r_id->id;
                $this->total_qty = AdminCart::totalQuantity();
                $order = new Order();
                DB::transaction(function () use ($order) {
                    $this->saveOrderDetail($order);
                    $this->saveOrderProduct($order);
                    $this->saveOrderAddress($order);
                    $this->saveResellerBalance($order);
                });
                $this->reset();
                $this->clearCart();
                return redirect()->route('orders.index');
        }else{
            $this->addError('content', 'Keranjang Belanja Kosong');
            $this->dispatchBrowserEvent('open-modal', 'empty-cart');
        }

    }

    public function saveOrderDetail($order)
    {
        $order->user_id = auth()->id();
        $order->reseller_id = $this->reseller_id;
        $order->discount_type = $this->discount_type;
        $order->shipping_cost = $this->ongkir;
        $order->status = $this->status == null ? 'placed' : $this->status;

        $order->save();
    }

    public function saveOrderProduct($order)
    {
        $products = $this->content->all();
        foreach ($products as $key => $product)
        {
            $order->products()->attach($key,
            [
                'quantity' => $product['quantity'],
            ]);
        }
    }

    public function saveOrderAddress($order)
    {
        $buyer = new Buyer();
        $buyer->order_id = $order->id;
        $buyer->buyer_name = $this->buyer_name;
        $buyer->buyer_phone = $this->buyer_phone;
        $buyer->full_address = $this->full_address;
        $buyer->save();
    }

    public function saveResellerBalance($order)
    {
        $balance = new Balance();
        $balance->user_id = $this->reseller_id;
        $balance->amount = $this->total_qty * 29000;
        // $balance->amount = ($order->top_seller_item * 50000) + ($order->best_seller_item * 20000);
        $order->balance()->save($balance);
    }

    public function resetErrot()
    {
        $this->resetErrorBag('content');
    }

}
