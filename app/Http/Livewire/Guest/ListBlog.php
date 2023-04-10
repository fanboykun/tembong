<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Blog;

class ListBlog extends Component
{
    public $perPage = 5;

    public function render()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.guest.list-blog', compact('blogs'))->layout('layouts.main');
    }
}
