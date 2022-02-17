<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
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
}
