<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Estudiante;
use App\Models\Tutor;
use App\Models\Docente;
use App\Models\Acta;
use App\Models\Modalidad;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{

    public function listar_calificaciones()
    {
        $calificaciones = Calificacion::all();
        return view('gestion.calificaciones.calificacion_detalle',['calificaciones' => $calificaciones]);
    }

    public function buscarEstudiante(Request $request)
    {
        $carnet = $request->input('ci');
        $estudiante = Estudiante::where('ci', $carnet)->first();

        if ($estudiante) {
            return response()->json([
                'success' => true,
                'nombre' => $estudiante->nombre,
                'paterno' => $estudiante->paterno,
                'materno' => $estudiante->materno,
                'id_estudiante' => $estudiante->id_estudiante,
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function crear_acta(Request $request)
    {
        $id_estudiante = $request->input('id_estudiante');
        $id_modalidad = $request->input('id_modalidad');

        $modalidad = Modalidad::where('id_modalidad', $id_modalidad)->first();

        $estudiante = Estudiante::where('id_estudiante', $id_estudiante)->first();
        $acta = Acta::where('estudiante_id', $id_estudiante)->first(); // Cambiar 'actas' a 'acta' y usar ->first() para obtener un único registro
        $docentes = Docente::all();

        // Verificar si el estudiante ya tiene un acta
        if ($acta) {
            // Si ya tiene un acta, mostrar la vista con el título existente y no permitir crear uno nuevo
            return view('gestion.acta.acta', compact(
                'id_estudiante',
                'estudiante',
                'docentes',
                'id_modalidad',
                'modalidad',
                'acta' // Pasar el acta existente
            ));
        } else {
            // Si no tiene un acta, permitir crear uno nuevo
            return view('gestion.acta.acta', compact(
                'id_estudiante',
                'estudiante',
                'docentes',
                'id_modalidad',
                'modalidad',
            ));
        }
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
