// public/js/pages/home.js
document.addEventListener("DOMContentLoaded", () => {
  // SECTION 1
  if (document.querySelector(".hero-section")) {
    import("/js/accueil/section1/section1.js");
  }

  // SECTION 2
  if (document.querySelector(".sleek-pricing-section")) {
    import("/js/accueil/section2/section2.js");
  }

  // FAQ (section news/faq)
  if (document.querySelector(".faq-section")) {
    import("/js/accueil/section4/faq.js");
  }

  // Slider club
  if (document.querySelector(".club-slider-section")) {
    import("/js/accueil/section9/section9.js");
  }
});
