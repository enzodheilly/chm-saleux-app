document.addEventListener('DOMContentLoaded', () => {
    // Gestion des Filtres
    const filterBtns = document.querySelectorAll('.filter-btn');
    const faqGroups = document.querySelectorAll('.faq-group');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update boutons
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Switch groupes
            const target = btn.dataset.target;
            faqGroups.forEach(group => {
                group.style.display = group.id === target ? 'block' : 'none';
            });
        });
    });

    // Gestion Accordéons
    const headers = document.querySelectorAll('.accordion-header');
    headers.forEach(header => {
        header.addEventListener('click', () => {
            const item = header.parentElement;
            
            // Optionnel : fermer les autres avant d'ouvrir celui-ci
            // document.querySelectorAll('.accordion-item').forEach(i => {
            //    if(i !== item) i.classList.remove('open');
            // });

            item.classList.toggle('open');
        });
    });
});