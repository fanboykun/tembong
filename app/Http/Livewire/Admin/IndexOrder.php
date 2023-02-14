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
        $this->orders = Order::all();
        return view('livewire.admin.index-order');
    }
}
