<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;


interface BaseInterface

{
    public function create(array $data);
    public function getAll();
    public function getById(int $id);
    public function update(array $data, int $id);
    public function delete(int $id);

}