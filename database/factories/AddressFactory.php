<?php

namespace Database\Factories;

use App\Models\User\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address'    => $this->faker->text(),
            'city'       => $this->faker->city(),
            'country'    => $this->faker->country(),
            'postalCode' => $this->faker->countryCode(),
            'region'     => $this->faker->city()
        ];
    }
}
