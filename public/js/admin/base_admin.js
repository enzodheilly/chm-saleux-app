// public/js/admin/base_admin.js

// --- Sidebar submenu ---
document.querySelectorAll('[data-submenu]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
        const id = this.getAttribute('data-submenu');
        const item = document.getElementById(id);
        item.classList.toggle('open');
        if (item.classList.contains('open')) localStorage.setItem('menu_' + id, 'open');
        else localStorage.removeItem('menu_' + id);
    });
});

// --- Sidebar mobile ---
const sidebar  = document.getElementById('sidebar');
const overlay  = document.getElementById('overlay');

function toggleSidebar() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
}

document.getElementById('mobile-toggle').addEventListener('click', toggleSidebar);
overlay.addEventListener('click', toggleSidebar);

// --- Thème clair / sombre ---
const html = document.documentElement;

function updateThemeText() {
    const isLight = html.getAttribute('data-theme') === 'light';
    document.getElementById('theme-toggle').textContent = isLight ? 'Mode Sombre' : 'Mode Clair';
}

function toggleTheme() {
    const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeText();
}

document.getElementById('theme-toggle').addEventListener('click', toggleTheme);

// Restaurer le thème sauvegardé
const savedTheme = localStorage.getItem('theme');
if (savedTheme) html.setAttribute('data-theme', savedTheme);

// --- Restaurer les submenus ouverts + lien actif ---
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.nav-item').forEach(function (item) {
        if (localStorage.getItem('menu_' + item.id) === 'open' || item.querySelector('a[href="' + window.location.pathname + '"]')) {
            item.classList.add('open');
            const activeLink = item.querySelector('a[href="' + window.location.pathname + '"]');
            if (activeLink) activeLink.classList.add('active-sub');
        }
    });

    updateThemeText();
});
