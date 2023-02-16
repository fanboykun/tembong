<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reseller()
    {
        return $this->belongsTo(User::class, 'reseller_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'amount_price');
    }
    public function buyer()
    {
        return $this->hasOne(Buyer::class);
    }
}
