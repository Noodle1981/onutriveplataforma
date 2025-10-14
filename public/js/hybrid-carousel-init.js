document.addEventListener('DOMContentLoaded', function() {

    // 1. LEER DATOS GLOBALES
    // Leemos los datos que pasamos desde Blade (el array de items y el tipo de modelo)
    const carouselData = window.carouselData || [];
    const carouselType = window.carouselType || 'desconocido';

    // 2. BUSCAR ELEMENTOS EN LA PÁGINA
    const carouselTopEl = document.querySelector('.hybridCarouselTop');
    const carouselThumbsEl = document.querySelector('.hybridCarouselThumbs');
    const planModalEl = document.getElementById('planModal');

    // Si no estamos en una página con carrusel, no hacemos nada más.
    if (!carouselTopEl || !carouselThumbsEl || !planModalEl) {
        return; 
    }

    // 3. PREPARAR EL MODAL
    const planModal = new bootstrap.Modal(planModalEl);
    const modalImage = document.getElementById('modalPlanImage');
    const modalButton = document.getElementById('modalWspButton');

    // Función que abre el modal y guarda los datos del item en el botón
    function openModal(item) {
        modalImage.src = item.img;
        modalButton.href = item.wsp;
        modalButton.dataset.itemId = item.id; // Guardamos el ID para el tracking
        modalButton.dataset.itemName = item.nombre;
        planModal.show();
    }
    
    // 4. AÑADIR LA LÓGICA DE TRACKING DE CLICS
    modalButton.addEventListener('click', function() {
        const itemId = this.dataset.itemId;
        
        if (!itemId || carouselType === 'desconocido') {
            console.error('No se pudo rastrear el clic: falta ID o tipo.');
            return;
        }

        const data = {
            id: itemId,
            type: carouselType
        };

        // Enviamos la petición a nuestra API de Laravel
        fetch('/track-click', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                console.error('Error en la respuesta del servidor al rastrear el clic.');
            }
            return response.json();
        })
        .then(data => {
            console.log('Click rastreado con éxito:', data.status);
        })
        .catch(error => {
            console.error('Hubo un error en la petición fetch para rastrear el clic:', error);
        });
    });

    // 5. LLENAR LOS CARRUSELES CON LOS DATOS
    const hybridWrapperTop = carouselTopEl.querySelector('.swiper-wrapper');
    const hybridWrapperThumbs = carouselThumbsEl.querySelector('.swiper-wrapper');

    carouselData.forEach(item => {
        const topSlide = document.createElement('div');
        topSlide.className = 'swiper-slide';
        topSlide.innerHTML = `<img src="${item.img}" alt="${item.nombre}">`;
        topSlide.addEventListener('click', () => {
            if (topSlide.classList.contains('swiper-slide-active')) {
                openModal(item);
            }
        });
        hybridWrapperTop.appendChild(topSlide);

        const thumbSlide = document.createElement('div');
        thumbSlide.className = 'swiper-slide';
        thumbSlide.innerHTML = `<img src="${item.img}" alt="Miniatura ${item.nombre}">`;
        hybridWrapperThumbs.appendChild(thumbSlide);
    });

    // 6. INICIALIZAR SWIPER.JS
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