<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserBalance extends Component
{
    public $resellers;

    public function render()
    {
        $this->resellers = User::role('reseller')->with('balance')->get();
        return view('livewire.admin.user-balance');
    }
}
