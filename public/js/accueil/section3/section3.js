document.addEventListener('DOMContentLoaded', function () {
	var wrap  = document.querySelector('.hm-equip-wrap');
	var track = document.getElementById('equipTrack');
	var prev  = document.getElementById('equipPrev');
	var next  = document.getElementById('equipNext');

	if (!track || !wrap) return;

	var cards = Array.from(track.querySelectorAll('.hm-equip-card'));
	if (!cards.length) return;

	var CARD_W   = 260 + 16; // flex-basis + gap
	var ACTIVE_W = 380 + 16;

	/* ── Carte active ── */
	function setActive(index) {
		cards.forEach(function (c, i) { c.classList.toggle('is-active', i === index); });
	}

	cards.forEach(function (card, i) {
		card.addEventListener('click', function () { setActive(i); });
	});

	setActive(0);

	/* ── Boutons ── */
	prev && prev.addEventListener('click', function () {
		wrap.scrollBy({ left: -ACTIVE_W, behavior: 'smooth' });
	});
	next && next.addEventListener('click', function () {
		wrap.scrollBy({ left: ACTIVE_W, behavior: 'smooth' });
	});

	/* ── Molette → scroll horizontal (délai d'intention 500ms) ──
	 * Par défaut le scroll vertical de la page passe librement.
	 * Le mode horizontal ne s'active qu'après que la souris soit
	 * restée immobile sur la galerie pendant 500ms sans scroller.
	 */
	var hScrollActive = false;
	var intentTimer   = null;

	wrap.addEventListener('mouseenter', function () {
		intentTimer = setTimeout(function () {
			hScrollActive = true;
		}, 500);
	});

	wrap.addEventListener('mouseleave', function () {
		clearTimeout(intentTimer);
		hScrollActive = false;
	});

	wrap.addEventListener('wheel', function (e) {
		/* Scroll horizontal natif (trackpad) : toujours laisser passer */
		if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) return;

		if (hScrollActive) {
			/* Mode actif : convertit la molette verticale en scroll horizontal */
			e.preventDefault();
			wrap.scrollLeft += e.deltaY * 1.2;
		}
		/* Sinon : event non intercepté → scroll vertical normal de la page */
	}, { passive: false });

	/* ── Drag souris ── */
	var isDragging = false;
	var startX     = 0;
	var scrollLeft = 0;

	wrap.addEventListener('mousedown', function (e) {
		isDragging = true;
		startX     = e.pageX - wrap.offsetLeft;
		scrollLeft = wrap.scrollLeft;
		wrap.classList.add('is-grabbing');
	});

	wrap.addEventListener('mouseleave', function () {
		isDragging = false;
		wrap.classList.remove('is-grabbing');
	});

	wrap.addEventListener('mouseup', function () {
		isDragging = false;
		wrap.classList.remove('is-grabbing');
	});

	wrap.addEventListener('mousemove', function (e) {
		if (!isDragging) return;
		e.preventDefault();
		var x    = e.pageX - wrap.offsetLeft;
		var walk = (x - startX) * 1.5;
		wrap.scrollLeft = scrollLeft - walk;
	});
});
