<?php

namespace App\Repositories;

use App\Interfaces\EventoInterface;
use App\Models\Evento;

class EventoRepository extends BaseRepository implements EventoInterface
{
    public function __construct(Evento $eventoModel)
    {
        parent::__construct($eventoModel);
    }
    
    public function getByEstado(string $estado)
    {
        $evento = $this->model->where("estado", $estado)
                                 ->get();

        if($evento->empty())
        {
            return null;
        }

        return $evento;
       
    }

    public function getByAforo(int $aforo)
    {
        $evento = $this->model->where("aforo", $aforo)
                                 ->get();

        if($evento->empty())
        {
            return null;
        }
        return $evento;
    }
    
    public function getByPrecioEntrada(float $precioEntrada)
    {
        $evento = $this->model->where("precio_entrada", $precioEntrada)
                                 ->get();

        if($evento->empty())
        {
            return null;
        }

        return $evento;

       
    }    
}   