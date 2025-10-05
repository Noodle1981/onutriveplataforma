{{-- resources/views/pages/home/_features.blade.php (VERSIÓN RESTAURADA Y CORRECTA) --}}

<section id="features" class="py-5" style="background-color: var(--background-cream);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10"> {{-- Usamos col-lg-10 para limitar el ancho en pantallas grandes --}}

                {{-- Título de la sección --}}
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold section-title">Nuestros Productos</h2>
                </div>

                <!-- Tarjeta 1: Viandas -->
                <div class="feature-card-unified with-details animate-on-scroll">
                    <div class="feature-image-wrapper">
                        {{-- Usamos el helper asset() para la imagen --}}
                        <img src="{{ asset('img/patamuslo.png') }}" alt="Plato de vianda saludable">
                    </div>
                    <div class="feature-card-content">
                        <h2 class="feature-title">Viandas</h2>
                        <p class="feature-subtitle text-muted">Comida real, fresca y lista para disfrutar.</p>
                        <ul class="feature-list list-unstyled">
                            <li><i class="bi bi-basket2-fill"></i> Abundantes y saciantes</li>
                            <li><i class="bi bi-shield-check"></i> Bajas en sodio y harinas refinadas</li>
                            <li><i class="bi bi-fire"></i> Preparaciones al horno o hervidas</li>
                            <li><i class="bi bi-truck"></i> Directo a la puerta de tu casa</li>
                        </ul>
                    </div>
                </div>

                <!-- Tarjeta 2: Pastelería -->
                <div class="feature-card-unified feature-card-unified--reverse with-details animate-on-scroll">
                    <div class="feature-image-wrapper">
                        {{-- Usamos el helper asset() para la imagen --}}
                        <img src="{{ asset('img/pastel.png') }}" alt="Pastelería saludable">
                    </div>
                    <div class="feature-card-content">
                        <h2 class="feature-title">Pastelería</h2>
                        <p class="feature-subtitle text-muted">La energía que necesitás, de forma inteligente.</p>
                        <ul class="feature-list list-unstyled">
                            <li><i class="bi bi-lightning-charge-fill"></i> Energía para tus pausas activas</li>
                            <li><i class="bi bi-palette-fill"></i> Opciones dulces y saladas</li>
                            <li><i class="bi bi-tree-fill"></i> Ingredientes 100% naturales</li>
                            <li><i class="bi bi-bicycle"></i> Ideales para pre y post entreno</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>