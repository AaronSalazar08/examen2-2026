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
}
