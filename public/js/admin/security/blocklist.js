		    // Filtre instantané
			    document.getElementById('searchBlock').addEventListener('keyup', function() {
			        const val = this.value.toLowerCase();
			        const rows = document.querySelectorAll('#blockTable tbody tr');
			        let count = 0;
			        
			        rows.forEach(row => {
			            const isMatch = row.textContent.toLowerCase().includes(val);
			            row.style.display = isMatch ? '' : 'none';
			            if(isMatch) count++;
			        });
			    });