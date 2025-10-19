document.addEventListener('DOMContentLoaded', function() {
    // Fonction utilitaire pour récupérer un élément en toute sécurité
    function getElement(id) {
        const element = document.getElementById(id);
        if (!element) {
            console.warn(`Element with id '${id}' not found`);
            return null;
        }
        return element;
    }

    // Menu mobile
    const initMobileMenu = () => {
        const mobileMenuBtn = getElement('mobile-menu-btn');
        const mobileMenu = getElement('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenuBtn.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });

            // Fermer le menu mobile quand on clique sur un lien
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenuBtn.classList.remove('active');
                    mobileMenu.classList.remove('active');
                });
            });
        }
    };

    // Défilement fluide
    const initSmoothScroll = () => {
        const smoothScrollAnchors = document.querySelectorAll('a[href^="#"]:not([href="#"])');
        if (smoothScrollAnchors) {
            smoothScrollAnchors.forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
    };

    // Animations au défilement
    const initScrollAnimations = () => {
        const animatedElements = document.querySelectorAll('[data-animation]');
        if (animatedElements.length > 0) {
            const checkScroll = () => {
                animatedElements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    if (elementTop < windowHeight * 0.8) {
                        element.classList.add('animate');
                    }
                });
            };

            window.addEventListener('scroll', checkScroll);
            checkScroll(); // Vérifier au chargement initial
        }
    };

    // Initialiser toutes les fonctionnalités
    try {
        initMobileMenu();
        initSmoothScroll();
        initScrollAnimations();
    } catch (error) {
        console.error('Error initializing features:', error);
    }
});
