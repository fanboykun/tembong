<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

class AdminDashboard extends Component
{
    public $reseller_count;
    public $order_count;
    public $paid_payment_count;
    public $pending_payment_count;
    public $sales_profit;
    public $catalog_visitor_count;
    public $product_count;

    public function mount()
    {
        $reseller_data = User::role('reseller')->withTotalVisitCount()->get();
        if($reseller_data->count() >= 1){
            $this->reseller_count = $reseller_data->count();
            $this->catalog_visitor_count = $reseller_data->sum('visit_count_total');
        }

        $order_data = Order::withSum('balance','amount')->get();
        if($order_data->count() >= 1){
            $this->order_count = $order_data->count();
            $this->sales_profit = $order_data->sum('balance_sum_amount');
        }


        $payment_data = Payment::all()->groupBy('is_paid');
        if($payment_data->count() >= 1){
            $this->pending_payment_count = $payment_data->has('pending') ? $payment_data['pending']->sum('amount') : 0;
            $this->paid_payment_count = $payment_data->has('paid') ? $payment_data['paid']->sum('amount') : 0 ;
        }
        $this->product_count = Product::all()->count();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
