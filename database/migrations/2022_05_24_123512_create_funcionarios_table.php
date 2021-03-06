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
        Schema::create('servidor_publico', function (Blueprint $table) {
            $table->integer('id');
            $table->string('formacion_academica');
            $table->string('nivel_academico');
            $table->primary('id');
            $table->foreign('id')->references('id')->on('persona');
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
        Schema::dropIfExists('servidor_publico');
    }
};
