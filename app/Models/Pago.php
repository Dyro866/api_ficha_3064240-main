<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pago extends Model
{
    use HasFactory;

    protected $table="pagos";

    protected $fillable =[
        'metodo',
        'monto',
        'referencia',
        'fecha_pago',
        'estado', // 1 , 0
        'venta_id'
    ];
    
    
    protected $casts =[
        'estado' => 'boolean'//true
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

}
