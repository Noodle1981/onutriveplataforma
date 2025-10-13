<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
     public function run(): void
    {
        // Llama a tu seeder de usuario
        $this->call([
            UserSeeder::class,
            // Aquí puedes añadir otros seeders en el futuro
        ]);
    }
}
