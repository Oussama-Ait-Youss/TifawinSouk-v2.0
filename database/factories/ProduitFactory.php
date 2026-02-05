<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;
use App\Models\Fournisseurs;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fournisseurs>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    use HasFactory;
    
    public function definition(): array
    {
        return [
    'reference' => fake()->unique(),
    'nom' => fake()->words(2, true),
    'prix_achat' => fake()->randomFloat(2, 5, 100),
    'prix_vente' => fake()->randomFloat(2, 110, 500),
    'stock' => fake()->numberBetween(0, 50),
    'image' => fake()->imageUrl(640, 480, 'products'),
    'category_id' => \App\Models\Category::factory(), 
    'fournisseur_id' => \App\Models\Fournisseurs::factory(),
];
    }
}
