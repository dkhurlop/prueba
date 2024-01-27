<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propietario;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
    }

    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:propietarios,email',
            'telefono' => 'required|string',
        ]);

        // Crear un nuevo propietario
        Propietario::create($request->all());

        return redirect()->route('propietarios.index')->with('success', 'Propietario añadido exitosamente.');
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
    public function edit(string $id)
    {
        $propietario = Propietario::findOrFail($id);
        return view('propietarios.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:propietarios,email,' . $id,
            'telefono' => 'required|string',
        ]);

        // Actualizar el propietario existente
        $propietario = Propietario::findOrFail($id);
        $propietario->update($request->all());

        return redirect()->route('propietarios.index')->with('success', 'Propietario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Propietario::findOrFail($id)->delete();

        return redirect()->route('propietarios.index')->with('success', 'Propietario eliminado exitosamente.');
    }
}
