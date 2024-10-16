<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tutores_acta', function (Blueprint $table) {
            $table->id('id_tutor_acta');
            $table->unsignedBigInteger('acta_id');
            $table->unsignedBigInteger('docente_id');
            $table->timestamps();

            $table->foreign('acta_id')->references('id_acta')->on('actas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutores_acta');
    }
};
