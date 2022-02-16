<?php

namespace Tests\Feature\User\Product;

use Tests\TestCase;
use App\Models\User;
use App\Models\shop\Cart;
use App\Models\shop\Stock;
use App\Models\shop\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProductTest extends TestCase
{
    public function test_view_product_page_can_be_rendered()
    {
        $product = Product::factory()->create();

        $this->get('view-product/' . $product->id)
            ->assertOk();
    }

    public function test_product_cannot_be_add_to_cart_if_user_is_not_logged_in()
    {
        $this->post('view-product/add-to-cart', [
            'quantity' => '2',
            'size'     => 'S',
        ])
            ->assertStatus(302);
    }

    public function test_product_can_be_add_to_cart_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $stock = Stock::factory()->create();

        $this->actingAs($user)
            ->post('view-product/add-to-cart', [
                'user_id'       => $user->id,
                'quantity'      => '2',
                'size'          => 'S',
                'stockQuantity' => $stock->quantity
            ])
            ->assertOk();
    }

    public function test_product_can_be_delete_from_cart_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $cart = Cart::factory()->create();

        $this->actingAs($user)
            ->get('deleteCart/' . $cart->id)
            ->assertStatus(302);
    }
}
