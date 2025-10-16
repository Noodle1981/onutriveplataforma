<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PasteleriaController;
use App\Http\Controllers\Admin\ProfileController; // ¡Importante!
use App\Http\Controllers\Api\ClickController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS (Accesibles para todos)
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/planes', [PageController::class, 'planes'])->name('planes.public');
Route::get('/viandas', [PageController::class, 'viandas'])->name('viandas.public');
Route::get('/pasteleria', [PageController::class, 'pasteleria'])->name('pasteleria.public');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (Para invitados que quieren entrar)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('planes', PlanController::class)->parameters(['planes' => 'plan'])->names('planes');
    Route::resource('pasteleria', PasteleriaController::class)->names('pasteleria');
    
    // Rutas para el perfil del administrador
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

// Ruta de Logout (Solo para usuarios autenticados)
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| RUTAS DEL PANEL DE ADMINISTRACIÓN (Protegidas)
|--------------------------------------------------------------------------
|
|   Todas las rutas aquí dentro requieren que el usuario haya iniciado sesión.
|   El prefijo 'admin' se añade automáticamente a la URL (ej. /admin/planes).
|   El nombre de la ruta también se prefija (ej. admin.planes.index).
|
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Apunta a tu nuevo DashboardController
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // El CRUD de Planes sigue funcionando con su nueva estructura de vistas
    Route::resource('planes', PlanController::class)->parameters(['planes' => 'plan'])->names('planes');
    
    // El CRUD de Pastelería se integra perfectamente
    Route::resource('pasteleria', PasteleriaController::class)->names('pasteleria');
});

// Ruta para el tracking de clicks
Route::post('/track-click', [ClickController::class, 'store'])->name('track.click');