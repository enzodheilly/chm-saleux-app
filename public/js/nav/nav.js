document.addEventListener('DOMContentLoaded', () => {
    // 1. Scroll Effect
    const navWrapper = document.querySelector('.nav-main-wrapper');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navWrapper.classList.add('scrolled');
        } else {
            navWrapper.classList.remove('scrolled');
        }
    });

    // 2. Mobile Menu
    const hamburger = document.getElementById('mobileMenuTrigger');
    const overlay = document.getElementById('mobileNavOverlay');
    const accordions = document.querySelectorAll('.mobile-accordion-btn');
    const mobileLinks = overlay ? overlay.querySelectorAll('a') : [];

    if (hamburger && overlay) {
        hamburger.addEventListener('click', () => {
            overlay.classList.toggle('open');
            hamburger.classList.toggle('is-active');
            document.body.classList.toggle('mobile-menu-open');
        });

        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                overlay.classList.remove('open');
                hamburger.classList.remove('is-active');
                document.body.classList.remove('mobile-menu-open');
            });
        });
    }

    // 3. Accordions
    accordions.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            const isOpen = content.classList.contains('open');

            accordions.forEach(otherBtn => {
                const otherContent = otherBtn.nextElementSibling;
                otherBtn.classList.remove('active');
                otherContent.classList.remove('open');

                const otherIcon = otherBtn.querySelector('i');
                if (otherIcon) {
                    otherIcon.classList.remove('fa-minus');
                    otherIcon.classList.add('fa-plus');
                }
            });

            if (!isOpen) {
                content.classList.add('open');
                btn.classList.add('active');

                const icon = btn.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            }
        });
    });
});