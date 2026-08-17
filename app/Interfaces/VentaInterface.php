<?php
namespace App\Interfaces;

interface VentaInterface extends BaseInterface

{
    public function getByNumeroFactura(string $Numero_factura);

    public function getByFechaVenta(dateTime $Fecha_venta);

    public function getByEstado(enum $Estado);

}