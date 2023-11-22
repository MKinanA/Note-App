const theme_colors = {
    dark: {
        color: '#ffffff',
        bg: '#212529'
    },
    'light': {
        color: '#000000',
        bg: '#ffffff'
    }
}, root = document.documentElement, body = document.querySelector('body');
let theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

function set_colors(theme_mode) {
    body.setAttribute('data-bs-theme', theme_mode)
    root.style.setProperty('--color', theme_colors[theme_mode].color);
    root.style.setProperty('--bg', theme_colors[theme_mode].bg);
};

set_colors(theme);

window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
    theme = event.matches ? 'dark' : 'light';
    set_colors(theme);
});