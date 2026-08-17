<?php

namespace App\Repositories;

use App\Interfaces\ProductoInterface;
use App\Models\Producto;
use App\Repositories\BaseRepository;

class ProductoRepository extends BaseRepository implements ProductoInterface
{
    public function __construct(Producto $producto)
    {
        parent::__construct($producto);
    }

    public function getByCategoriaId($id)
    {
        $productos = $this->model->where("categoria_id", $id)
            ->get();
        if ($productos->empty()) {
            return null;
        }
        return $productos;
    }

    public function getByProveedorId($id)
    {
        $productos = $this->model->where("proveedor_id", $id)
            ->get();
        if ($productos->empty()) {
            return null;  
        }
        return $productos;
    }

    public function getByNombre($nombre)
    {
        $productos = $this->model->where("nombre", $nombre)
            ->get();
        if ($productos->empty()) {
            return null;
        }
        return $productos;

    }
}



