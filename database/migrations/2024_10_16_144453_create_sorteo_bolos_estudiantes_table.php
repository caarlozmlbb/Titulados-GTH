<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sorteo_bolos_estudiantes', function (Blueprint $table) {
            $table->id('id_sorteo_estudiante');
            $table->unsignedBigInteger('sorteo_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->string('aula', 100);
            $table->string('asignatura', 255);
            $table->integer('orden');
            $table->timestamps();

            $table->foreign('sorteo_id')->references('id_sorteo')->on('sorteo_bolos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteo_bolos_estudiantes');
    }
};
