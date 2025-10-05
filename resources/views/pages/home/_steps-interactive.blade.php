{{-- resources/views/pages/home/_steps-interactive.blade.php --}}

<section id="interactive-steps" class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <!-- Título de la Sección -->
        <div class="text-center mb-5">
            <h2 class="section-title">Tu Onnutrive en la mesa</h2>
            <p class="lead text-muted">en 3 simples pasos</p>
        </div>

        <div class="row">
            <!-- Columna Izquierda: El Texto que se Scrollea -->
            <div class="col-md-5">
                <div class="steps-timeline">
                    {{-- Bloque de texto para el Paso 1 --}}
                    <div class="step-text-block" data-step="1">
                        <h3>Mmmm... ¿cuál me gusta más?</h3>
                        <p class="text-muted">Contacta con nosotros por WhatsApp y descubre un mundo de sabores. Hecho en casa, Fit o Veggie, tenemos la opción perfecta esperándote.</p>
                    </div>

                    {{-- Bloque de texto para el Paso 2 --}}
                    <div class="step-text-block" data-step="2">
                        <h3>Voy haciendo mi pedido...</h3>
                        <p class="text-muted">Elige tus platos favoritos desde nuestro menú digital. Arma tu pack semanal y aprovecha descuentos exclusivos.</p>
                    </div>

                    {{-- Bloque de texto para el Paso 3 --}}
                    <div class="step-text-block" data-step="3">
                        <h3>¡A comer!</h3>
                        <p class="text-muted">Te llega a la puerta de tu casa, en un packaging premium, lista para que puedas calentar y disfrutar de una comida deliciosa y saludable.</p>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Las Imágenes que se quedan Fijas -->
            <div class="col-md-7">
                <div class="steps-visuals">
                    {{-- La línea SVG que se "dibuja" --}}
                    <svg class="svg-path" viewBox="0 0 100 300" preserveAspectRatio="none">
                        <path d="M 50,0 C 50,50 80,80 50,150 S 20,220 50,300" stroke-width="2" fill="none" />
                    </svg>

                    {{-- Las imágenes, una por cada paso --}}
                    <div class="step-image" data-step="1">
                        <img src="{{ asset('img/steps/stepA.png') }}" alt="Plato de vianda Onnutrive">
                    </div>
                    <div class="step-image" data-step="2">
                        <img src="{{ asset('img/steps/stepB.png') }}" alt="Persona pidiendo desde el celular">
                    </div>
                    <div class="step-image" data-step="3">
                        <img src="{{ asset('img/steps/stepC.png') }}" alt="Bolsa de viandas Onnutrive">
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Final -->
        <div class="text-center mt-5 pt-5">
            <h3 class="fw-bold">¿Ya te antojaste?</h3>
            <p class="text-muted">Entra a nuestro menú para elegir tu próxima comida.</p>
            <a href="#contacto" class="btn btn-primary btn-lg mt-3">Quiero mi Vianda</a>
        </div>
    </div>
</section>

{{-- Incluimos el script de animación solo cuando se usa esta sección --}}
@push('scripts')
    <script src="{{ asset('js/steps-animation.js') }}"></script>
@endpush