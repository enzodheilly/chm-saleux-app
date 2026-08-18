document.addEventListener("DOMContentLoaded", () => {

    const nav     = document.getElementById("mainNav");
    const trigger = document.getElementById("mobileMenuTrigger");
    const overlay = document.getElementById("mobileNavOverlay");

    if (!nav) return;

    /* ──────────────────────────────────────────────
       TRANSPARENCE SUR HERO — scroll listener
       Dès 80px de scroll : barre sombre
       Pages sans hero : barre sombre dès le chargement
    ────────────────────────────────────────────── */
    const hero = document.querySelector(".hero-section");
    const SCROLL_THRESHOLD = 80;

    function updateNav() {
        if (!hero) return;
        if (window.scrollY > SCROLL_THRESHOLD) {
            nav.classList.add("nav-scrolled");
        } else {
            nav.classList.remove("nav-scrolled");
        }
    }

    if (hero) {
        window.addEventListener("scroll", updateNav, { passive: true });
        updateNav(); // état initial
    } else {
        nav.classList.add("nav-scrolled");
    }

    /* ──────────────────────────────────────────────
       MENU MOBILE — ouverture / fermeture
    ────────────────────────────────────────────── */
    function openMobileMenu() {
        overlay.classList.add("is-open");
        overlay.setAttribute("aria-hidden", "false");
        trigger.classList.add("is-open");
        trigger.setAttribute("aria-expanded", "true");
        document.body.style.overflow = "hidden";
        nav.classList.add("nav-scrolled"); // barre toujours visible quand menu ouvert
    }

    function closeMobileMenu() {
        overlay.classList.remove("is-open");
        overlay.setAttribute("aria-hidden", "true");
        trigger.classList.remove("is-open");
        trigger.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
        updateNav();
    }

    if (trigger && overlay) {
        trigger.addEventListener("click", () => {
            if (overlay.classList.contains("is-open")) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Fermeture sur clic en dehors du panel
        overlay.addEventListener("click", (e) => {
            if (e.target === overlay) closeMobileMenu();
        });

        // Fermeture sur Escape
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && overlay.classList.contains("is-open")) {
                closeMobileMenu();
            }
        });
    }

    /* ──────────────────────────────────────────────
       MEGA MENU DESKTOP — hover avec délai de fermeture
    ────────────────────────────────────────────── */
    const dropTrigger = document.getElementById("clubDropdownTrigger");
    const dropMenu    = document.getElementById("clubDropdown");

    if (dropTrigger && dropMenu) {
        let closeTimer = null;

        function openDrop() {
            clearTimeout(closeTimer);
            dropTrigger.classList.add("is-open");
        }

        function closeDrop() {
            closeTimer = setTimeout(() => {
                dropTrigger.classList.remove("is-open");
            }, 180);
        }

        dropTrigger.addEventListener("mouseenter", openDrop);
        dropTrigger.addEventListener("mouseleave", closeDrop);
        dropMenu.addEventListener("mouseenter", openDrop);
        dropMenu.addEventListener("mouseleave", closeDrop);
    }

    /* ──────────────────────────────────────────────
       ACCORDÉON MOBILE
    ────────────────────────────────────────────── */
    document.querySelectorAll(".nav-mobile-accordion").forEach((btn) => {
        btn.addEventListener("click", () => {
            const sub    = btn.nextElementSibling;
            const isOpen = btn.classList.contains("is-open");

            // Fermer tous les autres
            document.querySelectorAll(".nav-mobile-accordion.is-open").forEach((other) => {
                if (other !== btn) {
                    other.classList.remove("is-open");
                    other.nextElementSibling.classList.remove("is-open");
                }
            });

            btn.classList.toggle("is-open", !isOpen);
            if (sub) sub.classList.toggle("is-open", !isOpen);
        });
    });

});
