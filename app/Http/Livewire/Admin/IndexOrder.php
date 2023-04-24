<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
// use App\Models\Product;
// use App\Models\User;

class IndexOrder extends Component
{
    public $search;
    // public $orders;
    public $order_mounted;
    public $search_filter;
    public $status_filter;
    protected $status_rule = ['placed', 'shipped'];

    protected $queryString = [
        'search' => ['except' => ''],
        'status_filter' => ['except' => '']
    ];
    public $perPage = 10;

    public function mount()
    {
        $this->order_mounted = Order::with('reseller')->get();
    }

    public function render()
    {
        if($this->order_mounted->count() >= 1){
            $orders = $this->order_mounted->toQuery()
            ->where(function($query){
                $query->when($this->search_filter == 'order_id' | $this->search_filter == '' , function($q){
                    $q->where('id', 'like', '%'.$this->search.'%');
                })->where('status', 'like', '%'.$this->status_filter.'%');
                $query->when($this->search_filter == 'dropshipper_id' , function($q){
                    $q->with('reseller', function ($query){
                        $query->where('id', 'like', '%'.$this->search.'%');
                    });
                })->where('status', 'like', '%'.$this->status_filter.'%');
            })
            ->latest()
            ->paginate($this->perPage);
        }else{
            $orders = [];
        }
        return view('livewire.admin.index-order', [
            'orders' => $orders
        ]);
    }
    public function updatedSearchFilter()
    {
        $this->reset('status_filter', 'search');
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
