(function () {
	var title = document.querySelector('.disc-title');
	if (!title) return;

	var observer = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.25 });

	observer.observe(title);
})();
