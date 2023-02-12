<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class ShowUserDropship extends Component
{
    public User $user;
    
    public function render()
    {
        return view('livewire.admin.show-user-dropship');
    }
}
