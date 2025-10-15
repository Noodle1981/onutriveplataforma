// resources/js/app.js

import './bootstrap';
import 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    /**
     * 1. MANEJO DEL NAVBAR AL HACER SCROLL
     * Añade la clase 'navbar-scrolled' cuando el usuario baja en la página.
     */
    const setupNavbarScroll = () => {
        const navbar = document.querySelector(".navbar-glass");
        if (!navbar) return; // Si no hay navbar con esta clase, no hacemos nada.

        const handleScroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }
        };

        handleScroll();
        window.addEventListener("scroll", handleScroll);
    };

    /**
     * 2. MANEJO DE ANIMACIONES AL HACER SCROLL
     * Añade la clase 'is-visible' a los elementos con 'animate-on-scroll' cuando entran en la pantalla.
     */
    const setupScrollAnimations = () => {
        const elementsToAnimate = document.querySelectorAll(".animate-on-scroll");
        if (elementsToAnimate.length === 0) return;

        const scrollObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const delay = parseInt(entry.target.dataset.delay) || 0;
                        setTimeout(() => {
                            entry.target.classList.add("is-visible");
                        }, delay);
                        observer.unobserve(entry.target);
                    }
                });
            },
            { rootMargin: "0px 0px -100px 0px" }
        );

        elementsToAnimate.forEach((el) => scrollObserver.observe(el));
    };

    /**
     * 3. ACTUALIZAR EL AÑO DEL COPYRIGHT EN EL FOOTER
     * Busca un elemento con id="copyright-year" y le pone el año actual.
     */
    const setCopyrightYear = () => {
        const yearSpan = document.getElementById("copyright-year");
        if (yearSpan) { // Comprobación de seguridad: solo se ejecuta si el elemento existe
            yearSpan.textContent = new Date().getFullYear();
        }
        
        // Comprobación para el otro ID que tenías
        const yearSpanAlt = document.getElementById("year");
        if (yearSpanAlt) {
            yearSpanAlt.textContent = new Date().getFullYear();
        }
    };
    
    /**
     * 4. CIERRE DEL MENÚ MÓVIL AL HACER CLIC EN UN ENLACE
     * (Esta es la lógica que añadimos antes)
     */
    const setupMobileMenuClose = () => {
        const navLinks = document.querySelectorAll('#navbarNav .nav-link');
        const navCollapse = document.querySelector('#navbarNav.collapse');
        if (navLinks.length > 0 && navCollapse) {
            const bsCollapse = new bootstrap.Collapse(navCollapse, { toggle: false });
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                   if (navCollapse.classList.contains('show')) {
                       bsCollapse.hide();
                   }
                });
            });
        }
    };


    // --- EJECUCIÓN DE TODAS LAS FUNCIONES ---
    setupNavbarScroll();
    setupScrollAnimations();
    setCopyrightYear();
    setupMobileMenuClose();
    
});