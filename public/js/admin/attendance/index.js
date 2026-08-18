document.addEventListener('DOMContentLoaded', function () {

    const accentColor = '#ff6600';
    const textColor = '#888888';
    const data = window.attendanceData || {};

    // 1. GRAPH ENTRÉES PAR JOUR
    const ctxDay = document.getElementById('attendanceDayChart');
    if (ctxDay) {
        new Chart(ctxDay, {
            type: 'line',
            data: {
                labels: data.dayLabels || [],
                datasets: [{
                    label: 'Entrées',
                    data: data.dayCounts || [],
                    borderColor: accentColor,
                    backgroundColor: 'rgba(255, 102, 0, 0.05)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointRadius: 0,
                    pointHoverRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { color: textColor } },
                    x: { grid: { display: false }, ticks: { color: textColor } }
                }
            }
        });
    }

    // 2. GRAPH HEURES DE POINTE
    const ctxHour = document.getElementById('attendanceHourChart');
    if (ctxHour) {
        const hourLabels = Array.from({ length: 24 }, (_, h) => h + 'h');
        new Chart(ctxHour, {
            type: 'bar',
            data: {
                labels: hourLabels,
                datasets: [{
                    label: 'Entrées',
                    data: data.hourCounts || [],
                    backgroundColor: '#e5e5e5',
                    borderRadius: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { display: false, beginAtZero: true },
                    x: { grid: { display: false }, ticks: { color: textColor, font: { size: 10 } } }
                }
            }
        });
    }

    // 3. SCANNER (le scanner USB/Bluetooth se comporte comme un clavier : il tape le code puis Entrée)
    const form = document.getElementById('scan-form');
    const input = document.getElementById('scan-input');
    const feedback = document.getElementById('scan-feedback');

    if (!form || !input || !feedback || !data.scanUrl) {
        return;
    }

    const refocus = () => setTimeout(() => input.focus(), 50);
    document.addEventListener('click', refocus);
    refocus();

    const showFeedback = (message, type) => {
        const colors = { success: 'badge-success', error: 'badge-danger', info: 'badge-info' };
        feedback.innerHTML = '<span class="badge ' + (colors[type] || 'badge-info') + '" style="font-size: 1.1rem; padding: 0.6rem 1.2rem;">' + message + '</span>';
    };

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const token = input.value.trim();
        input.value = '';

        if (!token) {
            return;
        }

        fetch(data.scanUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ token: token, _token: data.csrfToken })
        })
            .then((response) => response.json().then((body) => ({ ok: response.ok, body })))
            .then(({ ok, body }) => {
                if (!ok || !body.success) {
                    showFeedback(body.error || 'QR code inconnu.', 'error');
                    return;
                }

                const label = body.type === 'IN' ? 'Entrée' : 'Sortie';
                showFeedback(label + ' — ' + body.firstName + ' ' + body.lastName + ' (' + body.scannedAt + ')', 'success');
            })
            .catch(() => showFeedback('Erreur de connexion au serveur.', 'error'))
            .finally(refocus);
    });
});
