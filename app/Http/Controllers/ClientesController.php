<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $clientes = Cliente::all(['id', 'nombre', 'direccion', 'telefono', 'estado', 'zona_id']);
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required',
        ]);

        try {
            $tipo = Cliente::create([
                'descripcion' => $request->descripcion,
                'estado' => $request->estado,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Registrado correctamente',
                'data' => $tipo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al guardar',
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required',
        ]);
    
        $zonas = Cliente::findOrFail($id);
        $zonas->update($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente.',
            'data' => $zonas,
        ]);
    }

    public function destroy(string $id)
    {
        $zonas = Cliente::findOrFail($id);
        $zonas->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }
}
