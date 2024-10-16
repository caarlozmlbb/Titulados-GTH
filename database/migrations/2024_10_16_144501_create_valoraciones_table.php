<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->id('id_valoracion');
            $table->unsignedBigInteger('acta_id');
            $table->integer('puntaje_min');
            $table->integer('puntaje_max');
            $table->string('valoracion', 50);
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('acta_id')->references('id_acta')->on('actas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('valoraciones');
    }
};
