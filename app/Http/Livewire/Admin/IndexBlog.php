<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;

class IndexBlog extends Component
{
    public $search;
    public $perPage = 10;

    public function render()
    {
        $blogs = Blog::where('title', 'like', '%'.$this->search.'%')->latest()->paginate($this->perPage);
        return view('livewire.admin.index-blog', compact('blogs'));
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function deleteBlog(Blog $blog)
    {
        $blog->delete();
    }

    public function confirmingDeleteBlog($blog)
    {
        $this->dispatchBrowserEvent('open-modal', 'delete-blog', $blog);
        // $selected_blog = Blog::findOrFail($blog);
    }
}
