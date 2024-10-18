<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{

    public function listar_calificaciones()
    {
        $calificaciones = Calificacion::all();
        return view('gestion.calificaciones.calificacion_detalle',['calificaciones' => $calificaciones]);
    }

    public function buscarEstudiante(Request $request){
        $ci = $request->input('ci');
        $estudiante = Estudiante::where('ci',$ci)->first();

        if($estudiante){
            return response()->json([
                'success' => true,
                'nombre' => $estudiante->nombre,
                'paterno' => $estudiante->paterno,
                'materno' => $estudiante->materno
            ]);
        }else{
            return response()->json(['success' => false, 'message'=>'Estudiante no encontrado']);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Calificacion $calificacion)
    {
        //
    }

    public function edit(Calificacion $calificacion)
    {
        //
    }

    public function update(Request $request, Calificacion $calificacion)
    {
        //
    }

    public function destroy(Calificacion $calificacion)
    {
        //
    }
}
