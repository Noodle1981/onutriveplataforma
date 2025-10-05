@extends('layout')

@section('title', 'Crear Cuenta')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-white text-center py-3">
                    <h3 class="mb-0">Registrar Nuevo Usuario</h3>
                </div>
                <div class="card-body p-4">

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

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-4">
                            <a class="text-muted text-decoration-none me-4" href="{{ route('login') }}">
                                ¿Ya tienes una cuenta?
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Registrarse
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection