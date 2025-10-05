// public/js/planes-init.js

document.addEventListener('DOMContentLoaded', () => {

    // 1. Inicializar el carrusel de Swiper
    if (document.querySelector('.stackedCarousel')) {
        new Swiper('.stackedCarousel', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
        });
    }

    // 2. Lógica del modal (sigue siendo necesaria)
    const planModal = document.getElementById('planModal');
    if (planModal) {
        planModal.addEventListener('show.bs.modal', (event) => {
            const trigger = event.relatedTarget;
            const imageSrc = trigger.getAttribute('data-image-src');
            const wspLink = trigger.getAttribute('data-wsp-link');
            
            planModal.querySelector('#modalPlanImage').src = imageSrc;
            planModal.querySelector('#modalWspButton').href = wspLink;
        });
    }
});