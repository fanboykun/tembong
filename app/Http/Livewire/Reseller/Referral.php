<?php

namespace App\Http\Livewire\Reseller;

use App\Models\Balance;
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
    // public $referral_users;
    public $code_owner;

    public $total_referral_fee;
    public $total_referral_user;

    protected $listeners = ['codeStored' => '$refresh'];
    public $perPage = 10;

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
        $referral_users = ReferralModel::where('code',$this->own_referral_code)
        ->with('user')->with('balance')->paginate($this->perPage);
        $this->total_referral_fee = auth()->user()->referral_fee;
        $this->total_referral_user = $referral_users->count();
        // dd($referral_users);
        return view('livewire.reseller.referral', compact('referral_users'));
    }

    public function storeReferralCode()
    {
        $check = User::where('referral_code',$this->inserted_referral_code)->first();
        $valid = ReferralModel::where('user_id',auth()->id())->first();
        if(empty($valid)){
            if($check != null){
                if($check->id != auth()->id()){
                    $referral = new ReferralModel;
                    $referral->code = $this->inserted_referral_code;
                    $referral->user_id = auth()->id();
                    $referral->save();
                    $this->saveOwnerBalance($referral, $check);
                    $this->saveCodeUserBalance($referral);

                    $this->referral_information = $referral;
                    $this->inserted_referral_code = '';
                    $this->emitSelf('codeStored');
                }else{
                    $this->message_code =  'Anda tidak bisa memasukkan kode referral anda sendiri';
                }
            }else{
                $this->message_code =  'Kode referral tidak ditemukan';
            }
        }
    }

    protected function saveOwnerBalance($referral, $reseller)
    {
        $balance = new Balance();
        $balance->user_id = $reseller->id;
        $balance->amount = 10000;

        $referral->balance()->save($balance);
    }

    public function saveCodeUserBalance($referral)
    {
        $balance = new Balance();
        $balance->user_id = auth()->id();
        $balance->amount = 5000;

        $referral->balance()->save($balance);
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }
}
