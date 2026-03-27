		    document.getElementById('searchInput').addEventListener('keyup', function() {
			        const filter = this.value.toLowerCase();
			        const rows = document.querySelectorAll('#athleteTable tbody tr');
			
			        rows.forEach(row => {
			            const text = row.textContent.toLowerCase();
			            row.style.display = text.includes(filter) ? '' : 'none';
			        });
			    });

				document.addEventListener('DOMContentLoaded', function () {
    const btn = document.querySelector('.btn-create');
    if (btn) {
        btn.addEventListener('click', function () {
            window.location.href = btn.dataset.href;
        });
    }
});