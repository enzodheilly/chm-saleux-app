(() => {
    // --- Sélection des modals ---
    const licenceModal = document.getElementById('licence-modal');
    const deleteModal = document.getElementById('delete-licence-modal');
    const form = document.getElementById('licence-form');
    const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
    const cancelDeleteBtn = document.getElementById('cancel-delete-btn');

    if (!licenceModal || !deleteModal) return;

    // --- Ouvrir le modal licence via delegation ---
    document.addEventListener('click', (e) => {
        if (e.target && e.target.id === 'open-licence-modal') {
            licenceModal.style.display = 'flex';
        }
    });

    // --- Fermer le modal licence ---
    licenceModal.querySelector('.close-modal')?.addEventListener('click', () => {
        licenceModal.style.display = 'none';
    });
    window.addEventListener('click', e => {
        if (e.target === licenceModal) licenceModal.style.display = 'none';
    });

    // --- Dropdown "Gérer" ---
    document.addEventListener('click', (e) => {
        if (e.target && e.target.classList.contains('btn-manage')) {
            const dropdown = e.target.nextElementSibling;
            if (!dropdown) return;
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
        // --- Supprimer licence ---
        if (e.target && e.target.classList.contains('btn-remove-licence')) {
            const currentLicenceRow = e.target.closest('.event-card');
            if (!currentLicenceRow) return;
            deleteModal.style.display = 'flex';

            confirmDeleteBtn.onclick = async () => {
                const licenceNumber = currentLicenceRow.querySelector('.small-text')?.textContent?.replace('N°','').trim();
                const deleteUrl = currentLicenceRow.querySelector('.manage-dropdown')?.dataset.deleteUrl;
                if (!licenceNumber || !deleteUrl) return alert('Impossible de supprimer cette licence.');

                confirmDeleteBtn.disabled = true;
                confirmDeleteBtn.innerHTML = `<div class="spinner-btn"></div>`;

                try {
                    const response = await fetch(deleteUrl, {
                        method: 'POST',
                        credentials: 'same-origin',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `licence_number=${encodeURIComponent(licenceNumber)}`
                    });

                    const data = await response.clone().json().catch(async () => {
                        const text = await response.clone().text();
                        console.error('Réponse suppression licence invalide :', text);
                        throw new Error('Réponse serveur invalide.');
                    });

                    if (!data.success) throw new Error(data.message || 'Erreur lors de la suppression.');
                    location.reload();
                } catch (err) {
                    alert(err.message);
                } finally {
                    confirmDeleteBtn.disabled = false;
                    confirmDeleteBtn.innerHTML = 'Supprimer';
                }
            };
        }
    });

    // --- Fermer modal suppression ---
    cancelDeleteBtn?.addEventListener('click', () => deleteModal.style.display = 'none');
    deleteModal.querySelector('.close-modal')?.addEventListener('click', () => deleteModal.style.display = 'none');
    window.addEventListener('click', e => { if (e.target === deleteModal) deleteModal.style.display = 'none'; });

    // --- Soumettre le formulaire d'ajout licence ---
    form?.addEventListener('submit', async (e) => {
        e.preventDefault();
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;

        submitBtn.style.width = `${submitBtn.offsetWidth}px`;
        submitBtn.innerHTML = `<div class="spinner-btn"></div>`;
        submitBtn.disabled = true;

        const formData = new FormData(form);
        const url = form.dataset.url;

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const data = await response.clone().json().catch(async () => {
                const text = await response.clone().text();
                console.error('Réponse ajout licence invalide :', text);
                throw new Error('Réponse serveur invalide.');
            });

            if (!data.success) throw new Error(data.message || 'Erreur lors de l’ajout.');
            setTimeout(() => location.reload(), 500);
        } catch (err) {
            alert(err.message);
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            submitBtn.style.width = '';
        }
    });

})();
