const hamburger = document.querySelector('.hamburger');
const menu = document.querySelector('.header-list');

hamburger.addEventListener('click', () => {
    menu.classList.toggle('active');
});