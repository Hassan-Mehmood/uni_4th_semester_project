const nav = document.getElementsByClassName('nav')[0];
const reservationBtn = document.getElementById('reservation_table_button');
const reservationTable = document.getElementById('reservation_table');
const reservationForm = document.getElementById('reservation_form');

window.addEventListener('scroll', handleScrollEvent);
reservationBtn.addEventListener('click', handleBtnClick);

function handleScrollEvent() {
  if (window.scrollY > 60) {
    nav.classList.add('bg-black');
  } else {
    nav.classList.remove('bg-black');
  }
}

function handleBtnClick() {
  reservationTable.classList.add('hide');
  reservationForm.classList.remove('hide');
}
