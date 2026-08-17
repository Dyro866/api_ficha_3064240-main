<?php

namespace App\Interfaces;

interface InventarioInterface extends BaseInterface
{
    public function getByProductoId(int $productoid);
    public function getByStockActual(int $stockactual);
    public function getByUbicacion(string $ubicacion);

}