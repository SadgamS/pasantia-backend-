<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServidorPublico extends Model
{
    use HasFactory;
    protected $table = 'servidor_publico';
    protected $fillable = ['id', 'formacion_academica', 'nivel_academico', 'id_unidad'];


    public function unidad()
    {
        return $this->hasOne(Unidad::class, 'id', 'id_unidad');
    }
    
    public function persona()
    {
        return $this->hasOne(Persona::class, 'id', 'id');
    }
}
