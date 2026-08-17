<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;

class Usuario extends Model
{
    use HasFactory; //Hasfactory se va a encargar de crear los datos de prueba para la tabla usuarios

    protected $table="usuarios"; //especifcamos el nombre de la tabla que va a usar este modelo

    protected $fillable =[ //definimos los campos
        "rol_id",
        "nombre",
        "email",
        "password",
        "telefono",
        "estado" //1, 0
    ];

    protected $casts =[
        "estado" => "boolean" //true, false
        
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class); //un usuario pertenece a un rol

    }
    
    public function empleado()
    {
        return $this->hasOne(Empleado::class); //un usuario tiene un empleado
    }
}

