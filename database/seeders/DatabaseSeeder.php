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
        \App\Models\Rol::factory(3)->create();
        // \App\Models\User::factory(10)->create();
        \App\Models\Universidad::factory(10)->create();
        \App\Models\TutorAcademico::factory(10)->create();
        \App\Models\Unidad::factory(10)->create();
        \App\Models\Funcionario::factory(10)->create();
        \App\Models\PasantiaTrabajoDirigido::factory(10)->create();
        \App\Models\Estudiante::factory(5)->create();
        \App\Models\PasanteTrabajoD::factory(5)->create();
        \App\Models\EvaluacionPasante::factory(10)->create();
        \App\Models\TipoDocumento::factory(7)->create();
        \App\Models\Documento::factory(10)->create();
        


        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'test',
            'id_rol' => 1
        ]);
    }
}
