<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\User;
use App\Facades\Cart;

class Checkout extends Component
{
    public $channel;
    public $total;
    public $content;

    public $buyer_phone;
    public $buyer_name;
    // public $shipping_cost;
    public $buyer_province;
    public $buyer_city;
    public $buyer_district;
    public $buyer_village;
    public $address_description;

    public $provincies;
    public $cities;
    public $districts;
    public $villages;

    public $city_data, $district_data, $village_data;

    public function mount($reseller)
    {
        $c = User::find($reseller);
        if($c == null){
            return redirect('/');
        }
        $this->channel = $c;

        $this->content = Cart::content();
        if(empty($this->content->all())){
            return redirect('/catalog/'.$reseller);
        }else{
            $this->total = Cart::total();
        }

    }

    public function prefilMessage()
    {
        $this->validate([
            'buyer_name' => 'required',
            'buyer_phone' => 'required',
            'buyer_province' => 'required',
            'buyer_city' => 'required',
            'buyer_district' => 'required',
            'buyer_village' => 'nullable',
            'address_description' => 'nullable',
        ]);
        $cart = Cart::content();
        $total = Cart::total();
        $url = url("/catalog/" . $this->channel->id);
        $buyer_address = $this->buyer_village? $this->buyer_village .", " .$this->buyer_district .", " .$this->buyer_city .", " .$this->buyer_province : $this->buyer_district .", " .$this->buyer_city .", " .$this->buyer_province;

        $prefilled =
        "Hallo Mama Parfum :)" ."%0A"
        ."Saya ingin memesan parfum, berikut detail nya" ."%0A"
        ."%0A"
        .$url. "%0A"
        ."Name : ".$this->buyer_name. "%0A"
        ."Nomor WhatsApp : ".$this->buyer_phone. "%0A"
        ."Alamat Pengiriman : ".$buyer_address. "%0A"
        ."Deskripsi Alamat Pengiriman : ".$this->address_description. "%0A"
        ."%0A"
        ."Sub Total : Rp. ".$total. "%0A"
        ."Product :" ."%0A";

        foreach ($cart as $item) {
            $prefilled .= $item['name']. " : " .$item['quantity']. "%0A";
        }

        return redirect()->away('https://wa.me/+6281262650288?text='.$prefilled.'');
    }
    public function render()
    {
        return view('livewire.guest.checkout')->layout('layouts.visitor-layout');
        // dd($this->provincies);
    }

    public function updateAddress(string $type, int $id, string $name)
    {
        if($type == "province")
        {
            $this->buyer_province = $name;
            $this->buyer_city = null;
            $this->buyer_district = null;
            $this->buyer_village = null;

            $this->city_data = \Indonesia::findProvince($id, ['cities'])->cities;
            $this->dispatchBrowserEvent('close-modal');

        }
        elseif($type == "city")
        {
            $this->buyer_city = $name;
            $this->buyer_district = null;
            $this->buyer_village = null;

            $this->district_data = \Indonesia::findCity($id, ['districts'])->districts;
            $this->dispatchBrowserEvent('close-modal');

        }
        elseif($type == "district")
        {
            $this->buyer_district = $name;
            $this->buyer_village = null;

            $this->village_data = \Indonesia::findDistrict($id, ['villages'])->villages;
            $this->dispatchBrowserEvent('close-modal');

        }
        elseif($type == "village")
        {
            $this->buyer_village = $name;

            $this->dispatchBrowserEvent('close-modal');

        }
    }

    public function updatedBuyerProvince()
    {
        $this->provincies = \Indonesia::search($this->buyer_province)->allProvinces();

        // $this->cities = \Indonesia::findProvince($this->buyer_province, ['cities'])->cities;
    }

    public function updatedBuyerCity()
    {
        $this->cities = $this->city_data?->toQuery()->where(function ($query) {
            $query->where('name', 'like', '%'.$this->buyer_city.'%');
        })->get();

        // $this->districts = \Indonesia::findCity($this->buyer_city, ['districts'])->districts;
    }

    public function updatedBuyerDistrict()
    {
        $this->districts = $this->district_data?->toQuery()->where(function ($query) {
            $query->where('name', 'like', '%'.$this->buyer_district.'%');
        })->get();

        // $this->villages = \Indonesia::findDistrict($this->buyer_district, ['villages'])->villages;
    }
    public function updatedBuyerVillage()
    {
        $this->villages = $this->village_data?->toQuery()->where(function ($query) {
            $query->where('name', 'like', '%'.$this->buyer_village.'%');
        })->get();
    }

}
