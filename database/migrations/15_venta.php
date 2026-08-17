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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string("numero_factura",30)->unique();
            $table->datetime("fecha_venta",0);
            $table->decimal("subtotal",12,2);
            $table->decimal("descuento",12,2);
            $table->decimal("total",12,2);
            $table->enum("estado", ['abierta', 'pagada', 'anulada']);
            $table->timestamps();

            $table->unsignedBigInteger("cliente_id");
            $table->unsignedBigInteger("empleado_id");
            $table->unsignedBigInteger("mesa_id");
            $table->unsignedBigInteger("promocion_id");

            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete("cascade");
            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete("cascade");
            $table->foreign("mesa_id")->references("id")->on("mesas")->onDelete("cascade");
            $table->foreign("promocion_id")->references("id")->on("promociones")->onDelete("cascade");
        
            

            
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
