// ============================================================
// SESSION EXPIRÉE DETECTOR (global)
// ============================================================

(function () {

    const SESSION_EXPIRED_MESSAGE = "Votre session a expiré. Veuillez vous reconnecter.";

    function handleSessionExpired() {

        if (window.showToast) {
            window.showToast(SESSION_EXPIRED_MESSAGE);
        } else {
            alert(SESSION_EXPIRED_MESSAGE);
        }

        setTimeout(() => {
            window.location.href = "/login";
        }, 1200);
    }

    // ------------------------------------------------
    // Interception FETCH
    // ------------------------------------------------
    const originalFetch = window.fetch;

    window.fetch = async function (...args) {

        const response = await originalFetch(...args);

        if (response.status === 401 || response.status === 403) {
            handleSessionExpired();
        }

        return response;
    };

    // ------------------------------------------------
    // Interception AJAX (XMLHttpRequest)
    // ------------------------------------------------
    const originalOpen = XMLHttpRequest.prototype.open;

    XMLHttpRequest.prototype.open = function () {

        this.addEventListener("load", function () {

            if (this.status === 401 || this.status === 403) {
                handleSessionExpired();
            }

        });

        originalOpen.apply(this, arguments);
    };

})();


document.addEventListener('DOMContentLoaded', () => {
    const navBtn    = document.getElementById('feedback-nav-btn');
    const toggle    = document.getElementById('feedback-toggle');
    const panel     = document.getElementById('feedback-panel');
    const closeBtn  = document.getElementById('feedback-close');
    const send      = document.getElementById('feedback-send');
    const textarea  = document.getElementById('feedback-message');
    const charCount = document.getElementById('feedback-chars');
    const success   = document.getElementById('feedback-success');
    const charWrap  = document.querySelector('.feedback-char-count');

    if (!panel) return;

    let selectedType = 'bug';

    // Reset interne
    function resetPanel() {
        send.style.display     = '';
        textarea.style.display = '';
        if (charWrap) charWrap.style.display = '';
        success.classList.add('feedback-hidden');
        textarea.value        = '';
        charCount.textContent = '0';
        send.disabled         = false;
        send.innerHTML        = '<i class="fa-solid fa-paper-plane"></i> Envoyer';
    }

    // Fermeture + reset immédiat
    function closePanel() {
        panel.classList.remove('open');
        resetPanel();
    }

    // Ouvre/ferme le panel
    function handleToggle(e) {
        e.stopPropagation();
        if (panel.classList.contains('open')) {
            closePanel();
        } else {
            panel.classList.add('open');
        }
    }

    // Bouton nav (desktop)
    if (navBtn) navBtn.addEventListener('click', handleToggle);

    // Bouton flottant (mobile)
    if (toggle) toggle.addEventListener('click', handleToggle);

    closeBtn.addEventListener('click', () => closePanel());

    // Type selection
    document.querySelectorAll('.type-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.type-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            selectedType = btn.dataset.type;
        });
    });

    // Char counter
    textarea.addEventListener('input', () => {
        charCount.textContent = textarea.value.length;
    });

    // Submit
    send.addEventListener('click', async () => {
        const message = textarea.value.trim();
        if (message.length < 5) {
            textarea.style.borderColor = '#e63946';
            setTimeout(() => textarea.style.borderColor = '', 1500);
            return;
        }

        send.disabled = true;
        send.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Envoi...';

        try {
            const res = await fetch('/feedback/submit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    type: selectedType,
                    message: message,
                    page: window.location.pathname
                })
            });

            const data = await res.json();

            if (data.success) {
                send.style.display     = 'none';
                textarea.style.display = 'none';
                if (charWrap) charWrap.style.display = 'none';
                success.classList.remove('feedback-hidden');

                setTimeout(() => closePanel(), 2500);
            } else {
                resetPanel();
            }

        } catch (e) {
            resetPanel();
        }
    });

    // Fermer si clic extérieur
    document.addEventListener('click', (e) => {
        const widget = document.getElementById('feedback-widget');
        const isInsideWidget = widget && widget.contains(e.target);
        const isNavBtn = navBtn && navBtn.contains(e.target);
        if (!isInsideWidget && !isNavBtn) {
            closePanel();
        }
    });
});