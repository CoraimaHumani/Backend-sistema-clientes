<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{

    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 100);
            $table->string('email', 100)->unique();
            $table->string('constrasena', 200);
            $table->string('rol', 100);
            $table->boolean('estado')->default(1);
            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));         });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
