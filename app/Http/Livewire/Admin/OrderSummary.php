<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class OrderSummary extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order->load('buyer', 'reseller', 'products');
        $this->order['full_address'] = $this->getFullAddress($order->buyer);
    }

    public function render()
    {
        return view('livewire.admin.order-summary');
    }

    public function getFullAddress($buyer)
    {
        return $buyer->buyer_address_description . ', ' .\Indonesia::findVillage($buyer->village_id)->name . ', ' . \Indonesia::findDistrict($buyer->district_id)->name . ', ' . \Indonesia::findCity($buyer->city_id)->name . ', ' . \Indonesia::findProvince($buyer->province_id)->name;
    }

    public function updateOrder()
    {
        if($this->order->status == 'placed'){
            $this->order->update([
                'status' => 'shipped'
            ]);
        }elseif($this->order->status == 'shipped'){
            $this->order->update([
                'status' => 'placed'
            ]);
        }
    }
}
