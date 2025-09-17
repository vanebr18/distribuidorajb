<?php

namespace App\Http\Controllers;

use App\Models\TipoGas;
use Illuminate\Http\Request;

class TipoGasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $tipos = TipoGas::all(['id', 'descripcion', 'uni_medida']);
        return response()->json($tipos);
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
            'uni_medida' => 'required|string|max:4',
        ]);

        try {
            $tipo = TipoGas::create([
                'descripcion' => $request->descripcion,
                'uni_medida' => $request->uni_medida,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipoGas = TipoGas::findOrFail($id);
        $tipoGas->delete();

        return response()->json(['success' => true, 'message' => 'Registro eliminado correctamente.']);
    }
}
