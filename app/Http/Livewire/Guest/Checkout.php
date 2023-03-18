<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\User;
use App\Facades\Cart;
use Laravolt\Indonesia\IndonesiaService;

class Checkout extends Component
{
    public $channel;

    public $buyer_phone;
    public $buyer_name;
    public $ongkir;
    public $buyer_province;
    public $buyer_city;
    public $buyer_district;
    public $buyer_village;
    public $address_description;
    public $full_address;

    public $provincies;
    public $cities;
    public $districts;
    public $villages;

    public function mount($reseller)
    {
        $c = User::find($reseller);
        if($c == null){
            return redirect('/');
        }
        $this->channel = $c;
        $this->provincies = \Indonesia::allProvinces();

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

        return redirect()->away('https://wa.me/+6281262650288?text='.$prefilled.'');
    }
    public function render()
    {
        return view('livewire.guest.checkout')->layout('layouts.visitor-layout');
        dd($this->provincies);
    }

    public function updatedBuyerProvince()
    {
        $this->cities = \Indonesia::findProvince($this->buyer_province, ['cities'])->cities;
        $this->fullAddress("province");
    }

    public function updatedBuyerCity()
    {
        $this->districts = \Indonesia::findCity($this->buyer_city, ['districts'])->districts;
        $this->fullAddress("city");
    }

    public function updatedBuyerDistrict()
    {
        $this->villages = \Indonesia::findDistrict($this->buyer_district, ['villages'])->villages;
        $this->fullAddress("district");
    }
    public function updatedBuyerVillage()
    {
        $this->fullAddress("village");
    }

    public function fullAddress(string $type)
    {
        if($type == "province")
        {
            $this->full_address = \Indonesia::findProvince($this->buyer_province)->name;
        }
        elseif($type == "city")
        {
            $this->full_address = $this->full_address.', '.\Indonesia::findCity($this->buyer_city)->name;
        }
        elseif($type == "district")
        {
            $this->full_address = $this->full_address.', '.\Indonesia::findDistrict($this->buyer_district)->name;
        }
        elseif($type == "village")
        {
            $this->full_address = $this->full_address.', '.\Indonesia::findVillage($this->buyer_village)->name;
        }
    }

}
