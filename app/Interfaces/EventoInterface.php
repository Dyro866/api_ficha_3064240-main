<?php

namespace App\Interfaces;

interface EventoInterface extends BaseInterface
{

    public function getByAforo(int $aforo);

    public function getByEstado(string $estado);

    public function getByPrecioEntrada (float $precioEntrada);
}