const search = document.getElementById('searchTpl');
		    const goal = document.getElementById('filterGoal');
		    const level = document.getElementById('filterLevel');
		    const rows = () => document.querySelectorAll('#tplTable tbody tr:not(:last-child)');
		
		    function applyFilters() {
		        const q = (search.value || '').toLowerCase();
		        const g = goal.value;
		        const l = level.value;
		
		        document.querySelectorAll('#tplTable tbody tr').forEach(row => {
		            if (row.cells.length < 2) return; // Ignore la ligne "Aucun template"
		
		            const text = row.textContent.toLowerCase();
		            const rowGoal = row.getAttribute('data-goal') || '';
		            const rowLevel = row.getAttribute('data-level') || '';
		
		            const matchQ = !q || text.includes(q);
		            const matchG = !g || rowGoal === g;
		            const matchL = !l || rowLevel === l;
		
		            row.style.display = (matchQ && matchG && matchL) ? '' : 'none';
		        });
		    }
		
		    [search, goal, level].forEach(el => el.addEventListener('input', applyFilters));