			document.addEventListener('DOMContentLoaded', function() {
			    const searchInput = document.getElementById('searchLogs');
			    const filterButtons = document.querySelectorAll('.filter-btn');
			    const tableRows = document.querySelectorAll('.log-row');
			    const noResultsMsg = document.getElementById('noResults');
			
			    function applyFilters() {
			        const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
			        const searchText = searchInput.value.toLowerCase();
			        let visibleCount = 0;
			
			        tableRows.forEach(row => {
			            const status = row.dataset.status;
			            const text = row.innerText.toLowerCase();
			            const matchesFilter = (activeFilter === 'all') || (status === activeFilter);
			            const matchesSearch = text.includes(searchText);
			
			            if (matchesFilter && matchesSearch) {
			                row.style.display = '';
			                visibleCount++;
			            } else {
			                row.style.display = 'none';
			            }
			        });
			
			        noResultsMsg.style.display = (visibleCount === 0) ? 'block' : 'none';
			    }
			
			    filterButtons.forEach(btn => {
			        btn.addEventListener('click', () => {
			            filterButtons.forEach(b => b.classList.remove('active'));
			            btn.classList.add('active');
			            applyFilters();
			        });
			    });
			
			    searchInput.addEventListener('input', applyFilters);
			
			    const ipElements = document.querySelectorAll('.ip-lookup');
			    const uniqueIps = [...new Set(Array.from(ipElements).map(el => el.dataset.ip))]
			        .filter(ip => ip && !['127.0.0.1', '::1', '—'].includes(ip));
			
			    uniqueIps.forEach(ip => {
			        fetch(`https://ipapi.co/${ip}/json/`)
			            .then(res => res.json())
			            .then(data => {
			                if (data.city) {
			                    const info = `${data.city}, ${data.country_name}`;
			                    const flag = data.country_code
			                        ? `https://flagcdn.com/16x12/${data.country_code.toLowerCase()}.png`
			                        : '';
			
			                    document.querySelectorAll(`.ip-lookup[data-ip="${ip}"]`).forEach(el => {
			                        el.nextElementSibling.innerHTML = flag
			                            ? `<img src="${flag}" style="vertical-align:middle; margin-right:4px;"> ${info}`
			                            : info;
			                    });
			                } else {
			                    document.querySelectorAll(`.ip-lookup[data-ip="${ip}"]`).forEach(el => {
			                        el.nextElementSibling.innerText = "Origine inconnue";
			                    });
			                }
			            })
			            .catch(() => {
			                document.querySelectorAll(`.ip-lookup[data-ip="${ip}"]`).forEach(el => {
			                    el.nextElementSibling.innerText = "Non localisable";
			                });
			            });
			    });
			});