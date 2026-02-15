document.addEventListener("DOMContentLoaded", () => {
    
    // =========================================================
    // 1. GESTION DU SLIDER ATHLÈTES
    // =========================================================
    const track = document.getElementById("athleteTrack");
    const prevBtn = document.getElementById("prevAthlete");
    const nextBtn = document.getElementById("nextAthlete");

    if (track && prevBtn && nextBtn) {
        
        // Fonction pour calculer la largeur de défilement dynamiquement
        // On prend la largeur du premier enfant + le gap (écart)
        const getScrollAmount = () => {
            const firstCard = track.firstElementChild;
            if (!firstCard) return 285; // Valeur par défaut si vide
            
            const style = window.getComputedStyle(track);
            const gap = parseFloat(style.columnGap) || 25; // Récupère le gap du CSS
            return firstCard.offsetWidth + gap;
        };

        nextBtn.addEventListener("click", () => {
            track.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
        });

        prevBtn.addEventListener("click", () => {
            track.scrollBy({ left: -getScrollAmount(), behavior: "smooth" });
        });

        // Gestion visuelle des boutons (Opacité)
        const updateButtonState = () => {
            // Marge de tolérance de 5px pour les écrans haute densité
            const maxScrollLeft = track.scrollWidth - track.clientWidth - 5;
            
            prevBtn.style.opacity = track.scrollLeft <= 0 ? "0.5" : "1";
            prevBtn.style.pointerEvents = track.scrollLeft <= 0 ? "none" : "auto";

            nextBtn.style.opacity = track.scrollLeft >= maxScrollLeft ? "0.5" : "1";
            nextBtn.style.pointerEvents = track.scrollLeft >= maxScrollLeft ? "none" : "auto";
        };

        track.addEventListener("scroll", updateButtonState);
        // On écoute aussi le redimensionnement de la fenêtre
        window.addEventListener("resize", updateButtonState);
        
        // Init
        updateButtonState();
    }

    // =========================================================
    // 2. GESTION DU CALENDRIER (AJAX)
    // =========================================================
    
    // On utilise la délégation d'événement car les boutons sont recréés à chaque clic
    document.body.addEventListener('click', function(e) {
        
        const navBtn = e.target.closest('.js-calendar-nav');
        if (!navBtn) return;

        e.preventDefault(); 
        
        const url = navBtn.href;
        // Transformation de l'URL pour appeler la route AJAX
        const ajaxUrl = url.replace('/competition/', '/ajax/competition/');
        const container = document.querySelector('#calendar-container');

        if (container) {
            container.style.opacity = '0.5';
            container.style.pointerEvents = 'none'; // Empêche le double clic pendant le chargement

            fetch(ajaxUrl)
                .then(response => {
                    if (!response.ok) throw new Error("Erreur réseau");
                    return response.text();
                })
                .then(html => {
                    container.innerHTML = html;
                    container.style.opacity = '1';
                    container.style.pointerEvents = 'auto';
                    
                    // Mise à jour de l'URL du navigateur (Historique)
                    window.history.pushState({}, '', url);
                })
                .catch(error => {
                    console.error('Erreur chargement calendrier:', error);
                    container.style.opacity = '1';
                    container.style.pointerEvents = 'auto';
                    // En cas d'erreur, on redirige vers la page classique pour ne pas bloquer l'utilisateur
                    window.location.href = url;
                });
        }
    });
});