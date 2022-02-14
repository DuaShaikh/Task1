<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pName'    => $this->faker->name(),
            'description' => $this->faker->text(),
            'productPrice'=> $this->faker->str_random(40)
        ];
    }
}
