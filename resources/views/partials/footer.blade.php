{{-- resources/views/partials/footer.blade.php --}}

<footer class="bg-white border-top">
    <div class="container py-5">
        <div class="row gy-4 text-center text-lg-start">

            <!-- Columna 1: Logo e Info -->
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center align-items-lg-start">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/logobanner.png') }}" alt="Onnutrive Logo" style="height: 48px;" class="mb-3">
                </a>
                <p class="text-muted small">Alimentos que activan.</p>
            </div>

            <!-- Columna 2: Explorar -->
            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Explorar</h4>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ url('/nosotros') }}">Quiénes Somos</a></li>
                    <li><a href="{{ url('/servicios') }}">Servicios</a></li>
                    <li><a href="{{ url('/planes') }}">Planes</a></li>
                    <li><a href="{{ route('login') }}">Iniciar Sesión (Admin)</a></li>
                </ul>
            </div>

            <!-- Columna 3: Legal -->
            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Legal</h4>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ url('/terminos') }}">Términos y Condiciones</a></li>
                    <li><a href="{{ url('/privacidad') }}">Política de Privacidad</a></li>
                </ul>
            </div>

            <!-- Columna 4: Contacto y Redes Sociales -->
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center align-items-lg-start">
                <h4 class="footer-title">Contacto</h4>
                <ul class="list-unstyled text-muted">
                    <li class="d-flex align-items-center mb-2">
                        <i class="bi bi-geo-alt-fill text-success fs-5 me-2"></i>
                        <span>Paula Albarracín 727 sur, San Juan</span>
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="bi bi-whatsapp text-success fs-5 me-2"></i>
                        <span>264 582 0093</span>
                    </li>
                </ul>
                <div class="d-flex mt-3">
                    <a href="#" class="social-icon me-2" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Separador y Copyright -->
        <div class="mt-5 border-top pt-4 text-center text-muted small">
            <p>&copy; <span id="copyright-year"></span> Onnutrive. Todos los derechos reservados.</p>
            <p class="mt-1">Desarrollado por Grupo Xamanen</p>
        </div>
    </div>
</footer>