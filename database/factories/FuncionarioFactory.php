<?php

namespace Database\Factories;

use App\Models\Persona;
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
        $persona = \App\Models\Persona::pluck('id')->toArray();
        return [
            //
            'id' => Persona::factory(),
            'profesion' => $this->faker->jobTitle(),
            'email' => $this->faker->email(),
            'id_unidad' => $this->faker->randomElement($unidades),

        ];
    }
}
