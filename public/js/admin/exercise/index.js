		        // Recherche simple en JS
			        document.getElementById('searchExercise').addEventListener('keyup', function() {
			            const val = this.value.toLowerCase();
			            const rows = document.querySelectorAll('#exerciseTable tbody tr');
			
			            rows.forEach(row => {
			                const text = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
			                row.style.display = text.includes(val) ? '' : 'none';
			            });
			        });