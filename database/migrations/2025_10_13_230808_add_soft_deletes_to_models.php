<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use App\Models\Pasteleria;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('planes', function (Blueprint $table) {
            $table->softDeletes(); // Añade la columna `deleted_at`
        });
        Schema::table('pasteleria', function (Blueprint $table) {
            $table->softDeletes(); // Añade la columna `deleted_at`
        });
    }
    public function down(): void
    {
        Schema::table('planes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('pasteleria', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};