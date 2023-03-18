<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserBalance extends Component
{
    public $resellers;
    public $search;
    public $filter;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        $key = ['name', 'id'];
        $this->resellers = User::role('reseller')->where(function ($query) use($key)
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
        return view('livewire.admin.user-balance');
    }
}
