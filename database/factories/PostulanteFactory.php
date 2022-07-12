<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class PostulanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $universidad = \App\Models\Universidad::pluck('id')->toArray();
        $pasantias = \App\Models\PasantiaTrabajoDirigido::pluck('id')->toArray();
        return [
            //
            'id' => Persona::factory(),
            'tipo_postulante' => $this->faker->randomElement(['Estudiante', 'Egresado']),
            'numero_anios_semestre' => $this->faker->randomElement(['4to año', '5to año']),
            'carrera' => $this->faker->word(),
            'id_universidad' => $this->faker->randomElement($universidad),
            'id_pasantia' => $this->faker->randomElement($pasantias),
        ];
    }
}
