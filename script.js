document.addEventListener('DOMContentLoaded', function () {
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const body = document.body;

    themeToggleBtn.addEventListener('click', function () {
        body.classList.toggle('dark-mode');
        updateThemeIcon();
    });

    // Function to update the theme toggle button icon based on dark mode state
    function updateThemeIcon() {
        const isDarkMode = body.classList.contains('dark-mode');
        themeToggleBtn.textContent = isDarkMode ? '🌙' : '🌞';
    }
    
    // Initial call to set the correct icon based on the current dark mode state
    updateThemeIcon();
});
