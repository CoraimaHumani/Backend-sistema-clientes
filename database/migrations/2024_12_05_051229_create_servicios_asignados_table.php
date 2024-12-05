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
            $table->string('estado');
            $table->text('comentarios');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_servicio');

            // Definir claves primarias y foráneas
            $table->primary('id_asignacion');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios')->onDelete('cascade');
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
