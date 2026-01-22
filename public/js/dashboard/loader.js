(() => {
    window.addEventListener('load', () => {
        const loader = document.getElementById('dashboard-loader');
        if (!loader) return;
        loader.style.opacity = '0';
        loader.style.transition = 'opacity 0.3s ease';
        setTimeout(() => loader.remove(), 300);
    });
})();
