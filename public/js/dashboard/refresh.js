document.addEventListener('DOMContentLoaded', () => {
    const refreshBtn = document.getElementById('refresh-btn');
    if (!refreshBtn) return;

    refreshBtn.addEventListener('click', () => {
        const licenceCard = document.getElementById('licence-card');
        const eventCards = document.querySelectorAll('#events-card .event-card');
        const cards = [];
        if (licenceCard) cards.push(licenceCard);
        eventCards.forEach(c => cards.push(c));

        if (cards.length === 0) return;

        cards.forEach(card => {
            if (!card.querySelector('.card-overlay-blur')) {
                const overlay = document.createElement('div');
                overlay.className = 'card-overlay-blur';

                const overlayText = document.createElement('div');
                overlayText.className = 'overlay-text';

                const text = document.createElement('span');
                text.textContent = 'Synchronisation en cours';
                overlayText.appendChild(text);

                const dots = document.createElement('span');
                dots.className = 'loading-dots';
                dots.innerHTML = '<span>.</span><span>.</span><span>.</span>';
                overlayText.appendChild(dots);

                overlay.appendChild(overlayText);
                card.appendChild(overlay);
            }
        });

        // Simuler le refresh : retirer overlay après 2s
        setTimeout(() => {
            cards.forEach(card => {
                const overlay = card.querySelector('.card-overlay-blur');
                if (overlay) overlay.remove();
            });
        }, 2000);
    });
});
