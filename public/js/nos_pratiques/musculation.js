document.addEventListener('DOMContentLoaded', function () {
    const supportsWebP = document.createElement('canvas')
        .toDataURL('image/webp').startsWith('data:image/webp');

    // Header background
    const header = document.querySelector('.page-header-sport[data-bg]');
    if (header) {
        const bg = supportsWebP && header.dataset.bgWebp
            ? header.dataset.bgWebp
            : header.dataset.bg;
        header.style.setProperty('--bg-image', 'url(' + bg + ')');
    }

    // Cardio background
    const cardioBg = document.querySelector('.cardio-bg[data-bg]');
    if (cardioBg) {
        const bg = supportsWebP && cardioBg.dataset.bgWebp
            ? cardioBg.dataset.bgWebp
            : cardioBg.dataset.bg;
        cardioBg.style.setProperty('background-image', 'url(' + bg + ')');
    }
});