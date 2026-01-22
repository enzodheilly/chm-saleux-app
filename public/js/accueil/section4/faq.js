document.addEventListener("DOMContentLoaded", () => {

  /* --- FAQ --- */
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      btn.classList.toggle('active');
      const answer = btn.nextElementSibling;
      answer.style.display = btn.classList.contains('active') ? 'block' : 'none';
    });
  });

  /* --- Animation apparition des news --- */
  const cards = document.querySelectorAll(".news-card");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("reveal");
          observer.unobserve(entry.target); // animation une seule fois
        }
      });
    },
    { threshold: 0.2 }
  );

  cards.forEach(card => observer.observe(card));

});
