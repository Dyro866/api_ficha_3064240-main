<?php

namespace App\Repositories;

use App\Interfaces\CategoriaProductoInterface;
use App\Models\CategoriaProducto;

class CategoriaProductoRepository extends BaseRepository implements CategoriaProductoInterface
{
    public function __construct(CategoriaProducto $categoriaProducto)
    {
        parent::__construct($categoriaProducto);
    }

    public function getByName(string $name)  
    { 
        $productos = $this->model->where("nombre","LIKE", "%{$name}%")
                                 ->get();  
        
        if($productos->empty())
        {
            return null;
        }

        return $productos ;
    }

    public function getByStatus(string $estado)
    {
        $productos = $this->model->where("estado", $estado)
                                 ->get();

        if($productos->empty())
        {
            return null;
        }

        return $productos;
       
    }


} 