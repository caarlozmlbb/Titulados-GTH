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
            $table->unsignedBigInteger('acta_id')->nullable();
            $table->string('area', 255)->nullable();
            $table->time('hora')->nullable();
            $table->date('fecha')->nullable();
            $table->string('num_resolucion', 50)->nullable();
            $table->string('lugar', 100)->nullable();

            $table->foreign('acta_id')->references('id_acta')->on('actas');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sorteo_bolos');
    }
};
