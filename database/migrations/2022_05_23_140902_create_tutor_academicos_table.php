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
        Schema::create('tutor_academico', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');  
            $table->string('apellidos');  
            $table->string('grado_academico');  
            $table->string('email');  
            $table->integer('celular');      
            $table->foreignId('id_user')->unique()->constrained('users');     
            $table->foreignId('id_universidad')->constrained('universidad');      
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
        Schema::dropIfExists('tutor_academico');
    }
};
