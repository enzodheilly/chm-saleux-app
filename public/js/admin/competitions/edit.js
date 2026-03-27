document.addEventListener('DOMContentLoaded', () => {
			    const rawData = document.getElementById('athletes-data')?.dataset?.athletes || '[]';
			    let allAthletes = [];
			    try { allAthletes = JSON.parse(rawData); } catch(e) { console.error("JSON Error", e); }
			
			    const genderSelect = document.getElementById('genderSelect');
			    const tableBody = document.querySelector('#resultsTable tbody');
			    const addBtn = document.getElementById('addResultBtn');
			    let counter = tableBody.querySelectorAll('tr').length;
			
			    const getGender = (a) => String(a.gender ?? a.equipe ?? a.sexe ?? a.genre ?? '').toLowerCase();
			    const getFirstName = (a) => (a.firstName ?? a.prenom ?? '').toString();
			    const getLastName  = (a) => (a.lastName ?? a.nom ?? '').toString();
			    const getCategory  = (a) => (a.category ?? a.categorie ?? '').toString();
			    const getWeightClass = (a) => (a.weightClass ?? a.categoriePoids ?? '').toString();
			
			    function matchRowsToIds() {
			        const selects = document.querySelectorAll('.js-athlete-select');
			
			        selects.forEach(select => {
			            const initLN = (select.dataset.initLastName || '').trim().toLowerCase();
			            const initFN = (select.dataset.initFirstName || '').trim().toLowerCase();
			
			            if (initLN && initFN) {
			                const found = allAthletes.find(a =>
			                    getLastName(a).trim().toLowerCase() === initLN &&
			                    getFirstName(a).trim().toLowerCase() === initFN
			                );
			
			                if (found) {
			                    select.dataset.selectedId = found.id;
			                }
			            }
			        });
			    }
			
			    function getAllSelectedIds() {
			        const ids = [];
			        document.querySelectorAll('.js-athlete-select').forEach(select => {
			            const val = select.value || select.dataset.selectedId;
			            if (val) ids.push(parseInt(val, 10));
			        });
			        return ids;
			    }
			
			    function renderDropdowns() {
			        const teamType = genderSelect.value;
			        const usedIds = getAllSelectedIds();
			        const selects = document.querySelectorAll('.js-athlete-select');
			
			        selects.forEach(select => {
			            const currentId = select.value
			                ? parseInt(select.value, 10)
			                : (select.dataset.selectedId ? parseInt(select.dataset.selectedId, 10) : null);
			
			            let optionsHTML = '<option value="">-- Select --</option>';
			
			            allAthletes.forEach(a => {
			                const g = getGender(a);
			                let matchTeam = true;
			
			                if (teamType === 'male') {
			                    matchTeam = ['m','h','homme','masculin','male'].some(s => g.includes(s));
			                } else if (teamType === 'female') {
			                    matchTeam = ['f','femme','feminin','female'].some(s => g.includes(s));
			                }
			
			                const isAvailable = !usedIds.includes(a.id) || (a.id === currentId);
			
			                if (matchTeam && isAvailable) {
			                    const selected = (a.id === currentId) ? 'selected' : '';
			                    const ln = getLastName(a);
			                    const fn = getFirstName(a);
			                    const cat = getCategory(a);
			                    const wc  = getWeightClass(a);
			
			                    optionsHTML += `<option value="${a.id}" ${selected}
			                        data-last-name="${ln.replace(/"/g, '&quot;')}"
			                        data-first-name="${fn.replace(/"/g, '&quot;')}"
			                        data-category="${cat.replace(/"/g, '&quot;')}"
			                        data-weight-class="${wc.replace(/"/g, '&quot;')}">
			                        ${ln} ${fn}
			                    </option>`;
			                }
			            });
			
			            select.innerHTML = optionsHTML;
			        });
			    }
			
			    function addRow() {
			        const tr = document.createElement('tr');
			        tr.innerHTML = `
			            <td>
			                <select class="js-athlete-select" style="font-weight:600;"></select>
			            </td>
			
			            <td><input type="text" name="results[${counter}][lastName]" class="input-last-name" required></td>
			            <td><input type="text" name="results[${counter}][firstName]" class="input-first-name" required></td>
			            <td><input type="text" name="results[${counter}][category]" class="input-category"></td>
			            <td><input type="text" name="results[${counter}][weightClass]" class="input-weight-class"></td>
			
			            <td><input type="number" step="1" min="0" name="results[${counter}][snatch]" class="calc-input"></td>
			            <td><input type="number" step="1" min="0" name="results[${counter}][cleanAndJerk]" class="calc-input"></td>
			
			            <td><input type="number" step="1" class="total-output" readonly tabindex="-1" style="opacity:0.7;"></td>
			
			            <td><input type="number" step="0.01" min="0" name="results[${counter}][points]"></td>
			            <td>
			                <input
			                    type="number"
			                    step="0.01"
			                    min="0"
			                    name="results[${counter}][bodyWeight]"
			                    class="input-bw"
			                    placeholder="PDC"
			                >
			            </td>
			            <td><input type="text" name="results[${counter}][rankingLevel]" placeholder="e.g. Regional"></td>
			
			            <td style="text-align:center;"><button type="button" class="btn-remove">×</button></td>
			        `;
			
			        tableBody.appendChild(tr);
			        counter++;
			        renderDropdowns();
			    }
			
			    tableBody.addEventListener('change', (e) => {
			        const t = e.target;
			        const row = t.closest('tr');
			        if (!row) return;
			
			        if (t.classList.contains('js-athlete-select')) {
			            const opt = t.selectedOptions[0];
			
			            if (t.value && opt) {
			                row.querySelector('.input-last-name').value = opt.dataset.lastName || '';
			                row.querySelector('.input-first-name').value = opt.dataset.firstName || '';
			                row.querySelector('.input-category').value = opt.dataset.category || '';
			                row.querySelector('.input-weight-class').value = opt.dataset.weightClass || '';
			                t.dataset.selectedId = t.value;
			            } else {
			                delete t.dataset.selectedId;
			            }
			
			            renderDropdowns();
			        }
			
			        if (t.classList.contains('calc-input')) {
			            const inputs = row.querySelectorAll('.calc-input');
			            const snatch = parseFloat(inputs[0].value) || 0;
			            const cj = parseFloat(inputs[1].value) || 0;
			            const total = snatch + cj;
			            row.querySelector('.total-output').value = total > 0 ? total : '';
			        }
			    });
			
			    tableBody.addEventListener('click', (e) => {
			        if (e.target.classList.contains('btn-remove')) {
			            if (confirm('Delete this row?')) {
			                e.target.closest('tr').remove();
			                renderDropdowns();
			            }
			        }
			    });
			
			    genderSelect.addEventListener('change', () => {
			        document.querySelectorAll('.js-athlete-select').forEach(s => {
			            s.value = "";
			            delete s.dataset.selectedId;
			        });
			        renderDropdowns();
			    });
			
			    addBtn.addEventListener('click', addRow);
			    matchRowsToIds();
			    renderDropdowns();
			});