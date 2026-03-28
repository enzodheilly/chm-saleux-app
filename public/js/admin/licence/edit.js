// public/js/admin/licence/new.js

document.addEventListener('DOMContentLoaded', function () {

    const selectMembershipPlan = document.querySelector('#licence_membershipPlan');
    const benefitsBox = document.getElementById('membership-plan-benefits');

    if (!selectMembershipPlan || !benefitsBox) return;

    async function loadBenefits() {
        const id = selectMembershipPlan.value;

        if (!id) {
            benefitsBox.style.display = 'none';
            benefitsBox.innerHTML = '';
            return;
        }

        try {
            const url = window.licenceData.benefitsUrl.replace('__ID__', id);

            const resp = await fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            if (!resp.ok) throw new Error('Réponse HTTP ' + resp.status);

            const data = await resp.json();

            if (data.benefits && data.benefits.length > 0) {
                const cleanList = data.benefits.map(function (item) {
                    if (typeof item !== 'string') return item;
                    const parts = item.split('|');
                    return parts.length > 1 ? parts[1].trim() : item;
                });

                benefitsBox.innerHTML =
                    '<h4>Inclus dans ' + data.name + ' :</h4>' +
                    '<ul class="avantages-list">' +
                    cleanList.map(function (item) { return '<li>' + item + '</li>'; }).join('') +
                    '</ul>';
                benefitsBox.style.display = 'block';
            } else {
                benefitsBox.style.display = 'none';
                benefitsBox.innerHTML = '';
            }
        } catch (e) {
            console.error('Erreur chargement benefits', e);
            benefitsBox.style.display = 'none';
            benefitsBox.innerHTML = '';
        }
    }

    selectMembershipPlan.addEventListener('change', loadBenefits);

    if (selectMembershipPlan.value) {
        loadBenefits();
    }
});