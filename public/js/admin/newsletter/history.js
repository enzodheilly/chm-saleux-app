// public/js/admin/newsletter/history.js

document.addEventListener('DOMContentLoaded', function () {

    const campaigns = window.newsletterData.campaigns;
    const rawData   = window.newsletterData.rawData;

    // --- Sanitiseur léger — supprime scripts et handlers inline ---
    function sanitizeHTML(html) {
        const tmp = document.createElement('div');
        tmp.innerHTML = html;
        tmp.querySelectorAll('script, iframe, object, embed').forEach(function (el) { el.remove(); });
        tmp.querySelectorAll('*').forEach(function (el) {
            Array.from(el.attributes).forEach(function (attr) {
                if (attr.name.startsWith('on')) el.removeAttribute(attr.name);
            });
        });
        return tmp.innerHTML;
    }

    // --- Progress bars (remplace style="width:X%") ---
    document.querySelectorAll('.progress-bar[data-width]').forEach(function (bar) {
        bar.style.width = bar.dataset.width + '%';
    });

    // --- Modal ---
    const modal        = document.getElementById('previewModal');
    const modalBody    = document.getElementById('modalBody');
    const modalSubject = document.getElementById('modalSubject');
    const closeModal   = document.getElementById('closeModal');

    function showPreview(id) {
        const camp = campaigns.find(function (c) { return c.id === parseInt(id); });
        if (!camp) return;
        modalSubject.textContent = camp.subject;
        modalBody.innerHTML = sanitizeHTML(camp.content);
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    closeModal.addEventListener('click', function () {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    document.querySelectorAll('.btn-preview[data-id]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            showPreview(this.dataset.id);
        });
    });

    // --- Chart.js ---
    const ctx = document.getElementById('newsletterStatsChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: rawData.map(function (c) { return c.sentAt; }),
            datasets: [
                {
                    label: "Taux d'ouverture (%)",
                    data: rawData.map(function (c) {
                        return c.recipientCount > 0 ? (c.openCount / c.recipientCount * 100) : 0;
                    }),
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34,197,94,0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    pointRadius: 4,
                    fill: true
                },
                {
                    label: 'Taux de clic (%)',
                    data: rawData.map(function (c) {
                        return c.recipientCount > 0 ? (c.clickCount / c.recipientCount * 100) : 0;
                    }),
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    pointRadius: 4,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true, labels: { color: '#9ca3af', font: { family: 'inherit', size: 12 } } },
                tooltip: { backgroundColor: '#1f2937', titleColor: '#fff', bodyColor: '#fff', padding: 12, cornerRadius: 4 }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: { color: 'rgba(255,255,255,0.05)' },
                    ticks: { color: '#9ca3af', callback: function (value) { return value + '%'; } }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#9ca3af' }
                }
            }
        }
    });

});