<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        // return $this->belongsTo(User::class, 'code', 'id');
        return $this->belongsTo(User::class, 'code', 'referral_code');
    }

    public function user()
    {
        // return $this->belongsTo(User::class, 'code', 'id');
        // return $this->belongsTo(User::class, 'code', 'referral_code');
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function balance()
    {
        return $this->morphMany(Balance::class, 'balanceable');
    }
}
