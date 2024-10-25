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
        return view('gestion.calificaciones.calificacion_detalle', ['calificaciones' => $calificaciones]);
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
        if ($acta) {
            $estudiante = Estudiante::where('id_estudiante', $id_estudiante)->first();
            $docentes = Docente::all();
            $calificaciones = Calificacion::where('acta_id', $acta->id_acta)->get(); // Añadido ->get()
        } else {
            $docentes = Docente::all();
            $estudiante = Estudiante::where('id_estudiante', $id_estudiante)->first();
            $calificaciones = collect(); // Crear una colección vacía si no hay acta
        }

        // Verificar si el estudiante ya tiene un acta
        if ($acta) {
            // Si ya tiene un acta, mostrar la vista con el título existente y no permitir crear uno nuevo
            return view('gestion.acta.acta', compact(
                'id_estudiante',
                'estudiante',
                'docentes',
                'id_modalidad',
                'modalidad',
                'acta', // Pasar el acta existente
                'calificaciones'
            ));
        } else {
            // Si no tiene un acta, permitir crear uno nuevo
            return view('gestion.acta.acta', compact(
                'id_estudiante',
                'estudiante',
                'docentes',
                'id_modalidad',
                'modalidad',
                'calificaciones',
            ));
        }
    }

    public function guardar_calificacion(Request $request)
    {
        $request->validate([
            'tipo_calificacion' => 'required|string',
            'fecha' => 'required|date',
            'calificacion' => 'required|integer',
            'calificacion_literal' => 'required|string',
            'valoraciones' => 'required|string',
            'observaciones' => 'required|string',
            'acta_id' => 'required|integer'
        ]);

        $calificacion = new Calificacion();

        $calificacion->tipo_calificacion = $request->tipo_calificacion;
        $calificacion->fecha = $request->fecha;
        $calificacion->calificacion = $request->calificacion;
        $calificacion->calificacion_literal = $request->calificacion_literal;
        $calificacion->valoraciones = $request->valoraciones;
        $calificacion->observaciones = $request->observaciones;
        $calificacion->acta_id = $request->acta_id;
        $calificacion->save();

        return response()->json(['success' => true, 'message' => 'Calificación guardada exitosamente']);
    }

    public function actualizar(Request $request, $id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->tipo_calificacion = $request->input('tipo_calificacion');
        $calificacion->fecha = $request->input('fecha');
        $calificacion->calificacion = $request->input('calificacion');
        $calificacion->calificacion_literal = $request->input('calificacion_literal');
        $calificacion->valoraciones = $request->input('valoraciones');
        $calificacion->observaciones = $request->input('observaciones');
        $calificacion->save();

        return redirect()->back()->with('success', 'Calificación actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $calificacion->delete();

        return redirect()->back()->with('success', 'Calificación eliminada correctamente.');
    }
}
