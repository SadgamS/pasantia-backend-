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
            'nombre' => $this->faker->unique()->randomElement(['DOCUMENTOS DEL POSTULANTE', 'DOCUMENTOS ADMINISTRATIVOS', 'INFORMES Y ASISTENCIA', 'OTROS']),
        ];
    }
}
