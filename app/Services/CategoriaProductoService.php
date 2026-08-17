<?php

namespace App\Services;

use App\Interfaces\CategoriaProductoInterface;

class CategoriaProductoService
{
    public function __construct(
        private CategoriaProductoInterface $categoriaProductoRepository
    ) {}

    public function list()
    {
        return $this->categoriaProductoRepository->all();
    }

    public function show(int $id)
    {
        return $this->categoriaProductoRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->categoriaProductoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->categoriaProductoRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->categoriaProductoRepository->delete($id);
    }

    public function getByName(string $name)
    {
        return $this->categoriaProductoRepository->getByName($name);
    }

    public function getByStatus(string $estado)
    {
        return $this->categoriaProductoRepository->getByStatus($estado);
    }
}
