document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('.page-header-sport[data-bg]');
    if (header) {
        header.style.setProperty('--bg-image', 'url(' + header.dataset.bg + ')');
    }
});