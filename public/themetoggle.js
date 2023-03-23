const toggleButton = document.getElementById('dark-mode-toggle');
const html = document.getElementsByTagName('html')[0];

const currentTheme = localStorage.getItem('theme') || 'light';
html.setAttribute('data-bs-theme', currentTheme);

    toggleButton.addEventListener('click', () => {
        
        const html = document.getElementsByTagName('html')[0];
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        // toggleButton.classList.toggle('bi-moon-stars-fill');
        // toggleButton.classList.toggle('bi-brightness-high-fill');
        
    });