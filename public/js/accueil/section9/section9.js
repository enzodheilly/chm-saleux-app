document.addEventListener('DOMContentLoaded', () => {
  const section = document.querySelector('.club-slider-section');
  if (!section) return;

  const track = section.querySelector('.slider-track');
  const nextBtn = section.querySelector('.slider-btn.next');
  const prevBtn = section.querySelector('.slider-btn.prev');

  if (!track || !nextBtn || !prevBtn) return;

  const gap = 30;
  let currentIndex = 0;

  const getImages = () => track.querySelectorAll('img');

  const getImageWidth = () => {
    const imgs = getImages();
    if (!imgs.length) return 0;
    // largeur réelle (responsive)
    return imgs[0].getBoundingClientRect().width + gap;
  };

  const visibleImages = () => {
    const w = getImageWidth();
    if (!w) return 1;
    return Math.max(1, Math.floor(track.getBoundingClientRect().width / w));
  };

  const maxIndex = () => {
    const imgs = getImages();
    const visible = visibleImages();
    return Math.max(0, imgs.length - visible);
  };

  const clampIndex = () => {
    const max = maxIndex();
    if (currentIndex < 0) currentIndex = 0;
    if (currentIndex > max) currentIndex = max;
  };

  const scrollToIndex = (smooth = true) => {
    const w = getImageWidth();
    clampIndex();

    track.scrollTo({
      left: currentIndex * w,
      behavior: smooth ? 'smooth' : 'auto'
    });
  };

  const updateButtons = () => {
    clampIndex();
    const max = maxIndex();

    // Option 1: désactiver (meilleur a11y)
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex >= max;

    // Option 2 (si tu préfères cacher): décommente
    // prevBtn.style.display = currentIndex === 0 ? 'none' : 'flex';
    // nextBtn.style.display = currentIndex >= max ? 'none' : 'flex';
  };

  nextBtn.addEventListener('click', () => {
    currentIndex++;
    scrollToIndex(true);
    updateButtons();
  });

  prevBtn.addEventListener('click', () => {
    currentIndex--;
    scrollToIndex(true);
    updateButtons();
  });

  // Clavier (flèches)
  section.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') {
      e.preventDefault();
      nextBtn.click();
    }
    if (e.key === 'ArrowLeft') {
      e.preventDefault();
      prevBtn.click();
    }
  });

  // Rendre la section focusable pour le clavier
  if (!section.hasAttribute('tabindex')) {
    section.setAttribute('tabindex', '0');
  }

  // Resize: recalcul + re-scroll sans animation
  window.addEventListener('resize', () => {
    updateButtons();
    scrollToIndex(false);
  });

  updateButtons();
  scrollToIndex(false);
});
