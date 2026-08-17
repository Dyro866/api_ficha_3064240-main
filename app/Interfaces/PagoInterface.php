<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface PagoInterface extends BaseInterface
{
    public function getByVenta(int $idVenta);

    public function getByEstado(string $estado);

    public function getByFecha(Carbon $fecha_pago);
}