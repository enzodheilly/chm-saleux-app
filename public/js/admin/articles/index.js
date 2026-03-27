	    document.getElementById('searchInput').addEventListener('keyup', function() {
			        const filter = this.value.toLowerCase();
			        const rows = document.querySelectorAll('#articlesTable tbody tr');
			
			        rows.forEach(row => {
			            const title = row.querySelector('.title-group strong')?.textContent?.toLowerCase() || '';
			            row.style.display = title.includes(filter) ? '' : 'none';
			        });
			    });