<?php

namespace App\Http\Controllers;
use App\Models\TribunalesActa;
use Illuminate\Http\Request;

class TribunalesActaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tribunales = TribunalesActa::all();
        return view('tribunales.index', compact('tribunales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tribunales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'cargo' => 'required|string|max:50',
            'ci' => 'required|string|max:50',
            'rol' => 'nullable|string|max:50',
        ]);

        TribunalesActa::create($request->all());
        return redirect()->route('tribunales.index')->with('success', 'Tribunal creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TribunalesActa $tribunal)
    {
        return view('tribunales.edit', compact('tribunal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TribunalesActa $tribunal)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'cargo' => 'required|string|max:50',
            'ci' => 'required|string|max:50',
            'rol' => 'nullable|string|max:50',
        ]);

        $tribunal->update($request->all());
        return redirect()->route('tribunales.index')->with('success', 'Tribunal actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TribunalesActa $tribunal)
    {
        $tribunal->delete();
        return redirect()->route('tribunales.index')->with('success', 'Tribunal eliminado con éxito.');
    }
}
