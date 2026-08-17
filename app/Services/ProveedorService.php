<?php

namespace App\Services;

use App\Interfaces\ProveedorInterface;

class ProveedorService
{
    public function __construct(
        private ProveedorInterface $proveedorRepository
    ) {}

    public function list()
    {
        return $this->proveedorRepository->all();
    }

    public function show(int $id)
    {
        return $this->proveedorRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->proveedorRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->proveedorRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->proveedorRepository->delete($id);
    }

    public function getByContacto(string $contacto)
    {
        return $this->proveedorRepository->getByContacto($contacto);
    }

    public function getByEmail(string $email)
    {
        return $this->proveedorRepository->getByEmail($email);
    }

    public function getByDireccion(string $direccion)
    {
        return $this->proveedorRepository->getByDireccion($direccion);
    }
}
