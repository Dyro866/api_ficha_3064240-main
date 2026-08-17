<?php

namespace App\Repositories;

use App\Interfaces\InventarioInterface;
use App\Models\Inventario;

class InventarioRepository extends BaseRepository implements InventarioInterface
{
    public function __construct(Inventario $inventario)
    {
        parent::__construct($inventario);
    }

    public function getByProductoId(int $productoid)
    {
    $productos = $this->model->where("producto_id", $productoid)
                                 ->get();

        if($productos->empty())
        {
            return null;
        }

        return $productos;
    }

    public function getByUbicacion(string $ubicacion){
        
    $productos = $this->model->where("ubicacion", $ubicacion)
                                 ->get();

        if($productos->empty())
        {
            return null;
        }

        return $productos;
    }

    public function getByStockActual(int $stockActual)
    {
        $productos = $this->model->where("stock_actual", $stockActual)
                                 ->get();

        if($productos->empty())
        {
            return null;
        }

        return $productos;
       
    }

}


