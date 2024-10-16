<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('calificaciones_detalle', function (Blueprint $table) {
            $table->id('id_calificacion');
            $table->unsignedBigInteger('acta_id');
            $table->string('tipo_calificacion', 50);
            $table->date('fecha');
            $table->integer('calificacion');
            $table->string('calificacion_literal', 50);
            $table->timestamps();

            $table->foreign('acta_id')->references('id_acta')->on('actas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones_detalle');
    }
};
