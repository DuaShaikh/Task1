<?php

namespace Tests\Feature\Admin\Category;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Shop\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    public function test_category_screen_can_be_rendered()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this
        ->actingAs($admin)
        ->get('/admin/dashboard/category');

        $response->assertStatus(200);
    }

    public function test_add_category_screen_can_be_rendered()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin/dashboard/category/add-category');

        $response->assertStatus(200);
    }

    public function test_admin_can_add_categories_and_update()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);
    
        $image = Str::random(length: 8) . '.jpg';

        $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/category/add-category', [
                'categoryName' => 'Men',
                'photo'        => UploadedFile::fake()->image($image),
            ]
        );
       
        $response->assertStatus(302);
        
        /*------ UPDATE ADMIN CATEGORIES------*/

        $category = Category::first();

        $response = $this
            ->actingAs($admin)
            ->post('/admin/dashboard/category/add-category', [
                'id'           => $category->id,
                'media_id'     => $category->media_id,
                'categoryName' => 'Women',
                'photo'        => UploadedFile::fake()->image($image),
            ]
        );
    
        $response->assertStatus(302);
    }

    public function test_admin_can_delete_category()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);
        
        $category = Category::factory()->create();

        $response = $this
            ->actingAs($admin)    
            ->get("admin/dashboard/delete-category/" . $category->id)
            ->assertStatus(302);
    }

    public function test_show_category_detail_screen_can_be_rendered()
    { 
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $category = Category::factory()->create();

        $this->actingAs($admin)
            ->get("admin/dashboard/category/show-category/" . $category->id)
            ->assertOk();
    }

}
