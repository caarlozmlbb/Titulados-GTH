<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    protected $table = "actas";

    protected $primaryKey = 'id_acta'; // Clave primaria

    public $timestamps = true; // Habilitar timestamps

    protected $fillable = [
        'modalidad_id',
        'tutor_acta_id',
        'tribunal_acta_id',
        'num_resolucion',
        'lugar',
        'fecha_acta',
        'hora_comienzo',
        'hora_fin',
        'calificacion_total',
        'calificacion_literal',
        'valoracion',
        'titulo',
        'estudiante_id',
    ];
}
