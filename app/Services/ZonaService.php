<?php

namespace App\Services;

use App\Interfaces\ZonaRepositoryInterface;

class ZonaService
{
    protected $zonaRepository;

    public function __construct(ZonaRepositoryInterface $zonaRepository)
    {
        $this->zonaRepository = $zonaRepository;
    }

    public function obtenerTodas()
    {
        return $this->zonaRepository->getAll();
    }

    public function obtenerPorId($id)
    {
        return $this->zonaRepository->getById($id);
    }

    public function crear(array $data)
    {
        return $this->zonaRepository->create($data);
    }

    public function actualizar($id, array $data)
    {
        return $this->zonaRepository->update($id, $data);
    }

    public function eliminar($id)
    {
        return $this->zonaRepository->delete($id);
    }
}