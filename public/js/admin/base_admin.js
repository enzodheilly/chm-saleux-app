// public/js/admin/base_admin.js

// --- Sidebar submenu ---
document.querySelectorAll('[data-submenu]').forEach(function (trigger) {
    trigger.addEventListener('click', function () {
        const id = this.getAttribute('data-submenu');
        const item = document.getElementById(id);
        if (!item) return;
        item.classList.toggle('open');
        if (item.classList.contains('open')) localStorage.setItem('menu_' + id, 'open');
        else localStorage.removeItem('menu_' + id);
    });
});

// --- Sidebar mobile ---
const sidebar  = document.getElementById('sidebar');
const overlay  = document.getElementById('overlay');

function toggleSidebar() {
    if (!sidebar || !overlay) return;
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
}

const mobileToggle = document.getElementById('mobile-toggle');
if (mobileToggle) mobileToggle.addEventListener('click', toggleSidebar);
if (overlay) overlay.addEventListener('click', toggleSidebar);

// --- Thème clair / sombre ---
const html = document.documentElement;

function updateThemeText() {
    const themeBtn = document.getElementById('theme-toggle');
    if (!themeBtn) return;
    const isLight = html.getAttribute('data-theme') === 'light';
    themeBtn.textContent = isLight ? 'Mode Sombre' : 'Mode Clair';
}

function toggleTheme() {
    const newTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeText();
}

const themeToggleBtn = document.getElementById('theme-toggle');
if (themeToggleBtn) themeToggleBtn.addEventListener('click', toggleTheme);

// Restaurer le thème sauvegardé
const savedTheme = localStorage.getItem('theme');
if (savedTheme) html.setAttribute('data-theme', savedTheme);

// --- 🛡️ ENGINE DE SÉCURITÉ V20 (Confirmations) ---
// On utilise la délégation d'événements pour que ça marche même sur les éléments chargés en AJAX
document.addEventListener('click', function (e) {
    // 1. Gestion des LIENS (ex: Reset 2FA, Purge, Débloquer)
    const confirmLink = e.target.closest('.js-confirm-link');
    if (confirmLink) {
        const message = confirmLink.getAttribute('data-confirm') || "Confirmer cette action ?";
        if (!confirm(message)) {
            e.preventDefault();
        }
    }
});

document.addEventListener('submit', function (e) {
    // 2. Gestion des FORMULAIRES (ex: Supprimer un utilisateur, un produit)
    const confirmForm = e.target.closest('.js-confirm-form');
    if (confirmForm) {
        const message = confirmForm.getAttribute('data-confirm') || "Confirmer l'envoi ?";
        if (!confirm(message)) {
            e.preventDefault();
        }
    }
});

// --- Initialisation au chargement ---
document.addEventListener('DOMContentLoaded', function () {
    // 1. Restaurer les submenus ouverts + lien actif
    document.querySelectorAll('.nav-item').forEach(function (item) {
        if (localStorage.getItem('menu_' + item.id) === 'open' || item.querySelector('a[href="' + window.location.pathname + '"]')) {
            item.classList.add('open');
            const activeLink = item.querySelector('a[href="' + window.location.pathname + '"]');
            if (activeLink) activeLink.classList.add('active-sub');
        }
    });

    // 2. Synchroniser le Switch de la page Paramètres (si présent)
    const themeCheckbox = document.getElementById('themeToggleCheckbox');
    if (themeCheckbox) {
        // Coche la case si on est en mode dark
        themeCheckbox.checked = (html.getAttribute('data-theme') === 'dark');
        
        // Écoute le changement du switch
        themeCheckbox.addEventListener('change', function() {
            toggleTheme();
        });
    }

    updateThemeText();
});