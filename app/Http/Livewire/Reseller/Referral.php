<?php

namespace App\Http\Livewire\Reseller;

use Livewire\Component;
use App\Models\User;
Use App\Models\Referral as ReferralModel;

class Referral extends Component
{
    public $own_referral_code;
    public $inserted_referral_code;
    public $current_code;
    public $message_code;
    public $referral_information;
    public $referral_users;
    public $code_owner;

    protected $listeners = ['codeStored' => '$refresh'];

    public function mount()
    {
        $this->own_referral_code = auth()->user()->referral_code;
    }

    public function render()
    {
        $this->referral_information = ReferralModel::where('user_id',auth()->id())->first();
        if($this->referral_information != null){
            $this->code_owner = User::where('referral_code',$this->referral_information->code)->first();
            $this->current_code = $this->referral_information->code;

        }
        $this->referral_users = ReferralModel::where('code',$this->own_referral_code)->get();
        return view('livewire.reseller.referral');
    }

    public function storeReferralCode()
    {
        $check = User::where('referral_code',$this->inserted_referral_code)->first();
        // dd($check->id);

        if($check->id != auth()->id()){
            $referral = new ReferralModel;
            $referral->code = $this->inserted_referral_code;
            $referral->user_id = auth()->id();
            $referral->save();

            $this->referral_information = $referral;
            $this->inserted_referral_code = '';
            $this->emitSelf('codeStored');
        }else{
            $this->message_code =  'You can not use your own referral code';
        }
    }
}
