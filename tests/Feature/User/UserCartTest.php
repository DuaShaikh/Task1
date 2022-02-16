<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use App\Models\shop\Cart;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCartTest extends TestCase
{
    public function test_view_cart_page_can_be_rendered() 
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/view-cart')
            ->assertStatus(200);
    }

    public function test_user_can_checkout_after_product_has_been_added_to_cart()
    {
        $user = User::factory()->create();
     
        $this->actingAs($user)
            ->post('checkout', [
                'user_id'       => $user->id,
                'product_id'    => '1',
                'quantity'      => '2',
                'size'          => 'M',
            ])
            ->assertStatus(200);
    }
}
