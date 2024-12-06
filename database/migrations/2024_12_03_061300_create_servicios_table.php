<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_servicio');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
            $table->timestamp('fecha_creacion')->useCurrent()->useCurrentOnUpdate();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
