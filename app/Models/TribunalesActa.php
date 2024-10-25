<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TribunalesActa extends Model
{
    use HasFactory;
    protected $table = 'tribunales_acta';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'cargo',
        'ci',
        'rol',
    ];
}
