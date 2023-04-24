<?php

namespace App\Http\Livewire\Reseller;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Payment;
use App\Models\Balance as BalanceModel;


class Balance extends Component
{
    public $reseller;

    // public $payments;

    public float $sales_balance;
    public float $referral_balance;
    public float $total_balance;
    public float $withdrawabe_balance;
    public $perPage = 10;

    public $listeners = ['paymentCreated' => '$refresh'];

    public function mount()
    {
        $this->reseller = Auth::user();
        $data = BalanceModel::where('user_id', auth()->user()->id)->get()->groupBy('balanceable_type');
        $this->sales_balance = $data['App\Models\Order']->sum('amount');
        $this->referral_balance = $data['App\Models\Referral']->sum('amount');
        $this->total_balance = $this->sales_balance + $this->referral_balance;
    }

    public function render()
    {
        $payments = Payment::where('user_id', auth()->user()->id)->latest()->paginate($this->perPage);
        $payments_amount_sum = $payments->sum('amount');
        $this->withdrawabe_balance = $this->total_balance - $payments_amount_sum;
        // dd($this->withdrawabe_balance);
        return view('livewire.reseller.balance', compact('payments'));
    }

}
