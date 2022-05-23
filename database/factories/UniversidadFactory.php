<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Universidad>
 */
class UniversidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->name(),
            'tiene_convenio' => $this->faker->boolean(),
            'tipo' => $this->faker->randomElement(['publica', 'privada']),
        ];
    }
}
