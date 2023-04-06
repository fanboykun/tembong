<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class IndexUser extends Component
{
    public $search;
    public $filter;
    public $perPage = 10;

    // public $users;


    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $key = ['name', 'id', 'email', 'phone'];
        $users = User::role('reseller')->where(function ($query) use($key)
        {
            if($this->filter != '' && in_array($this->filter, $key))
            {
                $query->where($this->filter, 'like', '%'.$this->search.'%');
            }
            elseif($this->filter == '')
            {
                $query->where('name', 'like', '%'.$this->search.'%');
            }
        })->latest()
        ->paginate($this->perPage);
        return view('livewire.admin.index-user', compact('users'));
    }

    public function updatedFilter()
    {
        $this->reset('search');
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
