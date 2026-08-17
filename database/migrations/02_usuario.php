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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rol_id");
            $table->foreign("rol_id")->references("id")->on("roles")->onDelete("cascade");
            $table->string("nombre",100);
            $table->string("email",150)->unique();
            $table->string("password",255)->unique();
            $table->string("telefono",20)->nullabel();
            $table->boolean("estado",1);
            $table->timestamps(); 

        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("usuarios");
        
    }
};
