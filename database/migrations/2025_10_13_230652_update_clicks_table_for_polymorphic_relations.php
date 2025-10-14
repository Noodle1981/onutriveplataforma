<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('clicks', function (Blueprint $table) {
            // Eliminamos la columna vieja
            $table->dropColumn('button_identifier');

            // Añadimos columnas polimórficas.
            // Esto nos permite asociar un clic a un Plan, a un PasteleriaItem, o a cualquier otro modelo.
            $table->morphs('clickable'); // Esto crea clickable_id (INT) y clickable_type (VARCHAR)
        });
    }

    public function down(): void
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->string('button_identifier');
            $table->dropMorphs('clickable');
        });
    }
};