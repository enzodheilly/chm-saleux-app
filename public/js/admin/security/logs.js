// public/js/admin/security/logs.js

document.addEventListener('DOMContentLoaded', function() {
    const searchInput  = document.getElementById('searchLogs');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const tableRows    = document.querySelectorAll('.log-row');
    const noResultsMsg = document.getElementById('noResults');

    function applyFilters() {
        const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
        const searchText   = searchInput.value.toLowerCase();
        let visibleCount   = 0;

        tableRows.forEach(function (row) {
            const status        = row.dataset.status;
            const text          = row.innerText.toLowerCase();
            const matchesFilter = (activeFilter === 'all') || (status === activeFilter);
            const matchesSearch = text.includes(searchText);

            if (matchesFilter && matchesSearch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        noResultsMsg.style.display = (visibleCount === 0) ? 'block' : 'none';
    }

    filterButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterButtons.forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            applyFilters();
        });
    });

    searchInput.addEventListener('input', applyFilters);

    // --- Géolocalisation IP ---
    const ipElements = document.querySelectorAll('.ip-lookup');
    const uniqueIps  = [...new Set(Array.from(ipElements).map(function (el) { return el.dataset.ip; }))]
        .filter(function (ip) { return ip && !['127.0.0.1', '::1', '—'].includes(ip); });

    uniqueIps.forEach(function (ip) {
        fetch('https://ipapi.co/' + ip + '/json/')
            .then(function (res) { return res.json(); })
            .then(function (data) {
                document.querySelectorAll('.ip-lookup[data-ip="' + ip + '"]').forEach(function (el) {
                    const container = el.nextElementSibling;
                    container.innerHTML = '';

                    if (data.city) {
                        const info = data.city + ', ' + data.country_name;

                        if (data.country_code) {
                            const img = document.createElement('img');
                            img.src = 'https://flagcdn.com/16x12/' + data.country_code.toLowerCase() + '.png';
                            img.style.cssText = 'vertical-align:middle; margin-right:4px;';
                            img.alt = data.country_code;
                            container.appendChild(img);
                        }

                        container.appendChild(document.createTextNode(info));
                    } else {
                        container.innerText = 'Origine inconnue';
                    }
                });
            })
            .catch(function () {
                document.querySelectorAll('.ip-lookup[data-ip="' + ip + '"]').forEach(function (el) {
                    el.nextElementSibling.innerText = 'Non localisable';
                });
            });
    });
});

document.querySelectorAll('[data-confirm]').forEach(function (el) {
    el.addEventListener('click', function (e) {
        if (!confirm(this.dataset.confirm)) {
            e.preventDefault();
        }
    });
});