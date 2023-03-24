const toggleButton = document.getElementById('dark-mode-toggle');
const toggleButtonText = document.getElementById('dark-mode-toggle-text');
const html = document.getElementsByTagName('html')[0];

const currentTheme = localStorage.getItem('theme') || 'light';
html.setAttribute('data-bs-theme', currentTheme);

toggleButtonText.classList.remove("fa-sun");
toggleButtonText.classList.remove("fa-moon");
if (currentTheme === "light") {
    toggleButtonText.classList.add("fa-sun")
} else {
    toggleButtonText.classList.add("fa-moon")
}


    toggleButton.addEventListener('click', () => {
        
        const html = document.getElementsByTagName('html')[0];
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);


        if (toggleButtonText.classList.contains("fa-sun")) {
            toggleButtonText.classList.remove("fa-sun");
            toggleButtonText.classList.add("fa-moon")
        } else {
                toggleButtonText.classList.remove("fa-moon");
                toggleButtonText.classList.add("fa-sun")
        }
        // toggleButtonText.classList.toggle('fa-moon');
        // toggleButtonText.classList.toggle('fa-sun');
        
    });