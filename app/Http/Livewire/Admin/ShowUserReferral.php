<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Referral;

class ShowUserReferral extends Component
{
    public User $user;
    public $count_referral_user;
    public $total_referral_fee;

    public function render()
    {
        $this->count_referral_user = Referral::where('code', $this->user->referral_code)->count();
        $this->total_referral_fee = $this->user->referral_fee;
        // dd($this->count_referral_user);
        return view('livewire.admin.show-user-referral');
    }
}
