document.addEventListener('DOMContentLoaded', function() {
    const toggleInput = document.getElementById('toggle');
    
    // On sélectionne tous les prix dynamiques
    const dynamicPrices = document.querySelectorAll('.dynamic-price');

    if (toggleInput) {
        toggleInput.addEventListener('change', function() {
            const isStudent = this.checked; // Vrai si le bouton est sur "Étudiant"

            dynamicPrices.forEach(priceSpan => {
                // 1. Récupérer les prix stockés dans les attributs data
                const standardVal = parseFloat(priceSpan.getAttribute('data-standard'));
                const studentVal = parseFloat(priceSpan.getAttribute('data-student'));

                // 2. Sélectionner la ligne "Mensualité" correspondante dans la carte
                const card = priceSpan.closest('.card');
                const subPriceDiv = card.querySelector('.subprice3');

                // 3. Déterminer quel prix afficher
                // Si les deux prix sont identiques (ex: Jeunes), on ne change rien
                let newPrice = (isStudent && studentVal > 0) ? studentVal : standardVal;

                // 4. Animation & Mise à jour du PRIX
                priceSpan.parentElement.style.opacity = '0.5';
                
                setTimeout(() => {
                    priceSpan.textContent = newPrice; // Affiche le prix entier (ex: 185)
                    priceSpan.parentElement.style.opacity = '1';
                }, 150);

                // 5. Mise à jour de la MENSUALITÉ (Soit X €/mois)
                if (subPriceDiv && !subPriceDiv.textContent.includes('-')) {
                    // On recalcule : Prix / 12 mois
                    let monthly = (newPrice / 12).toFixed(2);
                    let formattedMonthly = monthly.replace('.', ',');
                    
                    subPriceDiv.textContent = `Soit ${formattedMonthly} €/mois`;
                }
            });
        });
    }
});