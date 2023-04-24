<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use App\Models\User;

class ShowUserDropship extends Component
{
    public $user;
    public int $perPage = 10;
    public float $sales_fee;
    public int $sales_count;

    public function mount($user)
    {
        // $this->user = User::whereId($user)->first();
        // $this->sales_fee = $this->user->sales_fee;

        $this->user = User::whereId($user)->withSum(['balance' => function($query){
            $query->where('balanceable_type', 'App\Models\Order');
        }], 'amount')->first();
        $this->sales_fee = $this->user->balance_sum_amount;
    }

    public function render()
    {
        $dropshippings = Order::where('reseller_id', $this->user->id)->with('balance')->paginate($this->perPage);
        $this->sales_count = $dropshippings->count();

        return view('livewire.admin.show-user-dropship', compact('dropshippings'));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
