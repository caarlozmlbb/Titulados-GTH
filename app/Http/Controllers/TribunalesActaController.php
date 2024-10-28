<?php

namespace App\Http\Controllers;

use App\Models\TribunalesActa;
use Illuminate\Http\Request;

class TribunalesActaController extends Controller
{
    public function index()
    {
        $tribunales = TribunalesActa::all();
        return view('gestion.tribunales.tribunales', compact('tribunales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'paterno' => 'required|string|max:50',
            'materno' => 'required|string|max:50',
            'carnet' => 'required|string|max:20',
            'cargo' => 'nullable|string|max:50',
            'rol' => 'nullable|string|max:50',
        ]);

        TribunalesActa::create($request->all());
        return redirect()->route('tribunales.index')->with('success', 'Tribunal creado con éxito.');
    }

    public function edit(TribunalesActa $tribunal)
    {
        return view('gestion.tribunales.edit', compact('tribunal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'carnet' => 'required|string|max:20',
            'cargo' => 'nullable|string|max:50',
            'rol' => 'nullable|string|max:50',
        ]);

        $tribunal = TribunalesActa::findOrFail($id);
        $tribunal->update($request->all());

        return redirect()->route('tribunales.index')->with('success', 'Tribunal actualizado con éxito.');
    }

    public function destroy($id)
    {
        $tribunal = TribunalesActa::findOrFail($id);
        $tribunal->delete();

        return redirect()->route('tribunales.index')->with('success', 'Tribunal eliminado con éxito.');
    }
}
