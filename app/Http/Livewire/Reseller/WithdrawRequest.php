<?php

namespace App\Http\Livewire\Reseller;

use Livewire\Component;
use App\Models\Payment;

class WithdrawRequest extends Component
{
    public array $banks = [
        'DANA','BCA','BRI','MANDIRI','SUMUT','DANAMON'
    ];
    public $balance;

    public $bank_info;
    public $amount;
    public $account_name;
    public $account_number;


    public function mount()
    {
        $this->balance = auth()->user()->withdrawable;
    }

    public function render()
    {
        return view('livewire.reseller.withdraw-request');
    }

    public function sendWithdrawRequest()
    {
        $this->validate([
            'bank_info' => 'required',
            'amount' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
        ]);

        if ($this->amount > $this->balance) {
            $this->addError('amount', 'Withdraw amount cannot be greater than your withdrawable balance');
            return;
        }
        elseif($this->amount < 100000){
            $this->addError('amount', 'Withdraw amount cannot be less than 100.000');
            return;
        }
        else{
            Payment::create([
                'user_id' => auth()->user()->id,
                'bank_info' => $this->bank_info,
                'account_name' => $this->account_name,
                'account_number' => $this->account_number,
                'amount' => $this->amount,
                'is_payed' => false,
            ]);
            $this->reset(['bank_info', 'amount', 'account_name', 'account_number']);
            $this->emit('paymentCreated');
        }
    }
}
