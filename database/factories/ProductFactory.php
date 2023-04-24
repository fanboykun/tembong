<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => 99000,
            'type' => $this->faker->randomElement(['best_seller', 'top_seller']),
            'stock' => 100,
            // 'image' => $this->faker->imageUrl(),
        ];
    }

    // public function suspended()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'price' => $attributes['type'] == 'best_seller' ? 65000 : 150000,
    //         ];
    //     });
    // }

    // public function configure()
    // {
    //     return $this->afterMaking(function (Product $product) {
    //         $product->price = $product->type == 'best_seller' ? 65000 : 150000;
    //     })->afterCreating(function (Product $product) {
    //         $product->price = $product->type == 'best_seller' ? 65000 : 150000;
    //     });
    // }
}
