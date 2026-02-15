// public/js/nav/nav.js
document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".nav-fixed");
  if (!nav) return;

  // =========================================================
  // 1) DROPDOWN DESKTOP (hover) : #club-hover-link -> #club-panel
  // =========================================================
  const trigger = nav.querySelector("#club-hover-link");
  const panel = document.querySelector("#club-panel");

  if (trigger && panel) {
    let closeTimer = null;

    const open = () => {
      clearTimeout(closeTimer);
      panel.classList.add("is-open");
      panel.setAttribute("aria-hidden", "false");
      trigger.classList.add("active");
    };

    const close = () => {
      closeTimer = setTimeout(() => {
        panel.classList.remove("is-open");
        panel.setAttribute("aria-hidden", "true");
        trigger.classList.remove("active");
      }, 120);
    };

    // Hover desktop
    trigger.addEventListener("mouseenter", open);
    trigger.addEventListener("mouseleave", close);
    panel.addEventListener("mouseenter", open);
    panel.addEventListener("mouseleave", close);

    // Clic dehors -> ferme
    document.addEventListener("click", (e) => {
      if (!panel.contains(e.target) && !trigger.contains(e.target)) close();
    });

    // ESC -> ferme
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") close();
    });

    // Si tu ne veux PAS de click-to-open, tu peux supprimer ce bloc.
    trigger.addEventListener("click", (e) => {
      e.preventDefault();
      const opened = panel.classList.toggle("is-open");
      panel.setAttribute("aria-hidden", opened ? "false" : "true");
      trigger.classList.toggle("active", opened);
    });
  }

  // =========================================================
  // 2) HAMBURGER + OVERLAY MOBILE
  // =========================================================
  const hamburger = nav.querySelector(".hamburger-menu");
  const overlay = nav.querySelector(".mobile-nav-overlay");

  const setMobileMenu = (open) => {
    if (!hamburger || !overlay) return;
    hamburger.classList.toggle("active", open);
    overlay.classList.toggle("open", open);
    document.body.classList.toggle("no-scroll", open);
  };

  if (hamburger && overlay) {
    hamburger.addEventListener("click", () => {
      const open = !overlay.classList.contains("open");
      setMobileMenu(open);
    });

    // (optionnel) clic sur un lien -> ferme le menu
    overlay.addEventListener("click", (e) => {
      const link = e.target.closest("a");
      if (link) setMobileMenu(false);
    });

    // ESC -> ferme
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") setMobileMenu(false);
    });
  }

  // =========================================================
  // 3) SLIDER INFO-BANNER MOBILE (flèches gauche/droite)
  // =========================================================
  const slides = nav.querySelectorAll(".info-slide");
  const prevBtn = nav.querySelector(".mobile-info-prev");
  const nextBtn = nav.querySelector(".mobile-info-next");

  if (slides.length && prevBtn && nextBtn) {
    let idx = 0;

    const show = (i) => {
      slides.forEach((s) => s.classList.remove("active"));
      slides[i].classList.add("active");
    };

    nextBtn.addEventListener("click", (e) => {
      e.preventDefault();
      idx = (idx + 1) % slides.length;
      show(idx);
    });

    prevBtn.addEventListener("click", (e) => {
      e.preventDefault();
      idx = (idx - 1 + slides.length) % slides.length;
      show(idx);
    });

    // état initial
    show(idx);
  }

  // =========================================================
  // 4) ACCORDÉON MOBILE (Club & membres du bureau)
  // =========================================================
  const ddTrigger = nav.querySelector(".mobile-dropdown-trigger");
  const ddContent = nav.querySelector(".mobile-dropdown-content");

  if (ddTrigger && ddContent) {
    ddTrigger.addEventListener("click", () => {
      ddTrigger.classList.toggle("active");
      ddContent.classList.toggle("open");
    });
  }

  // =========================================================
  // 5) OUVRIR LA MODALE DIRECT SUR LOGIN (Mon espace adhérent)
  // =========================================================
  const loginTriggers = nav.querySelectorAll(".js-trigger-login");
  const modal = document.getElementById("registerModal");
  const closeBtn = document.getElementById("closeRegisterModal");

  const stepSocial = document.getElementById("modal-step-social");
  const stepEmail = document.getElementById("modal-step-email");
  const stepLogin = document.getElementById("modal-step-login");
  const stepVerify = document.getElementById("modal-step-verify");

  const openLoginModal = () => {
    if (!modal) return;

    // cache tout
    if (stepSocial) stepSocial.style.display = "none";
    if (stepEmail) stepEmail.style.display = "none";
    if (stepVerify) stepVerify.style.display = "none";

    // affiche login
    if (stepLogin) stepLogin.style.display = "block";

    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
  };

  const closeModal = () => {
    if (!modal) return;
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
  };

  if (loginTriggers.length && modal) {
    loginTriggers.forEach((t) => {
      t.addEventListener("click", (e) => {
        e.preventDefault();
        openLoginModal();
      });
    });
  }

  if (closeBtn) closeBtn.addEventListener("click", closeModal);

  window.addEventListener("click", (e) => {
    if (e.target === modal) closeModal();
  });
});
