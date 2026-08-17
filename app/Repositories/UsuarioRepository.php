<?php

namespace App\Repositories;

use App\Interfaces\UsuarioRepositoryInterface;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function getAll()
    {
        return Usuario::with('rol')->get();
    }

    public function getById($id)
    {
        return Usuario::with('rol')->findOrFail($id);
    }

    public function create(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return Usuario::create($data);
    }

    public function update($id, array $data)
    {
        $usuario = Usuario::findOrFail($id);
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $usuario->update($data);
        return $usuario;
    }

    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        return $usuario->delete();
    }
}