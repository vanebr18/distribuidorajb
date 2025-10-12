<?php

namespace App\Http\Controllers;

use App\Models\Tubos;
use Illuminate\Http\Request;

class TubosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $tubos = Tubos::join('proveedores as p', 'tubos.proveedor_id', '=', 'p.id')
            ->join('clientes as c', 'tubos.cliente_id', '=', 'c.id')
            ->join('tipo_gases as tg', 'tubos.tipogas_id', '=', 'tg.id')
            ->select('tubos.*', 'p.alias', 'c.nombre as cliente  ', 'tg.descripcion as tipo_gas', 'tg.uni_medida')
            ->get();

        return response()->json($tubos);
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nro_tubo' => 'required|string|max:255',
            'capacidad' => 'required|string|max:30',
            'estado' => 'required',
            'propio' => 'required',
            'tipogas_id'  => 'nullable',
            'cliente_id'  => 'nullable',
            'proveedor_id'  => 'nullable',
        ]);

        try {
            $tipo = Tubos::create([
                'nro_tubo' => $request->nro_tubo,
                'capacidad' => $request->capacidad,
                'estado' => $request->estado,
                'propio' => $request->propio,
                'proveedor_id' => $request->proveedor_id,
                'cliente_id' => $request->cliente_id,
                'tipogas_id'  => $request->tipogas_id,
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
            'nro_tubo' => 'required|string|max:255',
            'capacidad' => 'required|string|max:30',
            'estado' => 'required',
            'propio' => 'required',
            'proveedor_id' => 'nullable',
            'cliente_id' => 'nullable',
            'tipogas_id'  => 'nullable',
        ]);

        $tubos = Tubos::findOrFail($id);
        $tubos->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente.',
            'data' => $tubos,
        ]);
    }

    public function destroy(string $id)
    {
        $tubos = Tubos::findOrFail($id);
        $tubos->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }
}
