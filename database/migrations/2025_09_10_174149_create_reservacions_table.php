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
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('habitacion_id')->constrained('habitacions')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->smallInteger('num_huespedes');
            $table->unsignedSmallInteger('estatus_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('estatus_id')->references('id')->on('estatus_reservacions')->cascadeOnUpdate()->restrictOnDelete();

            // Evitar doble-booking básico (misma habitación en mismo rango)
            $table->index(['habitacion_id', 'fecha_entrada', 'fecha_salida']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservacions');
    }
};
