<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoDocumento>
 */
class TipoDocumentoFactory extends Factory
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
            'tipodoc' => $this->faker->unique()->randomElement(['carta carrera', 'hoja de vida',
                                                        'record academico', 'certificado egreso',
                                                        'matricula', 'informes', 'ficha', 'ci']),
        ];
    }
}
