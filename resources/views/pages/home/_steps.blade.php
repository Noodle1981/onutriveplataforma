{{-- resources/views/pages/home/_steps.blade.php --}}

<section id="steps" class="py-5 bg-light">
    <div class="container">
        <!-- Título de la Sección -->
        <div class="text-center mb-5">
            <h2 class="section-title">Tu Comida Saludable en 3 Simples Pasos</h2>
            <p class="lead text-muted">Pedir nunca fue tan fácil y delicioso.</p>
        </div>

        <div class="row gy-4">

            <!-- PASO 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100 step-card">
                    <div class="step-number">01</div>
                    <img src="{{ asset('img/steps/step1.png') }}" class="card-img-top p-4" alt="Paso 1: Contacta y Descubre">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Contacta y Descubre</h4>
                        <p class="card-text text-muted">Envíanos un mensaje por WhatsApp. Nuestro equipo te atenderá al instante para mostrarte las delicias del día.</p>
                    </div>
                </div>
            </div>

            <!-- PASO 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100 step-card">
                    <div class="step-number">02</div>
                    <img src="{{ asset('img/steps/step2.png') }}" class="card-img-top p-4" alt="Paso 2: Elige tu Menú">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Elige tu Menú</h4>
                        <p class="card-text text-muted">Revisa nuestro menú semanal lleno de opciones frescas y equilibradas. Elige los platos que más te gusten.</p>
                    </div>
                </div>
            </div>

            <!-- PASO 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100 step-card">
                    <div class="step-number">03</div>
                    <img src="{{ asset('img/steps/step3.png') }}" class="card-img-top p-4" alt="Paso 3: Recíbelo en Casa">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Recíbelo en Casa</h4>
                        <p class="card-text text-muted">Coordinamos la entrega para que recibas tus viandas frescas y listas para disfrutar en la comodidad de tu hogar.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>