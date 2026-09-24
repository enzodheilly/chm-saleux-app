/* ================================================================
   DASHBOARD — Charts & Live Clock
   ================================================================ */

document.addEventListener('DOMContentLoaded', function () {

    var DATA    = window.__dash;
    var ORANGE  = '#F57706';
    var GREEN   = '#22c55e';
    var RED     = '#ef4444';
    var BLUE    = '#3b82f6';
    var PURPLE  = '#8b5cf6';
    var YELLOW  = '#eab308';
    var MUTED   = 'rgba(255,255,255,0.2)';

    Chart.defaults.color = 'rgba(255,255,255,0.35)';
    Chart.defaults.font.family = 'inherit';

    /* ── Horloge live ───────────────────────────────────────── */
    var clockEl = document.getElementById('liveClock');
    function updateClock() {
        if (!clockEl) return;
        var now = new Date();
        var h = String(now.getHours()).padStart(2, '0');
        var m = String(now.getMinutes()).padStart(2, '0');
        var s = String(now.getSeconds()).padStart(2, '0');
        clockEl.textContent = h + ':' + m + ':' + s;
    }
    updateClock();
    setInterval(updateClock, 1000);

    /* ── Graphique linéaire (connexions vs échecs) ──────────── */
    var lineCtx = document.getElementById('lineChart');
    var lineChart = null;
    var currentPeriod = 'd7';

    function buildLineChart(period) {
        var d = DATA.line[period];
        if (!d) return;

        var cfg = {
            type: 'line',
            data: {
                labels: d.labels,
                datasets: [
                    {
                        label: 'Connexions réussies',
                        data: d.success,
                        borderColor: GREEN,
                        backgroundColor: 'rgba(34,197,94,0.07)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 3,
                        pointHoverRadius: 6,
                        pointBackgroundColor: GREEN,
                        pointBorderColor: '#111',
                        pointBorderWidth: 2,
                    },
                    {
                        label: 'Échecs',
                        data: d.fails,
                        borderColor: RED,
                        backgroundColor: 'rgba(239,68,68,0.07)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 3,
                        pointHoverRadius: 6,
                        pointBackgroundColor: RED,
                        pointBorderColor: '#111',
                        pointBorderWidth: 2,
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            font: { size: 12, weight: '700' }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1a1a1a',
                        borderColor: 'rgba(255,255,255,0.08)',
                        borderWidth: 1,
                        padding: 12,
                        titleColor: '#fff',
                        bodyColor: 'rgba(255,255,255,0.6)',
                        callbacks: {
                            label: function(ctx) {
                                return ' ' + ctx.dataset.label + ' : ' + ctx.parsed.y;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        ticks: { stepSize: 1 },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false }
                    }
                }
            }
        };

        if (lineChart) {
            lineChart.data.labels = d.labels;
            lineChart.data.datasets[0].data = d.success;
            lineChart.data.datasets[1].data = d.fails;
            lineChart.update('active');
        } else {
            lineChart = new Chart(lineCtx, cfg);
        }
    }

    if (lineCtx) {
        buildLineChart(currentPeriod);

        document.getElementById('periodTabs').addEventListener('click', function (e) {
            var btn = e.target.closest('.db-period-btn');
            if (!btn) return;
            document.querySelectorAll('.db-period-btn').forEach(function (b) { b.classList.remove('active'); });
            btn.classList.add('active');
            buildLineChart(btn.dataset.period);
        });
    }

    /* ── Donut chart ────────────────────────────────────────── */
    var donutCtx = document.getElementById('donutChart');
    if (donutCtx && DATA.donut) {
        var donutColors = [GREEN, RED, ORANGE, PURPLE, BLUE, YELLOW];
        var donutLabels = DATA.donut.labels;
        var donutValues = DATA.donut.values;
        var total = donutValues.reduce(function (a, b) { return a + b; }, 0);

        if (total === 0) {
            donutCtx.style.display = 'none';
            var emptyMsg = document.createElement('p');
            emptyMsg.style.cssText = 'color:rgba(255,255,255,0.25);font-size:0.85rem;text-align:center;padding:2rem 0;';
            emptyMsg.textContent = 'Aucun log enregistré';
            donutCtx.parentNode.insertBefore(emptyMsg, donutCtx);
        } else {

        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: donutLabels,
                datasets: [{
                    data: donutValues,
                    backgroundColor: donutColors.map(function (c) { return c; }),
                    borderColor: '#111',
                    borderWidth: 3,
                    hoverOffset: 8,
                }]
            },
            options: {
                responsive: true,
                cutout: '72%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1a1a1a',
                        borderColor: 'rgba(255,255,255,0.08)',
                        borderWidth: 1,
                        padding: 12,
                        callbacks: {
                            label: function (ctx) {
                                var pct = total > 0 ? Math.round(ctx.parsed / total * 100) : 0;
                                return ' ' + ctx.label + ' : ' + ctx.parsed + ' (' + pct + '%)';
                            }
                        }
                    }
                }
            }
        });

        // Légende manuelle
        var legendEl = document.getElementById('donutLegend');
        if (legendEl) {
            donutLabels.forEach(function (label, i) {
                var pct = total > 0 ? Math.round(donutValues[i] / total * 100) : 0;
                var item = document.createElement('div');
                item.className = 'db-legend-item';
                item.innerHTML = '<span class="db-legend-dot" style="background:' + donutColors[i] + '"></span>'
                    + '<span class="db-legend-label">' + label + '</span>'
                    + '<span class="db-legend-value">' + donutValues[i] + '<span style="color:rgba(255,255,255,0.3);font-size:0.72rem;font-weight:500"> (' + pct + '%)</span></span>';
                legendEl.appendChild(item);
            });
        }
        } // end else (total > 0)
    }

    /* ── Donut OS (dans la card donut, section basse) ────────── */
    var osCtx = document.getElementById('osChart');
    if (osCtx && DATA.os && DATA.os.labels.length > 0) {
        var osColors = [BLUE, PURPLE, ORANGE, YELLOW, GREEN, RED];
        var osLabels = DATA.os.labels;
        var osValues = DATA.os.values;
        var osTotal  = osValues.reduce(function (a, b) { return a + b; }, 0);

        new Chart(osCtx, {
            type: 'doughnut',
            data: {
                labels: osLabels,
                datasets: [{
                    data: osValues,
                    backgroundColor: osColors,
                    borderColor: '#111',
                    borderWidth: 3,
                    hoverOffset: 6,
                }]
            },
            options: {
                responsive: true,
                cutout: '68%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1a1a1a',
                        borderColor: 'rgba(255,255,255,0.08)',
                        borderWidth: 1,
                        padding: 10,
                        callbacks: {
                            label: function (ctx) {
                                var pct = osTotal > 0 ? Math.round(ctx.parsed / osTotal * 100) : 0;
                                return ' ' + ctx.label + ' : ' + ctx.parsed + ' (' + pct + '%)';
                            }
                        }
                    }
                }
            }
        });

        var osLegendEl = document.getElementById('osLegend');
        if (osLegendEl) {
            osLabels.forEach(function (label, i) {
                var pct = osTotal > 0 ? Math.round(osValues[i] / osTotal * 100) : 0;
                var item = document.createElement('div');
                item.className = 'db-legend-item';
                item.innerHTML = '<span class="db-legend-dot" style="background:' + osColors[i] + '"></span>'
                    + '<span class="db-legend-label">' + label + '</span>'
                    + '<span class="db-legend-value">' + pct + '%</span>';
                osLegendEl.appendChild(item);
            });
        }
    }

    /* ── Bar chart activité par heure ────────────────────────── */
    var hourlyCtx = document.getElementById('hourlyChart');
    if (hourlyCtx && DATA.hourly) {
        new Chart(hourlyCtx, {
            type: 'bar',
            data: {
                labels: DATA.hourly.labels,
                datasets: [
                    {
                        label: 'Connexions réussies',
                        data: DATA.hourly.success,
                        backgroundColor: 'rgba(34,197,94,0.7)',
                        borderRadius: 4,
                        borderSkipped: false,
                    },
                    {
                        label: 'Échecs',
                        data: DATA.hourly.fails,
                        backgroundColor: 'rgba(239,68,68,0.7)',
                        borderRadius: 4,
                        borderSkipped: false,
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            font: { size: 12, weight: '700' }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1a1a1a',
                        borderColor: 'rgba(255,255,255,0.08)',
                        borderWidth: 1,
                        padding: 12,
                        callbacks: {
                            title: function (items) { return 'Heure : ' + items[0].label; },
                            label: function (ctx) { return ' ' + ctx.dataset.label + ' : ' + ctx.parsed.y; }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: false,
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        border: { display: false },
                        ticks: { stepSize: 1 }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: { font: { size: 11 } }
                    }
                }
            }
        });
    }

    /* ── Bar chart newsletter ────────────────────────────────── */
    var barCtx = document.getElementById('barChart');
    if (barCtx && DATA.bar) {
        // Afficher seulement les 14 derniers jours pour lisibilité
        var barLabels = DATA.bar.labels.slice(-14);
        var barValues = DATA.bar.values.slice(-14);

        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [{
                    label: 'Inscriptions',
                    data: barValues,
                    backgroundColor: function (ctx) {
                        var v = ctx.parsed ? ctx.parsed.y : 0;
                        return v > 0 ? ORANGE : 'rgba(255,255,255,0.07)';
                    },
                    borderRadius: 6,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1a1a1a',
                        borderColor: 'rgba(255,255,255,0.08)',
                        borderWidth: 1,
                        padding: 10,
                        callbacks: {
                            label: function (ctx) {
                                return ' ' + ctx.parsed.y + ' inscription' + (ctx.parsed.y > 1 ? 's' : '');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(255,255,255,0.04)' },
                        border: { display: false },
                        ticks: { stepSize: 1 }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false },
                        ticks: { font: { size: 10 } }
                    }
                }
            }
        });
    }
});
