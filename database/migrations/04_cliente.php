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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("documento",20)->unique();
            $table->string("nombres",80);
            $table->string("apellidos",80);
            $table->string("email",150)->unique()->nullable();
            $table->string("telefono",20);
            $table->date("fecha_nacimiento")->nullable();
            $table->enum("tipo",["regular","vip","corporativo"]);
            $table->timestamps();

        });
    }

    /**c
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("clientes");
    }
};
