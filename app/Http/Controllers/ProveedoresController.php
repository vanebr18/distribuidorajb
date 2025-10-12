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
        $proveedores = Proveedor::all(['id', 'nombre', 'direccion', 'telefono', 'estado', 'alias']);
        return response()->json($proveedores);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'estado' => 'required',
            'alias' => 'required|string|max:10',
        ]);

        try {
            $tipo = Proveedor::create([
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'estado' => $request->estado,
                'alias' => $request->alias,
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
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'estado' => 'required',
            'alias' => 'required|string|max:10',
        ]);

        $proveedores = Proveedor::findOrFail($id);
        $proveedores->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente.',
            'data' => $proveedores,
        ]);
    }

    public function destroy(string $id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }

    public function getProveedor(Request $request)
    {
        $q = $request->get('q');

        $proveedores = Proveedor::select('id', 'nombre')
            ->when($q, fn($query) => $query
            ->where('nombre', 'like', "%{$q}%"))
            ->where('estado', '=', true)
            ->get();

        return response()->json($proveedores);
    }
}
