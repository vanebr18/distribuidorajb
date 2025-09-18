<?php

namespace App\Http\Controllers;

use App\Models\Zonas;
use Illuminate\Http\Request;

class ZonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $zonas = Zonas::all(['id', 'descripcion', 'estado']);
        return response()->json($zonas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required',
        ]);

        try {
            $tipo = Zonas::create([
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required',
        ]);
    
        $zonas = Zonas::findOrFail($id);
        $zonas->update($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Registro actualizado correctamente.',
            'data' => $zonas,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zonas = Zonas::findOrFail($id);
        $zonas->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }
}
