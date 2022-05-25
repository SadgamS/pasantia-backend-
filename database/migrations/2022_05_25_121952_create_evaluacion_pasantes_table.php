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
        Schema::create('evaluacion_pasante', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_evaluacion');
            $table->string('periodo_evaluacion');
            $table->integer('cumplimiento_tareas_asignadas');
            $table->integer('calidad_ejecucion_tareas');
            $table->integer('logro_resultados');
            $table->integer('capacidad_trabajo_pasantia');
            $table->integer('evaluacion_pasantia');
            $table->integer('puntuacion_total');
            $table->foreignId('id_estudiante')->constrained('estudiante');
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
        Schema::dropIfExists('evaluacion_pasante');
    }
};
