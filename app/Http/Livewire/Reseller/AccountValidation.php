<?php

namespace App\Http\Livewire\Reseller;

use Livewire\Component;

class AccountValidation extends Component
{
    public function render()
    {
        return view('livewire.reseller.account-validation');
    }

    public function sendValidationInfo()
    {
        $prefilled =
        "Haloo, Saya Reseller yang telah mendaftar pada aplikasi, ingin melakukan proses validasi. Berikut Informasi nya". "%0A"
        ."reseller id : " .auth()->id(). "%0A"
        ."reseller name : " .auth()->user()->name. "%0A"
        ."reseller email : ".auth()->user()->email. "%0A"
        ."reseller phone : ".auth()->user()->phone. "%0A"
        ."reseller address : ".auth()->user()->address. "%0A";

        return redirect()->away('https://wa.me/+6281262650288?text='.$prefilled.'');

    }
}
