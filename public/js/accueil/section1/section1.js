// Empêche le navigateur de restaurer une position de scroll
if ("scrollRestoration" in history) history.scrollRestoration = "manual";
window.scrollTo(0, 0);

document.addEventListener("DOMContentLoaded", function () {
    const heroSection = document.querySelector("#accueil");
    if (!heroSection) return;

    const isLogged = heroSection.classList.contains("hero-logged");

    /* ──────────────────────────────────────────────
       VUE CONNECTÉE — animations existantes
    ────────────────────────────────────────────── */
    if (isLogged) {
        const userWelcome = document.querySelector(".user-welcome");
        if (userWelcome) userWelcome.classList.add("animate");

        const userSubtitle = document.querySelector(".user-subtitle");
        if (userSubtitle) userSubtitle.classList.add("animate");

        const clubDate = document.querySelector(".club-date");
        if (clubDate) clubDate.classList.add("show");

        document.querySelectorAll(".hero-stat-card").forEach((el, i) => {
            setTimeout(() => el.classList.add("animate"), i * 120);
        });
        return;
    }

    /* ──────────────────────────────────────────────
       VUE VISITEUR — SLIDER
    ────────────────────────────────────────────── */

    const slides = document.querySelectorAll(".slide");
    const dots   = document.querySelectorAll(".slider-dot");
    let current  = 0;
    let timer    = null;
    const DELAY  = 5000;

    function goTo(index) {
        slides[current].classList.remove("active");
        dots[current].classList.remove("active");
        current = index;
        slides[current].classList.add("active");
        dots[current].classList.add("active");
    }

    function next() {
        goTo((current + 1) % slides.length);
    }

    function startTimer() {
        clearInterval(timer);
        timer = setInterval(next, DELAY);
    }

    // Clicks sur les dots
    dots.forEach((dot, i) => {
        dot.addEventListener("click", () => {
            goTo(i);
            startTimer();
        });
    });

    // Démarrage
    startTimer();

    /* Stats bar — visible au premier scroll */
    const statsBar = document.querySelector(".slider-stats-bar");
    if (statsBar) {
        function showStats() {
            if (window.scrollY > 40) {
                statsBar.classList.add("stats-visible");
            } else {
                statsBar.classList.remove("stats-visible");
            }
        }
        window.addEventListener("scroll", showStats, { passive: true });
        showStats();
    }

    /* ──────────────────────────────────────────────
       Compteur adhérents animé
    ────────────────────────────────────────────── */
    const adherentsEl = document.getElementById("adherents-counter");
    if (adherentsEl) {
        const target = 85;
        let count = 0;
        const iv = setInterval(() => {
            count++;
            adherentsEl.textContent = count + "+";
            if (count >= target) clearInterval(iv);
        }, 22);
    }
});
