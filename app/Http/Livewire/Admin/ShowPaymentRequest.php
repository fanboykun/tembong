<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;

class ShowPaymentRequest extends Component
{
    public $payment;

    public function mount(Payment $payment)
    {
        $this->payment = $payment->load('user');
    }
    public function render()
    {
        return view('livewire.admin.show-payment-request');
    }

    public function updateStatus()
    {
        if($this->payment->is_paid == 'paid'){
            $this->payment->update([
                'is_paid' => 'pending'
            ]);
        }elseif($this->payment->is_paid == 'pending'){
            $this->payment->update([
                'is_paid' => 'paid'
            ]);
        }
        return redirect()->route('payments.index');
        $this->reset();
    }
}
