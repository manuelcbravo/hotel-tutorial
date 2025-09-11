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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservacion_id')->constrained('reservacions')->cascadeOnUpdate()->restrictOnDelete();
            $table->decimal('monto_total', 10, 2);
            $table->timestamp('fecha_emision')->useCurrent();
            $table->string('estado_pago', 20)->default('pendiente'); // pendiente|pagada|vencida
            $table->timestamps();

            $table->unique('reservacion_id'); // 1:1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
