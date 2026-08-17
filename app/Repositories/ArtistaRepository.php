<?php

namespace App\Repositories;

use App\Interfaces\ArtistaInterface;
use App\Models\Artista;

class ArtistaRepository extends BaseRepository implements ArtistaInterface
{
    public function __construct(Artista $artistaModel)
    {
        parent::__construct($artistaModel);
    }

    public function getByRealName(string $nombre_real)
    {
        $nombre_real = $this->model->where("nombre_real","LIKE", "%{$nombre_real}%")
                               ->get();
        if($nombre_real->empty())
        {
            return null;
        }
    }

    public function getByEstatus(bool $estado)
    {
        $estado = $this->model->where("estado")
                              ->get();
        if($estado->empty())
        {
            return null;
        }
    }

    public function getByArtisticName(string $nombre_artistico)
    {
        $nombre_artistico = $this->model->where("nombre_artistico","LIKE","%{$nombre_artistico}%")
                                        ->get();
        if($nombre_artistico->empty())
        {
            return null;
        }
    }

    public function getByMusicalGenre(string $genero_musical)
    {
        $genero_musical = $this->model->where("genero_musical","LIKE","%{$genero_muscial}%")
                                      ->get();
        if($genero_muscial->empty())
        {
            return null;
        }
    }

    public function getByContact(string $contacto)
    {
        $contacto = $this->model->where("contacto","LIKE","%{$contacto}%")
                                ->get();
        if($contacto->empty())
        {
            return null;
        }
    }

}