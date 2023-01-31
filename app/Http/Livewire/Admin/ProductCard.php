<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductCard extends Component
{
    public Product $product;

    // public function mount(Product $product)
    // {
    //     $this->product = $product;
    // }

    public function render()
    {
        return view('livewire.admin.product-card');
    }
}
