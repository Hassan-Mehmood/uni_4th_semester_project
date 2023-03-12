const nav = document.getElementsByClassName('nav')[0];
const addMenuItemBtn = document.getElementById('add_item_btn');
const addMenuItemSection = document.getElementsByClassName('add_menu_item')[0];
const close_icon_img = document.getElementsByClassName('close_icon_img')[0];

console.log(addMenuItemBtn);
console.log(addMenuItemSection);

window.addEventListener('scroll', handleScrollEvent);
addMenuItemBtn.addEventListener('click', showAddMenuItemForm);
close_icon_img.addEventListener('click', closeAddMenuItemForm);

function handleScrollEvent() {
  if (window.scrollY > 60) {
    nav.classList.add('bg-black');
  } else {
    nav.classList.remove('bg-black');
  }
}

function showAddMenuItemForm(e) {
  e.preventDefault();
  addMenuItemSection.classList.remove('hidden');
}

function closeAddMenuItemForm(e) {
  e.preventDefault();
  addMenuItemSection.classList.add('hidden');
}
