<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionario';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function unidad()
    {
        return $this->hasOne(Unidad::class, 'id', 'id_unidad');
    }
}
