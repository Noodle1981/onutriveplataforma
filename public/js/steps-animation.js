// public/js/steps-animation.js

document.addEventListener('DOMContentLoaded', () => {
    const textBlocks = document.querySelectorAll('.step-text-block');
    const images = document.querySelectorAll('.step-image');
    const svgPath = document.querySelector('.svg-path path');

    if (!textBlocks.length || !images.length || !svgPath) {
        return; // No hacer nada si los elementos no existen
    }

    // Obtenemos la longitud total de la línea SVG para la animación
    const pathLength = svgPath.getTotalLength();
    svgPath.style.strokeDasharray = pathLength;
    svgPath.style.strokeDashoffset = pathLength;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const currentStep = entry.target.dataset.step;

                    // Activar la imagen correspondiente
                    images.forEach((img) => {
                        img.classList.toggle('is-active', img.dataset.step === currentStep);
                    });
                    
                    // Animar la línea SVG
                    let progress = 0;
                    if (currentStep === '1') {
                        progress = 0;
                    } else if (currentStep === '2') {
                        progress = 0.5;
                    } else if (currentStep === '3') {
                        progress = 1;
                    }
                    svgPath.style.strokeDashoffset = pathLength * (1 - progress);
                }
            });
        },
        {
            root: null, // Observa la intersección con el viewport
            rootMargin: '-50% 0px -50% 0px', // Activa cuando el elemento está en el centro vertical
            threshold: 0,
        }
    );

    textBlocks.forEach((block) => {
        observer.observe(block);
    });
});