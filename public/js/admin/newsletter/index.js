			    // Filtre dynamique
			    document.getElementById('searchSubs').addEventListener('keyup', function() {
			        const val = this.value.toLowerCase();
			        const rows = document.querySelectorAll('#subsTable tbody tr');
			        rows.forEach(row => {
			            const email = row.querySelector('.email-link');
			            if(email) {
			                row.style.display = email.textContent.toLowerCase().includes(val) ? '' : 'none';
			            }
			        });
			    });