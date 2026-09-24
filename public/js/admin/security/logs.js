// public/js/admin/security/logs.js

document.addEventListener('DOMContentLoaded', function () {

    // --- Recherche client-side (filtre le texte dans la table) ---
    var searchInput = document.getElementById('searchLogs');
    var tableRows   = document.querySelectorAll('.log-row');
    var noResults   = document.getElementById('noResults');

    function applySearch() {
        var term = searchInput ? searchInput.value.toLowerCase() : '';
        var visible = 0;

        tableRows.forEach(function (row) {
            var match = !term || row.innerText.toLowerCase().includes(term);
            row.style.display = match ? '' : 'none';
            if (match) visible++;
        });

        if (noResults) {
            noResults.style.display = (visible === 0 && term) ? 'block' : 'none';
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', applySearch);
    }

    // --- Confirmation avant action destructive ---
    document.querySelectorAll('[data-confirm]').forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (!confirm(this.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });

    // --- Géolocalisation IP ---
    var ipElements = document.querySelectorAll('.ip-lookup');
    var uniqueIps  = [];

    ipElements.forEach(function (el) {
        var ip = el.dataset.ip;
        if (ip && !['127.0.0.1', '::1', '—', ''].includes(ip) && !uniqueIps.includes(ip)) {
            uniqueIps.push(ip);
        }
    });

    uniqueIps.forEach(function (ip) {
        fetch('https://ipapi.co/' + ip + '/json/')
            .then(function (res) { return res.json(); })
            .then(function (data) {
                document.querySelectorAll('.ip-lookup[data-ip="' + ip + '"]').forEach(function (el) {
                    var geo = el.nextElementSibling;
                    if (!geo || !geo.classList.contains('ip-geo')) return;
                    geo.innerHTML = '';

                    if (data.city) {
                        if (data.country_code) {
                            var img = document.createElement('img');
                            img.src = 'https://flagcdn.com/16x12/' + data.country_code.toLowerCase() + '.png';
                            img.style.cssText = 'vertical-align:middle; margin-right:4px;';
                            img.alt = data.country_code;
                            geo.appendChild(img);
                        }
                        geo.appendChild(document.createTextNode(data.city + ', ' + data.country_name));
                    } else {
                        geo.innerText = 'Origine inconnue';
                    }
                });
            })
            .catch(function () {
                document.querySelectorAll('.ip-lookup[data-ip="' + ip + '"]').forEach(function (el) {
                    var geo = el.nextElementSibling;
                    if (geo && geo.classList.contains('ip-geo')) {
                        geo.innerText = 'Non localisable';
                    }
                });
            });
    });
});
