<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::create('clientes', function (Blueprint $table) {
        $table->id('id_cliente');
        $table->string('nombre', 100);
        $table->string('email', 100);
        $table->string('telefono', 15);
        $table->text('comentarios');
        $table->unsignedBigInteger('asignado_a');
        $table->timestamps();  // Esto generará automáticamente 'created_at' y 'updated_at'
    });
}


    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
