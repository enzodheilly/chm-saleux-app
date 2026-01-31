document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================================
    // 1. GESTION DES ONGLETS (SPA)
    // ============================================================
    const navItems = document.querySelectorAll('.nav-item');
    const sections = document.querySelectorAll('.section-view');
    const pageTitle = document.getElementById('page-title-display');

    // Titres associés aux IDs des onglets
    const titles = {
        'home': 'Tableau de bord',
        'licence': 'Ma Licence Fédérale',
        'planning': 'Planning des Séances',
        'events': 'Événements à venir',
        'boutique': 'Boutique du Club',
        'messages': 'Mes Messages',
        'settings': 'Paramètres du compte'
    };

    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();

            // Retirer la classe active de tous les liens
            navItems.forEach(nav => nav.classList.remove('active'));
            // Ajouter la classe active au lien cliqué
            this.classList.add('active');

            // Cacher toutes les sections
            sections.forEach(sec => sec.classList.remove('active'));

            // Récupérer la cible (data-target)
            const targetId = this.dataset.target;
            const targetSection = document.getElementById('tab-' + targetId);

            // Afficher la section cible
            if(targetSection) {
                targetSection.classList.add('active');
            }

            // Mettre à jour le titre
            if(pageTitle && titles[targetId]) {
                pageTitle.innerText = titles[targetId];
            }
        });
    });

    // ============================================================
    // 2. THEME SWITCHER
    // ============================================================
    const themeBtn = document.getElementById('theme-toggle-btn');
    const themeIcon = document.getElementById('theme-icon');

    // Fonction pour mettre à jour l'icône
    function updateThemeIcon() {
        if(document.body.classList.contains('light-mode')) {
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        } else {
            themeIcon.classList.remove('fa-sun');
            themeIcon.classList.add('fa-moon');
        }
    }

    if(themeBtn) {
        themeBtn.addEventListener('click', function() {
            document.body.classList.toggle('light-mode');
            updateThemeIcon();
        });
    }

    // Gestion des boutons de thème explicites (dans l'onglet Paramètres)
    const btnDark = document.getElementById('btn-theme-dark');
    const btnLight = document.getElementById('btn-theme-light');

    if(btnDark) {
        btnDark.addEventListener('click', () => {
            document.body.classList.remove('light-mode');
            updateThemeIcon();
        });
    }
    if(btnLight) {
        btnLight.addEventListener('click', () => {
            document.body.classList.add('light-mode');
            updateThemeIcon();
        });
    }

    // ============================================================
    // 3. GESTION UPLOAD PHOTO AVEC CROPPER & AJAX
    // ============================================================
    
    const fileInput = document.getElementById('avatar-upload');
    const avatarPreview = document.getElementById('avatar-preview'); // Grande image
    
    // On cherche les deux cas possibles pour la sidebar : soit une image, soit une div avec initiales
    const sidebarAvatarImg = document.querySelector('.user-mini .user-avatar-small-img'); 
    const sidebarAvatarDiv = document.querySelector('.user-mini .user-avatar-small'); 

    // Éléments de la Modale Cropper
    const cropperModal = document.getElementById('cropperModal');
    const cropperImage = document.getElementById('cropperImage');
    const cropBtn = document.getElementById('cropAndSaveBtn');
    const cancelBtn = document.getElementById('cancelCropBtn');
    
    let cropper = null;

    if (fileInput) {
        // A. Quand on sélectionne un fichier
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            
            if (file) {
                // Sécurité : Vérifier le type MIME
                if (!['image/jpeg', 'image/png'].includes(file.type)) {
                    alert('Format non supporté. Veuillez utiliser du JPG ou PNG.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    // 1. On charge l'image dans la modale
                    cropperImage.src = event.target.result;
                    cropperModal.style.display = 'flex'; // Afficher modale (flex pour centrer)

                    // 2. Si un cropper existe déjà, on le détruit pour éviter les bugs
                    if (cropper) {
                        cropper.destroy();
                    }

                    // 3. Initialiser CropperJS sur l'image chargée
                    cropper = new Cropper(cropperImage, {
                        aspectRatio: 1, // Carré parfait
                        viewMode: 1,
                        autoCropArea: 1,
                        background: false // Fond sombre de la modale suffit
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // B. Action : Annuler
    if(cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            cropperModal.style.display = 'none';
            fileInput.value = ''; // Reset l'input pour pouvoir sélectionner la même image si besoin
            if (cropper) cropper.destroy();
        });
    }

    // C. Action : Enregistrer (Crop & Upload)
    if(cropBtn) {
        cropBtn.addEventListener('click', () => {
            if (!cropper) return;

            // Changer le texte du bouton pour feedback visuel
            const originalText = cropBtn.innerText;
            cropBtn.innerText = 'Envoi...';
            cropBtn.disabled = true;

            // Obtenir le blob (fichier binaire) de l'image recadrée
            cropper.getCroppedCanvas({
                width: 400, // On redimensionne à 400x400 pour optimiser la BDD
                height: 400
            }).toBlob((blob) => {
                
                // Préparer les données pour le Controller Symfony
                const formData = new FormData();
                formData.append('profileImage', blob, 'avatar.jpg');

                // Envoi AJAX vers la route Symfony
                fetch('/profil/photo', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // --- SUCCÈS ---
                        
                        // 1. Mise à jour grande image
                        if(avatarPreview) avatarPreview.src = data.imageDataUrl;
                        
                        // 2. Mise à jour sidebar (Gestion complexe car ça peut être une Div ou une Img)
                        if(sidebarAvatarDiv) {
                           // C'était une div avec des lettres -> on la remplace par une img
                           const newImg = document.createElement('img');
                           newImg.src = data.imageDataUrl;
                           newImg.className = 'user-avatar-small-img'; // Classe pour futur ciblage
                           newImg.style.width = '36px';
                           newImg.style.height = '36px';
                           newImg.style.borderRadius = '50%';
                           newImg.style.objectFit = 'cover';
                           sidebarAvatarDiv.parentNode.replaceChild(newImg, sidebarAvatarDiv);
                        } else if (sidebarAvatarImg) {
                            // C'était déjà une image -> on change juste la source
                            sidebarAvatarImg.src = data.imageDataUrl;
                        }

                        // 3. Fermer la modale
                        cropperModal.style.display = 'none';
                        fileInput.value = ''; // Reset input
                    } else {
                        alert('Erreur: ' + data.message);
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Une erreur est survenue lors de l\'envoi.');
                })
                .finally(() => {
                    // Remettre le bouton comme avant
                    cropBtn.innerText = originalText;
                    cropBtn.disabled = false;
                    if (cropper) cropper.destroy();
                });

            }, 'image/jpeg', 0.85); // Qualité JPEG 85%
        });
    }
});