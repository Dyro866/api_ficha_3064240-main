<?php

namespace App\Repositories;

use App\Interfaces\RolRepositoryInterface;
use App\Models\Rol;

class RolRepository implements RolRepositoryInterface
{
    public function getAll()
    {
        return Rol::all();
    }

    public function getById($id)
    {
        return Rol::findOrFail($id);
    }

    public function create(array $data)
    {
        return Rol::create($data);
    }

    public function update($id, array $data)
    {
        $rol = Rol::findOrFail($id);
        $rol->update($data);
        return $rol;
    }

    public function delete($id)
    {
        $rol = Rol::findOrFail($id);
        return $rol->delete();
    }
}