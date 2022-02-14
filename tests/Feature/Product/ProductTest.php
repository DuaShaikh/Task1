<?php

namespace Tests\Feature\Product;

use Tests\TestCase;
use App\Models\User;
use App\Models\shop\Product;
use Illuminate\Foundation\Testing\WithFaker;

class ProductTest extends TestCase
{
    /**
     * A basic feature test_product_can_be_rendered.
     *
     * @return void
     */
    
    public function test_product_screen_can_be_rendered(): void
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this
        ->actingAs($admin)
        ->get('/admin/dashboard/product');

        $response->assertStatus(200);
    }

    public function test_add_product_screen_can_be_rendered()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this
        ->actingAs($admin)
        ->get('/admin/dashboard/product/add-product');

        $response->assertStatus(200);
    }

    public function test_show_product_detail_screen_can_be_rendered()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this
        ->actingAs($admin)
        ->get('/admin/dashboard/product/show-product');

        $response->assertStatus(200);
    }

    public function test_admin_can_add_products()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $data = [
                    'pName'        => 'Shirt',
                    'description'  => 'This is a men shirt',
                    'productPrice' => '800',
                    'category_id'  => ['1', '2', '3', '4', '5', '6', '7'],
                    'photo'        => 'https://static-01.daraz.pk/p/db9c19cdcd61734d63f2866bd511ea1a.jpg'
                ];



        $response = $this
        ->actingAs($admin)
        ->post('/admin/dashboard/product/add-product', $data);

        $response->assertStatus(200);
    }


}
