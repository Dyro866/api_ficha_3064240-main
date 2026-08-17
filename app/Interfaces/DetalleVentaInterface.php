<?php

namespace App\Interfaces;

interface DetalleVentaInterface extends BaseInterface
{
    public function getByProductoId(int $productoId);
    public function getByVentaId(int $ventaId);
    public function getByCantidad(int $cantidad);
}
