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
        Schema::create('postulante', function (Blueprint $table) {
            $table->integer('id');
            $table->enum('tipo_postulante',['Estudiante','Egresado']);
            $table->string('numero_anios_semestre');
            $table->string('carrera');
            $table->primary('id');
            $table->foreignId('id')->constrained('persona')->onDelete('cascade'); 
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
        Schema::dropIfExists('postulante');
    }
};
