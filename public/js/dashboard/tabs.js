(() => {
    const tabs = document.querySelectorAll('.nav-item');
    const tabContents = document.querySelectorAll('.tab');
    if (!tabs.length || !tabContents.length) return;

    tabs.forEach(btn => {
        btn.addEventListener('click', () => {
            tabs.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const tabId = btn.dataset.tab;
            tabContents.forEach(tab => tab.classList.remove('active'));

            const activeTab = document.getElementById(tabId);
            if (activeTab) activeTab.classList.add('active');
        });
    });
})();

document.getElementById('see-more-events').addEventListener('click', () => {
    const eventNav = document.querySelector('.nav-item[data-tab="tab-event"]');
    if (eventNav) eventNav.click();
});
