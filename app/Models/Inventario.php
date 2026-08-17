<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\Hasfactory;


class Inventario extends Model


{
    use Hasfactory; //se  va a encargar de crear datos de prueba

    protected $table="inventarios"; //Escribimos como se llama la tabla en la base de datos

    protected $fillable=[ //Definimos los campos de la tabla
        'stock_actual',
        'stock_minimo',
        'ubicacion',
        'ultima_entrada',
        'ultima_salida',
        'producto_id'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    

}
