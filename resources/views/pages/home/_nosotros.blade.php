{{-- resources/views/pages/home/_nosotros.blade.php --}}
<section id="nosotros" class="py-5 bg-white">
    <div class="container my-4">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 animate-on-scroll">
                <img src="{{ asset('img/equipo.jpg') }}" alt="El equipo de Onnutrive" class="img-fluid rounded-4 shadow-lg w-100">
            </div>
            <div class="col-lg-6 animate-on-scroll" data-delay="100">
                <h2 class="section-title">Nuestro Equipo, Nuestra Pasión</h2>
                <p class="mt-4 fs-5 text-secondary">Somos una empresa dedicada a mejorar el bienestar a través de la alimentación. Cada plato es preparado con dedicación, combinando la ciencia de la nutrición con el arte de la buena cocina.</p>
                <div class="mt-4">
                    <a href="{{ url('/nosotros') }}" class="cta-button-secondary">Nuestra Historia</a>
                </div>
            </div>
        </div>
    </div>
</section>