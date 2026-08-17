<?php

namespace App\Services;

use App\Interfaces\ReservaInterface;

class ReservaService
{
    public function __construct(
        private ReservaInterface $reservaRepository
    ) {}

    public function all()
    {
        return $this->reservaRepository->all();
    }

    public function show(int $id)
    {
        return $this->reservaRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->reservaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->reservaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->reservaRepository->delete($id);
    }

    public function findByClienteId(int $cliente)
    {
        return $this->reservaRepository->getByClienteid($cliente);
    }

    public function findByEventoId(int $evento)
    {
        return $this->reservaRepository->getByEventoid($evento);
    }

    public function findByEmpleadoId(int $empleado)
    {
        return $this->reservaRepository->getByEmpleadoid($empleado);
    }
}
