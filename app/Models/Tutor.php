<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tutor_acta';
    protected $table = "tutores_acta";
    protected $fillable = ['docente_id'];
}
