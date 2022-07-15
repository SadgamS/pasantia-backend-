<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Persona::factory(10)->create();
        \App\Models\Universidad::factory(10)->create();
        \App\Models\TutorAcademico::factory(10)->create();
        \App\Models\Unidad::factory(10)->create();
        \App\Models\ServidorPublico::factory(10)->create();
        \App\Models\PasantiaTrabajoDirigido::factory(10)->create();
        \App\Models\Postulante::factory(5)->create();
        \App\Models\PasanteTrabajoD::factory(5)->create();
        \App\Models\EvaluacionPasante::factory(10)->create();
        \App\Models\TipoDocumento::factory(4)->create();
        \App\Models\Documento::factory(10)->create();
        \App\Models\Rol::factory(3)->create();
        \App\Models\User::factory()->create([
            'usuario' => 'Test User',
            'password' => bcrypt('test'),
            'id_rol' => 1
        ]);
        \App\Models\User::factory(10)->create();
        


    }
}
