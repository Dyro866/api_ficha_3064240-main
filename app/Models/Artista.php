<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artista extends Model //extend es heredar
{
    use HasFactory; //hasfactory datos de prueba=datos basura

    protected $table="djs_artistas";// escribimos como se llama la tabla en la base de datos

    protected $fillable =[  //definimos los campos 
        "nombre_artistico",
        "nombre_real",
        "genero_musical",
        "biografia",
        "contacto",
        "cache_base",
        "estado"
    ];


    protected $casts =[
        "estado" => 'boolean' //valores 1 o 2,
    ];

    public function eventos()
    {
        return $this->hasMany(eventos::class);
    }
}
