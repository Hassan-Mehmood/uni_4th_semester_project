const nav = document.getElementsByClassName('nav')[0];
const reservationBtn = document.getElementById('reservation_table_button');
const reservationFromBtn = document.getElementById('reservation_form_button');
const reservationTable = document.getElementById('reservation_table');
const reservationForm = document.getElementById('reservation_form');

window.addEventListener('scroll', handleScrollEvent);
reservationBtn.addEventListener('click', handleBtnClick);
reservationFromBtn.addEventListener('click', handleFormBtnClick);

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

function handleFormBtnClick() {
  reservationForm.classList.add('hide');
  reservationTable.classList.remove('hide');
}

const openButton = document.querySelector('.reservation_table_action_btn');
const closeButton = document.querySelector('.close-btn');
const modal = document.querySelector('.modal');
const dialog = document.querySelector('dialog');

openButton.addEventListener('click', () => {
  modal.showModal();
});

closeButton.addEventListener('click', () => {
  modal.close();
});

dialog.addEventListener('click', (e) => {
  const dialogDimensions = dialog.getBoundingClientRect();
  if (
    e.clientX < dialogDimensions.left ||
    e.clientX > dialogDimensions.right ||
    e.clientY < dialogDimensions.top ||
    e.clientY > dialogDimensions.bottom
  ) {
    dialog.close();
  }
});
