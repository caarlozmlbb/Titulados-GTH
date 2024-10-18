<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    public function vista_modalidad(){
        $modalidades = Modalidad::all();
        return view('gestion.tutores.tutores',['modalidades' => $modalidades]);
    }
}
