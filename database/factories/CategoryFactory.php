<?php

namespace Database\Factories;

use App\Models\common\Media;
use App\Models\shop\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $media = Media::factory()->create();

        return [
            'categoryName' => $this->faker->name(),
            'media_id'     => $media->id,
            // 'parent_id'    => 
        ];
    }
}
