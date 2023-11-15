/* Menu burger */

let burgerMenu = document.getElementById('burger-menu');
let overlay = document.getElementById('menu');
let body = document.querySelector('body');

burgerMenu.addEventListener('click', () => {
    overlay.classList.toggle("active");
    burgerMenu.classList.toggle("active");
    body.classList.toggle('no-scroll');
});

window.addEventListener('resize', () => {
  overlay.classList.remove("active");
    burgerMenu.classList.remove("active");
    body.classList.remove('no-scroll');
});