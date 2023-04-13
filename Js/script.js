const hamburgerBtn = document.querySelector('#hamburger-menu');
const menu = document.querySelector('.nav-side');

hamburgerBtn.addEventListener('click', function() {
  menu.classList.toggle('active');
});