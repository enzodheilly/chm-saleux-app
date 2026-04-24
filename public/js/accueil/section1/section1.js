document.addEventListener("DOMContentLoaded", function () {
    const title = document.querySelector(".club-title");
    if (title) title.classList.add("animate");

    const heroSection = document.querySelector("#accueil");
    const isLogged = heroSection && heroSection.classList.contains("hero-logged");

    if (isLogged) {
        // --- Utilisateur connecté ---
        const userWelcome = document.querySelector(".user-welcome");
        if (userWelcome) userWelcome.classList.add("animate");

        const userSubtitle = document.querySelector(".user-subtitle");
        if (userSubtitle) userSubtitle.classList.add("animate");

        const clubDate = document.querySelector(".club-date");
        if (clubDate) clubDate.classList.add("show");

        // --- Anime les cartes stats avec un décalage progressif ---
        const statsCards = document.querySelectorAll(".hero-stat-card");
        statsCards.forEach((el, i) => {
            setTimeout(() => el.classList.add("animate"), i * 120);
        });

    } else {
        // --- Visiteur non connecté ---
        const defaultSubtitles = document.querySelectorAll(".default-subtitle");
        defaultSubtitles.forEach(el => el.classList.add("animate"));

        // Compteurs animés uniquement pour la version non connectée
        const counters = document.querySelectorAll(".hero-inner .hero-line");
        const targets = [85, 30];
        const speed = 25;

        counters.forEach((counter, index) => {
            if (typeof targets[index] === "undefined") return;

            let count = 0;
            counter.classList.add("animate");

            const label = index === 0 ? "ADHÉRENTS" : "COMPÉTITIONS";

            const interval = setInterval(() => {
                count++;
                counter.innerHTML = `+ ${count} <span class="thin-text">${label}</span>`;
                if (count >= targets[index]) clearInterval(interval);
            }, speed);
        });
    }
});