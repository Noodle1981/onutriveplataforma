@extends('layout')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-white text-center py-3">
                    <h3 class="mb-0">Recuperar Contraseña</h3>
                </div>
                <div class="card-body p-4">

                    <p class="text-muted mb-4">
                        ¿Olvidaste tu contraseña? No hay problema. Simplemente déjanos saber tu dirección de correo electrónico y te enviaremos un enlace para restablecer la contraseña que te permitirá elegir una nueva.
                    </p>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Enviar Enlace de Restablecimiento
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection