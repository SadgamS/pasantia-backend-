<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorAcademico extends Model
{
    use HasFactory;
    protected $table='tutor_academico';

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function universidad(){
        return $this->belongsTo(Universidad::class, 'id_universidad', 'id');
    }
}
