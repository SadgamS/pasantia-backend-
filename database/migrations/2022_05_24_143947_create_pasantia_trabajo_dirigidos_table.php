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
        Schema::create('pasantia_trabajo_dirigido', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->integer('duracion_meses');
            $table->integer('cant_horas');
            $table->string('formacion_requerida');
            $table->integer('nro_personas');
            $table->boolean('aprobado');
            $table->foreignId('id_unidad')->constrained('unidad');
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
        Schema::dropIfExists('pasantia_trabajo_dirigido');
    }
};
