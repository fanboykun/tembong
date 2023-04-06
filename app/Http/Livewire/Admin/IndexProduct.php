<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

class IndexProduct extends Component
{
    // protected $products;

    public $product_selected;
    public $confirmingProductDeletion = false;
    public $type_filter;
    public $category_filter;
    public $perPage = 10;
    public $categories;

    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
        'type_filter' => ['except' => ''],
        'category_filter' => ['except' => ''],
    ];
    // public $products;

    public function render()
    {
        $this->categories = Category::all();
        $products = Product::where('name', 'like', '%'.$this->search.'%')
        ->where('type', 'like', '%'.$this->type_filter.'%')
        ->whereHas('category', function($query){
            $query->where('name', 'like', '%'.$this->category_filter.'%');
        })
        ->latest()
        ->paginate($this->perPage);

        return view('livewire.admin.index-product', [
            'products' => $products
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

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function updatedSearch()
    {
        if($this->search == ''){
            $this->reset('type_filter', 'category_filter');
        }
    }
}
