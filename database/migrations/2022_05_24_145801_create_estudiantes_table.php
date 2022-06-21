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
            $table->integer('id'); 
            $table->string('email'); 
            $table->string('domicilio'); 
            $table->string('carrera');
            $table->primary('id');
            $table->foreign('id')->references('id')->on('persona'); 
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
