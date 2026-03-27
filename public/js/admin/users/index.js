// public/js/admin/users/index.js

document.addEventListener('DOMContentLoaded', function () {

    // --- Bouton créer un compte ---
    const btn = document.querySelector('.btn-action');
    if (btn) {
        btn.addEventListener('click', function () {
            window.location.href = btn.dataset.href;
        });
    }

    // --- Recherche en temps réel ---
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#userTable tbody tr');

            rows.forEach(function (row) {
                const name = row.querySelector('.u-name')?.textContent.toLowerCase() || '';
                const email = row.querySelector('.u-email')?.textContent.toLowerCase() || '';
                row.style.display = (name.includes(filter) || email.includes(filter)) ? '' : 'none';
            });
        });
    }

    // --- Confirmations (data-confirm) ---
    document.querySelectorAll('[data-confirm]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (!confirm(this.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });

});
