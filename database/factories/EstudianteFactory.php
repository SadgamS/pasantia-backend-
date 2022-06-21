<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
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
            'email' => $this->faker->email(),
            'domicilio' => $this->faker->address(),
            'carrera' => $this->faker->word(),
            'id_universidad' => $this->faker->randomElement($universidad),
            'id_pasantia' => $this->faker->randomElement($pasantias),
        ];
    }
}
