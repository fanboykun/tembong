<?php

namespace App\Http\Livewire\Admin;

use App\Models\Balance;
use App\Models\Order;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderSummary extends Component
{
    public $order;
    public $reseller_id;
    public $buyer_name;
    public $buyer_phone;
    public $buyer_address;
    public $showDropdown = false;
    public $users;


    public function mount(Order $order)
    {
        $this->order = $order->load('buyer', 'reseller', 'products');
        $this->reseller_id = $this->order->reseller_id;
        $this->buyer_name = $this->order->buyer->buyer_name;
        $this->buyer_phone = $this->order->buyer->buyer_phone;
        $this->buyer_address = $this->order->buyer->full_address;
    }

    public function render()
    {
        $this->users = User::role('reseller')->where('id',$this->reseller_id)->whereNotNull('validated_at')->get();
        return view('livewire.admin.order-summary');
    }

    public function updatedResellerId()
    {
        $this->showDropdown = true;
    }

    public function selectReseller($id)
    {
        $this->reseller_id = $id;
        // $this->search_user = $id;
        $this->showDropdown = false;
        $this->reset('users');
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
        return redirect()->back();
    }

    public function deleteOrder()
    {
        DB::transaction(function () {
            $this->order->products()->detach();
            $this->order->buyer->delete();
            $this->order->balance->delete();
            $this->order->delete();
        });
        return redirect()->route('orders.index');
    }

    public function updateInfo(string $col = null)
    {
        if($col == 'reseller_id'){
            $this->validate([
                'reseller_id' => 'required'
            ]);
            $user = User::role('reseller')->where('id', $this->reseller_id)->where('validated_at', '!=', null)->first();
            if(!empty($user))
            {
                if($this->order->reseller_id != $this->reseller_id){
                    DB::transaction(function () use ($user) {
                        $this->order->balance->delete();
                        $this->order->update([
                            'reseller_id' => $this->reseller_id
                        ]);
                        $this->saveResellerBalance($this->order, $user);
                    });
                }
                $this->dispatchBrowserEvent('info-updated');
            }else{
                $this->addError('reseller_id', 'Reseller Tidak Valid');
                return ;
            }
        }
        elseif($col == 'buyer_name'){
            $this->validate([
                'buyer_name' => 'required'
            ]);
            $this->order->buyer->update([
                'buyer_name' => $this->buyer_name
            ]);
            $this->dispatchBrowserEvent('info-updated');
        }
        elseif($col == 'buyer_phone'){
            $this->validate([
                'buyer_phone' => 'required'
            ]);
            $this->order->buyer->update([
                'buyer_phone' => $this->buyer_phone
            ]);
            $this->dispatchBrowserEvent('info-updated');
        }
        elseif($col == 'buyer_address'){
            $this->validate([
                'buyer_address' => 'required'
            ]);
            $this->order->buyer->update([
                'full_address' => $this->buyer_address
            ]);
            $this->dispatchBrowserEvent('info-updated');
        }
    }

    public function saveResellerBalance($order, $user)
    {
        $balance = new Balance();
        $balance->user_id = $user->id;
        $balance->amount = ($order->top_seller_item * 50000) + ($order->best_seller_item * 20000);
        $order->balance()->save($balance);
    }
}
