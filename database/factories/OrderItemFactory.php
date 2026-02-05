<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        $qty = fake()->numberBetween(1, 5);
        $price = fake()->numberBetween(50, 500);

        return [
            'order_id' => Order::factory(),
            'product_id' => 1,
            'quantity' => $qty,
            'unit_price' => $price,
            'line_total' => $qty * $price,
        ];
    }
}
