<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->obtenerTodos();
        return response()->json($usuarios, 200);
    }

    public function show($id)
    {
        $usuario = $this->usuarioService->obtenerPorId($id);
        return response()->json($usuario, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rol_id' => 'required|exists:roles,id',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'boolean'
        ]);

        $usuario = $this->usuarioService->crear($validatedData);
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rol_id' => 'sometimes|required|exists:roles,id',
            'nombre' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:usuarios,email,' . $id,
            'password' => 'nullable|string|min:6',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'boolean'
        ]);

        $usuario = $this->usuarioService->actualizar($id, array_filter($validatedData));
        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        $this->usuarioService->eliminar($id);
        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
}