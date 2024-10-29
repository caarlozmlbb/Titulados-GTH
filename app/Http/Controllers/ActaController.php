<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\ActaTribunal;
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
            'num_resolucion' => 'nullable|string|max:255',
            'lugar' => 'nullable|string|max:255',
            'fecha_acta' => 'nullable|date',
            'hora_comienzo' => 'nullable',
            'hora_fin' => 'nullable',
        ]);

        // Actualiza solo los campos que se han enviado
        $acta = Acta::findOrFail($id);
        $acta->update($request->only(['num_resolucion', 'lugar', 'fecha_acta', 'hora_comienzo', 'hora_fin']));

        return redirect()->back()->with('success', 'Información actualizada correctamente.');
    }


    public function agregarTribunal(Request $request)
    {

        // Validación de datos de docente y tribunales
        $request->validate([
            // 'docente_id' => 'required|exists:docentes,id_docente',
            'nombre' => 'required|string|max:50',
            'paterno' => 'required|string|max:50',
            'materno' => 'required|string|max:50',
            'carnet' => 'required',
            'id_acta' => 'required',
        ]);

        // dd($request->all());

        $tribunal = new TribunalesActa();
        // $tribunal->acta_id = $acta->id;
        $tribunal->nombre = $request->nombre;
        $tribunal->paterno = $request->paterno;
        $tribunal->materno = $request->materno;
        $tribunal->carnet = $request->carnet;
        $tribunal->acta_id = $request->id_acta;
        $tribunal->save();
        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Acta de título y tribunales agregados correctamente.');
    }

    public function agregarTribunalActa(Request $request)
    {
        // Validación de los datos enviados
        $request->validate([
            'id_tribunal_acta' => 'required|exists:tribunales_acta,id_tribunal_acta',
            'rol' => 'required|string|max:50',
            'id_acta' => 'required|exists:actas,id_acta',
        ]);

        $actaTribunal = new ActaTribunal();
        $actaTribunal->id_tribunal_acta = $request->id_tribunal_acta;
        $actaTribunal->rol = $request->rol;
        $actaTribunal->id_acta = $request->id_acta;
        $actaTribunal->save();

        return redirect()->back()->with('success', 'Tribunal y rol agregados al acta correctamente.');
    }

    public function descargarPDF($id)
    {

        $acta = DB::table('actas as ac')
    ->join('estudiantes as es', 'ac.estudiante_id', '=', 'es.id_estudiante')
    ->leftJoin('tutores_acta as tu', 'ac.tutor_acta_id', '=', 'tu.id_tutor_acta')
    ->join('docentes as doc', 'tu.docente_id', '=', 'doc.id_docente')
    ->join('modalidades_titulacion as mo', 'ac.modalidad_id', '=', 'mo.id_modalidad')
    ->select('mo.nombre_modalidad', 
             'doc.nombre as nombre_docente', 
             'doc.paterno as paterno_docente', 
             'doc.materno as materno_docente', 
             'doc.ci', 
             'es.*', 
             'ac.*')
    ->where('es.id_estudiante', $id)
    ->first();
    
        // Obtener los datos necesarios para la vista
        //$acta = Acta::findOrFail($id); // o cualquier otro método para obtener los datos

        // Obtener los tribunales relacionados
        // $tribunales = TribunalesActa::where('acta_id', $id)->get();

        // Cargar la vista y pasarle los datos
        $pdf = PDF::loadView('gestion.pdf.actatrabajo', ['acta' => $acta]);

        // Establecer el tamaño de página a carta
        $pdf->setPaper('letter', 'portrait'); // 'letter' es el tamaño carta

        return $pdf->stream('acta_trabajo.pdf');
    }
}
