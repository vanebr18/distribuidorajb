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
        Schema::table('tubos', function (Blueprint $table) {
            $table->boolean('estado')->after('propio'); // Agrega la columna después de 'telefono'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tubos', function (Blueprint $table) {
            $table->dropColumn('estado'); // Elimina la columna en caso de rollback
        });
    }
};
