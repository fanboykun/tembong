<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Facades\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class Catalog extends Component
{
    public $total;
    public $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];
    public $product_selected;
    public $quantity;

    public $categories;
    // public $products;
    public $channel;
    public $cart;
    public $perPage = 10;
    public $type_filter;
    public $category_filter;
    public $search;
    public $isSearching = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'type_filter' => ['except' => ''],
        'category_filter' => ['except' => ''],
    ];

    public function mount($reseller)
    {
        // $id = $request['reseller'];
        $c = User::find($reseller);
        if($c == null){
            return redirect('/');
        }
        $c->visit()->withIp();
        $this->updateCart();
        $this->quantity = 1;

        $this->channel = $c;
        $this->categories = Category::all();

    }
    public function render()
    {
        if($this->search != '' || $this->type_filter != '' || $this->category_filter != ''){
            $this->isSearching = true;
        }else{
            $this->isSearching = false;
        }

        $products = Product::where('name', 'like', '%'.$this->search.'%')
        ->where('type', 'like', '%'.$this->type_filter.'%')
        ->whereHas('category', function($query){
            $query->where('name', 'like', '%'.$this->category_filter.'%');
        })
        ->latest()
        ->paginate($this->perPage);
        // dd($products[0]->getFirstMediaUrl('image'));
        return view('livewire.guest.catalog', ['products' => $products])->layout('layouts.guest');
    }

    public function resetSearch()
    {
        $this->reset(['search', 'type_filter', 'category_filter']);
        // $this->isSearching = false;
        $this->render();
    }

    public function filterType(string $type = null)
    {
        $this->type_filter = $type;
        // if($type != null){
        //     $this->isSearching = true;
        // }
    }

    public function filterCategory(string $type = null)
    {
        $this->category_filter = $type;
        // if($type != null){
        //     $this->isSearching = true;
        // }
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function viewProduct($product)
    {
        $this->product_selected = collect($product);
        // $this->emit('viewProduct');
        $this->dispatchBrowserEvent('view-product');
        dd($this->product_selected);
    }


    // cart component function (class)

    public function removeFromCart(string $id): void
    {
        Cart::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        Cart::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total = Cart::total();
        $this->content = Cart::content();
    }

    // product component function (class)

    public function addToCart(Product $product, string $qty): void
    {
        $validator = Validator::make([
            'qty' => $qty,
        ], [
            'qty' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            // $this->emit('error', $validator->errors()->first());
            return;
        }
        $data = $validator->validated();
        $selected_product = $product->load('category');
        $options = [
            'image' => $selected_product->image,
            'category' => $selected_product->category->name,
            'type' => $selected_product->type,
        ];
        Cart::add($selected_product->id, $selected_product->name, $selected_product->price, $data['qty'], $options);
        $this->emit('productAddedToCart');
    }
}
