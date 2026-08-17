<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory; //HasFactory se va encargar de crear datos de prueba

    protected $table = "eventos";

    protected $fillable = [
        "nombre",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "aforo",
        "precio_entrada",
        "estado",
        "zonas_id",
        "dj_artistas_id",
    ];

    protected $casts =[
        'estado' => 'boolean' //true, false
        
    ];

    public function reservas()
    {
        return$this->hasMany(Reserva::class);
    }

      public function promociones()
    {
        return$this->hasMany(Promocion::class);
    }

        public function zona()
    {
        return$this->belongsTo(Zona::class);
    }

      public function dj()
    {
        return$this->belongsTo(Artista::class);
    }

}
