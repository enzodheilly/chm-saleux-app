   document.getElementById('2fa_code').addEventListener('input', function (e) {
					        this.value = this.value.replace(/[^0-9]/g, '');
					    });