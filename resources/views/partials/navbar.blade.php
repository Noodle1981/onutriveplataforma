<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid" style="max-width: 1140px;">
            <a class="navbar-brand" href="#">
                <img id="nav-logo" src="./img/logobanner.png" alt="Onnutrive Logo" style="height: 48px; transition: all 0.3s ease;">
            </a>
            <button id="mobile-menu-button" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i id="mobile-menu-icon" class="bi bi-list text-white fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item"><a class="nav-link mx-3" href="{{ route('home') }}#viandas">Viandas</a></li>
                    <li class="nav-item"><a class="nav-link mx-3" href="{{ route('home') }}#pasteleria">Pastelería</a></li>
                    <li class="nav-item"><a class="nav-link mx-3" href="{{ route('home') }}#planes">Planes</a></li>
                    <li class="nav-item"><a class="nav-link mx-3" href="{{ route('home') }}#nosotros">Sobre Nosotros</a></li>
                </ul>
                <div class="d-none d-lg-block">
                    <a href="#contacto" class="cta-button">Pedir Ahora</a>
                </div>
                 <div class="d-lg-none text-center pt-3">
                    <a href="#contacto" class="cta-button">Pedir Ahora</a>
                </div>

                @auth
                    {{-- Menú Desplegable para Usuario Autenticado (Bootstrap) --}}
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Mi Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                {{-- Formulario para Cerrar Sesión --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        Cerrar Sesión
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    {{-- Botón para Invitados (tu código original se mantiene) --}}
                    <div class="d-none d-lg-block">
                        <a href="#contacto" class="cta-button">Pedir Ahora</a>
                    </div>
                     <div class="d-lg-none text-center pt-3">
                        <a href="#contacto" class="cta-button">Pedir Ahora</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

{{-- NAVEGACIÓN --}}