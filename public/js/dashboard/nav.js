const notifIcon = document.getElementById('notification-icon');
const notifDropdown = document.getElementById('notification-dropdown');

// Gestion du dropdown notifications
notifIcon.addEventListener('click', (e) => {
    e.stopPropagation();
    notifDropdown.style.display = notifDropdown.style.display === 'block' ? 'none' : 'block';

    if (notifDropdown.style.display === 'block') {
        fetch('/notifications/mark-seen', { method: 'POST', headers: {'X-Requested-With':'XMLHttpRequest'} })
            .then(resp => resp.json())
            .then(data => {
                if(data.success){
                    const badge = document.querySelector('.notif-count');
                    if(badge) badge.style.display = 'none';
                }
            });
    }
});

document.addEventListener('click', () => {
    notifDropdown.style.display = 'none';
});

document.addEventListener('DOMContentLoaded', () => {
    const pushContainer = document.getElementById('push-message-container');

    // === Gestion mot de passe ===
    const formPassword = document.getElementById('change-password-form');
    const sidebarPassword = document.getElementById('sidebar-password');
    const closePasswordBtn = document.getElementById('close-password');

    formPassword.addEventListener('submit', async (e) => {
        e.preventDefault();
        const submitBtn = formPassword.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;

        submitBtn.disabled = true;
        submitBtn.textContent = '';
        const spinner = document.createElement('span');
        spinner.className = 'btn-spinner';
        submitBtn.appendChild(spinner);

        const formData = new FormData(formPassword);

        try {
            const response = await fetch(formPassword.action, {
                method: 'POST',
                body: formData,
                headers: {'X-Requested-With': 'XMLHttpRequest'}
            });
            const data = await response.json();

            sidebarPassword.classList.remove('active');
            formPassword.reset();
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;

            // push message mot de passe
            const push = document.createElement('div');
            push.className = 'push-message';
            const messageText = document.createElement('div');
            messageText.className = 'message-text';
            messageText.textContent = data.success ? 'Votre mot de passe a été modifié avec succès' : (data.message || 'Une erreur est survenue');
            push.appendChild(messageText);

            const pushClose = document.createElement('button');
            pushClose.className = 'close-btn';
            pushClose.innerHTML = '&times;';
            pushClose.addEventListener('click', () => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); });
            push.appendChild(pushClose);

            pushContainer.appendChild(push);
            setTimeout(() => push.classList.add('show'), 10);
            setTimeout(() => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); }, 5000);

        } catch(err) {
            console.error(err);
            alert('Impossible de modifier le mot de passe');
        }
    });

    closePasswordBtn.addEventListener('click', () => sidebarPassword.classList.remove('active'));

    const openPasswordBtn = document.getElementById('open-password-sidebar');
    if(openPasswordBtn) openPasswordBtn.addEventListener('click', () => sidebarPassword.classList.add('active'));


    // === Gestion générique des autres formulaires sidebar ===
    function handleSidebarForm(formId, sidebarId, successMessage) {
        const form = document.getElementById(formId);
        const sidebar = document.getElementById(sidebarId);
        if (!form || !sidebar) return;
        const closeBtn = sidebar.querySelector('.close-btn');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            submitBtn.disabled = true;
            submitBtn.textContent = '';
            const spinner = document.createElement('span');
            spinner.className = 'btn-spinner';
            submitBtn.appendChild(spinner);

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                });
                const data = await response.json();

                sidebar.classList.remove('active');
                form.reset();
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;

                // push message
                const push = document.createElement('div');
                push.className = 'push-message';
                const messageText = document.createElement('div');
                messageText.className = 'message-text';
                messageText.textContent = data.success ? successMessage : (data.message || 'Une erreur est survenue');
                push.appendChild(messageText);

                const pushClose = document.createElement('button');
                pushClose.className = 'close-btn';
                pushClose.innerHTML = '&times;';
                pushClose.addEventListener('click', () => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); });
                push.appendChild(pushClose);

                pushContainer.appendChild(push);
                setTimeout(() => push.classList.add('show'), 10);
                setTimeout(() => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); }, 5000);

            } catch (err) {
                console.error(err);
            }
        });

        closeBtn.addEventListener('click', () => sidebar.classList.remove('active'));
    }

    handleSidebarForm('change-phone-form', 'sidebar-phone', 'Votre téléphone a été modifié avec succès');


    // === Workflow email multi-modales ===
    const sidebarEmail = document.getElementById('sidebar-email');
    const modalNewEmail = document.getElementById('modal-new-email');
    const modalEmailCode = document.getElementById('modal-email-code');
    const hiddenEmail = document.getElementById('hidden-email');

    const openEmailViewBtn = document.getElementById('open-email-sidebar');
    const closeEmailViewBtn = document.getElementById('close-email');
    const closeEmailNewBtn = document.getElementById('close-new-email');
    const closeEmailCodeBtn = document.getElementById('close-email-code');
    const openEmailEditBtn = sidebarEmail.querySelector('a#open-email-sidebar');

    if(openEmailViewBtn) openEmailViewBtn.addEventListener('click', () => sidebarEmail.classList.add('active'));
    if(closeEmailViewBtn) closeEmailViewBtn.addEventListener('click', () => sidebarEmail.classList.remove('active'));
    if(closeEmailNewBtn) closeEmailNewBtn.addEventListener('click', () => modalNewEmail.classList.remove('active'));
    if(closeEmailCodeBtn) closeEmailCodeBtn.addEventListener('click', () => modalEmailCode.classList.remove('active'));

    if(openEmailEditBtn) openEmailEditBtn.addEventListener('click', () => {
        sidebarEmail.classList.remove('active');
        modalNewEmail.classList.add('active');
    });

    const formNewEmail = document.getElementById('form-new-email');
    formNewEmail.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = document.getElementById('new-email').value.trim();
        if(!email) return;

        try {
            const response = await fetch('/profile/send-email-code', {
                method: 'POST',
                headers: {'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
                body: JSON.stringify({email})
            });
            const data = await response.json();

            if(data.success){
                modalNewEmail.classList.remove('active');
                modalEmailCode.classList.add('active');
                hiddenEmail.value = email;
            } else {
                alert(data.message || 'Erreur lors de l’envoi du code.');
            }
        } catch(err) {
            console.error(err);
            alert('Erreur réseau, veuillez réessayer.');
        }
    });

    const formEmailCode = document.getElementById('form-email-code');
    formEmailCode.addEventListener('submit', async (e) => {
        e.preventDefault();
        const code = document.getElementById('email-code').value.trim();
        const email = hiddenEmail.value;

        try {
            const response = await fetch('/profile/verify-email-code', {
                method: 'POST',
                headers: {'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
                body: JSON.stringify({email, code})
            });
            const data = await response.json();

            if(data.success){
                sidebarEmail.classList.remove('active');
                modalNewEmail.classList.remove('active');
                modalEmailCode.classList.remove('active');

                const emailInput = document.getElementById('email');
                if(emailInput) emailInput.value = email;

                // push message flush
                const push = document.createElement('div');
                push.className = 'push-message';
                const messageText = document.createElement('div');
                messageText.className = 'message-text';
                messageText.textContent = data.message || 'Email modifié avec succès';
                push.appendChild(messageText);

                const pushClose = document.createElement('button');
                pushClose.className = 'close-btn';
                pushClose.innerHTML = '&times;';
                pushClose.addEventListener('click', () => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); });
                push.appendChild(pushClose);

                pushContainer.appendChild(push);
                setTimeout(() => push.classList.add('show'), 10);
                setTimeout(() => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); }, 5000);

            } else {
                alert(data.message || 'Code invalide.');
            }
        } catch(err) {
            console.error(err);
            alert('Erreur réseau, veuillez réessayer.');
        }
    });

    // Ouverture sidebar téléphone
   const openPhoneBtn = document.getElementById('open-phone-sidebar');
const sidebarPhoneView = document.getElementById('sidebar-phone-view');
if(openPhoneBtn && sidebarPhoneView) {
    openPhoneBtn.addEventListener('click', () => sidebarPhoneView.classList.add('active'));
}

});

document.addEventListener('DOMContentLoaded', () => {
    const pushContainer = document.getElementById('push-message-container');

    // Sidebar téléphone
    const sidebarView = document.getElementById('sidebar-phone-view');
    const sidebarEdit = document.getElementById('sidebar-phone-edit');
    const openEdit = document.getElementById('open-phone-edit');
    const closeView = document.getElementById('close-phone-view');
    const closeEdit = document.getElementById('close-phone-edit');
    const form = document.getElementById('change-phone-form');
    const currentPhone = document.getElementById('phone-current');

    if(openEdit && sidebarView && sidebarEdit){
        openEdit.addEventListener('click', () => {
            sidebarView.classList.remove('active');
            sidebarEdit.classList.add('active');
        });
    }

    if(closeView && sidebarView){
        closeView.addEventListener('click', () => sidebarView.classList.remove('active'));
    }

    if(closeEdit && sidebarEdit){
        closeEdit.addEventListener('click', () => sidebarEdit.classList.remove('active'));
    }

    if(form){
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const url = form.dataset.url;
            const phone = form.querySelector('#phone').value.trim();
            if(!phone) return;

            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = '...';

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ phone })
                });

                const data = await response.json();

                // Push message
                const push = document.createElement('div');
                push.className = 'push-message';
                const messageText = document.createElement('div');
                messageText.className = 'message-text';
                messageText.textContent = data.message || (data.success ? 'Numéro mis à jour' : 'Erreur');
                push.appendChild(messageText);

                const pushClose = document.createElement('button');
                pushClose.className = 'close-btn';
                pushClose.innerHTML = '&times;';
                pushClose.addEventListener('click', () => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); });
                push.appendChild(pushClose);

                pushContainer.appendChild(push);
                setTimeout(() => push.classList.add('show'), 10);
                setTimeout(() => { push.classList.remove('show'); setTimeout(() => push.remove(), 500); }, 5000);

                if(data.success && currentPhone){
                    // Mise à jour du champ lecture seule
                    currentPhone.value = phone;
                    currentPhone.readOnly = true;
                    currentPhone.style.background = '#444';
                    currentPhone.style.color = '#ccc';
                    currentPhone.style.cursor = 'not-allowed';

                    // Reset et fermer sidebar édition
                    form.reset();
                    sidebarEdit.classList.remove('active');
                    sidebarView.classList.add('active');
                }

            } catch(err){
                console.error(err);
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const modalDelete = document.getElementById('modal-delete-account');
    const openDeleteBtn = document.getElementById('open-delete-account'); // lien ou bouton pour ouvrir
    const closeDeleteBtn = document.getElementById('close-delete-account');
    const formDelete = document.getElementById('form-delete-account');

    if(openDeleteBtn) {
        openDeleteBtn.addEventListener('click', () => modalDelete.classList.add('active'));
    }
    if(closeDeleteBtn) {
        closeDeleteBtn.addEventListener('click', () => modalDelete.classList.remove('active'));
    }

    formDelete.addEventListener('submit', async (e) => {
        e.preventDefault();

        const confirmText = document.getElementById('confirm-delete').value.trim();
        const password = document.getElementById('password-delete').value.trim();

        if(confirmText.toLowerCase() !== 'supprimer mon compte') {
            alert('Vous devez taper exactement "supprimer mon compte" pour valider.');
            return;
        }

        if(!password) {
            alert('Veuillez saisir votre mot de passe.');
            return;
        }

        const submitBtn = formDelete.querySelector('button[type="submit"]');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Suppression en cours...';

        try {
            const response = await fetch(formDelete.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    confirm: confirmText,
                    password: password
                })
            });

            const data = await response.json();

            if(data.success) {
                alert('Votre compte a été supprimé.');
                window.location.href = '/'; // redirection après suppression
            } else {
                alert(data.message || 'Erreur lors de la suppression.');
            }
        } catch(err) {
            console.error(err);
            alert('Erreur réseau, veuillez réessayer.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Supprimer mon compte';
        }
    });
});
