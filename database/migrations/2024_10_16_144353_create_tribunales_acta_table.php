<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTribunalesActaTable extends Migration
{
    public function up()
    {
        Schema::table('tribunales_acta', function (Blueprint $table) {
            // Quitar la relación con la tabla docentes
            $table->dropForeign(['docente_id']);
            $table->dropColumn('docente_id');

            // Agregar nuevos campos
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('cargo')->nullable();
            $table->string('ci')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tribunales_acta', function (Blueprint $table) {
            // Volver a agregar la columna docente_id
            $table->unsignedBigInteger('docente_id')->nullable();
            $table->foreign('docente_id')->references('id_docente')->on('docentes')->onDelete('set null');

            // Quitar los campos agregados
            $table->dropColumn(['nombre', 'apellido_paterno', 'apellido_materno', 'cargo', 'ci']);
        });
    }
}
