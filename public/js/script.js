/* Menu burger */

let burgerMenu = document.getElementById('burger-menu');
let overlay = document.getElementById('menu');
burgerMenu.addEventListener('click', function () {
  overlay.classList.toggle("active");
});