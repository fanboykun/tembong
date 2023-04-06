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
    protected $appends = [
        'best_seller_item',
        'top_seller_item',
        'total_price',
        'total_discount',
        'price_after_discount',
        'price_with_discount_and_ongkir',
    ];

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
            get: fn () => $this->products()->where('type', 'top_seller')->sum('quantity')
        );
    }

    public function getTotalPriceAttribute()
    {
        return ($this->top_seller_item * 150000) + ($this->best_seller_item * 65000);
    }

    public function getTotalDiscountAttribute()
    {
        return is_null($this->discount_type) ? 0 : 0;
    }

    public function priceAfterDiscount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->total_price - $this->total_discount,
        );
    }
    public function priceWithDiscountAndOngkir(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price_after_discount + $this->shipping_cost
        );
    }

}
