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

// Toggle class active untuk shopping cart
const shoppingCart = document.querySelector('.shopping-cart');
document.querySelector('#shop-button').onclick = (e) => {
  shoppingCart.classList.toggle('active');
  e.preventDefault();
};

// Klik di luar sidebar untuk menghilangkan nav

const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector("#search-button");
const sc = document.querySelector("#shop-button");

document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }
  // Corrected condition: check against shoppingCart instead of searchForm
  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove("active");
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

// Modal Box
const itemDetailModal = document.querySelector('#item-detail-modal');
const productsRow = document.querySelector('#products .row');

if (productsRow) {
  productsRow.addEventListener('click', (e) => {
    // Check if the clicked element or its parent has the class 'item-detail-button'
    let target = e.target;
    while (target && target !== productsRow) {
      if (target.classList && target.classList.contains('item-detail-button')) {
        itemDetailModal.style.display = 'flex';
        e.preventDefault();
        break;
      }
      target = target.parentNode;
    }
  });
}


// Klik tombol close modal
document.querySelector('.modal .close-icon').onclick = (e) => {
  itemDetailModal.style.display = 'none';
  e.preventDefault()
}

// Klik tombol close modal dimana saja
window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = 'none';
  }
}