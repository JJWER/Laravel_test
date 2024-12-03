import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll('.dropdown-toggle').forEach((dropdown) => {
    dropdown.addEventListener('click', () => {
        console.log('Dropdown clicked!');
    });
});
