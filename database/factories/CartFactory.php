<?php

namespace Database\Factories;

use App\Models\Shop\Cart;
use Illuminate\Support\Str;
use App\Models\Shop\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::factory()->create();

        return [
            'product_id' => $product->id,
            'quantity'   => $this->faker->randomDigit(),
            'size'       => $this->faker->numerify('S', 'M', 'L'),
        ];
    }
}
