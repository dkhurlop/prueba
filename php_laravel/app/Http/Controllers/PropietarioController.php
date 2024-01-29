<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propietario;


class PropietarioController extends Controller
{
    
    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
    }

    public function create()
    {
        return view('propietarios.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:propietarios,email',
            'telefono' => 'required|string|max:255',
        ]);

        Propietario::create(
            [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'telefono' => $request->telefono,
            ]
        );

        return redirect()->route('propietarios.index')->with('success', 'Propietario añadido exitosamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.edit', compact('propietario'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:propietarios,email',
            'telefono' => 'required|string|max:255',
        ]);
        
        $propietario = Propietario::findOrFail($id);
        $propietario->update(
            [
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'telefono' => $request->telefono,
            ]);

        return redirect()->route('propietarios.index')->with('success', 'Propietario actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        Propietario::findOrFail($id)->delete();

        return redirect()->route('propietarios.index')->with('success', 'Propietario eliminado exitosamente.');
    }
}
