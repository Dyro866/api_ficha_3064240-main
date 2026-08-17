<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;

    protected $table = "empleados";

    protected $fillable = [
        "usuario_id",
        "documento",
        "nombres",
        "apellidos",
        "cargo",
        "fecha_ingreso",
        "salario",
        "estado",
    ];

    protected $casts = [
        "fecha_ingreso" => "date",
        "salario"       => "decimal:2",
    ];

    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}



