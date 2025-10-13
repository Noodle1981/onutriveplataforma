 <footer class="footer">
            <div class="container py-5">
                <div class="row g-4 text-center text-lg-start">
                    <div class="col-lg-3 col-md-6">
                        <img src="./img/logobanner.png" alt="Onnutrive Logo Color" style="height: 48px;" class="mx-auto mx-lg-0">
                        <p class="mt-3 text-secondary">Alimentos que activan.</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="footer-title">Explorar</h4>
                        <ul class="footer-links">
                            <li><a href="#nosotros">Quiénes Somos</a></li>
                            <li><a href="#viandas">Servicios</a></li>
                            <li><a href="#planes">Planes</a></li>
                            <li>
                        @auth
                            {{-- Si el usuario YA está autenticado, el enlace lo lleva al dashboard --}}
                            <a href="{{ route('admin.dashboard') }}">Panel de Administración</a>
                        @else
                            {{-- Si es un invitado, el enlace lo lleva a la página de login --}}
                            <a href="{{ route('login') }}">Panel de Administración</a>
                        @endauth
                        </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="footer-title">Legal</h4>
                        <ul class="footer-links">
                            <li><a href="#">Términos y Condiciones</a></li>
                            <li><a href="#">Política de Privacidad</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="footer-title">Contacto</h4>
                        <ul class="footer-links">
                            <li><i class="bi bi-geo-alt-fill me-2"></i>Paula Albarracín 727 sur, San Juan</li>
                            <li><i class="bi bi-whatsapp me-2"></i>264 582 0093</li>
                        </ul>
                        <div class="mt-3">
                            <a href="#" class="social-icon me-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-top mt-5 pt-4 text-center text-secondary small">
                    <p>&copy; <span id="year"></span> Onnutrive. Todos los derechos reservados.</p>
                    <p class="mt-1">Desarrollado por Grupo Xamanen</p>
                </div>
            </div>
        </footer>

       