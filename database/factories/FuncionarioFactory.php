<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\User;
use \App\Models\Unidad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionario>
 */
class FuncionarioFactory extends Factory
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
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'profesion' => $this->faker->jobTitle(),
            'email' => $this->faker->email(),
            'celular' => $this->faker->numerify('#######'),
            'id_user' => User::factory(),
            'id_unidad' => $this->faker->randomElement($unidades),

        ];
    }
}
