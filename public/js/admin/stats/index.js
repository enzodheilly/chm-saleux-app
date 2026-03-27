// Configuration globale Chart.js
Chart.defaults.color = '#94a3b8';
Chart.defaults.font.family = "'Segoe UI', Roboto, Helvetica, Arial, sans-serif";
Chart.defaults.scale.grid.color = 'rgba(255, 255, 255, 0.05)';

// ✅ Lecture des données passées depuis Twig
const labels = window.statsData.labels;
const userRegistrations = window.statsData.userRegistrations;
const articlesPublished = window.statsData.articlesPublished;

// 1. Graphique Inscriptions (Ligne avec zone remplie)
new Chart(document.getElementById('usersChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Inscriptions',
            data: userRegistrations,
            borderColor: '#ff6600',
            backgroundColor: 'rgba(255, 102, 0, 0.05)',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointRadius: 5,
            pointHoverRadius: 8,
            pointBackgroundColor: '#ff6600',
            pointBorderColor: '#1a1c23',
            pointBorderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: { padding: 12, backgroundColor: '#1e293b' }
        },
        scales: {
            y: { beginAtZero: true, ticks: { precision: 0 } },
            x: { grid: { display: false } }
        }
    }
});

// 2. Graphique Articles (Barres stylisées)
new Chart(document.getElementById('articlesChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Articles',
            data: articlesPublished,
            backgroundColor: '#3b82f6',
            hoverBackgroundColor: '#60a5fa',
            borderRadius: 4,
            barThickness: 16
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: { padding: 12, backgroundColor: '#1e293b' }
        },
        scales: {
            y: { beginAtZero: true, ticks: { precision: 0, stepSize: 1 } },
            x: { grid: { display: false } }
        }
    }
});