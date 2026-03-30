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
            e.preventDefault();
        });

        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);

            if (!input) return;

            const eyeOpen = this.querySelector('.eye-open');
            const eyeClosed = this.querySelector('.eye-closed');

            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen?.classList.add('hide');
                eyeClosed?.classList.remove('hide');
            } else {
                input.type = 'password';
                eyeOpen?.classList.remove('hide');
                eyeClosed?.classList.add('hide');
            }

            input.focus();
        });
    });

    // 3. Flèches et dots (IDs)
    document.getElementById('btn-prev')?.addEventListener('click', prevSlide);
    document.getElementById('btn-next')?.addEventListener('click', nextSlide);

    document.querySelectorAll('.dot[data-slide]').forEach(function (dot) {
        dot.addEventListener('click', function () {
            changeSlide(parseInt(this.dataset.slide));
        });
    });

// 4. Spinner sur les boutons submit
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function () {
        const btn = form.querySelector("[type='submit']");
        if (!btn || btn.id === 'btn-resend') return;

        btn.classList.add("loading");
        btn.disabled = true;
    });
});

    // 5. Cases de saisie du code de vérification
    const boxes = document.querySelectorAll('.code-box');
    const hidden = document.getElementById('code');

    if (boxes.length && hidden) {
        boxes.forEach((box, index) => {
            box.addEventListener('input', function () {
                this.value = this.value.replace(/[^0-9]/g, '');

                if (this.value && index < boxes.length - 1) {
                    boxes[index + 1].focus();
                }

                hidden.value = Array.from(boxes).map(b => b.value).join('');
            });

            box.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && !this.value && index > 0) {
                    boxes[index - 1].focus();
                }
            });

            box.addEventListener('paste', function (e) {
                e.preventDefault();
                const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '');
                boxes.forEach((b, i) => {
                    b.value = pasted[i] || '';
                });
                hidden.value = pasted.slice(0, 6);
                boxes[Math.min(pasted.length, 5)].focus();
            });
        });
    }

// 6. Cooldown bouton renvoyer le code
const btnResend = document.getElementById('btn-resend');
const resendForm = document.getElementById('resend-form');

if (btnResend && resendForm) {
    const COOLDOWN = 60;
    const storageKey = 'resend_code_sent_at';
    const textEl = btnResend.querySelector('.btn-text');

    function startCooldown() {
        const interval = setInterval(() => {
            const sentAt = parseInt(sessionStorage.getItem(storageKey) || '0');
            const elapsed = Math.floor((Date.now() - sentAt) / 1000);
            const remaining = COOLDOWN - elapsed;

            if (remaining <= 0) {
                clearInterval(interval);
                sessionStorage.removeItem(storageKey);
                btnResend.disabled = false;
                if (textEl) textEl.textContent = 'Renvoyer le code';
            } else {
                btnResend.disabled = true;
                if (textEl) textEl.textContent = `Renvoyer le code (${remaining}s)`;
            }
        }, 1000);
    }

    // Au chargement : vérifie si un cooldown est déjà en cours
    const sentAt = parseInt(sessionStorage.getItem(storageKey) || '0');
    const elapsed = Math.floor((Date.now() - sentAt) / 1000);

    if (sentAt && elapsed < COOLDOWN) {
        // Cooldown encore actif, on reprend là où on en était
        startCooldown();
    } else {
        // Pas de cooldown actif : bouton disponible immédiatement
        sessionStorage.removeItem(storageKey);
        btnResend.disabled = false;
        if (textEl) textEl.textContent = 'Renvoyer le code';
    }

    resendForm.addEventListener('submit', function () {
        // Au moment de l'envoi on démarre un nouveau cooldown
        sessionStorage.setItem(storageKey, Date.now().toString());
        startCooldown();
    });
}

// 7. Disparition automatique des flash messages après 5s
document.querySelectorAll('.alert-error, .alert-success, .flash-error, .flash-success').forEach(function (alert) {
    setTimeout(function () {
        alert.style.transition = 'opacity 0.5s ease';
        alert.style.opacity = '0';
        setTimeout(function () {
            alert.remove();
        }, 500);
    }, 5000);
});

});