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
            'nombres' => $this->faker->name(),
            'primer_apellido' => $this->faker->lastName(),
            'segundo_apellido' => $this->faker->lastName(),
            'ci' => $this->faker->numerify('#########'),
            'expedicion' => $this->faker->randomElement(['LP','SC','CBBA', 'OR','PTS','TR','PD']),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->date('d-m-Y'),
            'domicilio' => $this->faker->address(),
            'ciudad' => $this->faker->city(),
            'correo' => $this->faker->unique()->safeEmail(),
            'celular' => $this->faker->numerify('#######'),
            'numero_referencia' => $this->faker->numerify('#######'),
            'nombre_referencia' => $this->faker->name(),
        ];
    }
}
