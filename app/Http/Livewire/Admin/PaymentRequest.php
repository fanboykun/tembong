<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Payment;

class PaymentRequest extends Component
{
    public $payments;

    public function render()
    {
        $this->payments = Payment::with('user')->latest()->get();
        return view('livewire.admin.payment-request');
    }

    public function proceedPayment(Payment $payment)
    {
        $payment->update([
            'is_payed' => TRUE
        ]);
        // $this->emit('paymentUpdated');
    }
}
