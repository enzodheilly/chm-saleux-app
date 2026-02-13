document.addEventListener('DOMContentLoaded', () => {
    const triggers = document.querySelectorAll('.faq-trigger');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            // 1. Toggle la classe active sur le bouton (pour tourner la croix)
            trigger.classList.toggle('active');

            // 2. Gérer le panneau de contenu
            const content = trigger.nextElementSibling;
            
            if (trigger.classList.contains('active')) {
                // Si on ouvre, on définit la hauteur exacte du contenu
                content.style.maxHeight = content.scrollHeight + "px";
            } else {
                // Si on ferme, on remet à 0
                content.style.maxHeight = 0;
            }

            // 3. (Optionnel) Fermer les autres panneaux si on veut un effet "accordéon strict"
            // triggers.forEach(otherTrigger => {
            //     if (otherTrigger !== trigger && otherTrigger.classList.contains('active')) {
            //         otherTrigger.classList.remove('active');
            //         otherTrigger.nextElementSibling.style.maxHeight = 0;
            //     }
            // });
        });
    });
});