<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')
                ->nullable()
                ->constrained('eventos');
            $table->string('nombre', 120);
            $table->text('descripcion')->nullable();
            $table->enum('tipo_descuento', ['porcentaje', 'valor_fijo', '2x1']);
            $table->decimal('valor_descuento', 12, 2);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promociones');
    }
};