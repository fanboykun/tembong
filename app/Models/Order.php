<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    protected $appends = ['best_seller_item', 'top_seller_item'];

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
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function buyer()
    {
        return $this->hasOne(Buyer::class);
    }

    public function balance()
    {
        return $this->morphOne(Balance::class, 'balanceable');
    }

    public function bestSellerItem(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->products()->where('type', 'best_seller')->sum('quantity'),
        );
    }

    public function topSellerItem(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->products()->where('type', 'top_seller')->sum('quantity'),
        );
    }
}
