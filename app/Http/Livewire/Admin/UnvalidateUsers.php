<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UnvalidateUsers extends Component
{
    // public $users;
    public $search;
    protected $queryString = [
        'search' => ['except' => '']
    ];
    public $filter;
    public $perPage = 10;

    public function render()
    {
        $users = User::role('reseller')->where('validated_at', null)->where(function ($query)
        {
            if($this->filter != '')
            {
                $query->where($this->filter, 'like', '%'.$this->search.'%');
            }
            elseif($this->filter == '')
            {
                $query->where('name', 'like', '%'.$this->search.'%');
            }
        })->latest()
        ->paginate($this->perPage);
        return view('livewire.admin.unvalidate-users', compact('users'));
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
