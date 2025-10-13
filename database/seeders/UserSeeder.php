<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usamos firstOrCreate para evitar duplicados si el seeder se corre varias veces
        User::firstOrCreate(
    ['usuario' => 'admin'],
    [
        'name' => 'Administrador',
        'email' => 'test@test.com', // <-- AÑADIDO
        'password' => Hash::make('test1234'),
    ]
);
    }
}