<?php

namespace Database\Factories;

use App\Models\shop\Order;
use App\Models\shop\OrderItem;
use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::factory()->create();

        $order   = Order::factory()->create();

        return [
            'product_id'   => $product->id,
            'order_id'     => $order->id,
            'quantity'     => $this->faker->randomDigit(),
            'size'         => $this->faker->numerify('S',' M', 'L'),
            'productPrice' => $this->faker->randomFloat(2, 0, 10000),

        ];
    }
}
