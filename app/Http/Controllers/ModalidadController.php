<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    public function index(){
        $modalidades = Modalidad::all();
        return view('gestion.modalidades.modalidades',['modalidades' => $modalidades]);
    }

    public function store(Request $request)
    {
        $request->validate(['nombre_modalidad' => 'required']);
        Modalidad::create($request->all());
        return redirect()->route('modalidades.index');
    }

    // public function edit($id)
    // {
    //     $modalidad = Modalidad::findOrFail($id);
    //     return response()->json($modalidad);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate(['nombre_modalidad' => 'required']);
    //     $modalidad = Modalidad::findOrFail($id);
    //     $modalidad->update($request->all());
    //     return redirect()->route('gestion.modalidades.modalidades');
    // }

    // public function destroy($id)
    // {
    //     $modalidad = Modalidad::findOrFail($id);
    //     $modalidad->delete();
    //     return redirect()->route('gestion.modalidades.modalidade');
    // }

}
