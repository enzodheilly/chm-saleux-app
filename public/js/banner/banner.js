document.addEventListener("DOMContentLoaded", () => {
    const banner = document.querySelector(".site-announcement-banner");
    if (!banner) return;

    let messages;
    try {
        messages = JSON.parse(banner.dataset.messages || "[]");
    } catch {
        return;
    }

    // Moins de 2 messages actifs → pas de rotation
    if (messages.length < 2) return;

    const textEl = banner.querySelector(".site-banner-inner:not(.site-banner-mobile) .site-banner-text");
    if (!textEl) return;

    let current = 0;

    setInterval(() => {
        // Fade out
        textEl.style.opacity = "0";

        setTimeout(() => {
            current = (current + 1) % messages.length;
            textEl.textContent = messages[current];
            // Fade in
            textEl.style.opacity = "1";
        }, 300); // durée identique à la transition CSS
    }, 4500);
});
