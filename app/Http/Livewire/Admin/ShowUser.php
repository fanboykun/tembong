<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;

class ShowUser extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.admin.show-user');
    }

    public function validateAccount()
    {
        $this->user->update([
            'validated_at' => Carbon::now(),
        ]);
    }

    public function unvalidateAccount()
    {
        $this->user->update([
            'validated_at' => null,
        ]);
    }
}
