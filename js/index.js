// Toggling the search bar icon js Code .
const icon = document.querySelector('.searchIcon');
const search = document.querySelector('.search');

icon.onclick = function() {
    search.classList.toggle('active');
}
