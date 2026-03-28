document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-confirm][data-submit]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (confirm(this.dataset.confirm)) {
                document.getElementById(this.dataset.submit).submit();
            }
        });
    });
});