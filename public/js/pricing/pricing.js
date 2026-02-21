document.addEventListener('DOMContentLoaded', () => {
  // Scope sur la page tarifs uniquement
  const pricingRoot = document.querySelector('.pricing-root');
  if (!pricingRoot) return;

  // ==========================================
  // 1) GESTION DES PRIX (STANDARD / ÉTUDIANT)
  // ==========================================
  const pricingRadios = pricingRoot.querySelectorAll('input[name="pricing-type"]');
  const priceValues = pricingRoot.querySelectorAll('.price-value');

  function updatePrices(type) {
    priceValues.forEach((priceSpan) => {
      const newPrice =
        type === 'student'
          ? priceSpan.getAttribute('data-student')
          : priceSpan.getAttribute('data-standard');

      if (newPrice == null) return;

      priceSpan.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
      priceSpan.style.opacity = '0';
      priceSpan.style.transform = 'translateY(-5px)';

      setTimeout(() => {
        priceSpan.textContent = newPrice;
        priceSpan.style.opacity = '1';
        priceSpan.style.transform = 'translateY(0)';
      }, 200);
    });
  }

  pricingRadios.forEach((radio) => {
    radio.addEventListener('change', (e) => updatePrices(e.target.value));
  });

  // Force synchro à l'initialisation (si un radio est déjà checked)
  const checkedRadio = pricingRoot.querySelector('input[name="pricing-type"]:checked');
  if (checkedRadio) {
    updatePrices(checkedRadio.value);
  }

  // ==========================================
  // 2) SLIDER MOBILE (DOTS + FLÈCHES)
  // ==========================================
  const scrollContainer = pricingRoot.querySelector('.pricing-grid');
  const cards = pricingRoot.querySelectorAll('.sleek-card');
  const dots = pricingRoot.querySelectorAll('.pricing-indicators .dot');
  const prevBtn = pricingRoot.querySelector('#prevCard');
  const nextBtn = pricingRoot.querySelector('#nextCard');

  // Si la navigation n'existe pas, on sort sans casser la page
  if (!scrollContainer || cards.length === 0) return;

  let activeIndex = 0;

  // Met à jour visuellement les dots + état des boutons
  const updateUI = (index) => {
    activeIndex = Math.max(0, Math.min(index, cards.length - 1));

    if (dots.length) {
      dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === activeIndex);
      });
    }

    if (prevBtn) prevBtn.disabled = activeIndex === 0;
    if (nextBtn) nextBtn.disabled = activeIndex === cards.length - 1;
  };

  // Scroll vers une carte précise
  const scrollToCard = (index) => {
    if (index < 0 || index >= cards.length) return;

    const targetLeft = cards[index].offsetLeft - cards[0].offsetLeft;

    scrollContainer.scrollTo({
      left: targetLeft,
      behavior: 'smooth',
    });
  };

  // Observer : détecte quelle carte est majoritairement visible
  if (typeof IntersectionObserver !== 'undefined') {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;

          const index = Array.from(cards).indexOf(entry.target);
          if (index !== -1) updateUI(index);
        });
      },
      {
        root: scrollContainer,
        threshold: 0.6,
      }
    );

    cards.forEach((card) => observer.observe(card));
  } else {
    // Fallback si vieux navigateur
    scrollContainer.addEventListener('scroll', () => {
      let closestIndex = 0;
      let closestDistance = Infinity;

      cards.forEach((card, index) => {
        const distance = Math.abs(card.offsetLeft - scrollContainer.scrollLeft - cards[0].offsetLeft);
        if (distance < closestDistance) {
          closestDistance = distance;
          closestIndex = index;
        }
      });

      updateUI(closestIndex);
    });
  }

  // Flèches
  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      scrollToCard(activeIndex + 1);
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      scrollToCard(activeIndex - 1);
    });
  }

  // Dots (si nombre différent de cartes, on attache sur min)
  if (dots.length) {
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        if (index < cards.length) scrollToCard(index);
      });
    });
  }

  // Init UI
  updateUI(0);

  // Recalage après resize (utile quand on change orientation mobile)
  let resizeTimeout;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
      scrollToCard(activeIndex);
    }, 120);
  });
});