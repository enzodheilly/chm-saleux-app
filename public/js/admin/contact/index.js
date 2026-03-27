				    // Filtre de recherche dynamique
					    document.getElementById('searchMessages').addEventListener('keyup', function() {
					        const val = this.value.toLowerCase();
					        const rows = document.querySelectorAll('#messagesTable tbody tr');
					        rows.forEach(row => {
					            const text = row.textContent.toLowerCase();
					            row.style.display = text.includes(val) ? '' : 'none';
					        });
					    });