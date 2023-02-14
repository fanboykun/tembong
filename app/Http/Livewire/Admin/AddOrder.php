<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class AddOrder extends Component
{
    public $search_user;
    public $search_product;
    public $filter_user;
    public $filter_product_category;
    public $filter_product_type;

    public $users;
    public $products;
    public $categories;
    public $types = [
        'best_seller' => 'BEST SELLER',
        'top_seller' => 'TOP SELLER',
    ];

    public $reseller;

    public function mount()
    {
        // $this->categories = Product::select('category')->distinct()->get();
        $this->categories = Category::all();
    }

    public function render()
    {
        $this->products = Product::where('name', 'like', '%'.$this->search_product.'%')
        ->where('type', 'like', '%'.$this->filter_product_type.'%')
        ->whereHas('category', function($query){
            $query->where('id', 'like', '%'.$this->filter_product_category.'%');
        })
        ->get();
        return view('livewire.admin.add-order');
    }

    public function selectReseller(User $reseller)
    {
        $this->reseller = $reseller;
        $this->search_user = $reseller->name;
        $this->reset('users');
        // dd($this->reseller);
    }

    public function updatedSearchUser()
    {
        if($this->filter_user != null){
            if($this->filter_user != 'id' or $this->filter_user != 'name' or $this->filter_user != 'email' or $this->filter_user != 'phone'){
                $this->users = User::role('reseller')->where($this->filter_user, 'like', '%'.$this->search_user.'%')->latest()->get();
            }
        }
    }
    public function updatedFilterUser()
    {
        $this->reset('search_user','users');
    }

    public function addToCart($product)
    {
        
    }
}
