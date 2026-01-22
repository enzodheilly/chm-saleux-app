document.addEventListener('DOMContentLoaded', () => {
  const track = document.querySelector('.slider-track');
  const nextBtn = document.querySelector('.slider-btn.next');
  const prevBtn = document.querySelector('.slider-btn.prev');

  if (!track || !nextBtn || !prevBtn) return;

  const images = track.querySelectorAll('img');
  const gap = 30;
  const imageWidth = images[0].offsetWidth + gap;

  let currentIndex = 0;

  /* Met à jour la visibilité des boutons */
  const updateButtons = () => {
    prevBtn.style.display = currentIndex === 0 ? 'none' : 'flex';
    nextBtn.style.display =
      currentIndex >= images.length - visibleImages() ? 'none' : 'flex';
  };

  /* Nombre d'images visibles à l'écran */
  const visibleImages = () => {
    return Math.floor(track.offsetWidth / imageWidth);
  };

  nextBtn.addEventListener('click', () => {
    currentIndex++;
    track.scrollTo({
      left: currentIndex * imageWidth,
      behavior: 'smooth'
    });
    updateButtons();
  });

  prevBtn.addEventListener('click', () => {
    currentIndex--;
    track.scrollTo({
      left: currentIndex * imageWidth,
      behavior: 'smooth'
    });
    updateButtons();
  });

  window.addEventListener('resize', updateButtons);

  updateButtons(); // état initial
});
