// public/js/admin/member_plan/edit.js

document.addEventListener('DOMContentLoaded', function () {

    // --- Confirmation suppression ---
    document.querySelectorAll('[data-confirm][data-submit]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (confirm(this.dataset.confirm)) {
                document.getElementById(this.dataset.submit).submit();
            }
        });
    });

    // --- Recalcul du prix mensuel ---
    const priceInput   = document.getElementById('input-price');
    const freqSelect   = document.getElementById('input-freq');
    const monthlyInput = document.getElementById('input-monthly');

    function calculateMonthly() {
        const price  = parseFloat(priceInput.value);
        const period = freqSelect.value;

        if (isNaN(price)) {
            monthlyInput.value = '';
            return;
        }

        let divisor = 1;
        if (period === 'quarter')  divisor = 3;
        else if (period === 'semester') divisor = 6;
        else if (period === 'year')     divisor = 12;

        monthlyInput.value = (price / divisor).toFixed(2);
    }

    if (priceInput && freqSelect) {
        priceInput.addEventListener('input', calculateMonthly);
        freqSelect.addEventListener('change', calculateMonthly);
        calculateMonthly();
    }

});