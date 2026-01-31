document.addEventListener("DOMContentLoaded", () => {
    const link = document.getElementById("club-hover-link");
    const panel = document.getElementById("club-panel");

    if (!link || !panel) return;

    let closeTimeout;

    const openPanel = () => {
        clearTimeout(closeTimeout);
        panel.classList.add("show");
        link.classList.add("active"); // ⚡ flèche rotate
    };

    const closePanel = () => {
        closeTimeout = setTimeout(() => {
            panel.classList.remove("show");
            link.classList.remove("active"); // ⚡ flèche revient à l'état normal
        }, 0); // délai court pour UX fluide
    };

    // Survol lien → ouvrir
    link.addEventListener("mouseenter", openPanel);
    // Sortie lien → initie la fermeture si on n'est pas dans le panneau
    link.addEventListener("mouseleave", closePanel);

    // Survol panneau → garder ouvert
    panel.addEventListener("mouseenter", openPanel);
    // Sortie panneau → initie la fermeture
    panel.addEventListener("mouseleave", closePanel);
});


document.addEventListener('DOMContentLoaded', () => {
    
    // =========================================
    // 1. HAMBURGER MENU
    // =========================================
    const hamburger = document.querySelector('.hamburger-menu');
    const overlay = document.querySelector('.mobile-nav-overlay');
    
    if (hamburger && overlay) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            overlay.classList.toggle('open');
            document.body.classList.toggle('no-scroll');
        });
    }

    // =========================================
    // 2. INFO BANNER SLIDER (Mobile)
    // =========================================
    // On sélectionne les éléments avec les classes définies dans le HTML
    const slides = document.querySelectorAll('.info-slide');
    const prevBtn = document.querySelector('.mobile-info-prev');
    const nextBtn = document.querySelector('.mobile-info-next');
    
    // On vérifie que les éléments existent pour éviter les erreurs JS sur PC
    if (slides.length > 0 && prevBtn && nextBtn) {
        let currentIndex = 0;

        // Fonction pour changer de slide
        function showSlide(index) {
            // On retire la classe 'active' de tout le monde
            slides.forEach(slide => {
                slide.classList.remove('active');
            });
            
            // On ajoute la classe 'active' uniquement à l'élément courant
            // Le CSS se charge de l'animation (fadeInSlide)
            slides[index].classList.add('active');
        }

        // Clic sur "Suivant"
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault(); // Empêche le scroll ou comportement par défaut
            // Calcul mathématique pour boucler (0 -> 1 -> 2 -> 0)
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        });

        // Clic sur "Précédent"
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            // Calcul pour boucler en arrière (0 -> 2 -> 1 -> 0)
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        });
    }
});

// =========================================
    // 3. MOBILE DROPDOWN (ACCORDION)
    // =========================================
    const dropdownTrigger = document.querySelector('.mobile-dropdown-trigger');
    const dropdownContent = document.querySelector('.mobile-dropdown-content');

    if (dropdownTrigger && dropdownContent) {
        dropdownTrigger.addEventListener('click', () => {
            // 1. On fait tourner la flèche
            dropdownTrigger.classList.toggle('active');
            
            // 2. On affiche/cache le contenu
            dropdownContent.classList.toggle('open');
        });
    }