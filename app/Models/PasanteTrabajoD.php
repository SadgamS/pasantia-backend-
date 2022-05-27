<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasanteTrabajoD extends Model
{
    use HasFactory;
    protected $table = 'pasante_trabajo_d';

    public function estudiante()
    {
        return $this->hasOne(Estudiante::class, 'id', 'id_estudiante');
    }

    public function tutorAcademico()
    {
        return $this->hasOne(TutorAcademico::class, 'id', 'id_tutor_academico');
    }

    public function tutorInstitucional()
    {
        return $this->hasOne(Funcionario::class, 'id', 'id_tutor_institucional');
    }
}
