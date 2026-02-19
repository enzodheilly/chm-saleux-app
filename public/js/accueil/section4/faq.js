document.querySelectorAll('.faq-elite-trigger').forEach((trigger) => {
  trigger.addEventListener('click', () => {
    const item = trigger.closest('.faq-elite-item');
    const content = item.querySelector('.faq-elite-content');
    const isOpen = trigger.getAttribute('aria-expanded') === 'true';

    // Fermer les autres
    document.querySelectorAll('.faq-elite-item').forEach((i) => {
      const btn = i.querySelector('.faq-elite-trigger');
      const c = i.querySelector('.faq-elite-content');
      const icon = i.querySelector('.q-icon i');

      i.classList.remove('active');
      btn?.setAttribute('aria-expanded', 'false');
      if (c) c.style.maxHeight = null;

      if (icon) {
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
      }
    });

    // Ouvrir / fermer celui cliqué
    if (!isOpen) {
      item.classList.add('active');
      trigger.setAttribute('aria-expanded', 'true');
      content.style.maxHeight = content.scrollHeight + "px";

      const icon = trigger.querySelector('.q-icon i');
      if (icon) {
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus');
      }
    } else {
      // si tu veux pouvoir refermer en re-cliquant
      item.classList.remove('active');
      trigger.setAttribute('aria-expanded', 'false');
      content.style.maxHeight = null;

      const icon = trigger.querySelector('.q-icon i');
      if (icon) {
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
      }
    }
  });
});
