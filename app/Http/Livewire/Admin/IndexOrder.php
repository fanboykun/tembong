<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
// use App\Models\Product;
// use App\Models\User;

class IndexOrder extends Component
{
    public $search;
    public $orders;

    public function render()
    {
        $this->orders = Order::with(['user', 'reseller', 'buyer', 'products'])->get();
        return view('livewire.admin.index-order');
    }

    public function ddVal()
    {
        dd([$this->orders->first()->best_seller_item, $this->orders->first()->top_seller_item]);

    }
}
