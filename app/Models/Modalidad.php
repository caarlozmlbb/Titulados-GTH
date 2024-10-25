<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_modalidad';

    protected $fillable = [
        'nombre_modalidad',
    ];

    protected $table = 'modalidades_titulacion';
}
