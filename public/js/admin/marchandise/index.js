		document.getElementById('searchItem').addEventListener('keyup', function() {
		    const val = this.value.toLowerCase();
		    const rows = document.querySelectorAll('#itemTable tbody tr');
		
		    rows.forEach(row => {
		        row.style.display = row.textContent.toLowerCase().includes(val) ? '' : 'none';
		    });
		});