<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = "persona";

    protected $fillable = ['nombres', 'primer_apellido', 'segundo_apellido', 'ci', 
                            'expedicion', 'genero', 'fecha_nacimiento','domicilio', 
                            'ciudad', 'correo', 'celular', 'numero_referencia', 'nombre_referencia']; 

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s' ,
        'updated_at' => 'datetime:Y-m-d H:i:s' ,
    ];
}
