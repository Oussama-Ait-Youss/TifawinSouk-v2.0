<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;    

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'customer_name' => $this->faker->name(),
            'customer_address' => $this->faker->address(),
            'customer_phone' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement([
                Order::STATUS_PENDING,
                Order::STATUS_SHIPPED,
                Order::STATUS_DELIVERED,
                Order::STATUS_CANCELED,
            ]),
            'total' => 0, 
        ];
    }

    public function pending(): static
    {
        return $this->state(fn () => ['status' => Order::STATUS_PENDING]);
    }
}
