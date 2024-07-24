// Dropdown form dataBarang
function toggleModal() {
  document.getElementById("modal").classList.toggle("hidden");
  document.getElementById("table").classList.toggle("hidden");
}

function toggleDropdown(index) {
  var dropdown = document.getElementById("dropdown-menu-" + index);
  dropdown.classList.toggle("hidden");
}

window.onclick = function (event) {
  if (!event.target.matches('[id^="menu-button-"]')) {
    var dropdowns = document.getElementsByClassName("dropdown-menu");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (!openDropdown.classList.contains("hidden")) {
        openDropdown.classList.add("hidden");
      }
    }
  }
};
