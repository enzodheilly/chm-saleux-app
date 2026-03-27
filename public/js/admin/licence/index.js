	    document.getElementById('searchLicence').addEventListener('keyup', function() {
			        const val = this.value.toLowerCase();
			        const rows = document.querySelectorAll('#licenceTable tbody tr');
			
			        rows.forEach(row => {
			            const number = row.querySelector('.licence-number')?.textContent.toLowerCase() || '';
			            const text = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
			
			            row.style.display = (number.includes(val) || text.includes(val)) ? '' : 'none';
			        });
			    });