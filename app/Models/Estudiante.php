<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiante';

    public function universidad()
    {
        return $this->hasOne(Universidad::class, 'id', 'id_universidad');
    }

    public function pasantia()
    {
        return $this->belongsTo(PasantiaTrabajoDirigido::class, 'id_pasantia', 'id');
    }

    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'id');
    }
}
