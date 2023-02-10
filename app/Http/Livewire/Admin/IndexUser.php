<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class IndexUser extends Component
{
    public $search;
    public $filter;
    
    public $users;


    protected $queryString = [
        'search' => ['except' => '']
    ];
    public function render()
    {
        $this->users = User::role('reseller')->where('name', 'like', '%'.$this->search.'%')->latest()->get();
        return view('livewire.admin.index-user');
    }
}
