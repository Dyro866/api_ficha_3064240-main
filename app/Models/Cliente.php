<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory; //HasFactory se va a encargar de crear datos de prueba

    protected $table="clientes"; // Escribimos como se llamada la tabla en la BD

    protected $fillable =[ //  Definimos los datos 
        "id"
        'documento',
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'fecha_nacimiento',
        'tipo'
    ];

    public function reserva()

    {
        return $this->hasMany(Reserva::class);
    }

    public function venta()

    {
        return $this->hasMany(Venta::class);
    }
}
