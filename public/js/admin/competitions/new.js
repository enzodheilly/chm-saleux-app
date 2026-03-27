document.addEventListener('DOMContentLoaded', () => {
				    // =========================================================
				    // 1) LOAD ATHLETES DATA
				    // =========================================================
				    const rawData = document.getElementById('athletes-data')?.dataset?.athletes || '[]';
				    let allAthletes = [];
				    try { allAthletes = JSON.parse(rawData); } catch (e) { console.error("JSON Error", e); }
				
				    const genderSelect = document.getElementById('genderSelect');
				    const tableBody = document.querySelector('#resultsTable tbody');
				    const addBtn = document.getElementById('addResultBtn');
				    const form = document.getElementById('competitionForm');
				    let counter = 0;
				
				    // Helpers: support old + new JSON keys
				    const getGender = (a) => String(a.gender ?? a.equipe ?? a.sexe ?? a.genre ?? '').toLowerCase();
				    const getFirstName = (a) => (a.firstName ?? a.prenom ?? '').toString();
				    const getLastName  = (a) => (a.lastName ?? a.nom ?? '').toString();
				    const getCategory  = (a) => (a.category ?? a.categorie ?? '').toString();
				    const getWeightClass = (a) => (a.weightClass ?? a.categoriePoids ?? '').toString();
				
				    // Get IDs already used in table
				    function getUsedIds() {
				        const selects = document.querySelectorAll('.js-athlete-select');
				        const used = [];
				        selects.forEach(select => {
				            if (select.value !== "") used.push(parseInt(select.value, 10));
				        });
				        return used;
				    }
				
				    // Generate options with filter + anti-duplicate
				    function generateOptionsHTML(currentValue = null, usedIds = []) {
				        const teamType = genderSelect.value; // 'male' | 'female' | ''(mixed/all)
				        let html = '<option value="">-- Select --</option>';
				
				        // 1) Filter by gender if selected
				        let filtered = allAthletes;
				        if (teamType === 'male' || teamType === 'female') {
				            filtered = allAthletes.filter(a => {
				                const g = getGender(a);
				                return teamType === 'male'
				                    ? ['m','h','homme','masculin','male'].some(s => g.includes(s))
				                    : ['f','femme','feminin','female'].some(s => g.includes(s));
				            });
				        }
				
				        // 2) Exclude already used IDs except current selection
				        filtered.forEach(a => {
				            const isUsedElsewhere = usedIds.includes(a.id);
				            const isCurrentSelection = (currentValue && parseInt(currentValue, 10) === a.id);
				
				            if (!isUsedElsewhere || isCurrentSelection) {
				                const selected = isCurrentSelection ? 'selected' : '';
				                const ln = getLastName(a);
				                const fn = getFirstName(a);
				                const cat = getCategory(a);
				                const wc  = getWeightClass(a);
				
				                html += `<option value="${a.id}" ${selected}
				                    data-last-name="${ln.replace(/"/g, '&quot;')}"
				                    data-first-name="${fn.replace(/"/g, '&quot;')}"
				                    data-category="${cat.replace(/"/g, '&quot;')}"
				                    data-weight-class="${wc.replace(/"/g, '&quot;')}">
				                    ${ln} ${fn}
				                </option>`;
				            }
				        });
				
				        return html;
				    }
				
				    function updateAllDropdowns() {
				        const selects = document.querySelectorAll('.js-athlete-select');
				        const usedIds = getUsedIds();
				        selects.forEach(select => {
				            const currentVal = select.value;
				            select.innerHTML = generateOptionsHTML(currentVal, usedIds);
				        });
				    }
				
				    function addRow() {
				        const tr = document.createElement('tr');
				        const options = generateOptionsHTML(null, getUsedIds());
				
				        tr.innerHTML = `
				            <td>
				                <select class="js-athlete-select" style="font-weight:600;">
				                    ${options}
				                </select>
				            </td>
				
				            <td><input type="text" name="results[${counter}][lastName]" class="input-last-name" required></td>
				            <td><input type="text" name="results[${counter}][firstName]" class="input-first-name" required></td>
				            <td><input type="text" name="results[${counter}][category]" class="input-category"></td>
				            <td><input type="text" name="results[${counter}][weightClass]" class="input-weight-class"></td>
				
				            <td><input type="number" step="1" min="0" name="results[${counter}][snatch]" class="calc-input"></td>
				            <td><input type="number" step="1" min="0" name="results[${counter}][cleanAndJerk]" class="calc-input"></td>
				
				            {# total: UI only, NOT submitted #}
	<td><input type="number" step="1" class="total-output" readonly tabindex="-1" style="opacity:0.7;"></td>

	<td><input type="number" step="0.01" min="0" name="results[${counter}][points]"></td>
	<td>
		<input type="number" step="0.01" min="0" name="results[${counter}][bodyWeight]" class="input-bw" placeholder="PDC">
	</td>
	<td><input type="text" name="results[${counter}][rankingLevel]" placeholder="e.g. Regional"></td>

	<td style="text-align:center;">
		<button type="button" class="btn-remove">×</button>
	</td>
	`;
				
				        tableBody.appendChild(tr);
				        counter++;
				    }
				
				    // =========================================================
				    // LISTENERS
				    // =========================================================
				
				    genderSelect.addEventListener('change', () => {
				        // reset current selections to avoid male/female mismatch
				        document.querySelectorAll('.js-athlete-select').forEach(s => s.value = "");
				        updateAllDropdowns();
				    });
				
				    tableBody.addEventListener('change', (e) => {
				        const target = e.target;
				        const row = target.closest('tr');
				        if (!row) return;
				
				        // Auto fill + update exclusions
				        if (target.classList.contains('js-athlete-select')) {
				            const opt = target.selectedOptions[0];
				            if (target.value && opt) {
				                row.querySelector('.input-last-name').value = opt.dataset.lastName || '';
				                row.querySelector('.input-first-name').value = opt.dataset.firstName || '';
				                row.querySelector('.input-category').value = opt.dataset.category || '';
				                row.querySelector('.input-weight-class').value = opt.dataset.weightClass || '';
				            }
				            updateAllDropdowns();
				        }
				
				        // Total calc (snatch + cleanAndJerk)
				        if (target.classList.contains('calc-input')) {
				            const inputs = row.querySelectorAll('.calc-input');
				            const snatch = parseFloat(inputs[0].value) || 0;
				            const cj = parseFloat(inputs[1].value) || 0;
				            const total = snatch + cj;
				            row.querySelector('.total-output').value = total > 0 ? total : '';
				        }
				    });
				
				    tableBody.addEventListener('click', (e) => {
				        if (e.target.classList.contains('btn-remove')) {
				            e.target.closest('tr')?.remove();
				            updateAllDropdowns();
				        }
				    });
				
				    addBtn.addEventListener('click', addRow);
				
				    // Init
				    addRow();
				
				    // Optional: before submit, if "Mixed" selected (value=""), it's already null => OK
				    form.addEventListener('submit', () => {
				        // nothing needed
				    });
				});