<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UnvalidateUsers extends Component
{
    public $users;
    public $search;
    protected $queryString = [
        'search' => ['except' => '']
    ];
    
    public function render()
    {
        $this->users = User::role('reseller')->where('validated_at', null)->get();
        return view('livewire.admin.unvalidate-users');
    }
}
