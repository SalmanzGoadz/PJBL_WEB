// Toggle class active untuk hamburger menu
const navbarNav = document.querySelector(".navbar-nav");

// ketika hamburger menu di klik

document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Togle class active untuk search form
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
document.querySelector("#search-button").onclick = (e) => {
  searchForm.classList.toggle("active");
  searchBox.focus();
  e.preventDefault();
};

// Klik di luar sidebar untuk menghilangkan nav

const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector("#search-button");

document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }
});

function searchItems() {
  const input = document.getElementById("search-box").value.toLowerCase();
  const cards = document.getElementsByClassName("menu-card");

  for (let i = 0; i < cards.length; i++) {
    const cardText = cards[i].textContent.toLowerCase();
    if (cardText.indexOf(input) > -1) {
      cards[i].style.display = ""; // Tampilkan card
    } else {
      cards[i].style.display = "none"; // Sembunyikan card
    }
  }
}
