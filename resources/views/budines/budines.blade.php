@extends('layout') 

@section('title', 'Nuestros Budines')

{{-- Añadimos la hoja de estilos de Swiper.js solo en esta página --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@section('content')



<div class="container">
    <div class="container py-5" id="planesSection">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Nuestros Budines</h1>
            <p class="lead text-muted">Selecciona un budin de la galería para ver los detalles.</p>
        </div>
        
        <div class="hybrid-container">
            <!-- Swiper principal con efecto coverflow -->
            <div class="swiper hybridCarouselTop">
                <div class="swiper-wrapper"></div>
            </div>
            <!-- Swiper para las miniaturas de navegación -->
            <div class="swiper hybridCarouselThumbs">
                <div class="swiper-wrapper"></div>
            </div>
        </div>
    </div>
</div>

    <!-- ===== MODAL ÚNICO Y REUTILIZABLE ===== -->
    <div class="modal fade" id="planModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- CAMBIO: El título ahora será dinámico --}}
                <h5 class="modal-title" id="modalPlanTitle">Detalle del Budin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalPlanImage" src="" class="img-fluid rounded mb-3" alt="Imagen del budin">
                {{-- ¡AÑADIDO! Un párrafo para mostrar la descripción --}}
                <p id="modalPlanDescription" class="text-muted"></p>
            </div>
            <div class="modal-footer">
                <a id="modalWspButton" href="" target="_blank" class="btn btn-wsp-modal w-100">
                    <i class="bi bi-whatsapp"></i> Solicitar Info
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Dependencias --}}
    {{-- AÑADIDO: Carga del JS de Bootstrap. Debe ir antes de hybrid-carousel-init.js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // La lógica compleja ya no está aquí.
        // Simplemente convertimos la variable que ya viene preparada del controlador.
        // Blade no tendrá ningún problema en analizar esto.
        window.carouselData = @json($budines);

        // Define el tipo de modelo
        window.carouselType = 'Budin';
    </script>

    {{-- Carga el script que usará los datos --}}
    <script src="{{ asset('js/hybrid-carousel-init.js') }}"></script>
@endpush