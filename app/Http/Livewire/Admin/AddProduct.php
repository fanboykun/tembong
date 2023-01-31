<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
class AddProduct extends Component
{
    use WithFileUploads;
    public $categories;
    public $name;
    public $description;
    public $price;
    public $stock;
    // public $image = "example.png";
    public $image;
    public $category_id;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.add-product');
    }
    public function store()
    {
        $validated_data = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            // 'image' => 'required|image',
            'category_id' => 'required',
        ]);


        // $validated_data['image'] = $this->image->storePublicly('image');
        // $this->image->storePublicly('image');
        // dd($validated_data);
        $product = Product::create($validated_data);
        // SINGLE FILE
        $product->addMedia($this->image->getRealPath())->toMediaCollection('image');
        // MULTIPLE FILES

        // collect($this->images)->each(fn($image) =>
        //     $post->addMedia($image->getRealPath())->toMediaCollection('images')
        // );

        // dd($validated_data);
        return redirect()->route('products.index');
    }
}
