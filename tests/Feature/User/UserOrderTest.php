<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use App\Models\shop\Order;
use App\Models\shop\OrderItem;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserOrderTest extends TestCase
{
    // public function test_user_can_place_order()
    // {
    //     $user  = User::factory()->create();
        
    //     $orderItem = OrderItem::factory()->create();

    //     $this->actingAs($user)
    //         ->post('order-item/' . $orderItem->id, [
    //             'orders' => [
    //                 'order_id'     => $orderItem->order_id,
    //                 'product_id'   => $orderItem->product_id,
    //                 'quantity'     => $orderItem->quantity,
    //                 'size'         => $orderItem->size,
    //                 'productPrice' => $orderItem->productPrice
    //             ]
    //         ])
    //         ->assertStatus(200);
    // }
}
