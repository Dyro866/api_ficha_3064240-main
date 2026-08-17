<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * run the
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("venta_id");
            $table->foreignId("producto_id");

            $table->unsignedInteger("cantidad");

            $table->decimal("precio_unitario", 12, 2);

            $table->decimal("subtotal", 12, 2);

            $table->timestamps();
            
            $table->foreign("venta_id")->references("id")->on("ventas")->onDelete("cascade");

            $table->foreign("producto_id")->references("id")->on("productos")->onDelete("cascade");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
