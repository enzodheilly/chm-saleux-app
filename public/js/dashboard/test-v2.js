/**
 * Dashboard adhérent - version propre
 * Compatible avec le drawer Apple-style (sd-*)
 */

(function () {
    'use strict';

    const dashboardRoot = document.getElementById('memberDashboard');

    const routes = {
        updateEmail:    dashboardRoot?.dataset.routeUpdateEmail    || '/espace-adherent/settings/update-email',
        updatePassword: dashboardRoot?.dataset.routeUpdatePassword || '/espace-adherent/settings/update-password',
        updateLicence:  dashboardRoot?.dataset.routeUpdateLicence  || '/espace-adherent/licence',
        deleteAccount:  dashboardRoot?.dataset.routeDeleteAccount  || '/profile/delete-account',
        uploadPhoto:    dashboardRoot?.dataset.routeUploadPhoto    || '/profil/photo'
    };

    function getCsrfToken(name) {
        return document.querySelector(`meta[name="csrf-${name}"]`)?.content ?? '';
    }

    // =========================================
    // FLASH MESSAGES
    // =========================================
    function showJsFlash(message, type = 'success') {
        const container = document.querySelector('.flash-container');
        if (!container) return;

        const flash = document.createElement('div');
        flash.className = `flash-message flash-${type}`;

        const icons = { success: 'fa-circle-check', error: 'fa-circle-xmark', danger: 'fa-circle-xmark', warning: 'fa-triangle-exclamation' };
        const iconClass = icons[type] || 'fa-circle-info';

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

        box.className = `sd-feedback ${type}`;
        box.textContent = message;
        box.classList.remove('is-hidden');

        setTimeout(() => box.classList.add('is-hidden'), 5000);
    }

    // =========================================
    // THEME
    // =========================================
    function applyTheme() {
        document.body.classList.remove('theme-light');
        localStorage.setItem('dashboard-theme', 'dark');
    }

    // =========================================
    // MOBILE MENU (sidebar)
    // =========================================
    function toggleMobileMenu() {
        document.getElementById('sidebar')?.classList.toggle('active');
        document.getElementById('mobileOverlay')?.classList.toggle('active');
    }

    function closeMobileMenu() {
        document.getElementById('sidebar')?.classList.remove('active');
        document.getElementById('mobileOverlay')?.classList.remove('active');
    }

    // =========================================
    // SETTINGS DRAWER
    // =========================================
    function openSettingsDrawer() {
        document.getElementById('settingsDrawer')?.classList.add('open');
        document.getElementById('settingsOverlay')?.classList.add('open');
        document.getElementById('settingsDrawer')?.setAttribute('aria-hidden', 'false');
    }

    function closeSettingsDrawer() {
        closeAllForms();
        document.getElementById('settingsDrawer')?.classList.remove('open');
        document.getElementById('settingsOverlay')?.classList.remove('open');
        document.getElementById('settingsDrawer')?.setAttribute('aria-hidden', 'true');
    }

    // Ferme tous les formulaires inline du drawer
    function closeAllForms() {
        document.querySelectorAll('.sd-inline-form').forEach(f => f.classList.add('is-hidden'));
        document.querySelectorAll('.sd-list-row--action').forEach(r => r.classList.remove('is-open'));
    }

    // Toggle d'un formulaire inline (ouverture via ligne cliquable, fermeture via bouton Annuler)
    function toggleEdit(field) {
        const form = document.getElementById(`form-${field}`);
        if (!form) return;

        const isOpen = !form.classList.contains('is-hidden');

        // Ferme tous les autres d'abord
        closeAllForms();

        if (!isOpen) {
            form.classList.remove('is-hidden');

            // Marque la ligne parente comme ouverte
            const trigger = document.querySelector(`[data-toggle-form="${field}"].sd-list-row--action`);
            trigger?.classList.add('is-open');

            setTimeout(() => form.querySelector('input')?.focus(), 80);
        }
    }

    function bindSettingsDrawer() {
        document.getElementById('openSettingsDrawer')?.addEventListener('click', openSettingsDrawer);
        document.getElementById('closeSettingsDrawer')?.addEventListener('click', closeSettingsDrawer);
        document.getElementById('settingsOverlay')?.addEventListener('click', closeSettingsDrawer);

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeSettingsDrawer();
        });
    }

    function bindSettingsForms() {
        // Triggers : lignes cliquables + boutons Annuler portent tous data-toggle-form
        document.querySelectorAll('[data-toggle-form]').forEach(el => {
            el.addEventListener('click', function () {
                toggleEdit(this.dataset.toggleForm);
            });
        });

        document.getElementById('saveEmailBtn')?.addEventListener('click', updateEmail);
        document.getElementById('savePasswordBtn')?.addEventListener('click', updatePassword);
        document.getElementById('deleteAccountBtn')?.addEventListener('click', confirmDeleteAccount);
    }

    // =========================================
    // UPDATE EMAIL
    // =========================================
    async function updateEmail() {
        const email    = document.getElementById('input-email')?.value.trim();
        const password = document.getElementById('input-email-password')?.value;
        const csrf     = document.getElementById('email-csrf')?.value;

        if (!email)    return showSettingsFeedback('error', 'Veuillez renseigner un nouvel e-mail.');
        if (!password) return showSettingsFeedback('error', 'Veuillez renseigner votre mot de passe actuel.');

        try {
            const res  = await fetch(routes.updateEmail, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                body: JSON.stringify({ email, currentPassword: password, _token: csrf })
            });
            const data = await res.json();

            if (!res.ok || !data.success) {
                return showSettingsFeedback('error', data.message || "Impossible de mettre à jour l'e-mail.");
            }

            const display = document.getElementById('currentEmailDisplay');
            if (display) display.textContent = data.email || email;

            document.getElementById('input-email').value = '';
            document.getElementById('input-email-password').value = '';
            closeAllForms();

            showSettingsFeedback('success', data.message || 'E-mail mis à jour avec succès.');
            showJsFlash(data.message || 'E-mail mis à jour avec succès.', 'success');
        } catch {
            showSettingsFeedback('error', "Une erreur est survenue lors de la mise à jour de l'e-mail.");
        }
    }

    // =========================================
    // UPDATE PASSWORD
    // =========================================
    async function updatePassword() {
        const oldPass  = document.getElementById('old-pass')?.value;
        const newPass  = document.getElementById('new-pass')?.value;
        const confirm  = document.getElementById('confirm-pass')?.value;
        const csrf     = document.getElementById('password-csrf')?.value;

        if (!oldPass || !newPass || !confirm)
            return showSettingsFeedback('error', 'Veuillez remplir tous les champs.');
        if (newPass.length < 8)
            return showSettingsFeedback('error', 'Le mot de passe doit contenir au moins 8 caractères.');
        if (newPass !== confirm)
            return showSettingsFeedback('error', 'La confirmation ne correspond pas.');

        try {
            const res  = await fetch(routes.updatePassword, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                body: JSON.stringify({ currentPassword: oldPass, newPassword: newPass, confirmPassword: confirm, _token: csrf })
            });
            const data = await res.json();

            if (!res.ok || !data.success)
                return showSettingsFeedback('error', data.message || 'Impossible de mettre à jour le mot de passe.');

            document.getElementById('old-pass').value = '';
            document.getElementById('new-pass').value = '';
            document.getElementById('confirm-pass').value = '';
            closeAllForms();

            showSettingsFeedback('success', data.message || 'Mot de passe mis à jour avec succès.');
            showJsFlash(data.message || 'Mot de passe mis à jour avec succès.', 'success');
        } catch {
            showSettingsFeedback('error', 'Une erreur est survenue lors de la mise à jour du mot de passe.');
        }
    }

    // =========================================
    // DELETE ACCOUNT
    // =========================================
    function confirmDeleteAccount() {
        if (!confirm('ATTENTION : La suppression est définitive. Continuer ?')) return;

        const password = prompt('Saisissez votre mot de passe pour confirmer :');
        if (!password) return;

        fetch(routes.deleteAccount, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ password, _token: getCsrfToken('delete-account') })
        })
            .then(res => res.json())
            .then(data => {
                if (data.success) window.location.href = '/logout';
                else showJsFlash(data.message || 'Erreur lors de la suppression.', 'error');
            })
            .catch(() => showJsFlash('Erreur réseau.', 'error'));
    }

    // =========================================
    // LICENCE
    // =========================================
    function openLicenceChoice() {
        const modal = document.getElementById('licenceModal');
        if (!modal) return;
        modal.style.display = 'flex';
        setTimeout(() => document.getElementById('licenceInputManual')?.focus(), 100);
    }

    function closeLicenceModal() {
        const modal = document.getElementById('licenceModal');
        if (modal) modal.style.display = 'none';
    }

    async function saveLicenceManual() {
        const input = document.getElementById('licenceInputManual');
        const num   = input?.value.trim();

        if (!num || num.length < 4)
            return showJsFlash('Veuillez entrer un numéro de licence valide.', 'warning');

        const formData = new FormData();
        formData.append('licenceNumber', num);
        formData.append('_token', getCsrfToken('edit-license'));

        try {
            const res    = await fetch(routes.updateLicence, { method: 'POST', body: formData });
            const result = await res.json();
            if (result.success) location.reload();
            else showJsFlash(result.message || "Erreur lors de l'association.", 'error');
        } catch {
            showJsFlash('Erreur de connexion au serveur.', 'error');
        }
    }

    function openChatbot(mode = null) {
        closeLicenceModal();
        document.getElementById('assistantWidgetOpen')?.click();

        if (mode === 'licence' && window.eliosInstance) {
            setTimeout(() => window.eliosInstance.handleSend('FLOW_LICENSE'), 500);
        }
    }

    // =========================================
    // TABS NAVIGATION
    // =========================================
    function bindTabs() {
        const navItems = document.querySelectorAll('.nav-item');
        const sections = document.querySelectorAll('.section-view');

        navItems.forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.dataset.target;

                navItems.forEach(n => n.classList.remove('active'));
                this.classList.add('active');

                sections.forEach(s => s.classList.remove('active'));
                document.getElementById(`tab-${targetId}`)?.classList.add('active');

                if (window.innerWidth < 1024) closeMobileMenu();
            });
        });
    }

    // =========================================
    // FLASH BINDINGS
    // =========================================
    function bindFlashes() {
        document.querySelectorAll('.flash-message').forEach(flash => {
            flash.querySelector('.flash-close')?.addEventListener('click', () => flash.remove());

            setTimeout(() => {
                if (flash.parentElement) {
                    flash.classList.add('fade-out');
                    setTimeout(() => flash.remove(), 300);
                }
            }, 5000);
        });
    }

    // =========================================
    // MOBILE MENU BINDINGS
    // =========================================
    function bindMobileMenu() {
        document.getElementById('sidebarToggle')?.addEventListener('click', toggleMobileMenu);
        document.getElementById('mobileOverlay')?.addEventListener('click', closeMobileMenu);
    }

    // =========================================
    // ELIOS / ASSISTANT
    // =========================================
    function bindLicenceForm() {
        const addBtn    = document.getElementById('licAddBtn');
        const cancelBtn = document.getElementById('licCancelBtn');
        const saveBtn   = document.getElementById('licSaveBtn');
        const formEl    = document.getElementById('licFooterForm');
        const defaultEl = document.getElementById('licFooterDefault');

        if (!addBtn || !formEl) return;

        addBtn.addEventListener('click', () => {
            defaultEl?.classList.add('is-hidden');
            formEl.classList.remove('is-hidden');
            setTimeout(() => document.getElementById('licenceInputManual')?.focus(), 80);
        });

        cancelBtn?.addEventListener('click', () => {
            formEl.classList.add('is-hidden');
            defaultEl?.classList.remove('is-hidden');
            const input = document.getElementById('licenceInputManual');
            if (input) input.value = '';
        });

        saveBtn?.addEventListener('click', saveLicenceManual);

        // Valider aussi avec Entrée
        document.getElementById('licenceInputManual')?.addEventListener('keydown', e => {
            if (e.key === 'Enter') saveLicenceManual();
        });
    }

    function bindElios() {
        const btn = document.getElementById('assistantWidgetOpen');
        if (btn) {
            btn.style.zIndex = '99999';
            btn.style.pointerEvents = 'auto';
        }
    }

    // =========================================
    // PHOTO CROPPER
    // =========================================
    function bindPhotoCropper() {
        const fileInput     = document.getElementById('avatar-upload');
        const avatarPreview = document.getElementById('avatar-preview');
        const cropperModal  = document.getElementById('cropperModal');
        const cropperImage  = document.getElementById('cropperImage');
        const cropBtn       = document.getElementById('cropAndSaveBtn');
        const cancelBtn     = document.getElementById('cancelCropBtn');

        if (!fileInput || !cropperModal || !cropperImage) return;

        // ✅ FIX — rien ne déclenchait l'ouverture du sélecteur de fichier :
        // l'input est caché, il faut un point d'entrée cliquable.
        avatarPreview?.addEventListener('click', () => fileInput.click());

        let cropper = null;

        fileInput.addEventListener('change', e => {
            const file = e.target.files?.[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = event => {
                cropperImage.src = event.target?.result || '';
                cropperModal.style.display = 'flex';

                if (cropper) cropper.destroy();
                cropper = new Cropper(cropperImage, { aspectRatio: 1, viewMode: 1 });
            };
            reader.readAsDataURL(file);
        });

        cancelBtn?.addEventListener('click', () => {
            cropperModal.style.display = 'none';
            if (cropper) { cropper.destroy(); cropper = null; }
        });

        cropBtn?.addEventListener('click', () => {
            if (!cropper) return;

            cropper.getCroppedCanvas({ width: 400, height: 400 }).toBlob(blob => {
                if (!blob) return;

                const formData = new FormData();
                formData.append('profileImage', blob, 'avatar.jpg');
                formData.append('_token', getCsrfToken('upload-photo'));

                fetch(routes.uploadPhoto, { method: 'POST', body: formData })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) location.reload();
                        else showJsFlash("Erreur lors de l'envoi de la photo.", 'error');
                    })
                    .catch(() => showJsFlash("Erreur réseau lors de l'envoi de la photo.", 'error'));
            }, 'image/jpeg', 0.85);
        });
    }

    // =========================================
    // CHARTS
    // =========================================
    function bindDashboardCharts() {
        if (!dashboardRoot) return;

        const rawSessionsJson = dashboardRoot.dataset.sessions;
        if (!rawSessionsJson) return;

        let rawSessions = [];
        try { rawSessions = JSON.parse(rawSessionsJson); }
        catch (e) { console.error('Impossible de parser les sessions.', e); return; }

        if (!Array.isArray(rawSessions) || rawSessions.length === 0) return;

        const nf  = new Intl.NumberFormat('fr-FR');
        const pad = n => String(n).padStart(2, '0');

        const parseDate  = v => { const d = new Date(v); return isNaN(d) ? null : d; };
        const formatDate = d => `${pad(d.getDate())}/${pad(d.getMonth() + 1)}`;

        const formatDuration = seconds => {
            const m = Math.floor((Number(seconds) || 0) / 60);
            const h = Math.floor(m / 60);
            return h > 0 ? `${h}h ${m % 60}m` : `${m} min`;
        };

        const formatMetric = (value, metric) => {
            const v = Number(value) || 0;
            if (metric === 'duration') return formatDuration(v);
            if (metric === 'reps')     return `${nf.format(v)} reps`;
            return `${nf.format(v)} kg`;
        };

        const dayMap = new Map();
        rawSessions.forEach(s => {
            const date = parseDate(s.performed_at);
            if (!date) return;
            const key = `${date.getFullYear()}-${pad(date.getMonth()+1)}-${pad(date.getDate())}`;
            const ex  = dayMap.get(key) || { date: new Date(date.getFullYear(), date.getMonth(), date.getDate()), volume: 0, duration: 0, reps: 0, sessionsCount: 0 };
            ex.volume   += Number(s.total_volume || 0);
            ex.duration += Number(s.duration_seconds || 0);
            ex.reps     += Number(s.total_completed_sets || 0);
            ex.sessionsCount++;
            dayMap.set(key, ex);
        });

        const allDays = Array.from(dayMap.values()).sort((a, b) => a.date - b.date);

        const filterByDays = days => {
            if (!days) return [...allDays];
            const start = new Date();
            start.setHours(0,0,0,0);
            start.setDate(start.getDate() - (days - 1));
            return allDays.filter(i => i.date >= start);
        };

        const totalFor    = (dataset, metric) => dataset.reduce((s, i) => s + Number(i[metric] || 0), 0);
        const bestDayText = (dataset, metric) => {
            if (!dataset.length) return '—';
            const best = [...dataset].sort((a, b) => Number(b[metric]||0) - Number(a[metric]||0))[0];
            return `${formatDate(best.date)} · ${formatMetric(best[metric], metric)}`;
        };

        const renderChart = (container, dataset, metric, limit = null) => {
            if (!container) return;
            if (!dataset.length) { container.innerHTML = '<div class="empty-state">Aucune donnée disponible.</div>'; return; }

            const data     = limit ? dataset.slice(-limit) : dataset;
            const maxValue = Math.max(...data.map(i => Number(i[metric] || 0)), 1);

            container.style.gridTemplateColumns = `repeat(${data.length}, 1fr)`;
            container.innerHTML = data.map(item => {
                const v   = Number(item[metric] || 0);
                const raw = maxValue > 0 ? (v / maxValue) * 100 : 0;
                const h   = v > 0 ? Math.max(raw, 10) : 8;
                return `
                    <div class="bar-col" tabindex="0">
                        <div class="bar-bubble refined-bubble" style="--bubble-offset:calc(${h}% + 14px)">
                            ${formatDate(item.date)} · ${formatMetric(v, metric)}
                        </div>
                        <div class="bar ${v === 0 ? 'muted' : ''}" style="height:${h}%"></div>
                        <div class="bar-label">${formatDate(item.date)}</div>
                    </div>`;
            }).join('');

            container.querySelectorAll('.bar-col').forEach(col => {
                col.addEventListener('click', () => {
                    const was = col.classList.contains('is-active');
                    container.querySelectorAll('.bar-col').forEach(c => c.classList.remove('is-active'));
                    if (!was) col.classList.add('is-active');
                });
                col.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); col.click(); } });
            });
        };

        // HOME chart
        const homeTabs     = document.querySelectorAll('#homeMetricTabs .weekly-tab');
        const homeChart    = document.getElementById('homeWeeklyChart');
        const homeTotal    = document.getElementById('homeMetricTotal');
        const homeBestDay  = document.getElementById('homeBestDay');
        const homeTotalReps= document.getElementById('homeTotalReps');

        if (homeChart && homeTabs.length) {
            const homeData = allDays.slice(-7);

            const updateHome = (metric = 'volume') => {
                homeTabs.forEach(t => t.classList.toggle('active', t.dataset.metric === metric));
                renderChart(homeChart, homeData, metric, 7);
                if (homeTotal)    homeTotal.textContent    = formatMetric(totalFor(homeData, metric), metric);
                if (homeBestDay)  homeBestDay.textContent  = bestDayText(homeData, metric);
            };

            if (homeTotalReps) homeTotalReps.textContent = nf.format(totalFor(allDays, 'reps'));
            homeTabs.forEach(t => t.addEventListener('click', () => updateHome(t.dataset.metric)));
            updateHome('volume');
        }

        // PROGRESS chart
        const progressMetricTabs   = document.querySelectorAll('#progressMetricTabs .weekly-tab');
        const progressRangeMenu    = document.getElementById('progressRangeTabs');
        const progressRangeTrigger = document.getElementById('progressRangeTrigger');
        const progressRangeLabel   = progressRangeMenu?.querySelector('.progress-range-label');
        const progressRangeOptions = document.querySelectorAll('#progressRangeTabs .progress-range-option');
        const progressChart        = document.getElementById('progressDetailedChart');

        const progressTotalValue      = document.getElementById('progressTotalValue');
        const progressDurationValue   = document.getElementById('progressDurationValue');
        const progressRepsValue       = document.getElementById('progressRepsValue');
        const progressActiveDaysValue = document.getElementById('progressActiveDaysValue');

        if (progressChart && progressMetricTabs.length && progressRangeOptions.length) {
            let progressMetric = 'volume';
            let progressRange  = 30;

            const rangeLabels = { 30: '30 derniers jours', 90: '3 derniers mois', 365: 'Cette année', 0: 'All time' };

            const updateProgress = () => {
                const filtered = filterByDays(progressRange);
                progressMetricTabs.forEach(t => t.classList.toggle('active', t.dataset.metric === progressMetric));
                progressRangeOptions.forEach(t => t.classList.toggle('active', Number(t.dataset.range) === progressRange));
                if (progressRangeLabel) progressRangeLabel.textContent = rangeLabels[progressRange] || '30 derniers jours';

                renderChart(progressChart, filtered, progressMetric, 12);

                if (progressTotalValue)      progressTotalValue.textContent      = formatMetric(totalFor(filtered, progressMetric), progressMetric);
                if (progressDurationValue)   progressDurationValue.textContent   = formatDuration(totalFor(filtered, 'duration'));
                if (progressRepsValue)       progressRepsValue.textContent       = `${nf.format(totalFor(filtered, 'reps'))} reps`;
                if (progressActiveDaysValue) progressActiveDaysValue.textContent = nf.format(filtered.filter(i => i.volume > 0 || i.duration > 0 || i.reps > 0).length);
            };

            progressMetricTabs.forEach(t => t.addEventListener('click', () => { progressMetric = t.dataset.metric; updateProgress(); }));
            progressRangeTrigger?.addEventListener('click', e => { e.stopPropagation(); progressRangeMenu?.classList.toggle('open'); });
            progressRangeOptions.forEach(t => t.addEventListener('click', () => { progressRange = Number(t.dataset.range); progressRangeMenu?.classList.remove('open'); updateProgress(); }));
            document.addEventListener('click', e => { if (!progressRangeMenu?.contains(e.target)) progressRangeMenu?.classList.remove('open'); });

            updateProgress();
        }
    }

    // =========================================
    // INIT
    // =========================================
    document.addEventListener('DOMContentLoaded', function () {
        document.body.classList.add('dashboard-page');

        [
            ['applyTheme',        applyTheme],
            ['bindTabs',          bindTabs],
            ['bindFlashes',       bindFlashes],
            ['bindMobileMenu',    bindMobileMenu],
            ['bindSettingsDrawer',bindSettingsDrawer],
            ['bindSettingsForms', bindSettingsForms],
            ['bindElios',         bindElios],
            ['bindPhotoCropper',  bindPhotoCropper],
            ['bindLicenceForm',   bindLicenceForm],
            ['bindDashboardCharts', bindDashboardCharts],
        ].forEach(([name, fn]) => {
            try { fn(); } catch (e) { console.error(`${name} error`, e); }
        });
    });

    // Exports globaux (utilisés depuis Twig si besoin)
    Object.assign(window, {
        showJsFlash,
        showSettingsFeedback,
        toggleMobileMenu,
        toggleEdit,
        updateEmail,
        updatePassword,
        confirmDeleteAccount,
        openLicenceChoice,
        closeLicenceModal,
        saveLicenceManual,
        openChatbot
    });

})();