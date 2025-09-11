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
        Schema::create('habitacions', function (Blueprint $table) {
            $table->id();
            $table->string('numero_habitacion', 10);
            $table->foreignId('tipo_id')->constrained('tipo_habitacions')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('estado', 20)->default('disponible'); // disponible|ocupada|mantenimiento
            $table->timestamps();

            $table->unique('numero_habitacion');
            $table->index(['tipo_id', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacions');
    }
};
