<?php

namespace App\Services;

use App\Interfaces\ClienteRepositoryInterface;

class ClienteService
{
    protected $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function obtenerTodos()
    {
        return $this->clienteRepository->getAll();
    }

    public function obtenerPorId($id)
    {
        return $this->clienteRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->clienteRepository->create($data);
    }

    public function actualizar($id, array $data)
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->clienteRepository->delete($id);
    }
}