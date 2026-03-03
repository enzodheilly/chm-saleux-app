(() => {
    const STORAGE_KEY = 'chm_cookie_consent_v1';
    const banner = document.getElementById('cookie-banner');

    if (!banner) return;

    const gaId = banner.dataset.gaId;
    const acceptBtn = banner.querySelector('[data-cookie-accept]');
    const denyBtn = banner.querySelector('[data-cookie-deny]');
    const openSettingsBtn = banner.querySelector('[data-cookie-open-settings]');
    const saveSelectionBtn = banner.querySelector('[data-cookie-save-selection]');
    const settingsPanel = banner.querySelector('[data-cookie-settings]');
    const analyticsToggle = document.getElementById('cookie-analytics-toggle');

    let gaLoaded = false;

    window.dataLayer = window.dataLayer || [];
    window.gtag = window.gtag || function () {
        window.dataLayer.push(arguments);
    };

    // État par défaut : tout ce qui est non essentiel est refusé
    gtag('consent', 'default', {
        analytics_storage: 'denied',
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied'
    });

    function loadGoogleAnalytics() {
        if (!gaId || gaLoaded) return;

        const script = document.createElement('script');
        script.async = true;
        script.src = `https://www.googletagmanager.com/gtag/js?id=${encodeURIComponent(gaId)}`;
        document.head.appendChild(script);

        gaLoaded = true;

        gtag('js', new Date());
        gtag('config', gaId);
    }

    function saveConsent(consent) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(consent));
    }

    function readConsent() {
        try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY));
        } catch (e) {
            return null;
        }
    }

    function applyConsent(consent) {
        const analyticsGranted = !!consent.analytics;

        gtag('consent', 'update', {
            analytics_storage: analyticsGranted ? 'granted' : 'denied',
            ad_storage: 'denied',
            ad_user_data: 'denied',
            ad_personalization: 'denied'
        });

        if (analyticsGranted) {
            loadGoogleAnalytics();
        }
    }

    function openBanner() {
        banner.hidden = false;
        document.documentElement.classList.add('cookie-banner-open');
    }

    function closeBanner() {
        banner.hidden = true;
        document.documentElement.classList.remove('cookie-banner-open');
    }

    function openSettings() {
        settingsPanel.hidden = false;
    }

    function setConsentAndClose(consent) {
        saveConsent(consent);
        applyConsent(consent);
        closeBanner();
    }

    acceptBtn?.addEventListener('click', () => {
        setConsentAndClose({ essential: true, analytics: true });
    });

    denyBtn?.addEventListener('click', () => {
        setConsentAndClose({ essential: true, analytics: false });
    });

    openSettingsBtn?.addEventListener('click', () => {
        openSettings();
    });

    saveSelectionBtn?.addEventListener('click', () => {
        setConsentAndClose({
            essential: true,
            analytics: !!analyticsToggle?.checked
        });
    });

    document.querySelectorAll('[data-open-cookie-settings]').forEach((el) => {
        el.addEventListener('click', (event) => {
            event.preventDefault();

            const saved = readConsent();
            analyticsToggle.checked = !!saved?.analytics;

            openBanner();
            openSettings();
        });
    });

    const savedConsent = readConsent();

    if (savedConsent) {
        analyticsToggle.checked = !!savedConsent.analytics;
        applyConsent(savedConsent);
        closeBanner();
    } else {
        openBanner();
    }
})();