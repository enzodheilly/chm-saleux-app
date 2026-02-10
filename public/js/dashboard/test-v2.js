/**
 * FONCTIONS GLOBALES
 * ============================================================
 */

// --- SYSTÈME DE FLASH JS ---
window.showJsFlash = function(message, type = 'success') {
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
        <div class="flash-close" onclick="this.parentElement.remove()">
            <i class="fa-solid fa-xmark"></i>
        </div>
    `;

    container.appendChild(flash);

    setTimeout(() => {
        if (flash.parentElement) {
            flash.classList.add('fade-out');
            setTimeout(() => flash.remove(), 300);
        }
    }, 5000);
};

// --- GESTION DU MENU MOBILE ---
window.toggleMobileMenu = function() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('mobileOverlay');
    
    if (sidebar && overlay) {
        sidebar.classList.toggle('mobile-open');
        overlay.classList.toggle('active');
    }
};

// --- GESTION DES FORMULAIRES DE PARAMÈTRES ---
window.toggleEdit = function(type) {
    const form = document.getElementById('form-' + type);
    if (form) {
        const isHidden = (window.getComputedStyle(form).display === 'none');
        if (isHidden) {
            document.querySelectorAll('[id^="form-"]').forEach(f => f.style.display = 'none');
            form.style.display = 'block';
            const firstInput = form.querySelector('input');
            if (firstInput) setTimeout(() => firstInput.focus(), 100);
        } else {
            form.style.display = 'none';
        }
    }
};

// --- GESTION MODAL LICENCE ---
window.openLicenceChoice = function() {
    const modal = document.getElementById('licenceModal');
    if (modal) {
        modal.style.display = 'flex';
        setTimeout(() => {
            const input = document.getElementById('licenceInputManual');
            if(input) input.focus();
        }, 100);
    }
};

window.closeLicenceModal = function() {
    const modal = document.getElementById('licenceModal');
    if (modal) modal.style.display = 'none';
};

window.saveLicenceManual = async function() {
    const input = document.getElementById('licenceInputManual');
    const num = input ? input.value.trim() : "";

    if (!num || num.length < 4) {
        window.showJsFlash("Veuillez entrer un numéro de licence valide.", "warning");
        return;
    }

    const formData = new FormData();
    formData.append('licenceNumber', num);

    try {
        const response = await fetch('/espace-adherent/licence', { 
            method: 'POST',
            body: formData 
        });
        const result = await response.json();
        if (result.success) {
            location.reload();
        } else {
            window.showJsFlash(result.message || "Erreur lors de l'association.", "error");
        }
    } catch (e) {
        window.showJsFlash("Erreur de connexion au serveur.", "error");
    }
};

// --- LIAISON ELIOS ---
window.openChatbot = function(mode = null) {
    window.closeLicenceModal();
    const btn = document.getElementById('assistantWidgetOpen');
    if (btn) btn.click();

    if (mode === 'licence' && window.eliosInstance) {
        setTimeout(() => {
            window.eliosInstance.handleSend('FLOW_LICENSE');
        }, 500);
    }
};

// --- MISE À JOUR PROFIL ---
window.updateProfile = async function(type) {
    let data = { type: type };
    if (type === 'email') data.value = document.getElementById('input-email').value;
    if (type === 'phone') data.value = document.getElementById('input-phone').value;
    if (type === 'password') {
        data.old = document.getElementById('old-pass').value;
        data.new = document.getElementById('new-pass').value;
    }

    if (type !== 'password' && (!data.value || data.value.trim() === '')) {
        window.showJsFlash("Veuillez remplir le champ concerné.", "warning");
        return;
    }

    try {
        const response = await fetch('/api/user/update-settings', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        const result = await response.json();
        if (result.success) {
            location.reload(); 
        } else {
            window.showJsFlash(result.message, "error");
        }
    } catch (e) {
        window.showJsFlash("Erreur réseau.", "error");
    }
};

// --- SUPPRESSION COMPTE ---
window.confirmDeleteAccount = function() {
    if (confirm("ATTENTION : La suppression est définitive. Continuer ?")) {
        const password = prompt("Saisissez votre mot de passe pour confirmer :");
        if (password) {
            fetch('/profile/delete-account', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ password: password })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) window.location.href = "/logout";
                else window.showJsFlash(data.message, "error");
            });
        }
    }
};

window.toggleA2F = function() {
    window.showJsFlash("La configuration de l'A2F sera disponible prochainement.", "info");
};

/**
 * INITIALISATION AU CHARGEMENT DU DOM
 * ============================================================
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. GESTION DES ONGLETS & FERMETURE MENU MOBILE AUTOMATIQUE
    const navItems = document.querySelectorAll('.nav-item');
    const sections = document.querySelectorAll('.section-view');

    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.dataset.target;
            
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            
            sections.forEach(sec => sec.classList.remove('active'));
            const targetSection = document.getElementById('tab-' + targetId);
            if(targetSection) targetSection.classList.add('active');

            // Fermer le menu mobile après clic sur un onglet
            if (window.innerWidth < 1024) {
                window.toggleMobileMenu();
            }
        });
    });

    // 2. THEME SWITCHER
    const themeBtn = document.getElementById('theme-toggle-btn');
    if(themeBtn) {
        themeBtn.addEventListener('click', function() {
            document.body.classList.toggle('light-mode');
        });
    }

    // 3. AUTO-SUPPRESSION DES FLASHES
    const initFlashes = () => {
        const flashes = document.querySelectorAll('.flash-message');
        flashes.forEach(flash => {
            setTimeout(() => {
                flash.classList.add('fade-out');
                setTimeout(() => flash.remove(), 300);
            }, 5000);
        });
    };
    initFlashes();

    // 4. FIX VISIBILITÉ ELIOS
    const eliosBtn = document.getElementById('assistantWidgetOpen');
    if (eliosBtn) {
        eliosBtn.style.zIndex = '99999';
        eliosBtn.style.pointerEvents = 'auto';
    }

    // 5. GESTION PHOTO & CROPPER
    const fileInput = document.getElementById('avatar-upload');
    const cropperModal = document.getElementById('cropperModal');
    const cropperImage = document.getElementById('cropperImage');
    const cropBtn = document.getElementById('cropAndSaveBtn');
    let cropper = null;

    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    cropperImage.src = event.target.result;
                    cropperModal.style.display = 'flex';
                    if (cropper) cropper.destroy();
                    cropper = new Cropper(cropperImage, { aspectRatio: 1, viewMode: 1 });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    if(cropBtn) {
        cropBtn.addEventListener('click', () => {
            if (!cropper) return;
            cropper.getCroppedCanvas({ width: 400, height: 400 }).toBlob((blob) => {
                const formData = new FormData();
                formData.append('profileImage', blob, 'avatar.jpg');
                fetch('/profil/photo', { method: 'POST', body: formData })
                .then(res => res.json())
                .then(data => { if (data.success) location.reload(); });
            }, 'image/jpeg', 0.85);
        });
    }
});