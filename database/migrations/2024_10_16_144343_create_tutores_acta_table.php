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
            $table->unsignedBigInteger('docente_id')->nullable();

            $table->foreign('docente_id')->references('id_docente')->on('docentes');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tutores_acta');
    }
};
