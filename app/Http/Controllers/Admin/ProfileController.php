<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // Muestra la vista del formulario
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    // Procesa el cambio de contraseña
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // 1. Validar los datos
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('La contraseña actual es incorrecta.');
                }
            }],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        // 2. Actualizar la contraseña en la base de datos
        $user->password = Hash::make($request->password);
        $user->save();
        
        // 3. Redirigir con un mensaje de éxito
        return back()->with('success', '¡Contraseña actualizada exitosamente!');
    }
}