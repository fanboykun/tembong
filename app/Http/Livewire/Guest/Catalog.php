<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Facades\Cart;

class Catalog extends Component
{
    public $total;
    public $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];
    public $product_selected;
    public $quantity;

    public $products;
    public $channel;
    public $cart;

    public function mount($reseller)
    {
        // $id = $request['reseller'];
        $c = User::find($reseller);
        if($c == null){
            return redirect('/');
        }
        $this->updateCart();
        $this->quantity = 1;

        $this->channel = $c;
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.guest.catalog')->layout('layouts.visitor-layout');
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

    public function addToCart(Product $product): void
    {
        $this->product_selected = $product;
        Cart::add($this->product_selected->id, $this->product_selected->name, $this->product_selected->price, $this->quantity);
        $this->emit('productAddedToCart');
    }
}
