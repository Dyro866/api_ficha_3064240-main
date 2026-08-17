<?php

namespace App\Services;

use App\Interfaces\EmpleadoRepositoryInterface;

class EmpleadoService
{
    protected $empleadoRepository;

    public function __construct(EmpleadoRepositoryInterface $empleadoRepository)
    {
        $this->empleadoRepository = $empleadoRepository;
    }

    public function obtenerTodos()
    {
        return $this->empleadoRepository->getAll();
    }

    public function obtenerPorId($id)
    {
        return $this->empleadoRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->empleadoRepository->create($data);
    }

    public function actualizar($id, array $data)
    {
        return $this->empleadoRepository->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->empleadoRepository->delete($id);
    }
}