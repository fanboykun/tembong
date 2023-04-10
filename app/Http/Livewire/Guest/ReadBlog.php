<?php

namespace App\Http\Livewire\Guest;

use App\Models\Blog;
use Livewire\Component;

class ReadBlog extends Component
{
    public $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function render()
    {
        return view('livewire.guest.read-blog')->layout('layouts.main');
    }
}
