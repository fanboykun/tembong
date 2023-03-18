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
    public $filter;

    public function render()
    {
        $this->users = User::role('reseller')->where('validated_at', null)->where(function ($query)
        {
            if($this->filter != '')
            {
                $query->where($this->filter, 'like', '%'.$this->search.'%');
            }
            elseif($this->filter == '')
            {
                $query->where('name', 'like', '%'.$this->search.'%');
            }
        })->get();
        return view('livewire.admin.unvalidate-users');
    }
}
