{{-- resources/views/planes/planes.blade.php --}}

@extends('layout')

@section('title', 'Nuestros Planes')

{{-- Añadimos la hoja de estilos de Swiper.js solo en esta página --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold section-title">Elige el Plan Perfecto para Ti</h1>
            <p class="lead text-muted">Diseñados por nutricionistas para activar tu bienestar.</p>
        </div>
        
        <!-- Carrusel de Tarjetas Superpuestas -->
        <div class="swiper stackedCarousel">
            <div class="swiper-wrapper">
                {{-- Aquí iteramos sobre los planes que vienen del controlador --}}
                @foreach ($planes as $plan)
                    @php
                        // Construimos la URL de WhatsApp para cada plan
                        $wspLink = "https://wa.me/542645820093?text=Hola%20Onnutrive%2C%20quisiera%20consultar%20por%20el%20plan%20" . urlencode($plan['name']);
                        $imagePath = asset('storage/' . $plan['image']);
                    @endphp

                    <div class="swiper-slide" style="background-image: url('{{ $imagePath }}');">
                        <button class="view-details-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#planModal"
                                data-image-src="{{ $imagePath }}"
                                data-wsp-link="{{ $wspLink }}">
                            Ver Info
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal para ver el detalle del plan -->
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
                        <i class="bi bi-whatsapp"></i> Solicitar Información
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Empujamos los scripts de Swiper.js solo para esta página --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/planes-init.js') }}"></script>
@endpush