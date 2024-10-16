<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sorteo_bolos', function (Blueprint $table) {
            $table->id('id_sorteo');
            $table->unsignedBigInteger('acta_id');
            $table->string('area', 255);
            $table->time('hora');
            $table->date('fecha');
            $table->string('num_resolucion', 50);
            $table->string('lugar', 100);
            $table->timestamps();

            $table->foreign('acta_id')->references('id_acta')->on('actas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteo_bolos');
    }
};
