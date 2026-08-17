rolRepository = $rolRepository;
    }

    public function obtenerTodos()
    {
        return $this->rolRepository->getAll();
    }

    public function obtenerPorId($id)
    {
        return $this->rolRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->rolRepository->create($data);
    }

    public function actualizar($id, array $data)
    {
        return $this->rolRepository->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->rolRepository->delete($id);
    }
}