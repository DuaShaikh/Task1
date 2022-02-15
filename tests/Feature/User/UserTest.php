<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use App\Models\shop\Cart;
use App\Models\common\Media;
use App\Models\shop\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
  
    public function test_cannot_access_route_if_user_is_an_admin()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $this->actingAs($admin)
            ->get('/dashboard')
            ->assertStatus(200);
    }

    public function test_an_user_can_browse_user_dashboard()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
          ->get('/dashboard')
          ->assertOk();
    }

    public function test_an_user_can_access_orders()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
          ->get('/dashboard/orders')
          ->assertOk();
    }

    public function test_an_user_can_access_home_page()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
          ->get('/')
          ->assertOk();
    }

    public function test_view_product_page_can_be_rendered()
    {
        $product = Product::factory()->create();

        $this->get('view-product/' . $product->id)
            ->assertOk();
    }

    public function test_product_cannot_be_add_to_cart_if_user_is_not_logged_in()
    {
       $cart = Cart::factory()->create();

        $this->post('view-product/add-to-cart', [
            'quantity' => $cart->quantity,
            'size'     => $cart->size,
        ])
            ->assertOk();
    }

    public function test_product_can_be_add_to_cart_if_user_is_logged_in()
    {
        $user = User::factory()->create();

        $cart = Cart::factory()->create();
       
        $this ->actingAs($user)
            ->post('view-product/add-to-cart', [
            'user_id'  => $user->id,
            'quantity' => $cart->quantity,
            'size'     => $cart->size,
        ])
            ->assertOk();
    }
}
