(function () {
	var btn = document.getElementById('arcMobileMore');
	if (!btn) return;
	btn.addEventListener('click', function () {
		var grid = document.querySelector('.arc-grid');
		var wrap = document.getElementById('arcMoreWrap');
		if (grid) grid.classList.add('arc-grid--expanded');
		if (wrap) wrap.classList.add('hidden');
	});
})();
