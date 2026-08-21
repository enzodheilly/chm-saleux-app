document.addEventListener('DOMContentLoaded', function () {
    const section = document.querySelector('.app-section');
    if (!section) return;

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                section.classList.add('is-visible');
                observer.unobserve(section);
            }
        });
    }, { threshold: 0.15 });

    observer.observe(section);
});
