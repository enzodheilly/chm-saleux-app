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
