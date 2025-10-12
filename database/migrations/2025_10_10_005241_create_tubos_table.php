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
        Schema::create('tubos', function (Blueprint $table) {
            $table->id();
            $table->string('nro_tubo');
            $table->decimal('capacidad', total: 5, places: 2);
            $table->boolean('propio');
            $table->char('dueño', length: 1);
            $table->integer('proveedor_id')->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
            $table->integer('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->integer('tipogas_id');
            $table->foreign('tipogas_id')->references('id')->on('tipo_gases')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tubos');
    }
};
