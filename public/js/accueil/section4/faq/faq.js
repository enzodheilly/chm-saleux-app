document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. GESTION DES ONGLETS (FILTRES) ---
    const filterBtns = document.querySelectorAll('.filter-btn');
    const faqGroups = document.querySelectorAll('.faq-group');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Retirer la classe active de tous les boutons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Ajouter active au bouton cliqué
            btn.classList.add('active');

            // Masquer tous les groupes
            faqGroups.forEach(group => group.classList.remove('active'));
            
            // Afficher le groupe cible
            const targetId = btn.getAttribute('data-target');
            document.getElementById(targetId).classList.add('active');
        });
    });

    // --- 2. GESTION DE L'ACCORDÉON ---
    const accordions = document.querySelectorAll('.accordion-item');

    accordions.forEach(item => {
        const header = item.querySelector('.accordion-header');
        
        header.addEventListener('click', () => {
            // Optionnel : Fermer les autres quand on en ouvre un (comportement Accordéon strict)
            accordions.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('open')) {
                    otherItem.classList.remove('open');
                    otherItem.querySelector('.accordion-body').style.maxHeight = null;
                }
            });

            // Basculer l'état ouvert/fermé
            item.classList.toggle('open');
            
            const body = item.querySelector('.accordion-body');
            if (item.classList.contains('open')) {
                body.style.maxHeight = body.scrollHeight + "px";
            } else {
                body.style.maxHeight = null;
            }
        });
    });
});