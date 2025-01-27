<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nif' => 'A-' . fake()->unique()->randomNumber(6, true),
            'nombre' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'token' => fake()->sha256(),
            'user_id' => fake()->numberBetween(1, 10),
        ];
    }
}
