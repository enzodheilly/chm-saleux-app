document.addEventListener('DOMContentLoaded', function () {

    // Header background
    const header = document.querySelector('.page-header-sport[data-bg]');
    if (header) {
        header.style.setProperty('--bg-image', 'url(' + header.dataset.bg + ')');
    }

    // Cardio background
    const cardioBg = document.querySelector('.cardio-bg[data-bg]');
    if (cardioBg) {
        cardioBg.style.setProperty('background-image', 'url(' + cardioBg.dataset.bg + ')');
    }

});