<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fournisseurs>
 */
class FournisseursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'ville' => fake()->city(),
            'telephone' => fake()->phoneNumber(),
        ];
    }
}
