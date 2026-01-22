document.addEventListener("DOMContentLoaded", () => {

    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const leftBtn = document.querySelector('.nav-button.left');
    const rightBtn = document.querySelector('.nav-button.right');

    // Sécurité si la section n'existe pas sur cette page
    if (!slider || slides.length === 0) return;

    let currentIndex = 0;

    function getSlidesToShow() {
        if (window.innerWidth <= 768) return 1;   // mobile
        if (window.innerWidth <= 1024) return 2;  // tablette
        return 3;                                  // desktop
    }

    function updateSlider() {
        const slidesToShow = getSlidesToShow();
        const slideWidth = slides[0].offsetWidth + 20; // marge / padding

        if (currentIndex > slides.length - slidesToShow) currentIndex = slides.length - slidesToShow;
        if (currentIndex < 0) currentIndex = 0;

        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    // ⚠️ Ajouter event listeners seulement si les boutons existent
    if (rightBtn) {
        rightBtn.addEventListener('click', () => {
            currentIndex++;
            updateSlider();
        });
    }

    if (leftBtn) {
        leftBtn.addEventListener('click', () => {
            currentIndex--;
            updateSlider();
        });
    }

    window.addEventListener('resize', updateSlider);
    window.addEventListener("load", updateSlider);
});


document.addEventListener("DOMContentLoaded", function() {
	const options = {
		threshold: 0.3 // déclenche quand 30% de la section est visible
	};

	const observer = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
			if(entry.isIntersecting){
				entry.target.classList.add("visible");
				observer.unobserve(entry.target); // une seule fois
			}
		});
	}, options);

	// Observer le titre et le sous-titre
	document.querySelectorAll(".slider-title, .slider-subtitle").forEach(el => {
		observer.observe(el);
	});
});

document.addEventListener("DOMContentLoaded", () => {
  const benefits = document.querySelectorAll(".benefit");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target); // animation une seule fois
        }
      });
    },
    {
      threshold: 0.2
    }
  );

  benefits.forEach(benefit => observer.observe(benefit));
});