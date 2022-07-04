<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
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
            'primer_nombre' => $this->faker->firstName(),
            'segundo_nombre' => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'ci' => $this->faker->numerify('#########'),
            'extension' => $this->faker->randomElement(['LP','SC','CBBA', 'OR','PTS','TR','PD']),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->date('d-m-Y'),
            'celular' => $this->faker->numerify('#######'),
            'correo' => $this->faker->unique()->safeEmail(),
        ];
    }
}
