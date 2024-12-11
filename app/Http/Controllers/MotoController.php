<?php

// app/Http/Controllers/MotoController.php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    // Listar todas las motos (paginadas)
    public function index()
    {
        return response()->json(Moto::paginate(10));
    }

    // Obtener detalles de una moto
    public function show(Moto $moto)
    {
        return response()->json($moto);
    }

    // Crear una nueva moto
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'anio' => 'required|integer',
            'placa' => 'required|string|max:10|unique:motos',
        ]);

        $moto = Moto::create($request->all());

        return response()->json($moto, 201);
    }

    // Actualizar una moto
    public function update(Request $request, Moto $moto)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'anio' => 'required|integer',
            'placa' => 'required|string|max:10|unique:motos,placa,' . $moto->id,
        ]);

        $moto->update($request->all());

        return response()->json($moto);
    }

    // Eliminar una moto
    public function destroy(Moto $moto)
    {
        $moto->delete();

        return response()->json(['message' => 'Moto eliminada correctamente']);
    }
}