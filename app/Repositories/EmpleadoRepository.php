<?php

namespace App\Repositories;

use App\Interfaces\EmpleadoRepositoryInterface;
use App\Models\Empleado;

class EmpleadoRepository implements EmpleadoRepositoryInterface
{
    public function getAll()
    {
        return Empleado::with('usuario')->get();
    }

    public function getById($id)
    {
        return Empleado::with('usuario')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Empleado::create($data);
    }

    public function update($id, array $data)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($data);
        return $empleado;
    }

    public function delete($id)
    {
        $empleado = Empleado::findOrFail($id);
        return $empleado->delete();
    }
}