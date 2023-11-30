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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->char('num_telefono',15);
            $table->string('correo');
            $table->string('direccion');
            $table->string('nombre_empresa');
            $table->string('prov_archivo_ubicacion')->nullable();
            $table->string('prov_archivo_nombre')->default("nada");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
