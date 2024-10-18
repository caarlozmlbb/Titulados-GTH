<?php

namespace App\Http\Controllers;

use App\Models\Titulado;
use Illuminate\Http\Request;

class TituladoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listar_titulados()
    {
        $estudiantes = Titulado::all();
        return view('gestion.titulado.titulados',[
            'estudiantes' => $estudiantes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Titulado $titulado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titulado $titulado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Titulado $titulado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titulado $titulado)
    {
        //
    }
}
