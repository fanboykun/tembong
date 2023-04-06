<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class IndexAdmin extends Component
{
    // public $admins;

    public $search;
    public $filter;
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => '']
    ];
    public function render()
    {
        $key = ['name', 'id', 'email', 'phone'];
        $admins = User::role('admin')->where(function ($query) use($key)
        {
            if($this->filter != '' && in_array($this->filter, $key))
            {
                $query->where($this->filter, 'like', '%'.$this->search.'%');
            }
            elseif($this->filter == '')
            {
                $query->where('name', 'like', '%'.$this->search.'%');
            }
        })->paginate($this->perPage);
        return view('livewire.admin.index-admin', compact('admins'));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
