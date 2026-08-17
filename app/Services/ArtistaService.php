<?php

namespace App\Services;

use App\Interfaces\ArtistaInterface;

class ArtistaService
{
    public function __construct( //nos permite crear\inicializar un objeto
        private ArtistaInterface $artistaRepository
    ) {}

    public function list()//list permite listar todos los registros
    {
        return $this->artistaRepository->all();
    }

    public function show (int $id)
    {
        return $this->artistaRepository->find($id);
    }

    public function store(array $data) //permite crear registros
    {
        return $this->artistaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->artistaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->artistaRepository->delete($id);
    }

    public function getByRealName(string $nombre_real)
    {
        return $this->artistaRepository->getByRealName($nombre_real);
    }

    public function getByEstatus(bool $estado)
    {
        return $this->artistaRepository->getByStatus($estado);
    }

    public function getByArtisticName(string $nombre_artistico)
    {
        return $this->artistaRepository->getByArtisticName($nombre_artistico);
    }

    public function getByMusicalGenre(string $genero_musical)//
    {
        return $this->artistaRepository->getByMusicalGenre($genero_musical);
    }

    public function getByContact(string $contacto)
    {
        return $this->artistaRepository->getByContact($contacto);
    }
}