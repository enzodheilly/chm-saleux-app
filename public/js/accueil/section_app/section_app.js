document.addEventListener('DOMContentLoaded', function () {
    var section = document.querySelector('.app-section');
    if (!section) return;

    /* ── Entrée au scroll ── */
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                section.classList.add('is-visible');
                observer.unobserve(section);
            }
        });
    }, { threshold: 0.12 });
    observer.observe(section);

    /* ── Carousel ── */
    var slides    = Array.from(section.querySelectorAll('.app-slide'));
    var dotGroups = [
        Array.from(section.querySelectorAll('.app-bottom-row .app-dot')),
        Array.from(section.querySelectorAll('.app-dots--mobile .app-dot'))
    ];
    if (!slides.length) return;

    var N         = slides.length;
    var current   = 0;
    var animating = false;
    var autoTimer = null;

    /*
     * Position relative d'un slide par rapport au current :
     *   0 → is-active (centre)
     *   1 → is-next   (droite)
     *   2…N-1 → is-prev (gauche, pour N=3 il n'y a qu'un seul prev)
     */
    function getPos(i) {
        return (i - current + N) % N;
    }

    function applyClass(slide, pos) {
        slide.classList.remove('is-active', 'is-prev', 'is-next');
        if (pos === 0)      slide.classList.add('is-active');
        else if (pos === 1) slide.classList.add('is-next');
        else                slide.classList.add('is-prev');
    }

    function goTo(newIndex) {
        if (animating) return;
        var target = ((newIndex % N) + N) % N;
        if (target === current) return;
        animating = true;

        var oldCurrent = current;
        current = target;

        slides.forEach(function (slide, i) {
            var oldPos = (i - oldCurrent + N) % N;
            var newPos = (i - current + N) % N;

            /*
             * Détecte le "saut circulaire" : un slide qui passe de is-prev
             * à is-next (ou vice-versa) sans passer par le centre.
             * Pour N=3 : oldPos+newPos = 3 et aucun des deux n'est 0.
             */
            var isJump = (oldPos + newPos === N) && oldPos !== 0 && newPos !== 0;

            if (isJump) {
                /* Fondu rapide → repositionnement instantané → retour */
                slide.style.transition = 'opacity 0.15s ease';
                slide.style.opacity    = '0';
                setTimeout(function () {
                    slide.style.transition = 'none';
                    applyClass(slide, newPos);
                    /* rAF double pour que le navigateur applique le repositionnement */
                    requestAnimationFrame(function () {
                        requestAnimationFrame(function () {
                            slide.style.transition = '';
                            slide.style.opacity    = '';
                        });
                    });
                }, 160);
            } else {
                applyClass(slide, newPos);
            }
        });

        dotGroups.forEach(function (group) {
            group.forEach(function (d, i) {
                d.classList.toggle('app-dot--active', i === current);
            });
        });

        setTimeout(function () { animating = false; }, 580);
    }

    function startAuto() {
        autoTimer = setInterval(function () { goTo(current + 1); }, 4500);
    }
    function resetAuto() {
        clearInterval(autoTimer);
        startAuto();
    }

    /* Init sans animation */
    slides.forEach(function (slide, i) { applyClass(slide, getPos(i)); });

    /* Dots */
    dotGroups.forEach(function (group) {
        group.forEach(function (dot) {
            dot.addEventListener('click', function () {
                goTo(parseInt(dot.dataset.index, 10));
                resetAuto();
            });
        });
    });

    /* Clic sur un slide adjacent → navigation */
    slides.forEach(function (slide) {
        slide.addEventListener('click', function () {
            var idx = parseInt(slide.dataset.index, 10);
            if (idx !== current) { goTo(idx); resetAuto(); }
        });
    });

    startAuto();
});
