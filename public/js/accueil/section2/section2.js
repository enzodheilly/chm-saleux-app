document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. GESTION DES PRIX (STANDARD / ÉTUDIANT)
    // ==========================================
    const pricingRadios = document.querySelectorAll('input[name="pricing-type"]');
    const priceValues = document.querySelectorAll('.p-value'); 

function updatePrices(type) {
    priceValues.forEach(priceSpan => {
        const standardPrice = parseFloat(priceSpan.getAttribute('data-standard'));

        // ← Seules les cartes > 150€ sont concernées par le tarif étudiant
        if (type === 'student' && standardPrice <= 150) return;

        const newPrice = type === 'student'
            ? priceSpan.getAttribute('data-student')
            : priceSpan.getAttribute('data-standard');

        const currentPrice = priceSpan.textContent.trim();
        if (currentPrice === newPrice) return;

        priceSpan.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
        priceSpan.style.opacity = '0';
        priceSpan.style.transform = 'translateY(-5px)';

    setTimeout(() => {
    priceSpan.textContent = parseFloat(newPrice).toFixed(2).replace('.', ',');
    priceSpan.style.opacity = '1';
    priceSpan.style.transform = 'translateY(0)';
}, 200);
    });
}

    pricingRadios.forEach(radio => {
        radio.addEventListener('change', (e) => updatePrices(e.target.value));
    });

// ==========================================
// 2. SLIDER MOBILE (LE RADAR "OBSERVER")
// ==========================================
const scrollContainer = document.querySelector('.pricing-grid');
const cards = document.querySelectorAll('.pricing-card-elite');
const dots = document.querySelectorAll('.pricing-indicators .dot');
const prevBtn = document.getElementById('prevCard');
const nextBtn = document.getElementById('nextCard');

if (!scrollContainer || cards.length === 0 || dots.length === 0) return;

let activeIndex = 0;
let isInitialized = false;

const observer = new IntersectionObserver((entries) => {
    if (!isInitialized) return;

    entries.forEach(entry => {
        if (entry.isIntersecting) {
            activeIndex = Array.from(cards).indexOf(entry.target);
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === activeIndex);
            });
        }
    });
}, {
    root: scrollContainer,
    threshold: 0.6
});

cards.forEach(card => observer.observe(card));

// Force le premier dot actif, puis déverrouille l'observer
dots.forEach((dot, i) => dot.classList.toggle('active', i === 0));
setTimeout(() => { isInitialized = true; }, 100);

const scrollToCard = (index) => {
    if (index < 0 || index >= cards.length) return;

    scrollContainer.scrollTo({
        left: cards[index].offsetLeft - scrollContainer.offsetLeft,
        behavior: 'smooth'
    });
};

if (nextBtn) nextBtn.addEventListener('click', () => scrollToCard(activeIndex + 1));
if (prevBtn) prevBtn.addEventListener('click', () => scrollToCard(activeIndex - 1));

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => scrollToCard(index));
});

});