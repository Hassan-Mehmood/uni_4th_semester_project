const nav = document.getElementsByClassName('nav')[0];
// const addMenuItemBtn = document.getElementById('add_item_btn');
const editMenuItemBtn = document.getElementById('edit_item_btn');
// const addMenuItemSection = document.getElementsByClassName('add_menu_item')[0];
const editMenuItemSection = document.getElementsByClassName('edit_menu_item')[0];
// const add_close_icon_img = document.getElementsByClassName('add_close_icon_img')[0];
const edit_close_icon_img = document.getElementsByClassName('edit_close_icon_img')[0];

window.addEventListener('scroll', handleScrollEvent);
// addMenuItemBtn.addEventListener('click', showAddMenuItemForm);
editMenuItemBtn.addEventListener('click', showeditMenuItemForm);
// add_close_icon_img.addEventListener('click', closeAddMenuItemForm);
edit_close_icon_img.addEventListener('click', closeEditMenuItemForm);

function handleScrollEvent() {
  if (window.scrollY > 60) {
    nav.classList.add('bg-black');
  } else {
    nav.classList.remove('bg-black');
  }
}

// function showAddMenuItemForm(e) {
//   e.preventDefault();
//   addMenuItemSection.classList.remove('hidden');
// }

// function closeAddMenuItemForm(e) {
//   e.preventDefault();
//   addMenuItemSection.classList.add('hidden');
// }

function showeditMenuItemForm(e) {
  e.preventDefault();
  editMenuItemSection.classList.remove('hidden');
}

function closeEditMenuItemForm(e) {
  e.preventDefault();
  editMenuItemSection.classList.add('hidden');
}
