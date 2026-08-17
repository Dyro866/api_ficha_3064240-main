<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index()
    {
        $clientes = $this->clienteService->obtenerTodos();
        return response()->json($clientes, 200);
    }

    public function show($id)
    {
        $cliente = $this->clienteService->obtenerPorId($id);
        return response()->json($cliente, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'documento' => 'required|string|max:50',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'tipo' => 'nullable|string|max:50'
        ]);

        $cliente = $this->clienteService->crear($validatedData);
        return response()->json($cliente, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'documento' => 'sometimes|required|string|max:50',
            'nombres' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'tipo' => 'nullable|string|max:50'
        ]);

        $cliente = $this->clienteService->actualizar($id, $validatedData);
        return response()->json($cliente, 200);
    }

    public function destroy($id)
    {
        $this->clienteService->eliminar($id);
        return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
    }
}