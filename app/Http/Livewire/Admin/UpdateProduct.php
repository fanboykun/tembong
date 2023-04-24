<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads;


class UpdateProduct extends Component
{
    use WithFileUploads;

    public Product $product;
    public $categories;

    public $name;
    public $description;
    public $type;
    public $types = ['best_seller' => 'BEST SELLER', 'top_seller' => 'TOP SELLER'];
    public $price;
    public $stock;
    public $image;
    public $new_image;
    public $category_id;

    // public bool $isEdit = false;

    // public $exsisting_image;


    public function mount()
    {
        $this->categories = Category::all();
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->type = $this->product->getRawOriginal('type');
        $this->price = $this->product->price;
        $this->stock = $this->product->stock;
        // $this->image = $this->product->getFirstMediaUrl('image');
        $this->category_id = $this->product->category_id;

        // $this->exsisting_image = [
        //     'source' => $this->product->getFirstMediaUrl('image'),
        //     'options' => [
        //         'type' => 'local',
        //         // 'file' => [
        //         //     'name' => $this->product->getFirstMedia('image')->file_name,
        //             // 'size' => $image->file_size,
        //             // 'type' => $image->mime_type,
        //         // ],
        //     ],
        // ];

    }
    public function render()
    {
        return view('livewire.admin.update-product');

    }

    // public function updatedType()
    // {
    //     $this->validate([
    //         'type' => 'required|in:best_seller,top_seller',
    //     ]);
    //     $this->price = $this->type == 'best_seller' ? 65000 : 150000;
    // }

    public function update()
    {
        $validated_data = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'new_image' => 'nullable',
            'category_id' => 'required',
        ]);
        // if($this->new_image)
        // {
        //     $this->product->clearMediaCollection('image');
        //     $this->product->addMedia($this->new_image->getRealPath())->toMediaCollection('image');
        // }
        $this->product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
        ]);
        return redirect()->route('products.index');
    }

    // public function getExsistingImage()
    // {
    //     return [
    //         'source' => $this->image,
    //         'options' => [
    //             'type' => 'local',
    //             'file' => [
    //                 // 'name' => $this
    //                 // 'size' => $image->file_size,
    //                 // 'type' => $image->mime_type,
    //             ],
    //         ],
    //     ];

    // }
}
