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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->constrained('facturas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('fecha_pago');
            $table->decimal('monto_pago', 10, 2);
            $table->string('metodo_pago', 50); // tarjeta|transferencia|efectivo ...
            $table->timestamps();

            $table->index(['factura_id', 'fecha_pago']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
