<?php

namespace App\Http\Livewire\Reseller;

use App\Models\User;
use Livewire\Component;

class ResellerDashboard extends Component
{
    public $catalog_url;
    public $total_catalog_visitor;
    public $total_sales;
    public $total_referral;
    public $total_balance;
    public $referral_code;

    public function mount()
    {
        // $this->catalog_url = config('app.url') . '/catalog/' . auth()->user()->id;
        $this->catalog_url = url("/catalog/" . auth()->user()->id);
        $user_data =  User::where('id', auth()->id())->withTotalVisitCount()
        ->withCount('dropshippings')
        ->withCount('referrals')
        ->withSum('balance', 'amount')
        ->first();
        $this->total_sales = $user_data->dropshippings_count;
        $this->total_referral = $user_data->referrals_count;
        $this->total_catalog_visitor = $user_data->visit_count_total;
        $this->total_balance = $user_data->balance_sum_amount;
        $this->referral_code = $user_data->referral_code;
        // dd($user_data);
    }
    public function render()
    {
        return view('livewire.reseller.reseller-dashboard');
    }
}
