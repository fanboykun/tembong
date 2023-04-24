<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Payment;

class PaymentRequest extends Component
{
    // public $payments;
    public $payment_mounted;
    public $search;
    public $search_filter;
    public $status_filter;
    public $rule;
    public $bool_status;
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'status_filter' => ['except' => '']
    ];

    public function mount()
    {
        $this->payment_mounted = Payment::with('user')->get();
        $this->rule = collect(['paid' => true, 'pending' => false]);
    }

    public function render()
    {
        if($this->payment_mounted->count() >= 1){
            $payments = $this->payment_mounted->toQuery()
            ->where(function($query){
                $query->when($this->search_filter == 'dropshipper_id' | $this->search_filter == '', function($q){
                    $q->whereHas('user', function ($query){
                        $query->where('id', 'like', '%'.$this->search.'%');
                    });
                })->where('is_paid', 'like', '%'.$this->status_filter.'%');
                $query->when($this->search_filter == 'payment_id', function($q){
                    $q->where('id', 'like', '%'.$this->search.'%');
                })->where('is_paid', 'like', '%'.$this->status_filter.'%');
            })
            ->latest()
            ->paginate($this->perPage);
        }else{
            $payments = [];
        }
        return view('livewire.admin.payment-request', compact('payments'));
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
