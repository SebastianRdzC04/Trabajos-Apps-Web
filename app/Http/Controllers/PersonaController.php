<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class PersonaController extends Controller
{
    //
    public function create()
    {
        $users = User::all();
        $personas = Persona::all();
        return view('pages.agregarPersona', compact('users' , 'personas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'user_id' => 'nullable|unique:personas|exists:users,id'
        ]);
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->user_id = $request->user_id ?: null;
        $persona->save();
        return redirect()->back()->with('status', 'Persona creada correctamente');
    }
    public function getPersona($id)
    {
        $persona = Persona::find($id);
        return response()->json($persona);
    }


    public function update(Request $request)
    {
        $request->validate([
            'nombre-edit' => 'required',
            'apellido-edit' => 'required',
            'fecha_nacimiento-edit' => 'required',
        ]);
        $persona = Persona::find($request->input('personas-edit'));
        $persona->nombre = $request->input('nombre-edit');
        $persona->apellido = $request->input('apellido-edit');
        $persona->fecha_nacimiento = $request->input('fecha_nacimiento-edit');
        $persona->save();
        return redirect()->back()->with('status-update', 'Persona actualizada correctamente');
    }






    public function delete(Request $request)
    {
        $id = $request->input('personas-delete');
        $persona = Persona::find($id);
        $persona->delete();
        return redirect()->back()->with('status-delete', 'Persona eliminada correctamente');
    }
}
