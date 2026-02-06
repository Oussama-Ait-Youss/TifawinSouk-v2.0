<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Fournisseurs;
use App\Models\Produit;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            FournisseurSeeder::class,

            ProduitSeeder::class,

            OrderSeeder::class,
            OrderItemSeeder::class,

        ]);
    }
}
