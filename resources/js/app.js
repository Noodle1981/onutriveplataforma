import './bootstrap';
import 'bootstrap';


// js/app.js

document.addEventListener('DOMContentLoaded', () => {

    /**
     * Función para cambiar la clase del navbar al hacer scroll.
     * Añade la clase 'navbar-scrolled' cuando el usuario baja en la página,
     * permitiendo que el CSS aplique diferentes estilos (ej. fondo sólido).
     */
    const setupNavbarScroll = () => {
        const navbar = document.querySelector('.navbar-glass');
        // Si no existe el navbar en la página, no hagas nada.
        if (!navbar) return;

        const handleScroll = () => {
            // Comprueba si la posición vertical del scroll es mayor a 50 píxeles
            if (window.scrollY > 50) {
                // Si hemos bajado, añade la clase
                navbar.classList.add('navbar-scrolled');
            } else {
                // Si estamos arriba, quita la clase
                navbar.classList.remove('navbar-scrolled');
            }
        };

        // Ejecuta la función una vez al cargar por si la página ya está scrolleada
        handleScroll();
        // Escucha el evento de scroll en toda la ventana
        window.addEventListener('scroll', handleScroll);
    
    };

    /**
     * Función para actualizar el año en el pie de página automáticamente.
     */
        const setCopyrightYear = () => {
        const yearSpan = document.getElementById('copyright-year');
        if (yearSpan) {
            yearSpan.textContent = new Date().getFullYear();
        }
    };

    const setupScrollAnimations = () => {
        const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
        if (elementsToAnimate.length === 0) return;

        const scrollObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Obtiene el delay del atributo data-delay, si existe
                    const delay = parseInt(entry.target.dataset.delay) || 0;
                    setTimeout(() => {
                        entry.target.classList.add('is-visible');
                    }, delay);
                    // Deja de observar el elemento una vez animado para mejorar el rendimiento
                    observer.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '0px 0px -100px 0px' // Activa la animación un poco antes de que llegue al borde
        });

        elementsToAnimate.forEach(el => scrollObserver.observe(el));
    };


    // Llama a la función para activar el comportamiento de scroll del navbar
    setupNavbarScroll();
    setCopyrightYear();
    setupScrollAnimations();

   });