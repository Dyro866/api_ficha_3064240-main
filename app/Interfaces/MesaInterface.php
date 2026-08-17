<?php

namespace App\Interfaces;

interface MesaInterface extends BaseInterface
{

    public function getByNumero(string $numero);

    public function getByEstado(string $estado);

    public function getByTipo(string $tipo);

}
