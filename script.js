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

document.addEventListener("click", function (e) { // jika klik di luar sidebar
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");// menghilangkan class active
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) { // jika klik di luar search form
    searchForm.classList.remove("active");
  }
  
  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {// jika klik di luar shopping cart
    shoppingCart.classList.remove("active");// menghilangkan class active
  }
});


function searchItems() {// Fungsi untuk mencari item
  const input = document.getElementById("search-box").value.toLowerCase(); // Ambil nilai input
  const cards = document.getElementsByClassName("menu-card");// Ambil semua elemen dengan class menu-card

  for (let i = 0; i < cards.length; i++) {// Looping semua card
    const cardText = cards[i].textContent.toLowerCase();// Ambil text content dari card
    if (cardText.indexOf(input) > -1) {// Jika input ada di dalam text content card
      cards[i].style.display = ""; // Tampilkan card
    } else {// Jika input tidak ada di dalam text content card
      cards[i].style.display = "none"; // Sembunyikan card
    }
  }
}

// Modal Box
const itemDetailModal = document.querySelector('#item-detail-modal');// Ambil elemen modal
const productsRow = document.querySelector('#products .row');// Ambil elemen row di dalam produk

if (productsRow) {// Jika elemen row ada
  productsRow.addEventListener('click', (e) => {// Tambahkan event listener untuk klik
    
    let target = e.target;// Ambil elemen target dari event
    while (target && target !== productsRow) {// Looping sampai target adalah row
      if (target.classList && target.classList.contains('item-detail-button')) {// Jika target memiliki class item-detail
        itemDetailModal.style.display = 'flex';// Tampilkan modal
        e.preventDefault();// Mencegah default action
        break;// Keluar dari loop
      }
      target = target.parentNode;// Pindah ke parent node
    }
  });
}


// Klik tombol close modal
document.querySelector('.modal .close-icon').onclick = (e) => {// Ambil elemen close icon
  itemDetailModal.style.display = 'none';// Sembunyikan modal
  e.preventDefault()// Mencegah default action
}

// Klik tombol close modal dimana saja
window.onclick = (e) => {// Ambil elemen window
  if (e.target === itemDetailModal) {// Jika target adalah modal
    itemDetailModal.style.display = 'none';// Sembunyikan modal
  }
}


