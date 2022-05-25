<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documento>
 */
class DocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $estudiantes = \App\Models\Estudiante::pluck('id')->toArray();
        $tipoDoc = \App\Models\TipoDocumento::pluck('id')->toArray();
        return [
            //
            'ruta' => $this->faker->filePath(),
            'id_estudiante' => $this->faker->randomElement($estudiantes),
            'id_tipo_documento' => $this->faker->randomElement($tipoDoc),
        ];
    }
}
