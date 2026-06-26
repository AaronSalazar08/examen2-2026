<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'codigo'        => 'required|integer',
            'unidad_medida' => 'required|string',
            'descripcion'   => 'required|string',
            'ubicacion'     => 'required|string',
            'categoria_id'  => 'required|integer|exists:categorias,id',
        ]);

        $material = Material::create($validated);

        return response()->json($material->load('categoria'), 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $material = Material::find($id);

        if (!$material) {
            return response()->json(['message' => 'Material no encontrado.'], 404);
        }

        $validated = $request->validate([
            'codigo'        => 'sometimes|integer',
            'unidad_medida' => 'sometimes|string',
            'descripcion'   => 'sometimes|string',
            'ubicacion'     => 'sometimes|string',
            'categoria_id'  => 'sometimes|integer|exists:categorias,id',
        ]);

        $material->update($validated);

        return response()->json($material->load('categoria'), 200);
    }
}