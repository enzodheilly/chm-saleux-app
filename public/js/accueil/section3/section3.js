document.addEventListener('DOMContentLoaded', () => {
    const track = document.getElementById('equipTrack');
    const prev  = document.getElementById('equipPrev');
    const next  = document.getElementById('equipNext');

    if (!track) return;

    const cards = Array.from(track.querySelectorAll('.hm-equip-card'));
    if (!cards.length) return;

    let current = 0;

    function setActive(index) {
        cards.forEach((c, i) => c.classList.toggle('is-active', i === index));
        current = index;
        const card = cards[index];
        const wrap = track.parentElement;
        const offset = card.offsetLeft - wrap.offsetWidth / 2 + card.offsetWidth / 2;
        track.style.transform = `translateX(${-Math.max(0, offset)}px)`;
    }

    cards.forEach((card, i) => card.addEventListener('click', () => setActive(i)));
    prev?.addEventListener('click', () => setActive(Math.max(0, current - 1)));
    next?.addEventListener('click', () => setActive(Math.min(cards.length - 1, current + 1)));

    setActive(0);
});
