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
            $table->unsignedBigInteger('modalidad_id')->nullable();
            $table->unsignedBigInteger('tutor_acta_id')->nullable();
            $table->unsignedBigInteger('tribunal_acta_id')->nullable();
            $table->string('num_resolucion', 50)->nullable();
            $table->string('lugar', 255)->nullable();
            $table->date('fecha_acta')->nullable();
            $table->time('hora_comienzo')->nullable();
            $table->time('hora_fin')->nullable();
            $table->integer('calificacion_total')->nullable();
            $table->string('calificacion_literal', 50)->nullable();
            $table->string('valoracion', 50)->nullable();

            $table->string('titulo', 255)->nullable();
            $table->unsignedBigInteger('estudiante_id')->nullable();
            // $table->unsignedBigInteger('calificacion_id')->nullable();

            $table->foreign('modalidad_id')->references('id_modalidad')->on('modalidades_titulacion');
            $table->foreign('tutor_acta_id')->references('id_tutor_acta')->on('tutores_acta');
            $table->foreign('tribunal_acta_id')->references('id_tribunal_acta')->on('tribunales_acta');
            $table->foreign('estudiante_id')->references('id_estudiante')->on('estudiantes');
            // $table->foreign('calificacion_id')->references('id_calificacion')->on('calificaciones_detalle');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actas');
    }
};
