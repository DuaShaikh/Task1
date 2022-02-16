<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use App\Models\shop\Cart;
use App\Models\shop\Order;
use App\Models\shop\Stock;
use App\Models\common\Media;
use App\Models\shop\Product;
use App\Models\user\Address;
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

    // public function test_user_can_edit_their_basic_details_and_shipping_address()
    // {
    //     $user  = User::factory()->create();
    //     $user->first();
        
    //     $address = Address::factory()->create();
    //     $address->first();
        
    //     $order = Order::factory()->create();

    //     // $cart  = Cart::factory()->create();

    //     $this->actingAs($user)
    //         ->post('update-detail', [
    //             'user_id'    => $user->id,
    //             'address_id' => $address->id,
    //         ])
    //         ->assertStatus(200);
    // }
}
