<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\Estudiante;
use App\Models\Tutor;
use App\Models\Docente;
use App\Models\Acta;
use App\Models\ActaTribunal;
use App\Models\Modalidad;
use App\Models\TribunalesActa;
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

        $acta = Acta::where('estudiante_id', $id_estudiante)->first();

        if ($acta) {
            $docentes = Docente::all();
            $calificaciones = Calificacion::where('acta_id', $acta->id_acta)->get();
            $tribunales = TribunalesActa::all();
            $actaTribunales = ActaTribunal::where('id_acta', $acta->id_acta)->get();
            $tutores_id = Tutor::where('id_tutor_acta', $acta->tutor_acta_id)->first();

            // Verificar si hay un tutor y si tiene un docente asignado
            $nombresDocentes = null; // Inicializar como null
            if ($tutores_id && $tutores_id->docente_id) {
                $nombresDocentes = Docente::where('id_docente', $tutores_id->docente_id)->get();
            } else {
                $nombresDocentes = collect(); // Crear colección vacía si no hay docente
            }

            $nombresTribunales = [];
            $cargosTribunales = [];
            $rolesTribunales = [];

            foreach ($actaTribunales as $tribunal) {
                $nombreTribunal = TribunalesActa::select('nombre', 'paterno', 'materno', 'cargo')
                    ->where('id_tribunal_acta', $tribunal->id_tribunal_acta)->first();

                if ($nombreTribunal) {
                    $nombreTribunal->nombre_completo = $nombreTribunal->nombre . ' ' . $nombreTribunal->paterno . ' ' . $nombreTribunal->materno;
                    $nombresTribunales[] = $nombreTribunal;
                    $cargosTribunales[] = $nombreTribunal->cargo;
                    $rolesTribunales[] = $tribunal->rol;
                }
            }
        } else {
            $docentes = Docente::all();
            $estudiante = Estudiante::where('id_estudiante', $id_estudiante)->first();
            $calificaciones = collect(); // Crear una colección vacía si no hay acta
        }

        if ($acta) {
            return view('gestion.acta.acta', compact(
                'id_estudiante',
                'estudiante',
                'docentes',
                'id_modalidad',
                'modalidad',
                'acta',
                'calificaciones',
                'tribunales',
                'nombresTribunales',
                'nombresDocentes',
                'cargosTribunales',
                'rolesTribunales'
            ));
        } else {
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

        $idActa = $request->acta_id;

        $this->CalificacionTotal($idActa);

        return response()->json(['success' => true, 'message' => 'Calificación guardada exitosamente']);
    }

    public function CalificacionTotal($idActa)
    {
        $notas = Calificacion::where('acta_id', $idActa)->get();
        $suma = 0;

        foreach ($notas as $nota) {
            $suma = $suma + $nota->calificacion;
        }

        $sumaEnTexto = $this->numeroALetras($suma);

        if ($suma < 51) {
            $valoracion = 'INSUFICIENTE';
        } elseif ($suma >= 51 && $suma <= 79) {
            $valoracion = 'BUENA';
        } elseif ($suma >= 80 && $suma <= 89) {
            $valoracion = 'SOBRESALIENTE';
        } elseif ($suma >= 90 && $suma <= 100) {
            $valoracion = 'EXCELENTE';
        }

        $acta = Acta::find($idActa);
        if ($acta) {
            $acta->valoracion = $valoracion;
            $acta->calificacion_total = $suma;
            $acta->calificacion_literal = $sumaEnTexto; // Guardar el número en texto
            $acta->save();
        }
    }

    private function numeroALetras($numero)
    {
        $formatter = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
        return $formatter->format($numero);
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

        $idActa = Calificacion::select('acta_id')
            ->where('id_calificacion', $id);

        $this->CalificacionTotal($idActa);

        return redirect()->back()->with('success', 'Calificación actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $calificacion = Calificacion::findOrFail($id);
        $idActa = $calificacion->acta_id;
        $calificacion->delete();

        $this->CalificacionTotal($idActa);

        return redirect()->back()->with('success', 'Calificación eliminada correctamente.');
    }

    public function insertarTutor(Request $request)
    {
        // Validar que se haya recibido un id_docente
        $request->validate([
            'docente_id' => 'required|exists:docentes,id_docente',
            'id_acta' => 'required|exists:actas,id_acta'
        ]);

        // Insertar en la tabla tutores_acta
        $tutorActa = new Tutor(); // Asegúrate de tener un modelo llamado Tutor
        $tutorActa->docente_id = $request->docente_id;
        $tutorActa->save();

        // Obtener el ID recién creado
        $id_tutor_acta = $tutorActa->id_tutor_acta;

        // Actualizar la tabla actas con el id_acta recibido
        $acta = Acta::find($request->id_acta);
        if ($acta) {
            $acta->tutor_acta_id = $id_tutor_acta; // O el campo que necesites actualizar
            $acta->save();
        }

        // Devolver el ID recién creado en la respuesta JSON
        return response()->json([
            'success' => 'Tutor añadido correctamente',
            'id_tutor_acta' => $id_tutor_acta
        ]);
    }
}
