document.addEventListener('DOMContentLoaded', () => {
  // 1) Scroll Effect
  const navWrapper = document.querySelector('.nav-main-wrapper');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) navWrapper?.classList.add('scrolled');
    else navWrapper?.classList.remove('scrolled');
  });

  // 2) Mobile Menu
  const hamburger = document.getElementById('mobileMenuTrigger');
  const overlay = document.getElementById('mobileNavOverlay');
  const mobileLinks = overlay ? overlay.querySelectorAll('a') : [];

  // 3) Subpages
  const subpages = overlay ? overlay.querySelectorAll('.mobile-subpage') : [];

  const closeSubpages = () => {
    if (!overlay) return;
    overlay.classList.remove('subpage-open');
    subpages.forEach(p => p.classList.remove('open'));
  };

  const openMobileMenu = () => {
    if (!overlay || !hamburger) return;
    overlay.classList.add('open');
    hamburger.classList.add('is-active');
    document.body.classList.add('mobile-menu-open');
  };

  const closeMobileMenu = () => {
    if (!overlay || !hamburger) return;
    overlay.classList.remove('open');
    hamburger.classList.remove('is-active');
    document.body.classList.remove('mobile-menu-open');
    closeSubpages(); // ✅ important
  };

  if (hamburger && overlay) {
    hamburger.addEventListener('click', () => {
      const isOpen = overlay.classList.contains('open');
      isOpen ? closeMobileMenu() : openMobileMenu();
    });

    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        closeMobileMenu();
      });
    });

    overlay.addEventListener('click', (e) => {
      const trigger = e.target.closest('.mobile-subpage-trigger');
      if (trigger) {
        const targetSel = trigger.getAttribute('data-subpage');
        const target = targetSel ? overlay.querySelector(targetSel) : null;
        if (!target) return;
        overlay.classList.add('subpage-open');
        target.classList.add('open');
        return;
      }
      const back = e.target.closest('[data-subpage-back]');
      if (back) {
        closeSubpages();
      }
    });
  }

  // Bonus : si on repasse en desktop, on ferme le menu mobile
  window.addEventListener('resize', () => {
    if (window.innerWidth > 992) {
      closeMobileMenu();
    }
  });
});