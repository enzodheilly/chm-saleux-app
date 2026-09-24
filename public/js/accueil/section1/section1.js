/* ── Restauration position scroll au refresh (sans flash) ── */
(function () {
    var KEY = 'homeScrollPos';
    var pos = sessionStorage.getItem(KEY);
    if (pos) {
        window.scrollTo(0, parseInt(pos, 10));
        sessionStorage.removeItem(KEY);
    }
    /* Révèle la page (avec ou sans position sauvegardée) */
    document.documentElement.style.transition = 'opacity 0.12s';
    document.documentElement.style.opacity = '1';
    window.addEventListener('beforeunload', function () {
        sessionStorage.setItem(KEY, window.scrollY);
    });
})();

document.addEventListener("DOMContentLoaded", function () {
    const heroSection = document.querySelector("#accueil");
    if (!heroSection) return;

    /* ──────────────────────────────────────────────
       SLIDER — commun aux deux vues (connecté / visiteur)
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
        }, 32);
    }
});
