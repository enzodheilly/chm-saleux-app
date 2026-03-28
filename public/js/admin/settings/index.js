document.addEventListener('DOMContentLoaded', function () {

    // Toggle thème
    const checkbox = document.getElementById('themeToggleCheckbox');
    const html = document.documentElement;

    if (checkbox) {
        checkbox.checked = html.getAttribute('data-theme') === 'light';
        checkbox.addEventListener('change', function () {
            const newTheme = this.checked ? 'light' : 'dark';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }

    // Reset sessions
    const btnReset = document.getElementById('btn-reset-sessions');
    if (btnReset) {
        btnReset.addEventListener('click', function () {
            alert('Cette action va réinitialiser vos tokens de connexion.');
        });
    }

});