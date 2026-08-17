<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ProductoInterface extends BaseInterface
{
    public function getByCategoriaId(int $categoriaId);
    public function getByProveedorId(int $proveedorId);
    public function getByNombre(string $nombre);
}