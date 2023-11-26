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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->float('precio');
            $table->string('descripcion');
            $table->date('fecha_vencimiento');
            $table->string('nombre');
            $table->smallInteger('stock');
            $table->string('imagen_url')->nullable();
            $table->boolean('generado')->default(false);
            $table->string('archivo_ubicacion')->default("nada");
            $table->string('archivo_nombre')->default("nada");
            $table->timestamps();
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
