<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddBlog extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $content;

    public function render()
    {
        return view('livewire.admin.add-blog');
    }

    public function storeBlog()
    {
        // dd($this->content);
       $data =  $this->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        $blog = Blog::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
        ]);

        if($this->image){
            $blog->addMedia($this->image->getRealPath())->toMediaCollection('cover');
        }

        $this->reset();
        return redirect()->route('blogs.index');
    }
}
