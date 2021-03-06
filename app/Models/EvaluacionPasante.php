<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionPasante extends Model
{
    use HasFactory;
    protected $table = 'evaluacion_pasante';

    public function pasantes()
    {
        return $this->hasOne(PasanteTrabajoD::class,'id', 'id_pasante');
    }
}
