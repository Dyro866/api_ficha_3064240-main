<?php

namespace App\Interfaces;

interface RolInterface extends BaseInterface
{
    public function getByName(String $name);
    
    public function getByStatus(String $estado);
}