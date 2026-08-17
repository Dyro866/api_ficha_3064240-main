<?php

namespace App\Services;

use App\Interfaces\UsuarioRepositoryInterface;

class UsuarioService
{
    protected $usuarioRepository;

    public function __construct(UsuarioRepositoryInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function obtenerTodos()
    {
        return $this->usuarioRepository->getAll();
    }

    public function obtenerPorId($id)
    {
        return $this->usuarioRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function actualizar($id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->usuarioRepository->delete($id);
    }
}