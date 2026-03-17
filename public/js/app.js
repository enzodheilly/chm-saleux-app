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