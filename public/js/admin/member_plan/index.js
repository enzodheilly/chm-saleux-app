document.addEventListener('DOMContentLoaded', function () {

    // Bouton nouvelle offre
    const btn = document.querySelector('.btn-create');
    if (btn) {
        btn.addEventListener('click', function () {
            window.location.href = btn.dataset.href;
        });
    }

    // Recherche
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            document.querySelectorAll('#offersTable tbody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        });
    }

    // Confirmation suppression
    document.querySelectorAll('form[data-confirm]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            if (!confirm(this.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });

});