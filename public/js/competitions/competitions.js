document.addEventListener("DOMContentLoaded", () => {
    
    // --- GESTION DU SLIDER ATHLÈTES ---
    const track = document.getElementById("athleteTrack");
    const prevBtn = document.getElementById("prevAthlete");
    const nextBtn = document.getElementById("nextAthlete");

    if (track && prevBtn && nextBtn) {
        // Largeur d'une carte (260px) + Gap (25px) défini dans le CSS
        const itemWidth = 285; 

        // Fonction pour le bouton SUIVANT
        nextBtn.addEventListener("click", () => {
            track.scrollBy({
                left: itemWidth,
                behavior: "smooth"
            });
        });

        // Fonction pour le bouton PRÉCÉDENT
        prevBtn.addEventListener("click", () => {
            track.scrollBy({
                left: -itemWidth,
                behavior: "smooth"
            });
        });

        // --- OPTIONNEL : GESTION VISUELLE DES BOUTONS (Griser si fin de liste) ---
        const updateButtonState = () => {
            const maxScrollLeft = track.scrollWidth - track.clientWidth;
            
            // Si on est tout à gauche (début), on grise le bouton Précédent
            if (track.scrollLeft <= 0) {
                prevBtn.style.opacity = "0.5";
                prevBtn.style.pointerEvents = "none";
            } else {
                prevBtn.style.opacity = "1";
                prevBtn.style.pointerEvents = "auto";
            }

            // Si on est tout à droite (fin), on grise le bouton Suivant
            // On utilise une petite marge d'erreur (1px) pour les arrondis
            if (track.scrollLeft >= maxScrollLeft - 1) {
                nextBtn.style.opacity = "0.5";
                nextBtn.style.pointerEvents = "none";
            } else {
                nextBtn.style.opacity = "1";
                nextBtn.style.pointerEvents = "auto";
            }
        };

        // On écoute le défilement pour mettre à jour les boutons en temps réel
        track.addEventListener("scroll", updateButtonState);

        // Appel initial pour régler l'état au chargement de la page
        updateButtonState();
    }
});