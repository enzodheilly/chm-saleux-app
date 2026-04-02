document.addEventListener("DOMContentLoaded", () => {
  // 1. Gestion de l'état "Chargement" du formulaire
  const formArea = document.querySelector(".form-area");
  if (formArea) {
    const form = formArea.querySelector("form");
    const btn = form.querySelector(".btn-modern");
    const spinner = btn.querySelector(".spinner");
    const btnText = btn.querySelector(".btn-text");

    form.addEventListener("submit", () => {
      btn.classList.add("loading");
      btn.disabled = true;
      if (spinner) spinner.style.display = "inline-block";
      if (btnText) btnText.style.display = "none";
    });
  }

  // 2. Auto-suppression des messages flash (Success et Danger)
  const flashMessages = document.querySelectorAll(".alert-flash");
  flashMessages.forEach((msg) => {
    setTimeout(() => {
      msg.style.transition = "opacity 0.5s ease, transform 0.5s ease";
      msg.style.opacity = "0";
      msg.style.transform = "translateY(-10px)";
      setTimeout(() => msg.remove(), 500);
    }, 4000); // Disparait après 4 secondes
  });
});