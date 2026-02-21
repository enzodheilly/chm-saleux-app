document.addEventListener("DOMContentLoaded", function () {
    // --- Titre ---
    const title = document.querySelector(".club-title");
    if (title) title.classList.add("animate");

    // --- Sous-titres classiques ---
    const defaultSubtitles = document.querySelectorAll(".default-subtitle");
    defaultSubtitles.forEach(el => el.classList.add("animate"));

    // --- Compteurs (uniquement si présents) ---
    const counters = document.querySelectorAll(".hero-line");

    if (counters.length > 0) {
        const targets = [85, 30];
        const speed = 25;

        counters.forEach((counter, index) => {
            // sécurité si jamais il y a plus de compteurs que de targets
            if (typeof targets[index] === "undefined") return;

            let count = 0;
            counter.classList.add("animate");

            const label = index === 0 ? "ADHÉRENTS" : "COMPÉTITIONS";

            const interval = setInterval(() => {
                count++;
                counter.innerHTML = `+ ${count} <span class="thin-text">${label}</span>`;

                if (count >= targets[index]) {
                    clearInterval(interval);
                }
            }, speed);
        });
    }

    // --- Date ---
    const clubDate = document.querySelector(".club-date");
    if (clubDate) clubDate.classList.add("show");

    // --- Utilisateur connecté ---
    const heroSection = document.querySelector("#accueil");
    if (heroSection && heroSection.classList.contains("hero-logged")) {
        const userSubtitle = document.querySelector(".user-subtitle");
        if (userSubtitle) userSubtitle.classList.add("animate");

        const userWelcome = document.querySelector(".user-welcome");
        if (userWelcome) userWelcome.classList.add("animate");
    }
});