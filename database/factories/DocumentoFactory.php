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
        $estudiantes = \App\Models\Persona::pluck('id')->toArray();
        $tipoDoc = \App\Models\TipoDocumento::pluck('id')->toArray();
        return [
            //
            'nombre' => $this->faker->uuid(),
            'ruta' => $this->faker->filePath(),
            'id_persona' => $this->faker->randomElement($estudiantes),
            'id_tipo_documento' => $this->faker->randomElement($tipoDoc),
        ];
    }
}
