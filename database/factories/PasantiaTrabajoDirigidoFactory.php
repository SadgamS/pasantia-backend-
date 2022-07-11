<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PasantiaTrabajoDirigido>
 */
class PasantiaTrabajoDirigidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $unidades = \App\Models\Unidad::pluck('id')->toArray();
        return [
            //
            'tipo' => $this->faker->randomElement(['pasantia', 'trabajo dirigido']),
            'nombre_ref' => $this->faker->sentence(8),
            'duracion_meses' => $this->faker->numberBetween(3,6),
            'cant_horas' => $this->faker->numberBetween(4,8),
            'formacion_requerida' => $this->faker->jobTitle(),
            'nro_personas' => $this->faker->randomDigit(),
            'aprobado' => $this->faker->boolean(),
            'id_unidad' => $this->faker->randomElement($unidades)
        ];
    }
}
