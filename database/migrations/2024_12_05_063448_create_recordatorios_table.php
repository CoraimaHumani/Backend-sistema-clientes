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
        Schema::create('recordatorios', function (Blueprint $table) {
            $table->id('id_recordatorio');
            $table->text('mensaje');
            $table->timestamp('fecha_envio')->useCurrent()->onUpdate('current_timestamp');
            $table->foreignId('id_cliente')->constrained('clientes', 'id')->onDelete('cascade');
            $table->foreignId('id_servicio')->constrained('servicios', 'id')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordatorios');
    }
};
