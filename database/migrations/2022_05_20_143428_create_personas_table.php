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
            $table->string('primer_apellido')->nullable(false);
            $table->string('segundo_apellido')->nullable();
            $table->string('ci');
            $table->string('extension');
            $table->enum('genero',['M','F']);
            $table->date('fecha_nacimiento'); 
            $table->string('domicilio');
            $table->string('ciudad');
            $table->string('correo')->nullable();
            $table->integer('celular');
            $table->integer('numero_referencia');
            $table->string('nombre_referencia');
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
