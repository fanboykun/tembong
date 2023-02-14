<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Owner()
    {
        // return $this->belongsTo(User::class, 'code', 'id');
        return $this->belongsTo(User::class, 'code', 'referral_code');
    }
    public function User()
    {
        // return $this->belongsTo(User::class, 'code', 'id');
        // return $this->belongsTo(User::class, 'code', 'referral_code');
        return $this->belongsTo(User::class);
    }
}
