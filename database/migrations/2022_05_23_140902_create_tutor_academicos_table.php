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
            $table->integer('id'); 
            $table->string('nivel_academico');  
            $table->primary('id');      
            $table->foreign('id')->references('id')->on('persona');     
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
