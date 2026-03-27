document.addEventListener('DOMContentLoaded', function () {

    const accentColor = '#ff6600';
    const textColor = '#888888';

    const labels7 = window.dashboardData.labels7;
    const loginsSuccessByDay = window.dashboardData.loginsSuccessByDay;
    const newSubscribersByDay = window.dashboardData.newSubscribersByDay;

    // 1. GRAPH CONNEXIONS (LINE)
    const ctx1 = document.getElementById('loginChart');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: labels7,
                datasets: [{
                    label: 'Connexions',
                    data: loginsSuccessByDay,
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

    // 2. GRAPH NEWSLETTER (BAR)
    const ctx2 = document.getElementById('newsletterChart');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels7,
                datasets: [{
                    label: 'Inscrits',
                    data: newSubscribersByDay,
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
});