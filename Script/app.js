const nav = document.getElementsByClassName('nav')[0];

window.addEventListener('scroll', handleScrollEvent);

function handleScrollEvent() {
  if (window.scrollY > 60) {
    nav.className = 'bg-black';
  } else {
    nav.className = '';
  }
}
