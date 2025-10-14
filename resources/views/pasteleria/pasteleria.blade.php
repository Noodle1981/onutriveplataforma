@extends('layout') 

@section('title', 'Nuestros Planes')

{{-- Añadimos la hoja de estilos de Swiper.js solo en esta página --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@section('content')

<div class="container">
    <div class="container py-5" id="planesSection">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Nuestros Pasteles</h1>
            <p class="lead text-muted">Selecciona un pastel de la galería para ver los detalles.</p>
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
                    <h5 class="modal-title">Detalle del Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalPlanImage" src="" class="img-fluid rounded" alt="Imagen del plan">
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
    window.carouselData = @json($pasteles->map(fn($pastel) => [
        'id' => $pastel->id,
        'nombre' => $pastel->name,
        'img' => asset('storage/' . $pastel->image_path),
        'wsp' => 'https://wa.me/...' . urlencode($pastel->name), // No olvides el wsp
    ]));
    // El 'type' debe ser el nombre exacto del Modelo, con mayúscula inicial
    window.carouselType = 'Pasteleria'; 
</script>

    <script src="{{ asset('js/hybrid-carousel-init.js') }}"></script>
@endpush