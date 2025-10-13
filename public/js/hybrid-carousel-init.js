document.addEventListener('DOMContentLoaded', function() {

    // CAMBIO: Leemos los datos de una variable global genérica 'carouselData'
    const carouselData = window.carouselData || [];

    // --- Elementos del DOM ---
    const carouselTopEl = document.querySelector('.hybridCarouselTop');
    const carouselThumbsEl = document.querySelector('.hybridCarouselThumbs');
    const planModalEl = document.getElementById('planModal');

    // Si no existen los elementos del carrusel o el modal en la página, no hacemos nada.
    if (!carouselTopEl || !carouselThumbsEl || !planModalEl) {
        return;
    }

    // --- INICIALIZACIÓN DE MODAL ---
    const planModal = new bootstrap.Modal(planModalEl);
    const modalImage = document.getElementById('modalPlanImage');
    const modalButton = document.getElementById('modalWspButton');

    // CAMBIO: Función genérica para abrir el modal
    function openModal(item) {
        modalImage.src = item.img;
        modalButton.href = item.wsp;
        // ¡NUEVO! Guardamos el nombre del item en el botón para el tracking
        modalButton.dataset.itemName = item.nombre;
        planModal.show();
    }
    
    // ¡NUEVO! Lógica para registrar el clic en el botón de WhatsApp
    modalButton.addEventListener('click', function() {
        const itemName = this.dataset.itemName || 'desconocido';
        // Creamos un identificador único para el clic
        const identifier = `whatsapp_cta_${itemName.replace(/\s+/g, '_').toLowerCase()}`;

        // Preparamos los datos para enviar al servidor
        const data = { identifier: identifier };

        // Usamos fetch para enviar una petición POST a nuestra API en segundo plano
        fetch('/track-click', { // Usamos la URL estática que definimos en web.php
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                // Obtenemos el token de seguridad CSRF de la etiqueta meta en el <head>
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) console.error('Error en la respuesta del tracking');
            return response.json();
        })
        .then(data => console.log('Click rastreado:', data.status))
        .catch(error => console.error('Error al rastrear el clic:', error));
        
        // La navegación al link de WhatsApp continuará normalmente
    });

    // --- Llenar los carruseles con los datos ---
    const hybridWrapperTop = carouselTopEl.querySelector('.swiper-wrapper');
    const hybridWrapperThumbs = carouselThumbsEl.querySelector('.swiper-wrapper');

    carouselData.forEach(item => {
        // Crear slide para carrusel principal
        const topSlide = document.createElement('div');
        topSlide.className = 'swiper-slide';
        topSlide.innerHTML = `<img src="${item.img}" alt="${item.nombre}">`;
        topSlide.addEventListener('click', () => {
            if (topSlide.classList.contains('swiper-slide-active')) {
                openModal(item);
            }
        });
        hybridWrapperTop.appendChild(topSlide);

        // Crear slide para carrusel de miniaturas
        const thumbSlide = document.createElement('div');
        thumbSlide.className = 'swiper-slide';
        thumbSlide.innerHTML = `<img src="${item.img}" alt="Miniatura ${item.nombre}">`;
        hybridWrapperThumbs.appendChild(thumbSlide);
    });

    // --- Inicialización de Swiper.js ---
    const hybridThumbs = new Swiper(carouselThumbsEl, {
        spaceBetween: 15,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        grid: { rows: 2, fill: 'row' },
        breakpoints: { 576: { slidesPerView: 5 }, 768: { slidesPerView: 6 }, 992: { slidesPerView: 7 }, 1200: { slidesPerView: 8 } }
    });
    
    new Swiper(carouselTopEl, {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: { rotate: 50, stretch: 0, depth: 100, modifier: 1, slideShadows: true },
        thumbs: { swiper: hybridThumbs },
    });
});