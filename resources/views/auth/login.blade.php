@extends('layout')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white text-center py-3">
                    <h3 class="mb-0">Panel de Administración</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Session Status & Validation Errors -->
                    {{-- ... (código de errores y status) ... --}}

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" class="form-control" type="password" name="password" required>
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">Recordarme</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
                        </div>
                        
                        {{-- 👇 ESTA ES LA SECCIÓN ACTUALIZADA 👇 --}}
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            @if (Route::has('register'))
                                <a class="text-decoration-none" href="{{ route('register') }}">
                                    ¿No tienes una cuenta? Regístrate
                                </a>
                            @endif
                            
                            @if (Route::has('password.request'))
                                <a class="text-muted text-decoration-none small" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection