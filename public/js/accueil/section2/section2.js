document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. GESTION DES PRIX (STANDARD / ÉTUDIANT)
    // ==========================================
    const pricingRadios = document.querySelectorAll('input[name="pricing-type"]');
    const priceValues = document.querySelectorAll('.p-value'); 

    function updatePrices(type) {
        priceValues.forEach(priceSpan => {
            const newPrice = type === 'student' 
                ? priceSpan.getAttribute('data-student') 
                : priceSpan.getAttribute('data-standard');

            priceSpan.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
            priceSpan.style.opacity = '0';
            priceSpan.style.transform = 'translateY(-5px)';

            setTimeout(() => {
                priceSpan.textContent = newPrice;
                priceSpan.style.opacity = '1';
                priceSpan.style.transform = 'translateY(0)';
            }, 200); 
        });
    }

    pricingRadios.forEach(radio => {
        radio.addEventListener('change', (e) => updatePrices(e.target.value));
    });

    // ==========================================
    // 2. SLIDER MOBILE (LE RADAR "OBSERVER")
    // ==========================================
    const scrollContainer = document.querySelector('.pricing-grid');
    const cards = document.querySelectorAll('.pricing-card-elite');
    const dots = document.querySelectorAll('.pricing-indicators .dot');
    const prevBtn = document.getElementById('prevCard');
    const nextBtn = document.getElementById('nextCard');

    if (!scrollContainer || cards.length === 0 || dots.length === 0) return;

    let activeIndex = 0;

    // 🌟 LE RADAR : Il détecte quelle carte est actuellement visible à l'écran
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Si la carte occupe au moins 60% de l'écran
            if (entry.isIntersecting) {
                // On met à jour l'index
                activeIndex = Array.from(cards).indexOf(entry.target);
                
                // On allume le bon petit point en bas
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === activeIndex);
                });
            }
        });
    }, {
        root: scrollContainer,
        threshold: 0.6 // 60% de visibilité requise
    });

    // On active le radar sur nos 3 cartes
    cards.forEach(card => observer.observe(card));

    // 🚀 LE DEPLACEMENT : Fonction de scroll infaillible
    const scrollToCard = (index) => {
        // Sécurité pour ne pas déborder (0, 1 ou 2)
        if (index < 0 || index >= cards.length) return;
        
        // Calcul mathématique parfait : la distance entre la carte visée et la toute première carte
        const targetLeft = cards[index].offsetLeft - cards[0].offsetLeft;
        
        scrollContainer.scrollTo({
            left: targetLeft,
            behavior: 'smooth'
        });
    };

    // Action Flèche Droite
    if (nextBtn) {
        nextBtn.addEventListener('click', () => scrollToCard(activeIndex + 1));
    }

    // Action Flèche Gauche
    if (prevBtn) {
        prevBtn.addEventListener('click', () => scrollToCard(activeIndex - 1));
    }

    // Action au clic direct sur les petits tirets
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => scrollToCard(index));
    });

});