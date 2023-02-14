<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = [
        'name',
        'description',
        'type',
        'price',
        'stock',
        'category_id',
    ];

    public function registerMediaCollections(): void
    {
        // single file support
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);

        // multiple file support
        // $this->addMediaCollection('image')
        //     ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }

    protected function type(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value == 'best_seller' ? 'Best Seller' : 'Top Seller';
            },
        );
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'amount_price');
    }

}
