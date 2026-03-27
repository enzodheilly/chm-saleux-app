/**
 * Dashboard adhérent - version propre
 * 100% compatible avec un Twig sans JS inline
 */

(function () {
    'use strict';

    const dashboardRoot = document.getElementById('memberDashboard');

    const routes = {
        updateEmail: dashboardRoot?.dataset.routeUpdateEmail || '/espace-adherent/settings/update-email',
        updatePassword: dashboardRoot?.dataset.routeUpdatePassword || '/espace-adherent/settings/update-password',
        updateLicence: dashboardRoot?.dataset.routeUpdateLicence || '/espace-adherent/licence',
        deleteAccount: dashboardRoot?.dataset.routeDeleteAccount || '/profile/delete-account',
        uploadPhoto: dashboardRoot?.dataset.routeUploadPhoto || '/profil/photo'
    };

    // ✅ Utilitaire CSRF — lit les meta tags injectées dans base.html.twig
    function getCsrfToken(name) {
        return document.querySelector(`meta[name="csrf-${name}"]`)?.content ?? '';
    }

    function showJsFlash(message, type = 'success') {
        const container = document.querySelector('.flash-container');
        if (!container) return;

        const flash = document.createElement('div');
        flash.className = `flash-message flash-${type}`;

        let iconClass = 'fa-circle-info';
        if (type === 'success') iconClass = 'fa-circle-check';
        if (type === 'error' || type === 'danger') iconClass = 'fa-circle-xmark';
        if (type === 'warning') iconClass = 'fa-triangle-exclamation';

        flash.innerHTML = `
            <i class="fa-solid ${iconClass}"></i>
            <span>${message}</span>
            <button type="button" class="flash-close" aria-label="Fermer">
                <i class="fa-solid fa-xmark"></i>
            </button>
        `;

        flash.querySelector('.flash-close')?.addEventListener('click', () => flash.remove());
        container.appendChild(flash);

        setTimeout(() => {
            if (flash.parentElement) {
                flash.classList.add('fade-out');
                setTimeout(() => flash.remove(), 300);
            }
        }, 5000);
    }

    function showSettingsFeedback(type, message) {
        const box = document.getElementById('settingsFeedback');

        if (!box) {
            showJsFlash(message, type === 'error' ? 'error' : 'success');
            return;
        }

        box.className = `settings-feedback ${type}`;
        box.textContent = message;
        box.style.display = 'block';

        setTimeout(() => {
            box.style.display = 'none';
        }, 5000);
    }

    function applyTheme() {
        document.body.classList.remove('theme-light');
        localStorage.setItem('dashboard-theme', 'dark');
    }

    function toggleMobileMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');

        if (!sidebar || !overlay) return;

        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    function closeMobileMenu() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');

        sidebar?.classList.remove('active');
        overlay?.classList.remove('active');
    }

    function openSettingsDrawer() {
        const drawer = document.getElementById('settingsDrawer');
        const overlay = document.getElementById('settingsOverlay');

        drawer?.classList.add('open');
        overlay?.classList.add('open');
        drawer?.setAttribute('aria-hidden', 'false');
    }

    function closeSettingsDrawer() {
        const drawer = document.getElementById('settingsDrawer');
        const overlay = document.getElementById('settingsOverlay');

        drawer?.classList.remove('open');
        overlay?.classList.remove('open');
        drawer?.setAttribute('aria-hidden', 'true');
    }

    function toggleEdit(field) {
        const form = document.getElementById(`form-${field}`);
        if (!form) return;

        const isOpen = window.getComputedStyle(form).display !== 'none';

        document.querySelectorAll('.settings-form-pro').forEach((el) => {
            el.style.display = 'none';
        });

        form.style.display = isOpen ? 'none' : 'block';

        if (!isOpen) {
            const firstInput = form.querySelector('input');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 100);
            }
        }
    }

    async function updateEmail() {
        const email = document.getElementById('input-email')?.value.trim();
        const currentPassword = document.getElementById('input-email-password')?.value;
        const csrf = document.getElementById('email-csrf')?.value;

        if (!email) {
            showSettingsFeedback('error', 'Veuillez renseigner un nouvel e-mail.');
            return;
        }

        if (!currentPassword) {
            showSettingsFeedback('error', 'Veuillez renseigner votre mot de passe actuel.');
            return;
        }

        try {
            const response = await fetch(routes.updateEmail, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    email,
                    currentPassword,
                    _token: csrf
                })
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                showSettingsFeedback('error', data.message || "Impossible de mettre à jour l'e-mail.");
                return;
            }

            const currentEmailDisplay = document.getElementById('currentEmailDisplay');
            if (currentEmailDisplay) {
                currentEmailDisplay.textContent = data.email || email;
            }

            const emailInput = document.getElementById('input-email');
            const passwordInput = document.getElementById('input-email-password');
            const form = document.getElementById('form-email');

            if (emailInput) emailInput.value = '';
            if (passwordInput) passwordInput.value = '';
            if (form) form.style.display = 'none';

            showSettingsFeedback('success', data.message || 'E-mail mis à jour avec succès.');
            showJsFlash(data.message || 'E-mail mis à jour avec succès.', 'success');
        } catch (error) {
            showSettingsFeedback('error', "Une erreur est survenue lors de la mise à jour de l'e-mail.");
        }
    }

    async function updatePassword() {
        const currentPassword = document.getElementById('old-pass')?.value;
        const newPassword = document.getElementById('new-pass')?.value;
        const confirmPassword = document.getElementById('confirm-pass')?.value;
        const csrf = document.getElementById('password-csrf')?.value;

        if (!currentPassword || !newPassword || !confirmPassword) {
            showSettingsFeedback('error', 'Veuillez remplir tous les champs du mot de passe.');
            return;
        }

        if (newPassword.length < 8) {
            showSettingsFeedback('error', 'Le nouveau mot de passe doit contenir au moins 8 caractères.');
            return;
        }

        if (newPassword !== confirmPassword) {
            showSettingsFeedback('error', 'La confirmation du nouveau mot de passe ne correspond pas.');
            return;
        }

        try {
            const response = await fetch(routes.updatePassword, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    currentPassword,
                    newPassword,
                    confirmPassword,
                    _token: csrf
                })
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                showSettingsFeedback('error', data.message || 'Impossible de mettre à jour le mot de passe.');
                return;
            }

            const oldPass = document.getElementById('old-pass');
            const newPass = document.getElementById('new-pass');
            const confirmPass = document.getElementById('confirm-pass');
            const form = document.getElementById('form-password');

            if (oldPass) oldPass.value = '';
            if (newPass) newPass.value = '';
            if (confirmPass) confirmPass.value = '';
            if (form) form.style.display = 'none';

            showSettingsFeedback('success', data.message || 'Mot de passe mis à jour avec succès.');
            showJsFlash(data.message || 'Mot de passe mis à jour avec succès.', 'success');
        } catch (error) {
            showSettingsFeedback('error', 'Une erreur est survenue lors de la mise à jour du mot de passe.');
        }
    }

    function confirmDeleteAccount() {
        if (!confirm('ATTENTION : La suppression est définitive. Continuer ?')) {
            return;
        }

        const password = prompt('Saisissez votre mot de passe pour confirmer :');
        if (!password) return;

        fetch(routes.deleteAccount, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                password,
                _token: getCsrfToken('delete-account') // ✅ CSRF ajouté
            })
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    window.location.href = '/logout';
                } else {
                    showJsFlash(data.message || 'Erreur lors de la suppression.', 'error');
                }
            })
            .catch(() => {
                showJsFlash('Erreur réseau.', 'error');
            });
    }

    function openLicenceChoice() {
        const modal = document.getElementById('licenceModal');
        if (!modal) return;

        modal.style.display = 'flex';

        setTimeout(() => {
            const input = document.getElementById('licenceInputManual');
            input?.focus();
        }, 100);
    }

    function closeLicenceModal() {
        const modal = document.getElementById('licenceModal');
        if (modal) {
            modal.style.display = 'none';
        }
    }

    async function saveLicenceManual() {
        const input = document.getElementById('licenceInputManual');
        const num = input ? input.value.trim() : '';

        if (!num || num.length < 4) {
            showJsFlash('Veuillez entrer un numéro de licence valide.', 'warning');
            return;
        }

        const formData = new FormData();
        formData.append('licenceNumber', num);
        formData.append('_token', getCsrfToken('edit-license')); // ✅ CSRF ajouté

        try {
            const response = await fetch(routes.updateLicence, {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                location.reload();
            } else {
                showJsFlash(result.message || "Erreur lors de l'association.", 'error');
            }
        } catch (error) {
            showJsFlash('Erreur de connexion au serveur.', 'error');
        }
    }

    function openChatbot(mode = null) {
        closeLicenceModal();

        const btn = document.getElementById('assistantWidgetOpen');
        if (btn) btn.click();

        if (mode === 'licence' && window.eliosInstance) {
            setTimeout(() => {
                window.eliosInstance.handleSend('FLOW_LICENSE');
            }, 500);
        }
    }

    function bindTabs() {
        const navItems = document.querySelectorAll('.nav-item');
        const sections = document.querySelectorAll('.section-view');

        navItems.forEach((item) => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.dataset.target;

                navItems.forEach((nav) => nav.classList.remove('active'));
                this.classList.add('active');

                sections.forEach((sec) => sec.classList.remove('active'));
                const targetSection = document.getElementById(`tab-${targetId}`);
                if (targetSection) {
                    targetSection.classList.add('active');
                }

                if (window.innerWidth < 1024) {
                    closeMobileMenu();
                }
            });
        });
    }

    function bindFlashes() {
        document.querySelectorAll('.flash-message').forEach((flash) => {
            const closeBtn = flash.querySelector('.flash-close');
            closeBtn?.addEventListener('click', () => flash.remove());

            setTimeout(() => {
                if (flash.parentElement) {
                    flash.classList.add('fade-out');
                    setTimeout(() => flash.remove(), 300);
                }
            }, 5000);
        });
    }

    function bindMobileMenu() {
        document.getElementById('sidebarToggle')?.addEventListener('click', toggleMobileMenu);
        document.getElementById('mobileOverlay')?.addEventListener('click', closeMobileMenu);
    }

    function bindSettingsDrawer() {
        document.getElementById('openSettingsDrawer')?.addEventListener('click', openSettingsDrawer);
        document.getElementById('closeSettingsDrawer')?.addEventListener('click', closeSettingsDrawer);
        document.getElementById('settingsOverlay')?.addEventListener('click', closeSettingsDrawer);

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeSettingsDrawer();
            }
        });
    }

    function bindSettingsForms() {
        document.querySelectorAll('[data-toggle-form]').forEach((btn) => {
            btn.addEventListener('click', function () {
                const field = this.dataset.toggleForm;
                if (field) {
                    toggleEdit(field);
                }
            });
        });

        document.getElementById('saveEmailBtn')?.addEventListener('click', updateEmail);
        document.getElementById('savePasswordBtn')?.addEventListener('click', updatePassword);
        document.getElementById('deleteAccountBtn')?.addEventListener('click', confirmDeleteAccount);
    }

    function bindElios() {
        const eliosBtn = document.getElementById('assistantWidgetOpen');
        if (eliosBtn) {
            eliosBtn.style.zIndex = '99999';
            eliosBtn.style.pointerEvents = 'auto';
        }
    }

    function bindPhotoCropper() {
        const fileInput = document.getElementById('avatar-upload');
        const cropperModal = document.getElementById('cropperModal');
        const cropperImage = document.getElementById('cropperImage');
        const cropBtn = document.getElementById('cropAndSaveBtn');
        const cancelCropBtn = document.getElementById('cancelCropBtn');

        if (!fileInput || !cropperModal || !cropperImage) return;

        let cropper = null;

        fileInput.addEventListener('change', function (e) {
            const file = e.target.files?.[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (event) {
                cropperImage.src = event.target?.result || '';
                cropperModal.style.display = 'flex';

                if (cropper) cropper.destroy();

                cropper = new Cropper(cropperImage, {
                    aspectRatio: 1,
                    viewMode: 1
                });
            };
            reader.readAsDataURL(file);
        });

        cancelCropBtn?.addEventListener('click', () => {
            cropperModal.style.display = 'none';

            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });

        cropBtn?.addEventListener('click', () => {
            if (!cropper) return;

            cropper.getCroppedCanvas({ width: 400, height: 400 }).toBlob((blob) => {
                if (!blob) return;

                const formData = new FormData();
                formData.append('profileImage', blob, 'avatar.jpg');
                formData.append('_token', getCsrfToken('upload-photo')); // ✅ CSRF ajouté

                fetch(routes.uploadPhoto, {
                    method: 'POST',
                    body: formData
                })
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.success) {
                            location.reload();
                        } else {
                            showJsFlash("Erreur lors de l'envoi de la photo.", 'error');
                        }
                    })
                    .catch(() => {
                        showJsFlash("Erreur réseau lors de l'envoi de la photo.", 'error');
                    });
            }, 'image/jpeg', 0.85);
        });
    }

    function bindDashboardCharts() {
        if (!dashboardRoot) return;

        const rawSessionsJson = dashboardRoot.dataset.sessions;
        if (!rawSessionsJson) return;

        let rawSessions = [];

        try {
            rawSessions = JSON.parse(rawSessionsJson);
        } catch (error) {
            console.error('Impossible de parser les sessions du dashboard.', error);
            return;
        }

        if (!Array.isArray(rawSessions) || rawSessions.length === 0) {
            return;
        }

        const nf = new Intl.NumberFormat('fr-FR');

        const pad = (n) => String(n).padStart(2, '0');

        const parseDate = (value) => {
            const d = new Date(value);
            return Number.isNaN(d.getTime()) ? null : d;
        };

        const formatDate = (date) => `${pad(date.getDate())}/${pad(date.getMonth() + 1)}`;

        const formatDuration = (seconds) => {
            const totalMinutes = Math.floor((Number(seconds) || 0) / 60);
            const hours = Math.floor(totalMinutes / 60);
            const minutes = totalMinutes % 60;
            return hours > 0 ? `${hours}h ${minutes}m` : `${minutes} min`;
        };

        const formatMetric = (value, metric) => {
            const safe = Number(value) || 0;
            if (metric === 'duration') return formatDuration(safe);
            if (metric === 'reps') return `${nf.format(safe)} reps`;
            return `${nf.format(safe)} kg`;
        };

        const dayMap = new Map();

        rawSessions.forEach((session) => {
            const date = parseDate(session.performed_at);
            if (!date) return;

            const key = `${date.getFullYear()}-${pad(date.getMonth() + 1)}-${pad(date.getDate())}`;

            const existing = dayMap.get(key) || {
                date: new Date(date.getFullYear(), date.getMonth(), date.getDate()),
                volume: 0,
                duration: 0,
                reps: 0,
                sessionsCount: 0
            };

            existing.volume += Number(session.total_volume || 0);
            existing.duration += Number(session.duration_seconds || 0);
            existing.reps += Number(session.total_completed_sets || 0);
            existing.sessionsCount += 1;

            dayMap.set(key, existing);
        });

        const allDays = Array.from(dayMap.values()).sort((a, b) => a.date - b.date);

        const filterByDays = (days) => {
            if (!days || days === 0) return [...allDays];

            const now = new Date();
            const start = new Date(now.getFullYear(), now.getMonth(), now.getDate());
            start.setDate(start.getDate() - (days - 1));

            return allDays.filter((item) => item.date >= start);
        };

        const totalFor = (dataset, metric) =>
            dataset.reduce((sum, item) => sum + Number(item[metric] || 0), 0);

        const bestDayText = (dataset, metric) => {
            if (!dataset.length) return '—';
            const best = [...dataset].sort((a, b) => Number(b[metric] || 0) - Number(a[metric] || 0))[0];
            return `${formatDate(best.date)} · ${formatMetric(best[metric], metric)}`;
        };

        const renderChart = (container, dataset, metric, limit = null) => {
            if (!container) return;

            if (!dataset.length) {
                container.innerHTML = '<div class="empty-state">Aucune donnée disponible.</div>';
                return;
            }

            const displayData = limit ? dataset.slice(-limit) : dataset;
            const maxValue = Math.max(...displayData.map((item) => Number(item[metric] || 0)), 1);

            container.style.gridTemplateColumns = `repeat(${displayData.length}, 1fr)`;

            container.innerHTML = displayData.map((item) => {
                const value = Number(item[metric] || 0);
                const rawHeight = maxValue > 0 ? (value / maxValue) * 100 : 0;
                const finalHeight = value > 0 ? Math.max(rawHeight, 10) : 8;

                return `
                    <div class="bar-col" tabindex="0">
                        <div class="bar-bubble refined-bubble" style="--bubble-offset: calc(${finalHeight}% + 14px);">
                            ${formatDate(item.date)} · ${formatMetric(value, metric)}
                        </div>
                        <div class="bar ${value === 0 ? 'muted' : ''}" style="height:${finalHeight}%"></div>
                        <div class="bar-label">${formatDate(item.date)}</div>
                    </div>
                `;
            }).join('');

            const cols = container.querySelectorAll('.bar-col');

            cols.forEach((col) => {
                col.addEventListener('click', () => {
                    const alreadyActive = col.classList.contains('is-active');
                    cols.forEach((c) => c.classList.remove('is-active'));
                    if (!alreadyActive) {
                        col.classList.add('is-active');
                    }
                });

                col.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        col.click();
                    }
                });
            });
        };

        // HOME
        const homeTabs = document.querySelectorAll('#homeMetricTabs .weekly-tab');
        const homeChart = document.getElementById('homeWeeklyChart');
        const homeMetricTotal = document.getElementById('homeMetricTotal');
        const homeBestDay = document.getElementById('homeBestDay');
        const homeTotalReps = document.getElementById('homeTotalReps');

        if (homeChart && homeTabs.length > 0) {
            const homeData = allDays.slice(-7);

            const updateHome = (metric = 'volume') => {
                homeTabs.forEach((tab) => tab.classList.toggle('active', tab.dataset.metric === metric));
                renderChart(homeChart, homeData, metric, 7);

                if (homeMetricTotal) {
                    homeMetricTotal.textContent = formatMetric(totalFor(homeData, metric), metric);
                }

                if (homeBestDay) {
                    homeBestDay.textContent = bestDayText(homeData, metric);
                }
            };

            if (homeTotalReps) {
                homeTotalReps.textContent = nf.format(totalFor(allDays, 'reps'));
            }

            homeTabs.forEach((tab) => {
                tab.addEventListener('click', () => updateHome(tab.dataset.metric));
            });

            updateHome('volume');
        }

        // PROGRESS
        const progressMetricTabs = document.querySelectorAll('#progressMetricTabs .weekly-tab');
        const progressRangeMenu = document.getElementById('progressRangeTabs');
        const progressRangeTrigger = document.getElementById('progressRangeTrigger');
        const progressRangeLabel = progressRangeMenu?.querySelector('.progress-range-label');
        const progressRangeTabs = document.querySelectorAll('#progressRangeTabs .progress-range-option');

        const progressChart = document.getElementById('progressDetailedChart');
        const progressTotalValue = document.getElementById('progressTotalValue');
        const progressDurationValue = document.getElementById('progressDurationValue');
        const progressRepsValue = document.getElementById('progressRepsValue');
        const progressActiveDaysValue = document.getElementById('progressActiveDaysValue');

        if (progressChart && progressMetricTabs.length > 0 && progressRangeTabs.length > 0) {
            let progressMetric = 'volume';
            let progressRange = 30;

            const rangeLabels = {
                30: '30 derniers jours',
                90: '3 derniers mois',
                365: 'Cette année',
                0: 'All time'
            };

            const updateProgress = () => {
                const filtered = filterByDays(progressRange);

                progressMetricTabs.forEach((tab) => {
                    tab.classList.toggle('active', tab.dataset.metric === progressMetric);
                });

                progressRangeTabs.forEach((tab) => {
                    tab.classList.toggle('active', Number(tab.dataset.range) === progressRange);
                });

                if (progressRangeLabel) {
                    progressRangeLabel.textContent = rangeLabels[progressRange] || '30 derniers jours';
                }

                renderChart(progressChart, filtered, progressMetric, 12);

                if (progressTotalValue) {
                    progressTotalValue.textContent = formatMetric(totalFor(filtered, progressMetric), progressMetric);
                }

                if (progressDurationValue) {
                    progressDurationValue.textContent = formatDuration(totalFor(filtered, 'duration'));
                }

                if (progressRepsValue) {
                    progressRepsValue.textContent = `${nf.format(totalFor(filtered, 'reps'))} reps`;
                }

                if (progressActiveDaysValue) {
                    progressActiveDaysValue.textContent = nf.format(
                        filtered.filter((item) => item.volume > 0 || item.duration > 0 || item.reps > 0).length
                    );
                }
            };

            progressMetricTabs.forEach((tab) => {
                tab.addEventListener('click', () => {
                    progressMetric = tab.dataset.metric;
                    updateProgress();
                });
            });

            progressRangeTrigger?.addEventListener('click', (e) => {
                e.stopPropagation();
                progressRangeMenu?.classList.toggle('open');
            });

            progressRangeTabs.forEach((tab) => {
                tab.addEventListener('click', () => {
                    progressRange = Number(tab.dataset.range);
                    progressRangeMenu?.classList.remove('open');
                    updateProgress();
                });
            });

            document.addEventListener('click', (e) => {
                if (!progressRangeMenu?.contains(e.target)) {
                    progressRangeMenu?.classList.remove('open');
                }
            });

            updateProgress();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('dashboard-page');

        try { applyTheme(); } catch (e) { console.error('applyTheme error', e); }
        try { bindTabs(); } catch (e) { console.error('bindTabs error', e); }
        try { bindFlashes(); } catch (e) { console.error('bindFlashes error', e); }
        try { bindMobileMenu(); } catch (e) { console.error('bindMobileMenu error', e); }
        try { bindSettingsDrawer(); } catch (e) { console.error('bindSettingsDrawer error', e); }
        try { bindSettingsForms(); } catch (e) { console.error('bindSettingsForms error', e); }
        try { bindElios(); } catch (e) { console.error('bindElios error', e); }
        try { bindPhotoCropper(); } catch (e) { console.error('bindPhotoCropper error', e); }
        try { bindDashboardCharts(); } catch (e) { console.error('bindDashboardCharts error', e); }
    });

    window.showJsFlash = showJsFlash;
    window.showSettingsFeedback = showSettingsFeedback;
    window.toggleMobileMenu = toggleMobileMenu;
    window.toggleEdit = toggleEdit;
    window.updateEmail = updateEmail;
    window.updatePassword = updatePassword;
    window.confirmDeleteAccount = confirmDeleteAccount;
    window.openLicenceChoice = openLicenceChoice;
    window.closeLicenceModal = closeLicenceModal;
    window.saveLicenceManual = saveLicenceManual;
    window.openChatbot = openChatbot;
})();