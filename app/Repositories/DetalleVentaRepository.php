<?php

namespace App\Repositories;

use App\Interfaces\DetalleVentaInterface;
use App\Models\DetalleVenta;

class DetalleVentaRepository extends BaseRepository implements DetalleVentaInterface
{
    public function __construct(DetalleVenta $detalleVenta)
    {
        parent::__construct($detalleVenta);
    }

    public function getByProductoId(int $productoId)
    {
        return $this->model->where('producto_id', $productoId)
                           ->get();
    }

    public function getByVentaId(int $ventaId)
    {
        return $this->model->where('venta_id', $ventaId)
                           ->get();
    }
    public function getByCantidad(int $cantidad)
  {
     $productos = $this->model->where("cantidad", $cantidad)
                                 ->get();

        if($productos->empty())
        {
            return null;
        }

        return $productos;
  }
}