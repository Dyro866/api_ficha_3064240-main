<?php

namespace App\Interfaces;

interface CategoriaProductoInterface extends BaseInterface
{
    public function getByName(string $name);
    public function getByStatus(string $estado);
}
