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
        $clientes = Cliente::with('zona:id,descripcion')
            ->select('id', 'nombre', 'direccion', 'telefono', 'estado', 'zona_id')
            ->get();

        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:30',
            'direccion' => 'required|string|max:255',
            'estado' => 'required',
            'zona_id' => 'required',
        ]);

        try {
            $tipo = Cliente::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'estado' => $request->estado,
                'zona_id' => $request->zona_id,
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
            'telefono' => 'required|string|max:30',
            'direccion' => 'required|string|max:255',
            'estado' => 'required',
            'zona_id' => 'required',
        ]);

        $clientes = Cliente::findOrFail($id);
        $clientes->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente.',
            'data' => $clientes,
        ]);
    }

    public function destroy(string $id)
    {
        $clientes = Cliente::findOrFail($id);
        $clientes->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }

    public function getClientes(Request $request)
    {
        $q = $request->get('q');

        $clientes = Cliente::select('id', 'nombre')
            ->when($q, fn($query) => $query
            ->where('nombre', 'like', "%{$q}%"))
            ->where('estado', '=', true)
            ->get();

        return response()->json($clientes);
    }
}
