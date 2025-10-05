{{-- resources/views/pages/home/_hero.blade.php --}}
<main class="hero-video-background position-relative vh-100 d-flex align-items-center justify-content-center text-center overflow-hidden">
    <video playsinline autoplay muted loop poster="{{ asset('img/poster.jpg') }}" id="bgvideo">
        <source src="{{ asset('video/videos2.mp4') }}" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video>
    <div class="hero-overlay"></div>
</main>