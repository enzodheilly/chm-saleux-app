			document.addEventListener('DOMContentLoaded', () => {
			    const toggle = document.getElementById('themeToggleCheckbox');
			    const htmlElement = document.documentElement;
			
			    const savedTheme = localStorage.getItem('theme') || 'dark';
			    htmlElement.setAttribute('data-theme', savedTheme);
			    toggle.checked = (savedTheme === 'dark');
			
			    toggle.addEventListener('change', () => {
			        const theme = toggle.checked ? 'dark' : 'light';
			        htmlElement.setAttribute('data-theme', theme);
			        localStorage.setItem('theme', theme);
			    });
			});