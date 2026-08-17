<?php

namespace App\Repositories;

use App\Interfaces\PagoInterface;
use App\Models\Pago;
use Carbon\Carbon;

class PagoRepository extends BaseRepository implements PagoInterface
{
    public function __construct(Pago $pagoModel)
    {
        parent::__construct($pagoModel);
    }

    public function getByVenta(int $id)
    {
        $pago = $this->model->where("venta_id", $id)
                                 ->get();
        
        if($pago->empty())
        {
            return null;
        }

        return $pago;
    }

    public function getByEstado(string $estado)
    {
        $pago = $this->model->where("estado", $estado)
                                 ->get();

        if($pago->empty())
        {
            return null;
        }

        return $pago;
       
    }

    public function getByFecha (Carbon $fechaPago)
    {
        $pago = $this->model->where("fecha_pago", $fechaPago)
                                 ->get();   
        
        if($pago->empty())
        {
            return null;
        }

        return $pago;
    }
}