<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{  
    public function test_cannot_access_route_if_user_is_not_an_admin()
    {
        $nonAdminUser = User::factory()->create();

        $this->actingAs($nonAdminUser)
                ->get('/admin/dashboard')
                ->assertStatus(302);
    }

    public function test_an_admin_can_browse_admin_dashboard()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $this->actingAs($admin)
          ->get('/admin/dashboard')
          ->assertOk();
    }
}
