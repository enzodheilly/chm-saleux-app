document.addEventListener('DOMContentLoaded', function () {

    const searchInput  = document.getElementById('searchTpl');
    const filterGoal   = document.getElementById('filterGoal');
    const filterLevel  = document.getElementById('filterLevel');

    function filterRows() {
        const search = searchInput.value.toLowerCase();
        const goal   = filterGoal.value;
        const level  = filterLevel.value;

        document.querySelectorAll('#tplTable tbody tr').forEach(function (row) {
            const matchSearch = row.textContent.toLowerCase().includes(search);
            const matchGoal   = !goal  || row.dataset.goal  === goal;
            const matchLevel  = !level || row.dataset.level === level;
            row.style.display = (matchSearch && matchGoal && matchLevel) ? '' : 'none';
        });
    }

    searchInput.addEventListener('keyup', filterRows);
    filterGoal.addEventListener('change', filterRows);
    filterLevel.addEventListener('change', filterRows);

    document.querySelectorAll('form[data-confirm]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            if (!confirm(this.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });

});