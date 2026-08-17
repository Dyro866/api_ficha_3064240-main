<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {

            $table->id();

            $table->foreignId('usuario_id')
                  ->nullable()
                  ->unique();

            $table->string("documento", 20)->unique();
            $table->string("nombres", 80);
            $table->string("apellidos",80);
            $table->string("cargo",60);
            $table->date("fecha_ingreso");
            $table->decimal('salario',12,2)->nullable();
            $table->enum("tipo",["regular","vip","corporativo"]);
            $table->timestamps();
            $table->unsignedBigInteger("usuario_id");

            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");
            
            
        });
    }

   
    public function down(): void
    {
        Schema:: dropIfExists('empleados');
        
    }
};
