<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'customer_name' => fake()->name(),
            'customer_address' => fake()->address(),
            'customer_phone' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['pending', 'shipped', 'delivered']),
            'total' => fake()->numberBetween(100, 2000),
        ];
    }
}
