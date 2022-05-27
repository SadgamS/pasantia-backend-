<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvaluacionPasante>
 */
class EvaluacionPasanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pasantes = \App\Models\PasanteTrabajoD::pluck('id')->toArray();
        return [
            //
            'fecha_evaluacion' => $this->faker->date('d-m-Y'),
            'periodo_evaluacion' => 'Gestion '.$this->faker->year(),
            'cumplimiento_tareas_asignadas' => $this->faker->numberBetween(1,15),
            'calidad_ejecucion_tareas' => $this->faker->numberBetween(1,15),
            'logro_resultados' => $this->faker->numberBetween(1,15),
            'capacidad_trabajo_pasantia' => $this->faker->numberBetween(1,35),
            'evaluacion_pasantia' => $this->faker->numberBetween(1,20),
            'puntuacion_total' => $this->faker->numberBetween(1,100),
            'id_pasante' => $this->faker->randomElement($pasantes),
        ];
    }
}
