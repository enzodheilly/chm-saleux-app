document.addEventListener("DOMContentLoaded", function () {
    // --- Titre ---
    let title = document.querySelector(".club-title");
    if(title) title.classList.add("animate");

    // --- Sous-titres classiques ---
    let defaultSubtitles = document.querySelectorAll(".default-subtitle");
    defaultSubtitles.forEach(el => el.classList.add("animate"));

    // --- Compteurs ---
    let counters = document.querySelectorAll(".hero-line");
    let targets = [85, 30];
    let speed = 25;

    counters.forEach((counter, index) => {
        let count = 0;
        counter.classList.add("animate");
        let interval = setInterval(() => {
            count++;
            if(index === 0){
                counter.innerHTML = `+ ${count} <span class="thin-text">ADHÉRENTS</span>`;
            } else {
                counter.innerHTML = `+ ${count} <span class="thin-text">COMPÉTITIONS</span>`;
            }
            if(count >= targets[index]) clearInterval(interval);
        }, speed);
    });

    // --- Date ---
    const clubDate = document.querySelector(".club-date");
    if(clubDate) clubDate.classList.add("show");

    // --- Utilisateur connecté ---
    const heroSection = document.querySelector('#accueil');
    if(heroSection.classList.contains('hero-logged')) {
        // Fond spécifique
        heroSection.style.background = "linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/club/club-logged.jpg') }}') center/cover no-repeat";

        // Animation sous-titre utilisateur connecté
        const userSubtitle = document.querySelector(".user-subtitle");
        if(userSubtitle) userSubtitle.classList.add("animate");
        const userWelcome = document.querySelector(".user-welcome");
        if(userWelcome) userWelcome.classList.add("animate");
    }
});