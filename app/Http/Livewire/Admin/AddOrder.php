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
    public $filter_user;
    public $filter_product_category;
    public $filter_product_type;

    public $reseller;
    public $users;
    public $products;
    public $products_mounted;
    public $categories;
    public $types = [
        'best_seller' => 'BEST SELLER',
        'top_seller' => 'TOP SELLER',
    ];
    public $content_state = 'select_reseller';

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
    public $buyer_province;
    public $buyer_city;
    public $buyer_district;
    public $buyer_village;
    public $address_description;
    public $full_address;

    public $provincies;
    public $cities;
    public $districts;
    public $villages;

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
        $this->products = $this->products_mounted->toQuery()->where('name', 'like', '%'.$this->search_product.'%')
        ->where('type', 'like', '%'.$this->filter_product_type.'%')
        ->whereHas('category', function($query){
            $query->where('id', 'like', '%'.$this->filter_product_category.'%');
        })
        ->get();
        return view('livewire.admin.add-order');
    }

    public function selectReseller(User $reseller)
    {
        $this->reseller = $reseller;
        $this->search_user = $reseller->name;
        $this->reset('users');
    }

    public function updatedSearchUser()
    {
        if($this->filter_user != null){
            if($this->filter_user != 'id' or $this->filter_user != 'name' or $this->filter_user != 'email' or $this->filter_user != 'phone'){
                $this->users = User::role('reseller')->where($this->filter_user, 'like', '%'.$this->search_user.'%')->latest()->get();
            }
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
        $this->updateCart();
        $this->quantity[$id] = $this->content[$id]['quantity'];
    }

    public function decrementQty(string $id)
    {
        AdminCart::decrement($id);
        $this->updateCart();
        $this->quantity[$id] = $this->content[$id]['quantity'];
    }

    public function updateQuantity($product)
    {
        $this->validate([
            'quantity.'.$product['id'] => 'required|numeric|min:1',
        ]);
        AdminCart::updateQty($product['id'], $this->quantity[$product['id']]);
        $this->updateCart();
    }

    public function removeFromCart(string $id): void
    {
        AdminCart::remove($id);
        $this->updateCart();
    }

    public function clearCart(): void
    {
        AdminCart::clear();
        $this->reset('quantity');
        $this->updateCart();
    }

    public function updatedContentState()
    {
        if($this->content_state == 'buyer_info')
        {
            $this->provincies = \Indonesia::allProvinces();
        }
        elseif($this->content_state == 'summary')
        {
            $this->getSummaryContent();
        }
    }

    public function updatedBuyerProvince()
    {
        $this->cities = \Indonesia::findProvince($this->buyer_province, ['cities'])->cities;
        $this->fullAddress("province");
    }

    public function updatedBuyerCity()
    {
        $this->districts = \Indonesia::findCity($this->buyer_city, ['districts'])->districts;
        $this->fullAddress("city");
    }

    public function updatedBuyerDistrict()
    {
        $this->villages = \Indonesia::findDistrict($this->buyer_district, ['villages'])->villages;
        $this->fullAddress("district");
    }
    public function updatedBuyerVillage()
    {
        $this->fullAddress("village");
    }

    public function fullAddress(string $type)
    {
        if($type == "province")
        {
            $this->full_address = \Indonesia::findProvince($this->buyer_province)->name;
        }
        elseif($type == "city")
        {
            $this->full_address = $this->full_address.', '.\Indonesia::findCity($this->buyer_city)->name;
        }
        elseif($type == "district")
        {
            $this->full_address = $this->full_address.', '.\Indonesia::findDistrict($this->buyer_district)->name;
        }
        elseif($type == "village")
        {
            $this->full_address = $this->full_address.', '.\Indonesia::findVillage($this->buyer_village)->name;
        }
    }

    public function getSummaryContent()
    {
        // dd($this->content);
        $this->total_price = AdminCart::total();
        $this->total_qty = AdminCart::totalQuantity();
        $this->price_after_discount = $this->total_price - $this->total_discount;
        $this->total_price_with_ongkir = $this->price_after_discount + $this->ongkir;
        $this->best_seller_item = AdminCart::countBestSellerItem();
        $this->top_seller_item = AdminCart::countTopSellerItem();
    }

    public function saveOrder()
    {
        $order = new Order();
        DB::transaction(function () use ($order) {
            $this->saveOrderDetail($order);
            $this->saveOrderProduct($order);
            $this->saveOrderAddress($order);
            $this->saveResellerBalance($order);
        });
        $this->clearCart();
        return redirect()->route('orders.index');

    }

    public function saveOrderDetail($order)
    {
        $order->user_id = auth()->id();
        $order->reseller_id = $this->reseller->id;
        $order->discount_type = $this->discount_type;
        $order->total_discount = $this->total_discount;
        $order->shipping_cost = $this->ongkir;
        $order->total_price = $this->total_price_with_ongkir;
        $order->status = 'placed';

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
        $buyer->province_id = $this->buyer_province;
        $buyer->city_id = $this->buyer_city;
        $buyer->district_id = $this->buyer_district;
        $buyer->village_id = $this->buyer_village;
        $buyer->buyer_address_description = $this->address_description;
        $buyer->save();
    }

    public function saveResellerBalance($order)
    {
        $balance = new Balance();
        $balance->user_id = $this->reseller->id;
        $balance->amount = ($order->top_seller_item * 50000) + ($order->best_seller_item * 20000);
        $order->balance()->save($balance);


    }

}
