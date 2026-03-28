document.addEventListener('DOMContentLoaded', function () {

    // Recherche
    const searchInput = document.getElementById('searchLicence');
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            document.querySelectorAll('#licenceTable tbody tr').forEach(function (row) {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
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