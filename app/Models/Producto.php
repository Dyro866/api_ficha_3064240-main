<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Producto extends Model
{
   use HasFactory; // se encarga de crear datos de prueba 

   protected $table = "productos"; // nombre de la tabla

   protected $fillable = [ // define los campos
      'categoria_id',
      'proveedor_id',
      'codigo',
      'nombre',
      'descripcion',
      'precio_venta',
      'precio_compra',
      'unidad_medida',
      'estado',
   ];
   protected $casts = [
      'estado' => 'boolean'//true
   ];

   public function categoria()
   {
      return $this->belongsTo(CategoriaProducto::class);
   }

   public function proveedor()
   {
      return $this->belongsTo(Proveedor::class);
   }
   public function inventario()
   {
      return $this->hasMany(Inventario::class);
   }
   public function detalleVenta()
   {
      return $this->hasOne(DetalleVenta::class);
   }
}
