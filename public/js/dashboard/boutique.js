document.addEventListener('DOMContentLoaded', () => {
  const wrapper = document.querySelector('.merch-products');
  const prev = document.querySelector('.merch-prev');
  const next = document.querySelector('.merch-next');
  const items = document.querySelectorAll('.merch-item');
  let index = 0;

  function updateCarousel() {
    wrapper.style.transform = `translateX(-${index * 100}%)`;
  }

  prev.addEventListener('click', () => {
    index = (index - 1 + items.length) % items.length;
    updateCarousel();
  });

  next.addEventListener('click', () => {
    index = (index + 1) % items.length;
    updateCarousel();
  });
});