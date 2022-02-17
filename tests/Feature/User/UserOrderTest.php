<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\Shop\Stock;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserOrderTest extends TestCase
{
    public function test_user_can_place_order()
    {
        $user  = User::factory()->create();
        
        $order = Order::factory()->create();

        $product = Product::factory()->create();

        $stock = Stock::create([
            "product_id" => $product->id,
            'quantity'   => '20',
            'size'       => 'M'
        ]);

        $this->actingAs($user)
            ->post('order-item/' . $order->id, [
                'orders' => [
                    'order_id'     => $order->id,
                    'product_id'   => $product->id,
                    'quantity'     => '2',
                    'size'         => 'M',
                    'productPrice' => '500',
                ]
            ])->assertStatus(200);
            
    }
}
