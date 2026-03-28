// public/js/admin/competitions/new.js

document.addEventListener('DOMContentLoaded', function () {

    // --- Données athlètes ---
    const rawData = document.getElementById('athletes-data')?.dataset?.athletes || '[]';
    let allAthletes = [];
    try { allAthletes = JSON.parse(rawData); } catch (e) { console.error('JSON Error', e); }

    const genderSelect = document.getElementById('genderSelect');
    const tableBody    = document.querySelector('#resultsTable tbody');
    const addBtn       = document.getElementById('addResultBtn');
    let counter        = 0;

    const getGender      = (a) => String(a.gender ?? a.equipe ?? a.sexe ?? a.genre ?? '').toLowerCase();
    const getFirstName   = (a) => (a.firstName ?? a.prenom ?? '').toString();
    const getLastName    = (a) => (a.lastName ?? a.nom ?? '').toString();
    const getCategory    = (a) => (a.category ?? a.categorie ?? '').toString();
    const getWeightClass = (a) => (a.weightClass ?? a.categoriePoids ?? '').toString();

    function getUsedIds() {
        const used = [];
        document.querySelectorAll('.js-athlete-select').forEach(function (select) {
            if (select.value !== '') used.push(parseInt(select.value, 10));
        });
        return used;
    }

    function generateOptionsHTML(currentValue, usedIds) {
        const teamType = genderSelect.value;
        let html = '<option value="">-- Select --</option>';

        let filtered = allAthletes;
        if (teamType === 'male' || teamType === 'female') {
            filtered = allAthletes.filter(function (a) {
                const g = getGender(a);
                return teamType === 'male'
                    ? ['m', 'h', 'homme', 'masculin', 'male'].some(function (s) { return g.includes(s); })
                    : ['f', 'femme', 'feminin', 'female'].some(function (s) { return g.includes(s); });
            });
        }

        filtered.forEach(function (a) {
            const isUsedElsewhere    = usedIds.includes(a.id);
            const isCurrentSelection = (currentValue && parseInt(currentValue, 10) === a.id);

            if (!isUsedElsewhere || isCurrentSelection) {
                const selected = isCurrentSelection ? 'selected' : '';
                const ln  = getLastName(a);
                const fn  = getFirstName(a);
                const cat = getCategory(a);
                const wc  = getWeightClass(a);

                html +=
                    '<option value="' + a.id + '" ' + selected +
                    ' data-last-name="' + ln.replace(/"/g, '&quot;') + '"' +
                    ' data-first-name="' + fn.replace(/"/g, '&quot;') + '"' +
                    ' data-category="' + cat.replace(/"/g, '&quot;') + '"' +
                    ' data-weight-class="' + wc.replace(/"/g, '&quot;') + '">' +
                    ln + ' ' + fn +
                    '</option>';
            }
        });

        return html;
    }

    function updateAllDropdowns() {
        const usedIds = getUsedIds();
        document.querySelectorAll('.js-athlete-select').forEach(function (select) {
            select.innerHTML = generateOptionsHTML(select.value, usedIds);
        });
    }

    function addRow() {
        const tr      = document.createElement('tr');
        const options = generateOptionsHTML(null, getUsedIds());

        tr.innerHTML =
            '<td><select class="js-athlete-select athlete-select-bold">' + options + '</select></td>' +
            '<td><input type="text" name="results[' + counter + '][lastName]" class="input-last-name" required></td>' +
            '<td><input type="text" name="results[' + counter + '][firstName]" class="input-first-name" required></td>' +
            '<td><input type="text" name="results[' + counter + '][category]" class="input-category"></td>' +
            '<td><input type="text" name="results[' + counter + '][weightClass]" class="input-weight-class"></td>' +
            '<td><input type="number" step="1" min="0" name="results[' + counter + '][snatch]" class="calc-input"></td>' +
            '<td><input type="number" step="1" min="0" name="results[' + counter + '][cleanAndJerk]" class="calc-input"></td>' +
            '<td><input type="number" step="1" class="total-output input-readonly" readonly tabindex="-1"></td>' +
            '<td><input type="number" step="0.01" min="0" name="results[' + counter + '][points]"></td>' +
            '<td><input type="number" step="0.01" min="0" name="results[' + counter + '][bodyWeight]" class="input-bw" placeholder="PDC"></td>' +
            '<td><input type="text" name="results[' + counter + '][rankingLevel]" placeholder="e.g. Regional"></td>' +
            '<td class="td-center"><button type="button" class="btn-remove">×</button></td>';

        tableBody.appendChild(tr);
        counter++;
    }

    genderSelect.addEventListener('change', function () {
        document.querySelectorAll('.js-athlete-select').forEach(function (s) { s.value = ''; });
        updateAllDropdowns();
    });

    tableBody.addEventListener('change', function (e) {
        const target = e.target;
        const row    = target.closest('tr');
        if (!row) return;

        if (target.classList.contains('js-athlete-select')) {
            const opt = target.selectedOptions[0];
            if (target.value && opt) {
                row.querySelector('.input-last-name').value    = opt.dataset.lastName || '';
                row.querySelector('.input-first-name').value   = opt.dataset.firstName || '';
                row.querySelector('.input-category').value     = opt.dataset.category || '';
                row.querySelector('.input-weight-class').value = opt.dataset.weightClass || '';
            }
            updateAllDropdowns();
        }

        if (target.classList.contains('calc-input')) {
            const inputs = row.querySelectorAll('.calc-input');
            const snatch = parseFloat(inputs[0].value) || 0;
            const cj     = parseFloat(inputs[1].value) || 0;
            const total  = snatch + cj;
            row.querySelector('.total-output').value = total > 0 ? total : '';
        }
    });

    tableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-remove')) {
            e.target.closest('tr')?.remove();
            updateAllDropdowns();
        }
    });

    addBtn.addEventListener('click', addRow);
    addRow();
});
