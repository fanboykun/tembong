<?php

namespace App\Http\Livewire\Reseller;

use Livewire\Component;

class ResellerDashboard extends Component
{
    public $catalog_url;

    public function mount()
    {
        // $this->catalog_url = config('app.url') . '/catalog/' . auth()->user()->id;
        $this->catalog_url = url("/catalog/" . auth()->user()->id);
    }
    public function render()
    {
        return view('livewire.reseller.reseller-dashboard');
    }
}
