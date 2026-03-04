document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('newsFilterForm');
    const resultsContainer = document.getElementById('newsResults');

    if (!form || !resultsContainer) return;

    const fields = form.querySelectorAll(
        'select[name="category"], input[name="date_from"], input[name="date_to"]'
    );

    let controller = null;
    let debounceTimer = null;

    const setLoading = (loading) => {
        resultsContainer.style.opacity = loading ? '0.55' : '1';
        resultsContainer.style.pointerEvents = loading ? 'none' : 'auto';
    };

    const buildUrl = (page = 1) => {
        const formData = new FormData(form);
        const params = new URLSearchParams();

        for (const [key, value] of formData.entries()) {
            if (value !== '') {
                params.set(key, value);
            }
        }

        return `${form.action.replace(/\/\d+$/, '/' + page)}?${params.toString()}`;
    };

    const loadResults = async (url) => {
        if (controller) {
            controller.abort();
        }

        controller = new AbortController();
        setLoading(true);

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                signal: controller.signal
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP ${response.status}`);
            }

            const html = await response.text();
            resultsContainer.innerHTML = html;
            window.history.replaceState({}, '', url);
        } catch (error) {
            if (error.name !== 'AbortError') {
                console.error('Erreur lors du filtrage des actualités :', error);
            }
        } finally {
            setLoading(false);
        }
    };

    const triggerFilter = () => {
        loadResults(buildUrl(1));
    };

    // soumission manuelle (loupe)
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        triggerFilter();
    });

    // changement auto sur les filtres
    fields.forEach((field) => {
        field.addEventListener('change', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                triggerFilter();
            }, 180);
        });
    });

    // reset des filtres si bouton présent
    const resetBtn = document.getElementById('resetFiltersBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', (e) => {
            e.preventDefault();

            form.querySelector('select[name="category"]').value = '';
            form.querySelector('input[name="date_from"]').value = '';
            form.querySelector('input[name="date_to"]').value = '';

            loadResults(resetBtn.href);
        });
    }

    // pagination AJAX
    resultsContainer.addEventListener('click', (e) => {
        const link = e.target.closest('.pagination-elite a.page-btn');

        if (!link || link.classList.contains('disabled') || link.getAttribute('href') === '#') {
            return;
        }

        e.preventDefault();
        loadResults(link.href);
    });
});