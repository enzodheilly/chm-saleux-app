  const appSection = document.querySelector('.app-mobile-section');
  const appImage = document.querySelector('.app-mobile-image img');

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          appImage.classList.add('is-visible');
          observer.unobserve(appSection); // animation une seule fois
        }
      });
    },
    {
      threshold: 0.3 // déclenche quand 30% de la section est visible
    }
  );

  observer.observe(appSection);