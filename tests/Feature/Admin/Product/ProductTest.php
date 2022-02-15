<?php

namespace Tests\Feature\Admin\Product;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\common\Media;
use App\Models\shop\Category;
use App\Models\shop\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    public function test_admin_can_add_products()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $product = Product::factory()->create();

        for($i = 0; $i < 5; $i++) {
            Category::factory()->create();
        }
        $categoryIds = Category::all()->pluck('id')->values();
    
        // Storage::fake('public');

        $image = Str::random(length: 8) . '.jpg';

        $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/product/add-product', [
                'pName'        => $product->pName,
                'description'  => $product->description,
                'productPrice' => $product->productPrice,
                'photo'        => UploadedFile::fake()->image($image),
                'category_id'  => $categoryIds,
            ]
        );
       
        $response->assertStatus(200);
        //  Storage::disk('public')->assertExists('product/' . $image);
    }

    public function test_admin_can_delete_product()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);
        
        $product = Product::factory()->create();

        $response = $this
            ->actingAs($admin)    
            ->get("admin/dashboard/delete-product/" . $product->id)
            ->assertStatus(302);
    }

    public function test_show_product_detail_screen_can_be_rendered()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $product = Product::factory()->create();

        $this->actingAs($admin)
            ->get("admin/dashboard/product/show-product/" . $product->id)
            ->assertOk();
    }

    // public function test_an_admin_can_edit_product()
    // { 
    //     $admin = User::factory()->create([
    //         'role' => 'admin'
    //     ]);

    //     $product = Product::factory()->create();

    //     $response = $this
    //         ->actingAs($admin)
    //         ->post('/admin/dashboard/product/show-product/edit-product', $product)
    //         ->assertStatus(200);
    // }
}
