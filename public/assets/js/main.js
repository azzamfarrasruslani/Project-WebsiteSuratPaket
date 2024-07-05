
/*===== HAMBURGER MENU FUNCTION =====*/
// Toggle class active
const navbarNav = document.querySelector
(".navbar-nav");
// ketika hamburger menu di klik
document.querySelector("#hamburger-menu").
onclick = () => {
  navbarNav.classList.toggle("active");
};

// Klik di luar sidebar untuk menghilangkan nav

const hamburger = document.querySelector
('#hamburger-menu');

document.addEventListener('click', function(e) {
    if(!hamburger.contains(e.target) && !navbarNav.contains(e.target))
    navbarNav.classList.remove('active')
})




  /*===== SCROLL REVEAL ANIMATION =====*/
  const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2000,
    delay: 200,
    // reset: true
  });

  sr.reveal('.hero, .content-judul', { delay: 100 });
  // sr.reveal('.home__social-icon', { interval: 200 });
  // sr.reveal('.skills__data, .work__img, .contact__input', { interval: 200 });