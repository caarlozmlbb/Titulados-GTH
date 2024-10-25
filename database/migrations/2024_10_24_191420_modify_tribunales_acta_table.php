<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tribunales_acta', function (Blueprint $table) {
            //
        });
    }
};
