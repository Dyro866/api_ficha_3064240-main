<?php

namespace App\Http\Controllers;

use App\Services\ZonaService;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    protected $zonaService;

    public function __construct(ZonaService $zonaService)
    {
        $this->zonaService = $zonaService;
    }

    public function index()
    {
        $zonas = $this->zonaService->obtenerTodas();
        return response()->json($zonas, 200);
    }

    public function show($id)
    {
        $zona = $this->zonaService->obtenerPorId($id);
        return response()->json($zona, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'aforo_maximo' => 'required|integer|min:1',
            'precio_cover' => 'required|numeric|min:0',
            'estado' => 'boolean'
        ]);

        $zona = $this->zonaService->crear($validatedData);
        return response()->json($zona, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'aforo_maximo' => 'sometimes|required|integer|min:1',
            'precio_cover' => 'sometimes|required|numeric|min:0',
            'estado' => 'boolean'
        ]);

        $zona = $this->zonaService->actualizar($id, $validatedData);
        return response()->json($zona, 200);
    }

    public function destroy($id)
    {
        $this->zonaService->eliminar($id);
        return response()->json(['message' => 'Zona eliminada correctamente'], 200);
    }
}