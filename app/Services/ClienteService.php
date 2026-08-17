<?php

namespace App\Services;

use App\Interfaces\ClienteInterface;

class ClienteService
{
    public function __construct(
        private ClienteInterface $clienteRepository
    ) {}

    public function list()
    {
        return $this->clienteRepository->all();
    }

    public function show(int $id)
    {
        return $this->clienteRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->clienteRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->clienterRepoository->delete($id);
    }

    public function getByName (String $name)
    {
       return $this->clienterRepoository->getByName($name);
    }

    public function getByLastname (String $lastname)
    {
        return $this->clienterRepoository->getByLastname($lastname);
    }

    public function getByDocument (String $document)
    {
         return $this->clienterRepoository->getByDocument($document);
             
    }
}