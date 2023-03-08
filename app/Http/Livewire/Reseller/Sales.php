<?php

namespace App\Http\Livewire\Reseller;

use Livewire\Component;
use App\Models\Order;
use App\Models\Balance;
use Illuminate\Support\Facades\Auth;

class Sales extends Component
{
    public $total_sales_count;
    public $total_sales_fee;
    public $sales;

    public function mount()
    {
        $this->total_sales_fee = auth()->user()->sales_fee;
    }

    public function render()
    {
        $this->sales = Order::where('reseller_id',auth()->id())->with('balance')->get();
        $this->total_sales_count = $this->sales->count();
        return view('livewire.reseller.sales');
    }
}
