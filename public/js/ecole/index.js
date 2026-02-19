        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('track');
            const slides = track.querySelectorAll('img');
            const nameEl = document.getElementById('coachName');
            const roleEl = document.getElementById('coachRole');
            let index = 0;

            function updateSlide(i) {
                slides.forEach(s => s.classList.remove('active'));
                slides[i].classList.add('active');
                nameEl.textContent = slides[i].dataset.name;
                roleEl.textContent = slides[i].dataset.role;
            }

            document.getElementById('nextBtn').addEventListener('click', () => {
                index = (index + 1) % slides.length;
                updateSlide(index);
            });

            document.getElementById('prevBtn').addEventListener('click', () => {
                index = (index - 1 + slides.length) % slides.length;
                updateSlide(index);
            });
        });