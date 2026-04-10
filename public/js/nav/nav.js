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

    // 3) Subpages
    const subpages = overlay ? overlay.querySelectorAll('.mobile-subpage') : [];

    subpages.forEach(p => p.setAttribute('aria-hidden', 'true'));

    const closeSubpages = () => {
        if (!overlay) return;
        overlay.classList.remove('subpage-open');
        subpages.forEach(p => {
            p.classList.remove('open');
            p.setAttribute('aria-hidden', 'true');
        });
    };

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
        closeSubpages();
    };

    if (hamburger && overlay) {
        hamburger.addEventListener('click', () => {
            overlay.classList.contains('open') ? closeMobileMenu() : openMobileMenu();
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => closeMobileMenu());
        });

        overlay.addEventListener('click', (e) => {
            const trigger = e.target.closest('.mobile-subpage-trigger');
            if (trigger) {
                const targetSel = trigger.getAttribute('data-subpage');
                const target = targetSel ? overlay.querySelector(targetSel) : null;
                if (!target) return;

                overlay.classList.add('subpage-open');
                target.classList.add('open');
                target.removeAttribute('aria-hidden');

                const backBtn = target.querySelector('[data-subpage-back]');
                if (backBtn) backBtn.focus();
                return;
            }

            const back = e.target.closest('[data-subpage-back]');
            if (back) {
                closeSubpages();
                overlay.querySelector('.mobile-subpage-trigger')?.focus();
            }
        });
    }

    window.addEventListener('resize', () => {
        if (window.innerWidth > 992) closeMobileMenu();
    });

    // =========================================
    // 4) INFO BANNER CAROUSEL (mobile)
    // =========================================
    const carouselItems = document.querySelectorAll('.info-carousel-item');
    const prevBtn       = document.getElementById('infoPrev');
    const nextBtn       = document.getElementById('infoNext');

    if (carouselItems.length && prevBtn && nextBtn) {
        let current   = 0;
        let animating = false;

        // Active le premier item
        carouselItems[0].classList.add('is-active');

        const goTo = (next, direction) => {
            if (animating || next === current) return;
            animating = true;

            const leaveClass = direction === 'next' ? 'is-leaving-left' : 'is-leaving-right';

            // Sort l'item actuel
            carouselItems[current].classList.remove('is-active');
            carouselItems[current].classList.add(leaveClass);

            // Prépare le nouvel item hors écran sans transition
            carouselItems[next].style.transform  = direction === 'next' ? 'translateX(20px)' : 'translateX(-20px)';
            carouselItems[next].style.opacity    = '0';
            carouselItems[next].style.transition = 'none';
            carouselItems[next].classList.add('is-active');

            // Déclenche l'animation d'entrée au prochain frame
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    carouselItems[next].style.transform  = '';
                    carouselItems[next].style.opacity    = '';
                    carouselItems[next].style.transition = '';
                });
            });

            // Nettoie après l'animation
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