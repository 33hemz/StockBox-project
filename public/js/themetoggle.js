const html = document.querySelector('html');
const toggleButton = document.getElementById('dark-mode-toggle');
const toggleButtonText = document.getElementById('dark-mode-toggle-text');
const currentTheme = localStorage.getItem('theme') || 'light';
html.setAttribute('data-bs-theme', currentTheme);

toggleButtonText.classList.toggle('fa-sun', currentTheme === 'light');
toggleButtonText.classList.toggle('fa-moon', currentTheme === 'dark');


toggleButton.addEventListener('click', () => {
    
    const html = document.getElementsByTagName('html')[0];
    const currentTheme = html.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    html.setAttribute('data-bs-theme', newTheme);
    localStorage.setItem('theme', newTheme);


    toggleButtonText.classList.toggle('fa-sun', newTheme === 'light');
    toggleButtonText.classList.toggle('fa-moon', newTheme === 'dark');
        
    });