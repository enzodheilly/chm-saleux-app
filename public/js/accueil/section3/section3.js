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

	/* ── Molette → scroll horizontal ── */
	wrap.addEventListener('wheel', function (e) {
		if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
			e.preventDefault();
			wrap.scrollLeft += e.deltaY * 1.2;
		}
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
