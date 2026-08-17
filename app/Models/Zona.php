<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zona extends Model
{
    use HasFactory;  // HasFactory se va a encargar de crear datos de prueba

    protected $table="zonas";    //escribimos como se llama la tabla en la base de datos

    protected $fillable=[  //Definimos los campos
        'nombre',
        'descripcion',
        'aforo_maximo',
        'precio_cover',
        'estado'  //1, 0

    ];


    protected $casts =[
        'estado' => 'boolean'    //true, false
    ];


    public function mesa()
    {
        return $this->hasMany(Mesa::class);
    }

     public function evento()
    {
        return $this->hasMany(Evento::class);
    }


}
