(() => {
    const overlay = document.getElementById('dashboard-overlay');
    const sidebarProfile = document.getElementById('sidebar-profile');
    const sidebarSettings = document.getElementById('sidebar-settings');
    const profileBtn = document.querySelector('.item.profile');
    const settingsBtn = document.querySelector('.item.icon img[alt="Settings"]')?.parentElement;
    const closeProfile = document.getElementById('close-profile');
    const closeSettings = document.getElementById('close-settings');

    if (!overlay) return;

    function openSidebar(sidebar) {
        sidebar?.classList.add('active');
        overlay.classList.add('active');
    }

    function closeSidebar(sidebar) {
        sidebar?.classList.remove('active');
        overlay.classList.remove('active');
    }

    profileBtn?.addEventListener('click', () => openSidebar(sidebarProfile));
    settingsBtn?.addEventListener('click', () => openSidebar(sidebarSettings));
    closeProfile?.addEventListener('click', () => closeSidebar(sidebarProfile));
    closeSettings?.addEventListener('click', () => closeSidebar(sidebarSettings));

    overlay.addEventListener('click', () => {
        document.querySelectorAll('.sidebar-right.active').forEach(sb => sb.classList.remove('active'));
        overlay.classList.remove('active');
    });
})();
