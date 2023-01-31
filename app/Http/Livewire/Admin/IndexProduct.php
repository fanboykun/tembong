<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class IndexProduct extends Component
{
    // protected $products;

    public $product_selected;
    public $confirmingProductDeletion = false;

    public $search;
    protected $queryString = [
        'search' => ['except' => '']
    ];
    
    public function render()
    {
        // $this->products = Product::where('name', 'like', '%'.$this->search.'%')->take(5)->latest()->get();
        return view('livewire.admin.index-product',
            [
                'products' => Product::where('name', 'like', '%'.$this->search.'%')->take(5)->latest()->get(),
            ]);
    }

    public function confirmProductDeletion($id)
    {
        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->confirmingProductDeletion = true;
        $this->product_selected = Product::findOrFail($id);
    }

    public function deleteProduct()
    {
        $this->product_selected->delete();
        $this->confirmingProductDeletion = false;
    }
}
