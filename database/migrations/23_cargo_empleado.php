<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('cargos_empleado', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('empleado_id')
                  ->unique()
                  ->constrained('empleados');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('cargos_empleado');
    }
};