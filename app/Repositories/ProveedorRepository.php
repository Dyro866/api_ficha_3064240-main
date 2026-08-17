<?php

namespace App\Repositories;
use App\Interfaces\ProveedorInterface;
use App\Models\Proveedor;

class ProveedorRepository extends BaseRepository implements ProveedorInterface
{
    public function  __construct(Proveedor $proveedor)
    {
        parent::__construct($proveedor);
    }

    public function getByContacto(string $contacto)
    {
        $proveedores = $this->model->where("contacto",$contacto)
                                    ->get();

        if($proveedores->empty())//
            {
                return null;

            }

        return $proveedores;
    }

    public function  getByemail(string $email)
    {
        $proveedores = $this->model->where("email",$email)
                                    ->get();

       if($proveedores->empty())
        {
            return null;
        }

        return $proveedores;
    }

    public function getByDireccion(string $direccion)
    {
        $proveedores = $this->model->where("direccion",$direccion)
                                    ->get();

        if($proveedores->empty())
        {
            return null;
        }
        return $proveedores;
    }
}