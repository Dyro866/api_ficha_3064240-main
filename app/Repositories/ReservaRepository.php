<?php
namespace App\Repositories;

use App\Interfaces\ReservaInterface;
use App\Models\Reserva;


class ReservaRepository extends BaseRepository implements ReservaInterface
{
    public function __construct(Reserva $reserva)
    {
        parent::__construct($reserva);
    }

    public function getByClienteid(int $cliente)
    {
        $productos = $this->model->where("cliente_id", $cliente)
            ->get();

        if ($productos->empty()) {
            return null;
        }

        return $productos;
    }

    public function getByEventoid(int $evento)
    {
        $productos = $this->model->where("evento_id", $evento)
            ->get();

        if ($productos->empty()) {
            return null;
        }

        return $productos;
    }

    public function getByEmpleadoid(int $empleado)
    {

        $productos = $this->model->where("empleado_id", $empleado)
            ->get();

        if ($productos->empty()) {
            return null;
        }

        return $productos;
    }

}