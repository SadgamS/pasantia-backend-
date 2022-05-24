<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->id();
            $table->string('nombres'); 
            $table->string('apellidos'); 
            $table->integer('ci'); 
            $table->string('extension'); 
            $table->date('fecha_nacimiento'); 
            $table->string('sexo'); 
            $table->integer('celular'); 
            $table->string('email'); 
            $table->string('domicilio'); 
            $table->string('carrera'); 
            $table->foreignId('id_universidad')->constrained('universidad'); 
            $table->foreignId('id_pasantia')->constrained('pasantia_trabajo_dirigido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante');
    }
};
