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
        Schema::create('mesas', function (Blueprint $table) {

            $table->id();
            $table->string("numero",50)->unique();
            $table->unsignedTinyInteger("capacidad");
            $table->enum("tipo", ["estandar","vip","botellero"]);
            $table->enum("estado", ["libre","ocupada","reservada","mantenimiento"]);
            $table->unsignedBigInteger("zona_id");
            $table->timestamps();
            
            $table->foreign("zona_id")->references("id")->on("zonas")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("mesas");
    }
};
