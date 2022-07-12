<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;
    protected $table = 'postulante';
    protected $fillable = ['id','tipo_postulante','numero_anios_semestre','carrera', 'id_universidad', 'id_pasantia'] ;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s' ,
        'updated_at' => 'datetime:Y-m-d H:i:s' ,
    ];

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
