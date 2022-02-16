<?php

namespace Database\Factories;

use App\Models\shop\Stock;
use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    protected $model = Stock::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $product = Product::factory()->create();
        return [
            // 'product_id' => $product->id,
            'quantity'   => $this->faker->randomDigit(),
            'size'       => $this->faker->numerify('S',' M', 'L'),
        ];
    }
}
