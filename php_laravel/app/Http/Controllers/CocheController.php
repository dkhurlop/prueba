<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coche;
use App\Models\Propietario;

class CocheController extends Controller
{
    
    public function index()
    {
        $coches = Coche::all();
        $propietarios = Propietario::all();
        return view('coches.index', compact('coches', 'propietarios'));
    }

    
    public function create()
    {
        $coches = [];
        $propietarios = Propietario::all();
        return view('coches.create', compact('coches','propietarios'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer',
            'color' => 'required|string',
            'id_propietario' => 'required|exists:propietarios,id',
        ]);

        Coche::create($request->all());

        $cochesDelPropietario = Coche::where('id_propietario', $request->id_propietario)->get();

        return redirect()->route('coches.index')->with('success', 'Coche añadido exitosamente.');

    }

    
    public function show(string $id)
    {
    
    }

    
    public function edit(string $id)
    {
        $coche = Coche::findOrFail($id);
        $propietarios = Propietario::all();
        return view('coches.edit', compact('coche', 'propietarios'));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'anio' => 'required|integer',
            'id_propietario' => 'required|exists:propietarios,id',
        ]);

        
        $coche = Coche::findOrFail($id);
        $coche->update($request->all());

        return redirect()->route('coches.index')->with('success', 'Coche actualizado exitosamente.');
    }

    
    public function destroy(string $id)
    {
        Coche::findOrFail($id)->delete();

        return redirect()->route('coches.index')->with('success', 'Coche eliminado exitosamente.');

    }

    public function cochesPorPropietario($propietarioId) {
        $coches = Coche::where('id_propietario', $propietarioId)->get();
        
        return response()->json(['coches' => $coches]);
        
    }
}
