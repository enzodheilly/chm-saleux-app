document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchSubs');
    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const filter = this.value.toLowerCase();
            document.querySelectorAll('#subsTable tbody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
            });
        });
    }
});