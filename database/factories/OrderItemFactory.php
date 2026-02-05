<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;    

    public function definition(): array
    {
        $qty = $this->faker->numberBetween(1, 5);
        $unit = $this->faker->randomFloat(2, 5, 500);

        return [
            'order_id' => Order::factory(),

            'product_id' => Product::factory(),

            'quantity' => $qty,
            'unit_price' => $unit,
            'line_total' => round($qty * $unit, 2),
        ];
    }
}
