<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fournisseurs;
use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commandes;
use App\Models\Paniere;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            FournisseurSeeder::class,
            ProduitSeeder::class,
            OrderSeeder::class,
        ]);

        User::factory(50)->create();
    }
}
