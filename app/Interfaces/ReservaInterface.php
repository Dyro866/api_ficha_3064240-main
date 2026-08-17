<?php

namespace App\Interfaces;
use DateTime;

interface ReservaInterface extends BaseInterface
{
    public function getByClienteid(int $cliente);
    public function getByEventoid(int $evento);
    public function getByEmpleadoid(int $empleado);

}