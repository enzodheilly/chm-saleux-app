document.addEventListener("DOMContentLoaded", () => {

  // =========================================================
  // 1. GESTION DU SLIDER ATHLÈTES
  // =========================================================
  const track = document.getElementById("athleteTrack");
  const prevBtn = document.getElementById("prevAthlete");
  const nextBtn = document.getElementById("nextAthlete");

  const scroller = track?.closest(".athlete-viewport") || track;

  if (track && scroller && prevBtn && nextBtn) {

    const getScrollAmount = () => {
      const firstCard = track.firstElementChild;
      if (!firstCard) return 285;

      const style = window.getComputedStyle(track);
      const gap =
        parseFloat(style.gap) ||
        parseFloat(style.columnGap) ||
        parseFloat(style.rowGap) ||
        25;

      return firstCard.getBoundingClientRect().width + gap;
    };

    const updateButtonState = () => {
      const maxScrollLeft = scroller.scrollWidth - scroller.clientWidth - 5;

      const atStart = scroller.scrollLeft <= 0;
      const atEnd = scroller.scrollLeft >= maxScrollLeft;

      prevBtn.style.opacity = atStart ? "0.5" : "1";
      prevBtn.style.pointerEvents = atStart ? "none" : "auto";

      nextBtn.style.opacity = atEnd ? "0.5" : "1";
      nextBtn.style.pointerEvents = atEnd ? "none" : "auto";
    };

    nextBtn.addEventListener("click", () => {
      scroller.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
    });

    prevBtn.addEventListener("click", () => {
      scroller.scrollBy({ left: -getScrollAmount(), behavior: "smooth" });
    });

    scroller.addEventListener("scroll", updateButtonState);
    window.addEventListener("resize", updateButtonState);

    requestAnimationFrame(updateButtonState);
  }

  // =========================================================
  // 2. GESTION DU CALENDRIER (AJAX)
  // =========================================================
  document.body.addEventListener("click", function (e) {
    const navBtn = e.target.closest(".js-calendar-nav");
    if (!navBtn) return;

    e.preventDefault();

    const url = navBtn.href;
    const ajaxUrl = url.replace("/competition/", "/ajax/competition/");

    const container = document.querySelector("#calendar-container");
    const card = document.querySelector("#calendar-container .calendar-card");

    if (!container || !card) return;

    container.style.opacity = "0.5";
    container.style.pointerEvents = "none";

    fetch(ajaxUrl, {
      headers: {
        "X-Requested-With": "XMLHttpRequest"
      }
    })
      .then(response => {
        if (!response.ok) {
          throw new Error("Erreur réseau");
        }
        return response.text();
      })
      .then(html => {
        // IMPORTANT :
        // on remplace uniquement le contenu de .calendar-card
        // pour conserver le wrapper et donc le style CSS
        card.innerHTML = html;

        container.style.opacity = "1";
        container.style.pointerEvents = "auto";

        window.history.pushState({}, "", url);
      })
      .catch(error => {
        console.error("Erreur chargement calendrier :", error);
        container.style.opacity = "1";
        container.style.pointerEvents = "auto";
        window.location.href = url;
      });
  });
});