<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\User\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $address = Address::factory()->create();

        return [
            'fullName'   => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'password'   => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone'      => $this->faker->phoneNumber(),
            'gender'     => 'M',
            'address_id' => $address->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
