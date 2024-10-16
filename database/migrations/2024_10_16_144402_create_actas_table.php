<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id('id_acta');
            $table->unsignedBigInteger('modalidad_id');
            $table->unsignedBigInteger('tutor_acta_id');
            $table->unsignedBigInteger('tribunal_acta_id');
            $table->string('num_resolucion', 50);
            $table->string('lugar', 255);
            $table->date('fecha_acta');
            $table->time('hora_comienzo');
            $table->time('hora_fin');
            $table->integer('calificacion_total');
            $table->string('calificacion_literal', 50);
            $table->string('valoracion', 50);
            $table->string('titulo', 255);
            $table->unsignedBigInteger('estudiante_id');
            $table->timestamps();

            $table->foreign('modalidad_id')->references('id_modalidad')->on('modalidades_titulacion');
            $table->foreign('tribunal_acta_id')->references('id_tribunal_acta')->on('tribunales_acta');
        });
    }

    public function down()
    {
        Schema::dropIfExists('actas');
    }
};
