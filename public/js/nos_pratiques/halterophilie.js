document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.page-header-sport[data-bg]');
    if (header) {
        const supportsWebP = document.createElement('canvas')
            .toDataURL('image/webp').startsWith('data:image/webp');
        const bg = supportsWebP && header.dataset.bgWebp
            ? header.dataset.bgWebp
            : header.dataset.bg;
        header.style.setProperty('--bg-image', 'url(' + bg + ')');
    }
});