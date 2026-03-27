				document.addEventListener("DOMContentLoaded", function() {
				    const priceInput = document.getElementById('input-price');
				    const freqSelect = document.getElementById('input-freq');
				    const monthlyInput = document.getElementById('input-monthly');
				
				    function calculateMonthly() {
				        const price = parseFloat(priceInput.value);
				        const selectedValue = freqSelect.value;
				
				        if (isNaN(price)) {
				            monthlyInput.value = '';
				            return;
				        }
				
				        let divisor = 1;
				
				        if (selectedValue === 'quarter') divisor = 3;
				        else if (selectedValue === 'semester') divisor = 6;
				        else if (selectedValue === 'year') divisor = 12;
				        else if (selectedValue === 'month') divisor = 1;
				        else if (selectedValue === 'one_time') divisor = 1;
				
				        const result = price / divisor;
				        monthlyInput.value = result.toFixed(2);
				    }
				
				    if (priceInput && freqSelect) {
				        priceInput.addEventListener('input', calculateMonthly);
				        freqSelect.addEventListener('change', calculateMonthly);
				        calculateMonthly();
				    }
				});