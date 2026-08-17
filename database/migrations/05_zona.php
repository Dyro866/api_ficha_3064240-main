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
        Schema::create('zonas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre", 80)->unique();
            $table->text("descripcion")->nullable();
            $table->unsignedinteger("aforo_maximo");
            $table->decimal("precio_cover", 10,2)->nullable();
            $table->boolean("estado", 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("zonas");
    }
};
