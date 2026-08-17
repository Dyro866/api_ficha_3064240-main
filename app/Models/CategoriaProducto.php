<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class CategoriaProducto extends Model
{
    use HasFactory;
    
    protected $table = "categorias_producto";

    protected $fillable =[

            'nombre',
            'descripcion',
            'estado',


    ];

     protected $casts =[
         'estado'  => 'boolean'


     ];
     public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}


