{{-- resources/views/partials/navbar.blade.php (VERSIÓN COMPLETA Y CORREGIDA) --}}

<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top navbar-glass">
    <!-- Decoraciones -->
    <div class="nav-decoration nav-decoration--left"></div>
    <div class="nav-decoration nav-decoration--right"></div>

    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logobanner.png') }}" alt="Nutrive Logo" style="height: 48px;">
        </a>

        <!-- Botón Móvil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido Colapsable -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Menú Principal (centrado) -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('viandas') ? 'active' : '' }}" href="#">Viandas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pasteleria') ? 'active' : '' }}" href="#">Pastelería</a>
                </li>
                <li class="nav-item">
                    {{-- Usamos route() y request()->routeIs() para que el 'active' funcione mejor --}}
                    <a class="nav-link {{ request()->routeIs('planes.public') ? 'active' : '' }}" href="{{ route('planes.public') }}">Planes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('nosotros') ? 'active' : '' }}" href="#">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('empresas') ? 'active' : '' }}" href="#">Empresas</a>
                </li>
            </ul>

            <!-- Sección de Acciones a la Derecha -->
            @auth
                {{-- VISTA PARA USUARIOS AUTENTICADOS --}}
                <div class="d-none d-lg-flex align-items-center">
                    <a href="{{ route('admin') }}" class="btn btn-primary me-3">Panel Admin</a>
                    <span class="navbar-text me-3 d-none d-xl-inline">Hola, {{ Str::words(Auth::user()->name, 1, '') }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm"
                           onclick="event.preventDefault(); this.closest('form').submit();">Salir</a>
                    </form>
                </div>
                <div class="d-lg-none mt-3 border-top pt-3">
                    <a href="{{ route('admin') }}" class="btn btn-primary w-100 mb-2">Panel Admin</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">Cerrar Sesión</button>
                    </form>
                </div>
            @else
                {{-- VISTA PARA INVITADOS --}}
                <div class="d-none d-lg-block">
                    <a href="{{ url('/#contacto') }}" class="cta-brush-button">Pedir Ahora</a>
                </div>
                <div class="d-lg-none mt-3">
                    <a href="{{ url('/#contacto') }}" class="btn btn-success w-100">Contacto</a>
                </div>
            @endauth
        </div>
    </div>
</nav>