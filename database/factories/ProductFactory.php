<?php

namespace Database\Factories;

use App\Models\common\Media;
use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $media = Media::factory()->create();

        return [
            'pName'        => $this->faker->name(),
            'description'  => $this->faker->text(),
            'productPrice' => $this->faker->randomFloat(2, 0, 10000),
            'media_id'     => $media->id,
            'created_at'   => $this->faker->date(),
            'updated_at'   => $this->faker->date(),
        ];
    }
}
