document.addEventListener('DOMContentLoaded', () => {
	const form = document.getElementById('newsletter-form');
	const button = document.getElementById('newsletter-submit');
	const successMsg = document.getElementById('newsletterSuccess');
	const errorMsg = document.getElementById('newsletterError');

	// Si la newsletter n'est pas présente sur la page, on ne fait rien
	if (!form || !button || !successMsg || !errorMsg) {
		return;
	}

	let submitted = false;

	form.addEventListener('submit', async (e) => {
		e.preventDefault();
		e.stopPropagation();

		if (submitted) return;
		submitted = true;

		// Réinitialisation
		successMsg.textContent = '';
		errorMsg.textContent = '';
		successMsg.classList.remove('show');
		errorMsg.classList.remove('show');

		// État chargement
		button.disabled = true;
		button.classList.add('loading');
		button.classList.remove('success');

		const formData = new FormData(form);

		try {
			const response = await fetch(form.action, {
				method: 'POST',
				body: formData,
				headers: { 'X-Requested-With': 'XMLHttpRequest' }
			});

			// Redirection éventuelle
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

				successMsg.innerHTML = `${data.message || "Merci ! Vous êtes abonné à notre newsletter."}`;
				successMsg.classList.add('show');

				form.reset();

				setTimeout(() => {
					successMsg.classList.remove('show');
					button.classList.remove('success');
					button.disabled = false;
				}, 4000);
			} else {
				button.classList.remove('loading', 'success');
				button.disabled = false;

				errorMsg.innerHTML = `<i class="fas fa-exclamation-triangle"></i> ${data.message || "Une erreur est survenue, veuillez réessayer."}`;
				errorMsg.classList.add('show');

				setTimeout(() => {
					errorMsg.classList.remove('show');
				}, 4000);
			}
		} catch (err) {
			console.error('Erreur newsletter :', err);

			button.classList.remove('loading', 'success');
			button.disabled = false;

			errorMsg.innerHTML = `<i class="fas fa-exclamation-triangle"></i> Une erreur est survenue, veuillez réessayer.`;
			errorMsg.classList.add('show');

			setTimeout(() => {
				errorMsg.classList.remove('show');
			}, 4000);
		} finally {
			submitted = false;
		}
	});
});