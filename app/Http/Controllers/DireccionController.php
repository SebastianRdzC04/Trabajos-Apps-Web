<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    //

    public function index()
    {
        $direcciones = Direccion::paginate(10);
        return response()->json($direcciones);
    }

    public function create()
    {
        $personas = Persona::all();
        $direcciones = Direccion::all();
        $pDirecciones = Direccion::paginate(10);
        return view('pages.addDirecciones', compact('personas' , 'direcciones', 'pDirecciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'calle' => 'required',
            'numero' => 'required',
            'colonia' => 'required',
            'persona_id' => 'required|exists:personas,id'
        ]);
        $direccion = new Direccion();
        $direccion->calle = $request->calle;
        $direccion->numero = $request->numero;
        $direccion->colonia = $request->colonia;
        $direccion->persona_id = $request->persona_id;
        $direccion->save();
        return redirect()->back()->with('status', 'Direccion creada correctamente');
    }

    public function update(Request $request)
    {
        $request->validate([
            'calle-edit' => 'required',
            'numero-edit' => 'required',
            'colonia-edit' => 'required',
        ]);
        $direccion = Direccion::find($request->input('direccion-edit'));
        $direccion->calle = $request->input('calle-edit');
        $direccion->numero = $request->input('numero-edit');
        $direccion->colonia = $request->input('colonia-edit');
        $direccion->save();
        return redirect()->back()->with('status-update', 'Direccion actualizada correctamente');
    }


    public function delete(Request $request)
    {
        $id = $request->input('direcciones-delete');
        $direccion = Direccion::find($id);
        $direccion->delete();
        return redirect()->back()->with('status-delete', 'Direccion eliminada correctamente');
    }


    public function getDireccion($id)
    {
        $direccion = Direccion::find($id);
        
        return response()->json($direccion);
    }
    public function changePersona(Request $request)
    {
        $request->validate([
            'owner' => 'required|exists:personas,id',
            'direccion-id' => 'required|exists:direcciones,id'
        ]);
        $direccion = Direccion::find($request->input('direccion-id'));
        $direccion->persona_id = $request->owner;
        $direccion->save();
        return redirect()->back()->with('status-change', 'Persona cambiada correctamente');
    }
}
