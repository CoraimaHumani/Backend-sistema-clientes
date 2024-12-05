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
        Schema::create('servicios_asignados', function (Blueprint $table) {
            $table->id('id_asignacion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('dias_calendario');
            $table->string('estado', 100);
            $table->text('comentarios');
            $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente')->onDelete('cascade'); // Relación con la tabla clientes
            $table->foreignId('id_servicio')->constrained('servicios', 'id_servicio')->onDelete('cascade'); // Relación con la tabla servicios
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_asignados');
    }
};
