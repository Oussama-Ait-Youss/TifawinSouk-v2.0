<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('produit')) {
            $this->command?->warn('OrderSeeder skipped: produit table not found yet.');
            return;
        }

        /** @var \Illuminate\Database\Eloquent\Collection $users */
        $users = User::query()->inRandomOrder()->limit(10)->get();

        /** @var \Illuminate\Database\Eloquent\Collection $products */
        $products = Produit::query()->inRandomOrder()->limit(30)->get();

        if ($users->isEmpty() || $products->isEmpty()) {
            $this->command?->warn('OrderSeeder skipped: missing users or products data.');
            return;
        }

        Order::factory()->count(20)->make()->each(function ($order) use ($users, $products) {
            $order->user_id = $users->random()->id;
            $order->save();

            $itemsCount = rand(1, 4);
            $total = 0;

            for ($i = 0; $i < $itemsCount; $i++) {
                $product = $products->random();

                $qty = rand(1, 3);
                $unit = (float) $product->prix_vente;
                $line = round($qty * $unit, 2);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $unit,
                    'line_total' => $line,
                ]);

                $total += $line;
            }

            $order->update(['total' => round($total, 2)]);
        });
    }
}
