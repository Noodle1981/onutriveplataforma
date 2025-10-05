<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\ProfileController; // Breeze añade este

// ... (tus rutas públicas de home y planes.public se quedan como están) ...
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/planes', [PageController::class, 'planes'])->name('planes.public');


// --- Rutas del Panel de Administración PROTEGIDAS ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Ruta para el perfil del usuario (creada por Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tus rutas de administración ahora están aquí dentro
    Route::get('/admin', function () {
        return redirect()->route('planes.index');
    })->name('admin'); // Le damos un nombre a la ruta

    Route::prefix('admin')->group(function () {
        Route::resource('/planes', PlanController::class)->names('planes');
    });

});


// Esta línea la añade Breeze, déjala al final
require __DIR__.'/auth.php';