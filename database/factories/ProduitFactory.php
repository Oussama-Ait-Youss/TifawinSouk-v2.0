<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Fournisseurs;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => fake()->unique()->ean13(),
            'nom' => fake()->words(3, true),
            'prix_achat' => fake()->randomFloat(2, 5, 100),
            'prix_vente' => fake()->randomFloat(2, 110, 500),
            'stock' => fake()->numberBetween(0, 100),
            'category_id' => Category::factory(),
            'fournisseurs_id' => Fournisseurs::factory(),
        ];
    }
}
