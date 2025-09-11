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
        Schema::create('reservacion_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservacion_id')->constrained('reservacions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('servicio_id')->constrained('servicio_extras')->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('cantidad')->default(1);
            $table->decimal('precio_unitario', 10, 2)->nullable(); // para “congelar” precio histórico
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->unique(['reservacion_id', 'servicio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservacion_servicios');
    }
};
