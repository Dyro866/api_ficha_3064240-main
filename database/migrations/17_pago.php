<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->enum("metodo",["efectivo", "transferencia", "tarjeta", "mixto"]);
            $table->decimal("monto", 12,2);
            $table->string("referencia",80);
            $table->dateTime("fecha_pago");
            $table->enum("estado",["exitoso", "pendiente", "fallido"]);
            $table->timestamps();
            $table->unsignedBigInteger("venta_id");

            $table->foreign("venta_id")->references("id")->on("ventas")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists("pagos");
    }
};
