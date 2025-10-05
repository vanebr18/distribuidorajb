<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $zonas = Proveedor::all(['id', 'descripcion', 'estado']);
        return response()->json($zonas);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required',
        ]);

        try {
            $tipo = Proveedor::create([
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
    
        $zonas = Proveedor::findOrFail($id);
        $zonas->update($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente.',
            'data' => $zonas,
        ]);
    }

    public function destroy(string $id)
    {
        $zonas = Proveedor::findOrFail($id);
        $zonas->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }
}
