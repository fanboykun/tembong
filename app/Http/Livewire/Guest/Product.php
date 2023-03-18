<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\User;

class Product extends Component
{
    public $product;
    public $channel;

    public function mount($reseller, $product)
    {
        $c = User::find($reseller);
        if($reseller == null){
            return redirect('/');
        }
        $c->visit()->withIp();
        $this->channel = $c->name;
        $this->product = ProductModel::find($product);
    }

    public function render()
    {
        return view('livewire.guest.product')->layout('layouts.visitor-layout');
    }
}
