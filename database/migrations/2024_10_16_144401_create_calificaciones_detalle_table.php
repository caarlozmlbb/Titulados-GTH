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
            $table->unsignedBigInteger('acta_id')->nullable(); // Nueva columna para asociar con actas
            $table->string('tipo_calificacion', 50)->nullable();
            $table->date('fecha')->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('calificacion_literal', 50)->nullable();
            $table->string('observaciones', 100)->nullable();
            $table->enum('valoraciones', ['INSUFICIENTE', 'BUENA', 'SOBRESALIENTE', 'EXCELENTE'])->nullable();
            $table->foreign('acta_id')->references('id_acta')->on('actas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificaciones_detalle');
    }
};
