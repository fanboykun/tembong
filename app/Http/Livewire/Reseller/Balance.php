<?php

namespace App\Http\Livewire\Reseller;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Payment;


class Balance extends Component
{
    public $reseller;

    // public $payments;

    public $sales_balance;
    public $referral_balance;
    public $total_balance;
    public $withdrawabe_balance;
    public $perPage = 10;

    public $listeners = ['paymentCreated' => '$refresh'];

    public function render()
    {
        $this->reseller = Auth::user();
        $this->sales_balance = $this->reseller->sales_fee;
        $this->referral_balance = $this->reseller->referral_fee;
        $this->total_balance = $this->reseller->total_fee;
        $this->withdrawabe_balance = $this->reseller->withdrawable;
        $payments = Payment::where('user_id', auth()->user()->id)->paginate($this->perPage);
        return view('livewire.reseller.balance', compact('payments'));
    }

}
