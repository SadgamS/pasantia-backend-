<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorAcademico extends Model
{
    use HasFactory;
    protected $table='tutor_academico';

    public function persona(){
        return $this->hasOne(Persona::class, 'id', 'id');
    }

    public function universidad(){
        return $this->hasOne(Universidad::class, 'id' ,'id_universidad');
    }
}
