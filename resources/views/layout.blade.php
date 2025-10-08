{{-- resources/views/layout.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Título dinámico. Por defecto será 'Nutrive' --}}
    <title>@yield('title', 'Nutrive') - Comida Saludable</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Tu hoja de estilos personalizada (compilada o directa) -->
    {{-- Laravel recomienda usar Vite, pero para simplicidad, apuntamos a un archivo en /public/css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

</head>

<body>

    {{-- Incluimos el Navbar en todas las páginas --}}
    @include('partials.navbar')

    {{-- El contenido principal de cada página se insertará aquí --}}
    <main>
        @yield('content')
    </main>

    {{-- Incluimos el Footer en todas las páginas --}}
    @include('partials.footer')

    {{-- ========================================================= --}}
    {{--                INICIO DE LA ADAPTACIÓN                  --}}
    {{-- ========================================================= --}}

    {{-- 1. Añade el script de Bootstrap ANTES de @stack('scripts') --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    {{-- 2. Tu @stack para los scripts de página se mantiene igual --}}
    @stack('scripts')

    {{-- ========================================================= --}}
    {{--                  FIN DE LA ADAPTACIÓN                   --}}
    {{-- ========================================================= --}}
</body>
</html>