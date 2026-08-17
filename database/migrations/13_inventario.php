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
        Schema::create('inventarios', function (Blueprint $table) {
             
            $table->id();
            $table->unsignedInteger("stock_actual");
            $table->unsignedInteger("stock_minimo");
            $table->string("ubicacion",80)->nullable();
            $table->datetime("Ultima_entrada")->nullable();
            $table->datetime("Ultima_salida")->nullable();
            $table->timestamps();

            $table->unsignedBigInteger("producto_id");
            $table->foreign("producto_id")->references("id")->on("productos")->onDelete("cascade");
            
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::dropIfExists('inventarios');
    }
};
