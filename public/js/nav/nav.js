document.addEventListener('DOMContentLoaded', () => {

    // =========================================
    // 1) SCROLL EFFECT
    // =========================================
    const navWrapper = document.querySelector('.nav-main-wrapper');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) navWrapper?.classList.add('scrolled');
        else navWrapper?.classList.remove('scrolled');
    });

    // =========================================
    // 2) MOBILE MENU
    // =========================================
    const hamburger   = document.getElementById('mobileMenuTrigger');
    const overlay     = document.getElementById('mobileNavOverlay');
    const mobileLinks = overlay ? overlay.querySelectorAll('a') : [];

    let savedScrollY = 0;

    const openMobileMenu = () => {
        if (!overlay || !hamburger) return;
        savedScrollY = window.scrollY;
        document.body.style.top = `-${savedScrollY}px`;
        document.body.classList.add('mobile-menu-open');
        document.documentElement.classList.add('mobile-menu-open');
        overlay.classList.add('open');
        hamburger.classList.add('is-active');
    };

    const closeMobileMenu = () => {
        if (!overlay || !hamburger) return;
        document.body.classList.remove('mobile-menu-open');
        document.documentElement.classList.remove('mobile-menu-open');
        document.body.style.top = '';
        window.scrollTo(0, savedScrollY);
        overlay.classList.remove('open');
        hamburger.classList.remove('is-active');
    };

    if (hamburger && overlay) {
        hamburger.addEventListener('click', () => {
            overlay.classList.contains('open') ? closeMobileMenu() : openMobileMenu();
        });

        // Accordéon
        const accordionTriggers = overlay.querySelectorAll('.mobile-accordion-trigger');
        accordionTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                const content = trigger.nextElementSibling;
                const isOpen  = trigger.classList.contains('is-open');

                // Ferme tous les autres
                accordionTriggers.forEach(t => {
                    t.classList.remove('is-open');
                    t.nextElementSibling.classList.remove('is-open');
                });

                // Toggle celui-ci
                if (!isOpen) {
                    trigger.classList.add('is-open');
                    content.classList.add('is-open');
                }
            });
        });

        // Ferme le menu sur clic d'un lien
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => closeMobileMenu());
        });
    }

    window.addEventListener('resize', () => {
        if (window.innerWidth > 992) closeMobileMenu();
    });

    // =========================================
    // 3) INFO BANNER CAROUSEL (mobile)
    // =========================================
    const carouselItems = document.querySelectorAll('.info-carousel-item');
    const prevBtn       = document.getElementById('infoPrev');
    const nextBtn       = document.getElementById('infoNext');

    if (carouselItems.length && prevBtn && nextBtn) {
        let current   = 0;
        let animating = false;

        carouselItems[0].classList.add('is-active');

        const goTo = (next, direction) => {
            if (animating || next === current) return;
            animating = true;

            const leaveClass = direction === 'next' ? 'is-leaving-left' : 'is-leaving-right';

            carouselItems[current].classList.remove('is-active');
            carouselItems[current].classList.add(leaveClass);

            carouselItems[next].style.transform  = direction === 'next' ? 'translateX(20px)' : 'translateX(-20px)';
            carouselItems[next].style.opacity    = '0';
            carouselItems[next].style.transition = 'none';
            carouselItems[next].classList.add('is-active');

            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    carouselItems[next].style.transform  = '';
                    carouselItems[next].style.opacity    = '';
                    carouselItems[next].style.transition = '';
                });
            });

            setTimeout(() => {
                carouselItems[current].classList.remove(leaveClass);
                current   = next;
                animating = false;
            }, 250);
        };

        nextBtn.addEventListener('click', () => {
            goTo((current + 1) % carouselItems.length, 'next');
        });

        prevBtn.addEventListener('click', () => {
            goTo((current - 1 + carouselItems.length) % carouselItems.length, 'prev');
        });
    }

});