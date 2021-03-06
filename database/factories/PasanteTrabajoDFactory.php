<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PasanteTrabajoD>
 */
class PasanteTrabajoDFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tutorins = \App\Models\ServidorPublico::pluck('id')->toArray();
        $tutoraca = \App\Models\TutorAcademico::pluck('id')->toArray();
        return [
            //
            'fecha_inicio' => $this->faker->date('d-m-Y'),
            'fecha_final' => $this->faker->date('d-m-Y'),
            'id_postulante' => \App\Models\Postulante::factory(),
            'id_tutor_institucional' => $this->faker->randomElement($tutorins),
            'id_tutor_academico' => $this->faker->randomElement($tutoraca),
        ];
    }
}
