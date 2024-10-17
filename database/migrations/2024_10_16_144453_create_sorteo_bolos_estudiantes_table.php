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
            $table->unsignedBigInteger('sorteo_id')->nullable();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            $table->string('aula', 100)->nullable();
            $table->string('asignatura', 255)->nullable();
            $table->integer('orden')->nullable();

            $table->foreign('sorteo_id')->references('id_sorteo')->on('sorteo_bolos');
            $table->foreign('estudiante_id')->references('id_estudiante')->on('estudiantes');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteo_bolos_estudiantes');
    }
};
