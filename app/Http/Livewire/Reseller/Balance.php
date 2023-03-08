<?php

namespace App\Http\Livewire\Reseller;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Payment;


class Balance extends Component
{
    public $reseller;

    public $payments;

    public $sales_balance;
    public $referral_balance;
    public $total_balance;
    public $withdrawabe_balance;

    public $listeners = ['paymentCreated' => '$refresh'];

    public function mount()
    {
        $this->reseller = Auth::user();
        $this->sales_balance = $this->reseller->sales_fee;
        $this->referral_balance = $this->reseller->referral_fee;
        $this->total_balance = $this->reseller->total_fee;
        $this->withdrawabe_balance = $this->reseller->withdrawable;
    }

    public function render()
    {
        $this->payments = Payment::where('user_id', auth()->user()->id)->get();
        return view('livewire.reseller.balance');
    }

}
