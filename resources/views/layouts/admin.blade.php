
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración') - Onnutrive</title>

    <!-- Bootstrap CSS y Icons (necesarios para el panel) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    {{-- =================== CAMBIO IMPORTANTE =================== --}}
    {{--   Llamamos a @vite una sola vez con AMBOS archivos aquí   --}}
    @vite(['resources/css/panel.css', 'resources/js/app.js'])
    {{-- ========================================================= --}}

    @stack('styles')
</head>
<body class="admin-bg">

    {{-- ========================================================= --}}
    {{--       BARRA DE NAVEGACIÓN EXCLUSIVA PARA EL ADMIN         --}}
    {{-- ========================================================= --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            {{-- Enlace al Dashboard principal del admin --}}
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                Onnutrive Admin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                {{-- Menú principal del panel --}}
                <!--<ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.planes.*') ? 'active' : '' }}" href="{{ route('admin.planes.index') }}">
                            Planes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.pasteleria.*') ? 'active' : '' }}" href="{{ route('admin.pasteleria.index') }}">
                            Pastelería
                        </a>
                    </li>
                    {{-- Aquí puedes añadir más enlaces en el futuro (ej. Usuarios, Pedidos) --}}
                </ul> -->

                {{-- Sección derecha con acciones de usuario --}}
                <div class="d-flex align-items-center">
                    <span class="navbar-text text-white me-3">
                        Hola, {{ Auth::user()->name }}
                    </span>
                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-outline-info me-2">
                        Mi Perfil
                    </a>
                    
                    {{-- Formulario de Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- ========================================================= --}}
    {{--          CONTENIDO PRINCIPAL DE LA PÁGINA DEL ADMIN       --}}
    {{-- ========================================================= --}}
    <main class="container py-4">
        {{-- Aquí se insertará el contenido de cada vista del admin --}}
        @yield('content')
    </main>

    <!-- Scripts de Bootstrap y otros globales -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Espacio para scripts específicos de cada página del admin -->
    @stack('scripts')
</body>
</html>