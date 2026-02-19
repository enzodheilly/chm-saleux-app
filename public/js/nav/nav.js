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
    const accordions = document.querySelectorAll('.mobile-accordion button');

    if(hamburger) {
        hamburger.addEventListener('click', () => {
            overlay.classList.toggle('open');
            // Change l'icône hamburger en croix si tu veux (optionnel)
        });
    }

    accordions.forEach(btn => {
        btn.addEventListener('click', () => {
            const content = btn.nextElementSibling;
            content.classList.toggle('open');
            // Change le + en - ou tourne la flèche
            const icon = btn.querySelector('i');
            if(content.classList.contains('open')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            } else {
                icon.classList.add('fa-plus');
                icon.classList.remove('fa-minus');
            }
        });
    });
});