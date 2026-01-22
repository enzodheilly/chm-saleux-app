document.addEventListener("DOMContentLoaded", () => {
    const btns = document.querySelectorAll(".btn-history");
    const display = document.getElementById("history-display");
    const historySection = document.getElementById("history-section");

    // Récupère les compétitions depuis les data-* encodées en JSON
    const femaleCompetitions = JSON.parse(
        historySection.dataset.female || "[]"
    );
    const maleCompetitions = JSON.parse(historySection.dataset.male || "[]");

    btns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const team = btn.dataset.team; // 'female' ou 'male'
            const comps =
                team === "female" ? femaleCompetitions : maleCompetitions;

            if (!comps.length) {
                display.innerHTML = "<p>Aucune compétition disponible.</p>";
                return;
            }

            let html = "";
            comps.forEach((comp) => {
                html += `<div class="competition-card">
                    <div class="competition-image">
                        <img src="${
                            comp.image || "/images/default-comp.jpg"
                        }" alt="${comp.titre}">
                    </div>
                    <h3 class="competition-title">${comp.titre} - ${
                    comp.type || ""
                }</h3>
                    <p class="competition-date">Date : ${comp.date} | Lieu : ${
                    comp.lieu
                }</p>
                    <div class="competition-results">
                        <table>
                            <thead>
                                <tr>
                                    <th>Prénom</th>
                                    <th>Épaulé-Jeté</th>
                                    <th>Tirage</th>
                                    <th>Total</th>
                                    <th>Classement</th>
                                </tr>
                            </thead>
                            <tbody>`;
                comp.resultats.forEach((r) => {
                    html += `<tr>
                        <td>${r.prenom}</td>
                        <td>${r.epauleJete}</td>
                        <td>${r.tirage}</td>
                        <td>${r.total}</td>
                        <td>${r.place}</td>
                    </tr>`;
                });
                html += `</tbody></table></div></div>`;
            });

            display.innerHTML = html;
            display.scrollIntoView({ behavior: "smooth" });
        });
    });
});

const track = document.getElementById("athleteTrack");
const slides = Array.from(document.querySelectorAll(".athlete-slide"));
const prevBtn = document.getElementById("prevAthlete");
const nextBtn = document.getElementById("nextAthlete");

let index = 0;
const slidesPerPage = 4;

function getSlideWidth() {
    return slides[0].offsetWidth + 20; // marge
}

function getMaxIndex() {
    const maxIndex = slides.length - slidesPerPage;
    return Math.max(0, maxIndex);
}

function updateButtons() {
    const maxIndex = getMaxIndex();

    // Masquer le bouton PRECEDENT si on est au début
    if (index === 0) {
        prevBtn.style.opacity = "0.3";
        prevBtn.style.pointerEvents = "none";
    } else {
        prevBtn.style.opacity = "1";
        prevBtn.style.pointerEvents = "auto";
    }

    // Masquer le bouton SUIVANT si on est à la fin
    if (index >= maxIndex) {
        nextBtn.style.opacity = "0.3";
        nextBtn.style.pointerEvents = "none";
    } else {
        nextBtn.style.opacity = "1";
        nextBtn.style.pointerEvents = "auto";
    }
}

function updateSlidePosition() {
    const slideWidth = getSlideWidth();
    track.style.transform = `translateX(-${index * slideWidth}px)`;
    updateButtons();
}

// Bouton PRECEDENT
prevBtn.addEventListener("click", () => {
    index -= slidesPerPage;
    if (index < 0) index = 0;
    updateSlidePosition();
});

// Bouton SUIVANT
nextBtn.addEventListener("click", () => {
    index += slidesPerPage;

    const maxIndex = getMaxIndex();
    if (index > maxIndex) index = maxIndex;

    updateSlidePosition();
});

// Responsive
window.addEventListener("resize", updateSlidePosition);

// Init
updateSlidePosition();
