// public/js/admin/newsletter/compose.js

document.addEventListener('DOMContentLoaded', function () {

    const year      = window.composeData.year;
    const clubName  = window.composeData.clubName;
    const csrfToken = window.composeData.csrfToken;

    // --- Init Quill ---
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        },
        placeholder: 'Rédigez votre message ici...'
    });

    // --- Sync contenu Quill → champ hidden avant soumission ---
    document.getElementById('newsletterForm').addEventListener('formdata', function (e) {
        e.formData.set('content', quill.root.innerHTML);
    });

    // Fallback pour les navigateurs sans l'event formdata
    document.getElementById('submitBtn').addEventListener('click', function () {
        document.getElementById('content-hidden').value = quill.root.innerHTML;
    });

    // --- Preview temps réel ---
    function updatePreview() {
        const subject = document.getElementById('subject').value;
        const content = quill.root.innerHTML;

        document.getElementById('preview').innerHTML =
            '<div style="font-family: \'Segoe UI\', Helvetica, Arial, sans-serif; line-height:1.6; color:#1a1a1a;">' +
                '<div style="padding-bottom:15px; border-bottom:2px solid #f1f5f9; margin-bottom:25px;">' +
                    '<p style="font-size: 11px; color: #94a3b8; text-transform: uppercase; margin: 0 0 5px 0;">Sujet du mail</p>' +
                    '<h2 style="margin:0; color:#0f172a; font-size:22px; font-weight:800;">' + (subject || 'Sans objet') + '</h2>' +
                '</div>' +
                '<div class="email-body-content">' + (content || '<p style="color:#94a3b8">Le corps du message apparaîtra ici...</p>') + '</div>' +
                '<div style="margin-top:40px; padding-top:20px; border-top:1px solid #f1f5f9; text-align:center; font-size:12px; color:#94a3b8;">' +
                    '© ' + year + ' ' + clubName + '. Tous droits réservés.<br>' +
                    '<a href="#" style="color:#64748b;">Se désabonner</a>' +
                '</div>' +
            '</div>';
    }

    quill.on('text-change', updatePreview);
    document.getElementById('subject').addEventListener('input', updatePreview);

    // --- Templates ---
    const templates = {
        basic: '<p>Bonjour {{ firstname }},</p><p>Nous sommes ravis de vous partager les actualités de la semaine au club !</p><ul><li><strong>Entraînements :</strong> Les horaires restent inchangés.</li><li><strong>Événement :</strong> N\'oubliez pas le tournoi de samedi prochain.</li></ul><p>Sportivement,<br>L\'équipe du Club</p>',
        promo: '<div style="text-align:center;"><h1 style="color:#ff6600; font-size:28px;">🔥 OFFRE FLASH !</h1><p style="font-size:18px;">Profitez de <strong>-20%</strong> sur tous les équipements de la boutique pendant 48h.</p><br><a href="#" style="background:#ff6600; color:#fff; padding:12px 25px; text-decoration:none; border-radius:6px; font-weight:bold; display:inline-block;">J\'en profite maintenant</a></div>',
        announcement: '<h2 style="color:#0f172a;">📢 Annonce Importante</h2><p>Le club sera exceptionnellement fermé ce dimanche pour travaux de maintenance. Nous vous prions de nous excuser pour la gêne occasionnée.</p>'
    };

    document.getElementById('templateSelect').addEventListener('change', function (e) {
        const val = e.target.value;
        if (val && templates[val]) {
            if (confirm('Charger ce modèle ? Cela remplacera votre texte actuel.')) {
                quill.root.innerHTML = templates[val];
                updatePreview();
            }
        }
    });

    // --- Variables ---
    document.getElementById('variableSelect').addEventListener('change', function (e) {
        if (e.target.value) {
            const range = quill.getSelection(true);
            quill.insertEmbed(range.index, 'text',  e.target.value);
            quill.formatText(range.index, e.target.value.length, {
                color: '#ff6600',
                background: 'rgba(255,102,0,0.1)'
            });
            quill.setSelection(range.index + e.target.value.length);
            e.target.value = '';
            updatePreview();
        }
    });

    // --- Blocs visuels ---
    document.getElementById('styleBlockSelect').addEventListener('change', function (e) {
        const val = e.target.value;
        let html = '';
        if (val === 'button')  html = '<div style="text-align:center; margin:20px 0;"><a href="#" style="background:#ff6600; color:#fff; padding:12px 25px; text-decoration:none; border-radius:6px; font-weight:bold; display:inline-block;">Texte du bouton</a></div>';
        if (val === 'quote')   html = '<blockquote style="border-left:4px solid #ff6600; padding:10px 20px; margin:20px 0; background:#f8fafc; font-style:italic; color:#475569;">"Votre citation ou témoignage ici..."</blockquote>';
        if (val === 'divider') html = '<hr style="border:0; border-top:1px solid #e2e8f0; margin:30px 0;">';

        if (html) {
            const range = quill.getSelection(true);
            quill.clipboard.dangerouslyPasteHTML(range.index, html);
            e.target.value = '';
            updatePreview();
        }
    });

    // --- Bouton test ---
    document.getElementById('sendTestBtn').addEventListener('click', function () {
        const subject = document.getElementById('subject').value;
        const content = quill.root.innerHTML;

        if (!subject || !content || content === '<p><br></p>') {
            alert('Veuillez renseigner un sujet et un contenu avant d\'envoyer un test.');
            return;
        }

        fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                test: true,
                subject: subject,
                content: content,
                _token: csrfToken
            })
        })
        .then(function (res) { return res.json(); })
        .then(function (data) { alert(data.message); })
        .catch(function () { alert('Erreur réseau.'); });
    });

});
