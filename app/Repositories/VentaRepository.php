<?php

namespace App\Repositories;

use App\Interfaces\VentaInterface;
use App\Models\Venta;
use Carbon\Carbon;

class VentaRepository extends BaseRepository implements VentaInterface
{
    public function __construct(Venta $ventaModel)
    {
        parent::__construct($VentaModel);
    }

    public function getByNumero_factura(string $NumeroFactura)
    {
        $venta = $this->model->where("venta_id", $NumeroFactura)
                                 ->get();
        
        if($venta->empty())
        {
            return null;
        }

        return $venta;
    }

    public function getByFecha_venta(string $FechaVenta)
    {
        $venta = $this->model->where("Fecha_venta", $FechaVenta)
                                 ->get();

        if($venta->empty())
        {
            return null;
        }

        return $venta;
       
    }

    public function getByEstado(unun $Estado)
    {
        $venta = $this->model->where("venta", $Estado)
                                 ->get();   
        
        if($venta->empty())
        {
            return null;
        }

        return $venta;
    }
}