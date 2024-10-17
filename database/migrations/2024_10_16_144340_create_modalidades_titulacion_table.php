<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('modalidades_titulacion', function (Blueprint $table) {
            $table->id('id_modalidad');
            $table->string('nombre_modalidad', 100);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('modalidades_titulacion');
    }
};
