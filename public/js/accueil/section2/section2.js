const pricingSwitch = document.getElementById("toggle");

// Sélecteurs des prix Loisir & Muscu
const priceLoisir = document.querySelector(".price3");
const subPriceLoisir = document.querySelector(".subprice3");

// Prix Standard & Étudiant
const standardPrice = 200;
const studentPrice = 185;

pricingSwitch.addEventListener("change", () => {
    if (pricingSwitch.checked) {
        // Mode Étudiant
        priceLoisir.innerHTML = studentPrice + "€<sup>00</sup>";
        subPriceLoisir.textContent = "Soit " + (studentPrice / 12).toFixed(2) + "€/mois";
    } else {
        // Mode Standard
        priceLoisir.innerHTML = standardPrice + "€<sup>00</sup>";
        subPriceLoisir.textContent = "Soit " + (standardPrice / 12).toFixed(2).toFixed(2) + "€/mois";
    }
});
