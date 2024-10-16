<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tribunales_acta', function (Blueprint $table) {
            $table->id('id_tribunal_acta');
            $table->unsignedBigInteger('acta_id');
            $table->unsignedBigInteger('docente_id');
            $table->string('rol', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tribunales_acta');
    }
};
