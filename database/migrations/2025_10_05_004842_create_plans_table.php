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
    Schema::create('planes', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Para el nombre del plan
        $table->string('image_path'); // Para guardar la RUTA de la imagen
        $table->timestamps(); // created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
