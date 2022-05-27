<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasantiaTrabajoDirigido extends Model
{
    use HasFactory;
    protected $table = 'pasantia_trabajo_dirigido';

    public function unidad()
    {
        return $this->hasOne(Unidad::class, 'id', 'id_unidad');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class,'id_pasantia', 'id');
    }
}
