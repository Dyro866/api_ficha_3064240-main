<?php

namespace App\Repositories;

use App\Interfaces\ZonaRepositoryInterface;
use App\Models\Zona;

class ZonaRepository implements ZonaRepositoryInterface
{
    public function getAll()
    {
        return Zona::all();
    }

    public function getById($id)
    {
        return Zona::findOrFail($id);
    }

    public function create(array $data)
    {
        return Zona::create($data);
    }

    public function update($id, array $data)
    {
        $zona = Zona::findOrFail($id);
        $zona->update($data);
        return $zona;
    }

    public function delete($id)
    {
        $zona = Zona::findOrFail($id);
        return $zona->delete();
    }
}