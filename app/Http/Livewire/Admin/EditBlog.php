<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EditBlog extends Component
{
    use WithFileUploads;

    public $blog;
    public $title;
    public $image;
    public $content;

    public $exsisting_image;
    public $new_image;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->image = $blog->getFirstMediaUrl('cover');
    }

    public function render()
    {
        return view('livewire.admin.edit-blog');
    }

    public function updateBlog()
    {
        // dd($this->content);
        $this->validate([
            'title' => 'required|unique:blogs|max:255',
            'new_image' => 'nullable|image|max:8192|mimes:png,jpg,jpeg',
            'content' => 'required',
        ]);

        if($this->new_image)
        {
            $this->blog->clearMediaCollection('cover');
            $this->blog->addMedia($this->new_image->getRealPath())->toMediaCollection('cover');
        }

        $this->blog->update([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
        ]);


        return redirect()->route('blogs.index');
        $this->reset();
    }
}
