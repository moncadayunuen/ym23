window.onscroll = () => {
  scrollNav();
};

const scrollNav = () => {
  let nav = document.querySelector('.nav-menu');
  if (document.documentElement.scrollTop > 60) {
    nav.classList.add('nav-scroll');
  } else {
    nav.classList.remove('nav-scroll');
  }
};

function navSlide() {
  let burger = document.querySelector('.burger');
  const menu = document.querySelector('.menu');
  const navLinks = document.querySelectorAll('.menu li');
  
  burger.addEventListener('click', () => {
    menu.classList.toggle('nav-active');
  
    navLinks.forEach((link,index) => {
      if(link.style.animation) {
        link.style.animation= '';
      } else {
        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 1}s`;
      }
    });

    burger.classList.toggle('toggle');

  });
}

navSlide();