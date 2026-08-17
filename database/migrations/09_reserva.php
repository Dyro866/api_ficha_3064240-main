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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->dateTime("fecha_reserva");
            $table->unsignedTinyInteger("cantidad_personas");
            $table->decimal("anticipo")->nullatable();
            $table->text("observaciones")->nullatable();
            $table->enum("estado",["pendiente", "cancelada","asistio"]);
            $table->timestamps();

            $table->unsignedBigInteger("cliente_id");

            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete("cascade");

            $table->unsignedBigInteger("mesa_id");

            $table->foreign("mesa_id")->references("id")->on("mesas")->onDelete("cascade");

            $table->unsignedBigInteger("evento_id");

            $table->foreign("evento_id")->references("id")->on("eventos")->onDelete("cascade");

            $table->unsignedBigInteger("empleado_id");

            $table->foreign("empleado_id")->references("id")->on("empleados")->onDelete("cascade");
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("reservas"); 
    }
    
};
