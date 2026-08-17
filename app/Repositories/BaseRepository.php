<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, int $id)
    {
        $registro = $this->model->find($id); 

        if (! $registro) {
            return null;
        }

        $registro->update($data);

        return $registro->fresh();
    }

    public function delete(int $id)
    {
        $registro = $this->model->find($id); 

        if (!$registro) {
            return null;
        }

        return $registro->delete($id); 
    }
}
