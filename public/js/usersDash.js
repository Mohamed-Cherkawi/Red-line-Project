// Get DOM Elements
const modal = document.querySelectorAll('.modal-2');
const modalBtn = document.querySelectorAll('.button');
const closeBtn = document.querySelectorAll('.close-2');

modal.forEach(function(btnOpen) {
  btnOpen.addEventListener('click', openModal);
  // Open
function openModal() {
  modal.style.display = 'block';
}


});
modalBtn.forEach(function(btnClose) {
  btnClose.addEventListener('click', closeModal);
  // Close
function closeModal() {
  modal.style.display = 'none';
}
})
// Events
window.addEventListener('click', outsideClick);

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}
