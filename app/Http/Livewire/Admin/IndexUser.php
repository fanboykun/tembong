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
        $key = ['name', 'id', 'email', 'phone'];
        $this->users = User::role('reseller')->where(function ($query) use($key)
        {
            if($this->filter != '' && in_array($this->filter, $key))
            {
                $query->where($this->filter, 'like', '%'.$this->search.'%');
            }
            elseif($this->filter == '')
            {
                $query->where('name', 'like', '%'.$this->search.'%');
            }
        })->get();
        return view('livewire.admin.index-user');
    }
}
