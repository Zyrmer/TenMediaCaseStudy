<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'email'=> $this->faker->safeEmail,
            'mobile'=> $this->faker->phoneNumber(),
            'password' => Hash::make('password'), // better than faker password for testing
            'role' => $this->faker->randomElement(['admin', 'user', 'guest']),
        ];
    }
}
