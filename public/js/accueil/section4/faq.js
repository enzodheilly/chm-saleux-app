document.addEventListener('DOMContentLoaded', () => {
  const triggers = document.querySelectorAll('.faq-trigger');
  if (!triggers.length) return;

  const closeItem = (btn) => {
    btn.classList.remove('active');
    btn.setAttribute('aria-expanded', 'false');

    const panel = btn.nextElementSibling;
    if (panel) panel.style.maxHeight = '0px';
  };

  const openItem = (btn) => {
    btn.classList.add('active');
    btn.setAttribute('aria-expanded', 'true');

    const panel = btn.nextElementSibling;
    if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
  };

  triggers.forEach((trigger) => {
    // sécurité a11y par défaut
    if (!trigger.hasAttribute('aria-expanded')) {
      trigger.setAttribute('aria-expanded', 'false');
    }

    trigger.addEventListener('click', () => {
      const isOpen = trigger.classList.contains('active');

      // ✅ OPTION : accordéon strict (ferme les autres)
      // décommente si tu veux ce comportement
      // triggers.forEach((t) => { if (t !== trigger) closeItem(t); });

      if (isOpen) closeItem(trigger);
      else openItem(trigger);
    });
  });

  // Bonus: si on resize, on recalcule la hauteur des items ouverts
  window.addEventListener('resize', () => {
    triggers.forEach((trigger) => {
      if (!trigger.classList.contains('active')) return;
      const panel = trigger.nextElementSibling;
      if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
    });
  });
});
