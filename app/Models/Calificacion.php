<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_calificacion';

    protected $table = 'calificaciones_detalle';

    protected $fillable = [
        'tipo_calificacion',
        'fecha',
        'calificacion',
        'calificacion_literal',
        'valoraciones',
        'observaciones',
        'acta_id'
    ];
}
