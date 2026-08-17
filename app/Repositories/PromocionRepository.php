<?php

namespace App\Repositories;

use App\Interfaces\PromocionInterface;
use App\Models\Promocion;

class PromocionRepository extends BaseRepository implements PromocionInterface
{
    public function __construct(Promocion $promocionModel)
    {
        parent::__construct($promocionModel);
    }

    public function getByEstado(bool $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function getByEvento(int $eventoId)//
    {
        return $this->model->where('evento_id', $eventoId)->get();
    }

    public function getByReference(string $referencia)
    {
        return $this->model->where('nombre', 'like', "%{$referencia}%")->get();
    }
}