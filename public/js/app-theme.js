document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.getElementById('themeToggle');
    if (!toggle) {
        return;
    }

    var iconDark = toggle.querySelector('.theme-icon-dark');
    var iconLight = toggle.querySelector('.theme-icon-light');

    function syncIcon() {
        var isDark = document.body.classList.contains('dark-theme');
        iconDark.style.display = isDark ? 'none' : '';
        iconLight.style.display = isDark ? '' : 'none';
    }

    syncIcon();

    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        document.body.classList.toggle('dark-theme');
        localStorage.setItem('app-theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
        syncIcon();
    });
});
