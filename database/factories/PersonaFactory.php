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
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'ci' => $this->faker->numerify('#########'),
            'extension' => $this->faker->randomElement(['LP','SC','CBBA', 'OR','PTS','TR','PD']),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->date('d-m-Y'),
            'celular' => $this->faker->numerify('#######'),
        ];
    }
}
