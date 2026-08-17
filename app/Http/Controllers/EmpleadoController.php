<?php

namespace App\Http\Controllers;

use App\Services\EmpleadoService;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService)
    {
        $this->empleadoService = $empleadoService;
    }

    public function index()
    {
        $empleados = $this->empleadoService->obtenerTodos();
        return response()->json($empleados, 200);
    }

    public function show($id)
    {
        $empleado = $this->empleadoService->obtenerPorId($id);
        return response()->json($empleado, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'documento' => 'required|string|max:50',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cargo' => 'required|string|max:100',
            'fecha_ingreso' => 'required|date',
            'salario' => 'required|numeric|min:0',
            'estado' => 'nullable|string|max:50'
        ]);

        $empleado = $this->empleadoService->crear($validatedData);
        return response()->json($empleado, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'usuario_id' => 'sometimes|required|exists:usuarios,id',
            'documento' => 'sometimes|required|string|max:50',
            'nombres' => 'sometimes|required|string|max:255',
            'apellidos' => 'sometimes|required|string|max:255',
            'cargo' => 'sometimes|required|string|max:100',
            'fecha_ingreso' => 'sometimes|required|date',
            'salario' => 'sometimes|required|numeric|min:0',
            'estado' => 'nullable|string|max:50'
        ]);

        $empleado = $this->empleadoService->actualizar($id, $validatedData);
        return response()->json($empleado, 200);
    }

    public function destroy($id)
    {
        $this->empleadoService->eliminar($id);
        return response()->json(['message' => 'Empleado eliminado correctamente'], 200);
    }
}