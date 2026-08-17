<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->string('codigo', 30)->unique();
            $table->string('nombre', 120);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_venta', 12, 2);
            $table->decimal('precio_compra', 12, 2)->nullable();
            $table->boolean('estado')->default(1);
            $table->string('unidad_medida', 20);
            $table->timestamps();

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias_producto')
                ->onDelete('cascade');

            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedores')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};