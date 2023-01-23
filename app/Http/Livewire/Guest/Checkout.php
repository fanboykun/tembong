<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\User;
use App\Facades\Cart;

class Checkout extends Component
{
    public $channel;

    public $buyer_address;
    public $buyer_phone;
    public $buyer_name;

    public function mount($reseller)
    {
        $c = User::find($reseller);
        if($c == null){
            return redirect('/');
        }
        $this->channel = $c;
    }

    public function prefilMessage()
    {
        $cart = Cart::content();

        $prefilled =
        "reseller id : " .$this->channel->id. "%0A"
        ."reseller name : " .$this->channel->name. "%0A"
        ."buyer name : ".$this->buyer_name. "%0A"
        ."buyer phone : ".$this->buyer_phone. "%0A"
        ."buyer address : ".$this->buyer_address. "%0A"
        ."Product :" ."%0A";

        foreach ($cart as $item) {
            $prefilled .= $item['name']. " : " .$item['quantity']. "%0A";
        }

        return redirect()->away('https://wa.me/+6281262447687?text='.$prefilled.'');
    }
    public function render()
    {
        return view('livewire.guest.checkout')->layout('layouts.visitor-layout');
    }

}
