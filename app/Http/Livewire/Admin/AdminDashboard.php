<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Component
{
    public $reseller_count;
    public $order_count;
    public $paid_payment_count;
    public $pending_payment_count;
    public $sales_profit;
    public $catalog_visitor_count;
    public $product_count;
    public $membership_profit;
    public $referral_balance;

    public function mount()
    {
        $reseller_data = User::
        role('reseller')
        ->whereNotNull('validated_at')
        ->select(DB::raw('count(*) as user_count'))
        ->pluck('user_count')
        ->first();

        if($reseller_data >= 1){
            $this->reseller_count = $reseller_data;
            $this->membership_profit = $reseller_data * 50000;
            $this->catalog_visitor_count = DB::table('laravisits')->select(DB::raw('count(*) as visitor_count'))->pluck('visitor_count')->first();
        }

        // $order_data = DB::table('orders')->select(DB::raw('count(*) as order_count, SUM(order_product.quantity) as qty_count'))
        // ->join('order_product', 'orders.id', '=', 'order_product.order_id')
        // ->first();
        // $this->order_count = $order_data->order_count;
        // $this->sales_profit = $order_data->qty_count * 99000;

        $this->order_count = Order::count();
        $this->sales_profit = DB::table('orders')->select(DB::raw('SUM(order_product.quantity) as qty_count'))
        ->join('order_product', 'orders.id', '=', 'order_product.order_id')
        ->pluck('qty_count')->map(function($item){
            return $item * 99000;
        })->first();
        // dd  ($this->sales_profit);

        $payment_data = DB::table('payments')->select(DB::raw('count(*) as payment_count, is_paid'))
        ->groupByRaw('is_paid')
        ->get()->map(function($item){
            return [
                'is_paid' => $item->is_paid,
                'count' => $item->payment_count
            ];
        })->keyBy('is_paid')->all();
        // dd(array_key_exists('pending',$payment_data));
        $this->pending_payment_count = array_key_exists('pending',$payment_data) ? $payment_data['pending']['count'] : 0;
        $this->paid_payment_count = array_key_exists('paid',$payment_data) ? $payment_data['paid']['count'] : 0;

        $balance_data = DB::table('balances')
        ->select(DB::raw('SUM(amount) as amount_total, balanceable_type'))
        ->groupByRaw('balanceable_type')
        ->get()->map(function($item){
            return [
                'type' => $item->balanceable_type,
                'amount' => $item->amount_total
            ];
        })->keyBy('type')->all();
        $this->referral_balance = array_key_exists('App\Models\Referral',$balance_data) ? $balance_data['App\Models\Referral']['amount'] : 0;


        $this->product_count = Product::count();
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
