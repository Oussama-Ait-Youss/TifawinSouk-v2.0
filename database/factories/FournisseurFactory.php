<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fournisseur>
 */
class FournisseurFactory extends Factory
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
            'nom'=>fake()->name(),
            'email'=>fake()->email(),
            'ville'=>fake()->company(),
            'telephone'=>fake()->phone()
            // //$table->id();
            // $table->string('nom');
            // $table->string('email');
            // $table->string('ville');
            // $table->string('telephone');
            // $table->timestamps();
        ];
    }
}
