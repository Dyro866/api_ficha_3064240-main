rolService = $rolService;
    }

    public function index()
    {
        $roles = $this->rolService->obtenerTodos();
        return response()->json($roles, 200);
    }

    public function show($id)
    {
        $rol = $this->rolService->obtenerPorId($id);
        return response()->json($rol, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'boolean'
        ]);

        $rol = $this->rolService->crear($validatedData);
        return response()->json($rol, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'boolean'
        ]);

        $rol = $this->rolService->actualizar($id, $validatedData);
        return response()->json($rol, 200);
    }

    public function destroy($id)
    {
        $this->rolService->eliminar($id);
        return response()->json(['message' => 'Rol eliminado correctamente'], 200);
    }
}