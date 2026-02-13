document.addEventListener('DOMContentLoaded', function() {
    
    // 1. On sélectionne les boutons radio et les prix
    const pricingRadios = document.querySelectorAll('input[name="pricing-type"]');
    const priceValues = document.querySelectorAll('.price-value');

    // 2. Fonction pour mettre à jour les prix
    function updatePrices(type) {
        priceValues.forEach(priceSpan => {
            // On récupère la nouvelle valeur depuis les attributs data-
            // Si on est en mode 'student', on prend data-student, sinon data-standard
            const newPrice = type === 'student' 
                ? priceSpan.getAttribute('data-student') 
                : priceSpan.getAttribute('data-standard');

            // Petite animation : on cache, on change, on réaffiche
            priceSpan.style.opacity = '0';
            priceSpan.style.transform = 'translateY(-5px)';

            setTimeout(() => {
                priceSpan.textContent = newPrice;
                priceSpan.style.opacity = '1';
                priceSpan.style.transform = 'translateY(0)';
            }, 200); // Attend 200ms (le temps que ça disparaisse)
        });
    }

    // 3. On écoute le changement sur les boutons radio
    pricingRadios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            updatePrices(e.target.value);
        });
    });
});