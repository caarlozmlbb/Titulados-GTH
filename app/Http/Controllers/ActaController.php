<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->where('a.modalidad_id',1)
            ->get();

        return view('gestion.acta.trabajo', ['actas' => $actas]);
    }


    public function listar_examen_grado()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id',2)
            ->get();

        return view('gestion.acta.examenGrado', ['actas' => $actas]);
    }

    public function listar_excelencia_academica()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id',3)
            ->get();

        return view('gestion.acta.excelencia', ['actas' => $actas]);
    }

    public function listar_proyecto()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id',4)
            ->get();

        return view('gestion.acta.proyecto', ['actas' => $actas]);
    }

    public function listar_tesis()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id',5)
            ->get();

        return view('gestion.acta.tesis', ['actas' => $actas]);
    }

    public function listar_tecnico_superior()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id',6)
            ->get();

        return view('gestion.acta.tecnicoSuperior', ['actas' => $actas]);
    }


    public function listar_tecnico_medio()
    {
        $actas = DB::table('actas as a')
            ->join('estudiantes as es', 'es.id_estudiante', '=', 'a.estudiante_id')
            ->select('a.*', 'es.*')
            ->where('a.modalidad_id',6)
            ->get();

        return view('gestion.acta.tecnicoMedio', ['actas' => $actas]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Acta $acta)
    {

    }

    public function edit(Acta $acta)
    {

    }

    public function update(Request $request, Acta $acta)
    {

    }

    public function destroy(Acta $acta)
    {

    }
}
