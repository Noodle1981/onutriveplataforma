// public/js/planes-init.js

document.addEventListener('DOMContentLoaded', function() {

    // Los datos de los planes ahora se pasan desde la vista a una variable global `window.planData`
    const planData = window.planData || []; // Aseguramos que planData exista

    // --- INICIALIZACIÓN DE MODAL ---
    const planModal = new bootstrap.Modal(document.getElementById('planModal'));
    const modalImage = document.getElementById('modalPlanImage');
    const modalButton = document.getElementById('modalWspButton');

    function openModal(plan) {
        modalImage.src = plan.img;
        modalButton.href = plan.wsp;
        planModal.show();
    }
    
    // --- Llenar los carruseles con los datos de los planes ---
    const hybridWrapperTop = document.querySelector('.hybridCarouselTop .swiper-wrapper');
    const hybridWrapperThumbs = document.querySelector('.hybridCarouselThumbs .swiper-wrapper');

    planData.forEach(plan => {
        // Crear slide para carrusel principal
        const topSlide = document.createElement('div');
        topSlide.className = 'swiper-slide';
        topSlide.innerHTML = `<img src="${plan.img}" alt="${plan.nombre}">`;
        topSlide.addEventListener('click', () => {
            // Solo abre el modal si el slide es el activo
            if (topSlide.classList.contains('swiper-slide-active')) {
                openModal(plan);
            }
        });
        hybridWrapperTop.appendChild(topSlide);

        // Crear slide para carrusel de miniaturas
        const thumbSlide = document.createElement('div');
        thumbSlide.className = 'swiper-slide';
        thumbSlide.innerHTML = `<img src="${plan.img}" alt="Miniatura ${plan.nombre}">`;
        hybridWrapperThumbs.appendChild(thumbSlide);
    });

    // Inicializar Swiper de miniaturas PRIMERO
    const hybridThumbs = new Swiper(".hybridCarouselThumbs", {
        spaceBetween: 15,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        grid: {
            rows: 2,
            fill: 'row',
        },
        breakpoints: {
            576: { slidesPerView: 5 },
            768: { slidesPerView: 6 },
            992: { slidesPerView: 7 },
            1200: { slidesPerView: 8 },
        }
    });
    
    // Inicializar Swiper principal y vincularlo con las miniaturas
    new Swiper(".hybridCarouselTop", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        thumbs: {
            swiper: hybridThumbs,
        },
    });
});