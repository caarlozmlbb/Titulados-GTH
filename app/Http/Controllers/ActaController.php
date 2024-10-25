<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Modalidad;
use App\Models\Calificacion;
use App\Models\TribunalesActa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf; // Asegúrate de importar correctamente


class ActaController extends Controller
{

    public function listar_actas()
    {

        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*') // Selecciona las columnas que necesitas
            ->get();

        return view('gestion.acta.acta', ['actas' => $actas]);
    }

    public function listar_trabajo_dirigido()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 1)
            ->get();
        $id_modalidad = Modalidad::where('id_modalidad', 1)->first();

        return view('gestion.acta.trabajo', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }


    public function listar_examen_grado()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 2)
            ->get();

        $id_modalidad = Modalidad::where('id_modalidad', 2)->first();

        return view('gestion.acta.examenGrado', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }

    public function listar_excelencia_academica()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 3)
            ->get();

        $id_modalidad = Modalidad::where('id_modalidad', 3)->first();

        return view('gestion.acta.excelencia', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }

    public function listar_proyecto()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 4)
            ->get();

        $id_modalidad = Modalidad::where('id_modalidad', 4)->first();

        return view('gestion.acta.proyecto', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }

    public function listar_tesis()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 5)
            ->get();

        $id_modalidad = Modalidad::where('id_modalidad', 5)->first();

        return view('gestion.acta.tesis', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }

    public function listar_tecnico_superior()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 6)
            ->get();

        $id_modalidad = Modalidad::where('id_modalidad', 6)->first();

        return view('gestion.acta.tecnicoSuperior', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }


    public function listar_tecnico_medio()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id', 7)
            ->get();

        $id_modalidad = Modalidad::where('id_modalidad', 7)->first();

        return view('gestion.acta.tecnicoMedio', [
            'actas' => $actas,
            'id_modalidad' => $id_modalidad,
        ]);
    }

    public function agregarTitulo(Request $request)
    {


        $request->validate([
            'titulo' => 'required|string|max:255',
            'estudiante_id' => 'required|exists:estudiantes,id_estudiante',
            'id_modalidad' => 'required',
        ]);


        try {
            $acta = Acta::create([
                'titulo' => $request->titulo,
                'estudiante_id' => $request->estudiante_id,
                'modalidad_id' => $request->id_modalidad,
                'tribunal_acta_id' => null,
                'tutor_acta_id' => null,
                'num_resolucion' => null,
                'lugar' => null,
                'fecha_acta' => null,
                'hora_comienzo' => null,
                'hora_fin' => null,
                'calificacion_total' => null,
                'calificacion_literal' => null,
                'valoracion' => null,
            ]);


            return redirect()->back()
                ->withInput() // Esto es importante para que los datos persistan en el formulario
                ->with('success', 'Acta creada correctamente con el título: ' . $request->titulo);
        } catch (\Exception $e) {
            Log::error('Error al crear el acta: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Hubo un problema al crear el acta. Por favor, intenta de nuevo.');
        }
    }

    public function actualizarCalificacion(Request $request, $actaId)
    {
        $request->validate([
            'calificacion' => 'required|integer|min:0|max:100',
        ]);

        $acta = Acta::find($actaId);
        if ($acta) {
            // Aquí deberías encontrar el detalle de la calificación y actualizarla
            $calificacionDetalle = Calificacion::where('acta_id', $actaId)->first();
            if ($calificacionDetalle) {
                $calificacionDetalle->calificacion = $request->calificacion;
                $calificacionDetalle->save();

                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false], 400);
    }

    public function actualizarActaInformacion(Request $request, $id)
    {
        // Validación
        $request->validate([
            'num_resolucion' => 'required|string|max:255',
            'lugar' => 'required|string|max:255',
            'fecha_acta' => 'required|date',
            'hora_comienzo' => 'required',
            'hora_fin' => 'required',
        ]);

        // Actualiza la información del acta
        $acta = Acta::findOrFail($id);
        $acta->update($request->all());

        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }

    public function store(Request $request)
    {
        // Validación de datos de docente y tribunales
        $request->validate([
            'docente_id' => 'required|exists:docentes,id_docente',
            'nombre_tribunal.*' => 'required|string|max:50',
            'paterno_tribunal.*' => 'required|string|max:50',
            'materno_tribunal.*' => 'required|string|max:50',
            'carnet_tribunal.*' => 'required|string|max:20',
        ]);

        // Crear un nuevo acta de título
        $acta = new Acta();
        $acta->docente_id = $request->docente_id;
        $acta->fecha_acta = now(); // Ejemplo de asignación de fecha actual, ajusta según sea necesario
        $acta->save();

        // Guardar cada tribunal relacionado con este acta
        foreach ($request->nombre_tribunal as $index => $nombre) {
            $tribunal = new TribunalesActa();
            $tribunal->acta_id = $acta->id;
            $tribunal->nombre = $nombre;
            $tribunal->paterno = $request->paterno_tribunal[$index];
            $tribunal->materno = $request->materno_tribunal[$index];
            $tribunal->carnet = $request->carnet_tribunal[$index];
            $tribunal->save();
        }

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Acta de título y tribunales agregados correctamente.');
    }

    public function descargarPDF($id)
    {
        $pdf = PDF::loadHTML('<h1>Prueba de PDF</h1><p>Este es un contenido de prueba.</p>');
        return $pdf->stream('prueba.pdf');
    }
}
