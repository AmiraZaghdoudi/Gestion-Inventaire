<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Center>
 */
class CenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'email' => fake()->safeEmail(),
            'admin_id' => fake()->randomElement($users),
        ];
    }
}
