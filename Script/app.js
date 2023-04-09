const nav = document.getElementsByClassName('nav')[0];
const reservationBtn = document.getElementsByClassName('nav')[0];

window.addEventListener('scroll', handleScrollEvent);

function handleScrollEvent() {
  if (window.scrollY > 60) {
    nav.classList.add('bg-black');
  } else {
    nav.classList.remove('bg-black');
  }
}
