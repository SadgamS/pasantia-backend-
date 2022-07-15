<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class ServidorPublicoFactory extends Factory
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
            'id' => Persona::factory(),
            'nivel_academico' => $this->faker->jobTitle(),
            'formacion_academica' => $this->faker->jobTitle(),
            'id_unidad' => $this->faker->randomElement($unidades),

        ];
    }
}
