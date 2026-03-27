// --- GESTION DU SLIDER ---
window.currentSlideIndex = 0;

function getSlides() {
    return document.querySelectorAll('.slide');
}

function getDots() {
    return document.querySelectorAll('.dot');
}

function changeSlide(index) {
    const slides = getSlides();
    const dots = getDots();

    if (!slides.length) return;

    if (index >= slides.length) index = 0;
    if (index < 0) index = slides.length - 1;

    window.currentSlideIndex = index;

    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });

    dots.forEach((dot, i) => {
        const realIndex = i % slides.length;
        dot.classList.toggle('active', realIndex === index);
    });
}

function nextSlide() {
    changeSlide(window.currentSlideIndex + 1);
}

function prevSlide() {
    changeSlide(window.currentSlideIndex - 1);
}

// --- INITIALISATION UNIQUE ---
document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Initialisation du Slider
    changeSlide(0);

    // Flèches
    document.querySelector('.arrow.next')?.addEventListener('click', nextSlide);
    document.querySelector('.arrow.prev')?.addEventListener('click', prevSlide);

    // Dots
    document.querySelectorAll('.dot').forEach((dot, i) => {
        dot.addEventListener('click', () => {
            changeSlide(i % getSlides().length);
        });
    });

// 2. Initialisation du Toggle Password (Œil)
const toggleButtons = document.querySelectorAll('.toggle-password');

toggleButtons.forEach(button => {
    button.addEventListener('mousedown', function(e) {
        // Empêche l'input de perdre le focus au moment du clic
        e.preventDefault(); 
    });

    button.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const input = document.getElementById(targetId);
        
        if (!input) return;

        const eyeOpen = this.querySelector('.eye-open');
        const eyeClosed = this.querySelector('.eye-closed');

        // Bascule le type
        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen?.classList.add('hide');
            eyeClosed?.classList.remove('hide');
        } else {
            input.type = 'password';
            eyeOpen?.classList.remove('hide');
            eyeClosed?.classList.add('hide');
        }

        // 💡 LA CORRECTION : On force le focus sur l'input
        input.focus();
    });
});
});