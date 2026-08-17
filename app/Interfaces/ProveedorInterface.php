<?php

namespace App\Interfaces;

interface ProveedorInterface extends BaseInterface

{
    public function getByContacto(string $contacto);

    public function getByEmail(string $email);

    public function getByDireccion(string $direccion);
    
}
