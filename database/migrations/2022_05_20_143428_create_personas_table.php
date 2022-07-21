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
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->string('ci')->nullable(false);;
            $table->string('expedicion')->nullable(false);;
            $table->enum('genero',['M','F'])->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('correo')->nullable();
            $table->integer('celular')->nullable();
            $table->integer('numero_referencia')->nullable();
            $table->string('nombre_referencia')->nullable();
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
        Schema::dropIfExists('persona');
    }
};
