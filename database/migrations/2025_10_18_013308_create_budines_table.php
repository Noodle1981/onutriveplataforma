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
        Schema::create('budines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable(); // <-- AÑADIDO (text es mejor para descripciones largas)
            $table->string('image_path')->nullable();
            $table->softDeletes(); // <-- Asegúrate de que esta línea esté aquí
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budines');
    }
};
