<?php

namespace Tests\Feature\Admin\Product;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Shop\Product;
use App\Models\Shop\Category;
use Illuminate\Http\UploadedFile;
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

    /**
     * A basic feature test_add_product_screen_can_be_rendered.
     */
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

    /**
     * A basic feature test_admin_can_add_products_and_product_stock_and_update
     * in which products and product's stock can be added and update.
     */
    public function test_admin_can_add_products_and_product_stock_and_update()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);
    
        for($i = 0; $i < 5; $i++) {
            Category::factory()->create();
        }
        $categoryIds = Category::all()->pluck('id')->values();

        $image = Str::random(length: 8) . '.jpg';

        $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/product/add-product', [
                'pName'        => 'Shirt',
                'description'  => 'Shirt Descriotion',
                'productPrice' => '700',
                'photo'        => UploadedFile::fake()->image($image),
                'category_id'  => $categoryIds,
            ]
        )->assertStatus(200);

        $product = Product::first();

        $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/product/stocks', [
                'id'       => $product->id, 
                'quantity' => '20',
                'size'     => 'S' 
            ]
        )->assertStatus(200);

        /*------ UPDATE ADMIN PRODUCTS------*/

        $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/product/show-product/' . $product->id . '/edit-product', [
                'id'           => $product->id, 
                'pName'        => 'Shirt',
                'description'  => 'Shirt Descriotion updated',
                'productPrice' => '700',
                'media_id'     => $product->media_id,
                'photo'        => UploadedFile::fake()->image($image),
                'category_id'  => $categoryIds,
            ])  ->assertStatus(200);
          
            $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/product/show-product/' . $product->id . '/stock-update', [
                'inStock' => [
                                'id'       => $product->id, 
                                'quantity' => '25',
                                'size'     => 'S'
                            ]
            ]) ->assertStatus(302);
           
    }

    /**
     * A basic feature test_admin_can_delete_product
     * in which products and product's stock can be deleted.
     */
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

     /**
     * A basic feature  test_show_product_detail_screen_can_be_rendered
     * in which product detail show for editing record .
     */
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
}
