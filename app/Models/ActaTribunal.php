<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaTribunal extends Model
{
    use HasFactory;

    protected $table = 'acta_tribunal';

    protected $fillable = ['id_acta','id_tribunal_act','rol'];
}
