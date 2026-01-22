document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelector(".coach-slider .slides");
    const images = slides.querySelectorAll("img");
    const total = images.length;
    const nameDisplay = document.getElementById("coach-name");

    let index = 0;

    // On récupère la largeur réelle d’une slide
    let width = images[0].clientWidth;

    // Met à jour la largeur si la fenêtre change (responsive)
    window.addEventListener("resize", () => {
        width = images[0].clientWidth;
        slides.style.transform = `translateX(-${index * width}px)`;
    });

    function updateName() {
        nameDisplay.textContent = images[index].dataset.name;
    }

    document.querySelector(".next-btn").onclick = () => {
        index = (index + 1) % total;
        slides.style.transform = `translateX(-${index * width}px)`; 
        updateName();
    };

    document.querySelector(".prev-btn").onclick = () => {
        index = (index - 1 + total) % total;
        slides.style.transform = `translateX(-${index * width}px)`;
        updateName();
    };

    updateName();
});