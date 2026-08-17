<?php

namespace App\Interfaces;

interface PromocionInterface extends BaseInterface
{
    public function getByEstado(bool $estado);

    public function getByEvento(int $eventoId);

    public function getByReference(string $referencia);
}