<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'name' => $name=fake()->name(),
            'address' => $name=fake()->address(),
            'phone' => $name=fake()->phoneNumber(),
            'slug'=>Str::slug($name),
            'email' => fake()->unique()->safeEmail(),
            'status' => 'Active',
            'email_verified_at' => now(),
            'password' => '$2y$10$2KVfihbLxBubGrZLU5Fd/uHKGxUV8M5VELKp3kmuX9zjXjz46njuy', // password
            'remember_token' => Str::random(10),
        ];
    }

    
}
