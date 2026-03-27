document.addEventListener('DOMContentLoaded', () => {

	const form = document.getElementById('newsletter-form');
	const button = document.getElementById('newsletter-submit');
	const successMsg = document.getElementById('newsletterSuccess');
	const errorMsg = document.getElementById('newsletterError');
	const icon = button ? button.querySelector('i') : null;
	const turnstileContainer = document.getElementById('turnstile-newsletter');

	if (!form || !button || !successMsg || !errorMsg || !icon) {
		return;
	}

	// ✅ Render Turnstile en mode invisible SANS l'exécuter automatiquement
	let turnstileWidgetId = null;

	const initTurnstile = () => {
		if (!turnstileContainer || turnstileWidgetId !== null) return;
		if (typeof window.turnstile === 'undefined') return;

		turnstileWidgetId = window.turnstile.render(turnstileContainer, {
			sitekey: turnstileContainer.getAttribute('data-sitekey'),
			theme: 'dark',
			size: 'invisible',
			execution: 'execute', // ✅ ne s'exécute que quand on appelle .execute()
			callback: (token) => {
				// Token prêt → soumettre le formulaire
				submitNewsletter(token);
			},
			'error-callback': () => {
				showError("⚠️ Vérification anti-robot échouée. Réessayez.");
				resetBtn();
			},
			'expired-callback': () => {
				window.turnstile.reset(turnstileWidgetId);
			}
		});
	};

	// Initialiser dès que Turnstile est prêt
	if (typeof window.turnstile !== 'undefined') {
		initTurnstile();
	} else {
		document.addEventListener('turnstile:ready', initTurnstile);
	}

	let submitted = false;

	const resetBtn = () => {
		button.disabled = false;
		button.classList.remove('loading', 'success');
		icon.className = "fa-solid fa-paper-plane";
		submitted = false;
	};

	const showError = (msg) => {
		errorMsg.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${msg}`;
		errorMsg.classList.add('show');
		setTimeout(() => {
			errorMsg.classList.remove('show');
		}, 4000);
	};

	const submitNewsletter = async (token) => {
		const formData = new FormData(form);

		// S'assurer que le token est bien dans le formData
		formData.set('cf-turnstile-response', token);

		try {
			const response = await fetch(form.action, {
				method: 'POST',
				body: formData,
				headers: { 'X-Requested-With': 'XMLHttpRequest' }
			});

			if (response.redirected) {
				window.location.href = response.url;
				return;
			}

			const contentType = response.headers.get('content-type') || '';
			if (!contentType.includes('application/json')) {
				throw new Error('Réponse non JSON reçue');
			}

			const data = await response.json();

			if (data.success) {
				button.classList.remove('loading');
				button.classList.add('success');
				icon.className = "fa-solid fa-check";

				successMsg.innerHTML = `${data.message || "Merci ! Vous êtes abonné à notre newsletter."}`;
				successMsg.classList.add('show');

				form.reset();

				setTimeout(() => {
					successMsg.classList.remove('show');
					resetBtn();
				}, 4000);

			} else {
				icon.className = "fa-solid fa-xmark";
				showError(data.message || "Une erreur est survenue.");
				setTimeout(resetBtn, 4000);
			}

		} catch (err) {
			console.error('Erreur newsletter :', err);
			icon.className = "fa-solid fa-xmark";
			showError("Une erreur est survenue, veuillez réessayer.");
			setTimeout(resetBtn, 4000);
		} finally {
			// ✅ Reset Turnstile après chaque tentative
			if (turnstileWidgetId !== null) {
				window.turnstile.reset(turnstileWidgetId);
			}
			submitted = false;
		}
	};

	form.addEventListener('submit', async (e) => {
		e.preventDefault();
		e.stopPropagation();

		if (submitted) return;
		submitted = true;

		successMsg.textContent = '';
		errorMsg.textContent = '';
		successMsg.classList.remove('show');
		errorMsg.classList.remove('show');

		button.disabled = true;
		button.classList.add('loading');
		button.classList.remove('success');
		icon.className = "fa-solid fa-spinner fa-spin";

		// ✅ Déclencher Turnstile invisible → callback appellera submitNewsletter()
		if (turnstileWidgetId !== null && typeof window.turnstile !== 'undefined') {
			window.turnstile.execute(turnstileWidgetId);
		} else {
			// Fallback si Turnstile non disponible
			await submitNewsletter('');
		}
	});
});