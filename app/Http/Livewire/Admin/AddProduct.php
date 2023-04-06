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
    public $type;
    public $image;
    public $category_id;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.add-product');
    }
    public function updatedType()
    {
        $this->validate([
            'type' => 'required|in:best_seller,top_seller',
        ]);
        $this->price = $this->type == 'best_seller' ? 65000 : 150000;
    }
    public function store()
    {
        $validated_data = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'type' => 'required|in:best_seller,top_seller',
            'price' => 'required',
            'category_id' => 'required',
        ]);


        // $validated_data['image'] = $this->image->storePublicly('image');
        // $this->image->storePublicly('image');
        // dd($validated_data);
        $product = Product::create($validated_data);
        // SINGLE FILE
        if($this->image){
            $product->addMedia($this->image->getRealPath())->toMediaCollection('image');
        }
        // MULTIPLE FILES

        // collect($this->images)->each(fn($image) =>
        //     $post->addMedia($image->getRealPath())->toMediaCollection('images')
        // );

        // dd($validated_data);
        return redirect()->route('products.index');
    }
}
