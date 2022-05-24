<?php

namespace Database\Factories;

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
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'ci' => $this->faker->numerify('#########'),
            'extension' => $this->faker->randomElement(['LP','SC','CBBA', 'OR','PTS','TR','PD']),
            'fecha_nacimiento' => $this->faker->date('d-m-Y'),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'email' => $this->faker->email(),
            'celular' => $this->faker->numerify('#######'),
            'domicilio' => $this->faker->address(),
            'carrera' => $this->faker->word(),
            'id_universidad' => $this->faker->randomElement($universidad),
            'id_pasantia' => $this->faker->randomElement($pasantias),
        ];
    }
}
