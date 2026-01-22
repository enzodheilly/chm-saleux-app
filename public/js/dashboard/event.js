document.addEventListener("DOMContentLoaded", () => {

    // ⚡ Fonction pour initialiser les boutons d'inscription dans un scope donné (document ou onglet)
    function initEventButtons(scope = document) {
        const eventButtons = scope.querySelectorAll('.event-register-btn');
        if (!eventButtons.length) return;

        eventButtons.forEach(button => {
            // ⚠ Si déjà initialisé, on skip
            if (button.dataset.initialized) return;
            button.dataset.initialized = "true";

            initButtonState(button);

            button.addEventListener('click', async (e) => {
    e.preventDefault();

    const status = button.dataset.status;
    const eventTitle = button.dataset.eventTitle; // récupère le nom
    const eventId = button.dataset.eventId;
    const registerUrl = button.dataset.registerUrl;
    const unregisterUrl = button.dataset.unregisterUrl;

    if (!eventId || (!registerUrl && !unregisterUrl)) {
        console.error("Event ID ou URL manquant");
        return;
    }

    if (status === "pending") return; // empêche double clic

    const url = status === "confirmed" ? unregisterUrl : registerUrl;

    setLoading(button);

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({})
        });

        if (!response.ok) throw new Error(`Erreur HTTP ${response.status}`);

        const data = await response.json();

        if (!data.success) {
            alert(data.message || "Erreur serveur");
            if (data.message?.includes("Déjà en attente")) {
                button.dataset.status = "pending";
                applyStatePending(button);
            } else {
                initButtonState(button);
            }
            return;
        }

        // ⚡ Affichage message dynamique
        if (status === "confirmed") {
            button.dataset.status = "none";
            applyStateNone(button);
            showPush(`Vous êtes désinscrit de l'événement « ${eventTitle} » ✅`);
        } else {
            button.dataset.status = "pending";
            applyStatePending(button);
            showPush(`Votre inscription à l'événement « ${eventTitle} » est en attente, un email de confirmation vient de vous être envoyé 📩`);
        }

    } catch (err) {
        console.error(err);
        alert("Impossible de contacter le serveur.");
        initButtonState(button);
    } finally {
        button.querySelector('.spinner-inline')?.remove();
        if (button.dataset.status !== "pending") button.disabled = false;
    }
});

        });
    }

    /* ===================== INIT BUTTON STATE ===================== */
    function initButtonState(button) {
        switch (button.dataset.status) {
            case "confirmed": applyStateConfirmed(button); break;
            case "pending": applyStatePending(button); break;
            default: applyStateNone(button); break;
        }
    }

    /* ===================== BUTTON STYLES ===================== */
    function applyStateNone(btn) {
        btn.textContent = "Je m'inscris";
        btn.classList.remove("btn-danger", "btn-secondary");
        btn.classList.add("btn-primary");
        btn.disabled = false;
    }

    function applyStatePending(btn) {
        btn.textContent = "En attente de confirmation";
        btn.classList.remove("btn-danger", "btn-primary");
        btn.classList.add("btn-secondary");
        btn.disabled = true;
    }

    function applyStateConfirmed(btn) {
        btn.textContent = "Se désinscrire";
        btn.classList.remove("btn-primary", "btn-secondary");
        btn.classList.add("btn-danger");
        btn.disabled = false;
    }

    /* ===================== SPINNER ===================== */
    function setLoading(button) {
        button.disabled = true;
        button.textContent = "";
        const spinner = document.createElement('span');
        spinner.className = 'spinner-inline';
        button.appendChild(spinner);
    }

    /* ===================== PUSH MESSAGES ===================== */
    function showPush(msg, duration = 6000) {
        const container = document.getElementById("push-message-container");
        if (!container) return;

        const box = document.createElement("div");
        box.className = "push-message"; // style CSS existant
        box.innerHTML = `
            <span class="message-text">${msg}</span>
            <button class="close-btn">&times;</button>
        `;
        container.appendChild(box);

        setTimeout(() => box.classList.add("show"), 10);

        function hide() {
            box.classList.remove("show");
            box.classList.add("hide");
            setTimeout(() => box.remove(), 500);
        }

        const timeout = setTimeout(hide, duration);

        box.querySelector(".close-btn").addEventListener("click", () => {
            clearTimeout(timeout);
            hide();
        });
    }

    // ⚡ INITIALISATION GÉNÉRIQUE
    initEventButtons(); // tous les boutons du DOM initial

    // ⚡ Si tu as des onglets chargés dynamiquement, tu peux ré-initialiser sur ce scope
    document.querySelectorAll('.tab').forEach(tab => initEventButtons(tab));

});
