<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TutorAcademico>
 */
class TutorAcademicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $universidad = \App\Models\Universidad::pluck('id')->toArray();
        return [
            //
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'grado_academico' => $this->faker->randomElement(['Licenciado', 'Magister']),
            'email' => $this->faker->safeEmail(),
            'celular' => $this->faker->numerify('########'),
            'id_user' => $this->faker->shuffle($users),
            'id_universidad' => $this->faker->shuffle($universidad),
            // 'id_user' => $this->faker->unique()->randomElement($users),
            // 'id_universidad' => $this->faker->unique(true)->randomElement($universidad),

            // 'id_user' => $this->faker->unique(true)->numberBetween(1,10),
            // 'id_universidad' => $this->faker->unique(true)->numberBetween(1,10),
        ];
    }
}
