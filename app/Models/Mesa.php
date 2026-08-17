<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mesa extends Model
{
    use HasFactory; //HasFactory se va a encargar de crear datos de prueba

    protected $table="mesas"; //Escribimos como se llama la tabala en a base de datos

    protected $fillable =[ //Definimos los campos 
        "numero",
        "capacidad",
        "tipo",
        "estado", //1, 0
        "zona_id"
    ];

    protected $casts =[
        "estado" => "boolean" // true, false
        
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }

}
