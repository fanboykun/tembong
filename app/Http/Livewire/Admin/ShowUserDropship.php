<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class ShowUserDropship extends Component
{
    public $user;
    public $perPage = 10;

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
    }

    public function render()
    {

       $dropshippings = $this->user->dropshippings()->paginate($this->perPage);

        return view('livewire.admin.show-user-dropship', compact('dropshippings'));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
