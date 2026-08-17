<?php

namespace App\Interfaces;



interface ArtistaInterface extends BaseInterface
{
    public function getByEstatus(bool $estado);

    public function getByArtisticName(string $nombre_artistico);

    public function getByRealName(string $nombre_real);

    public function getByMusicalGenre(string $genero_musical);

    public function getByContact(string $contacto);
} //