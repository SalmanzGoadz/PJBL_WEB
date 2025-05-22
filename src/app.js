// Inisialisasi Alpine setelah dokumen dimuat
document.addEventListener('alpine:init', () => {

  // Store 'products' untuk menyimpan dan mengambil produk dari database
  Alpine.store('products', {
    items: [], // Daftar produk
    async fetchProducts() {
      try {
        // Ambil data produk dari backend PHP
        const res = await fetch('../get_produk.php');
        const data = await res.json();

        // Mapping data, konversi price & stok ke number
        this.items = data.map(item => ({
          ...item,
          price: Number(item.price),
          stok: Number(item.stok)
        }));
      } catch (e) {
        console.error('Gagal mengambil data produk:', e); // Error saat fetch
      }
    }
  });

 

  // Komponen data 'products' untuk pencarian dan filter
  Alpine.data('products', () => ({
    search: '',        // Keyword pencarian
    filterJenis: '',   // Filter berdasarkan jenis produk

    init() {
      // Ambil produk saat komponen diinisialisasi
      Alpine.store('products').fetchProducts();

      // Event input pada search bar
      const input = document.querySelector('#product-search');
      if (input) {
        input.addEventListener('input', (e) => {
          this.search = e.target.value;
          const section = document.querySelector('#products');
          if (section) {
            section.scrollIntoView({ behavior: 'smooth' }); // Scroll ke section produk
          }
        });
      }
    },
    

    // Getter untuk produk yang difilter berdasarkan search dan jenis
    get items() {
      return Alpine.store('products').items
        .filter(item =>
          item.name.toLowerCase().includes(this.search.toLowerCase()) // Pencarian
        )
        .filter(item =>
          this.filterJenis ? item.jenis === this.filterJenis : true // Filter jenis
        );
    }
  }));

  // Store 'cart' untuk keranjang belanja
  Alpine.store('cart', {
    items: [],    // Item dalam keranjang
    total: 0,     // Total harga
    quantity: 0,  // Jumlah item

    // Tambah produk ke keranjang
    add(newItem) {
      const product = Alpine.store('products').items.find(item => item.id === newItem.id);
      if (product.stok < 1) {
        alert('Stok habis!');
        return;
      }

      const cartItem = this.items.find(item => item.id === newItem.id);
      if (!cartItem) {
        // Tambahkan item baru ke cart
        this.items.push({ ...newItem, quantity: 1, total: newItem.price });
      } else {
        // Tambah kuantitas jika sudah ada
        cartItem.quantity++;
        cartItem.total = cartItem.price * cartItem.quantity;
      }

      product.stok--;         // Kurangi stok produk
      this.quantity++;        // Tambah jumlah total item
      this.total += newItem.price; // Tambah total harga
    },

    // Hapus item dari keranjang
    remove(id) {
      const product = Alpine.store('products').items.find(item => item.id === id);
      const cartItem = this.items.find(item => item.id === id);
      if (!cartItem) return;

      if (cartItem.quantity > 1) {
        cartItem.quantity--;
        cartItem.total = cartItem.price * cartItem.quantity;
      } else {
        // Hapus item dari array jika quantity = 1
        this.items = this.items.filter(item => item.id !== id);
      }

      product.stok++;          // Kembalikan stok
      this.quantity--;         // Kurangi jumlah item
      this.total -= cartItem.price; // Kurangi total harga
    }
  });

  

  // Store 'modal' untuk detail produk popup
  Alpine.store('modal', {
    show: false,       // Status tampil modal
    product: null,     // Produk yang sedang ditampilkan

   open(product) {
  this.product = product;
  // Delay untuk memastikan Alpine mendeteksi perubahan state sebelum tampil
  setTimeout(() => {
    this.show = true;
  }, 0);
},
close() {
  this.show = false;
  // Delay clear data setelah modal hilang, bisa bantu jika ada animasi
  setTimeout(() => {
    this.product = null;
  }, 300);
}

  });
});

// Fungsi helper: Format angka ke mata uang Rupiah
const rupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
  }).format(number);
};

// Data user untuk pengisian otomatis form checkout
document.addEventListener('alpine:init', () => {
  Alpine.data('checkoutForm', () => ({
    init() {
      if (window.loggedInUser) {
        const user = window.loggedInUser;
        this.$nextTick(() => {
          // Isi otomatis form checkout dengan data user
          document.querySelector('#name').value = user.frisName + ' ' + user.lastName;
          document.querySelector('#email').value = user.email;
          document.querySelector('#phone').value = user.no_telpon;
        });
      }
    }
  }));
});

// Validasi form checkout: tombol aktif hanya kalau semua input terisi
const checkoutButton = document.querySelector('.checkout-button');
checkoutButton.disabled = true;

const form = document.querySelector('#checkoutForm');

// Event saat mengetik di form
form.addEventListener('keyup', function () {
  for (let i = 0; i < form.elements.length; i++) {// Looping semua elemen form
    if (form.elements[i].value.length !== 0) {
      checkoutButton.classList.remove('disabled');
      checkoutButton.classList.add('disabled'); //  
    } else {
      return false;
    }
  }
  checkoutButton.disabled = false;
  checkoutButton.classList.remove('disabled');
});

// Event klik tombol checkout
checkoutButton.addEventListener('click', async function (e) {
  e.preventDefault();

  const formData = new FormData(form);
  formData.append('total', Alpine.store('cart').total);
  formData.append('items', JSON.stringify(Alpine.store('cart').items));

  try {
    // Kirim data ke backend untuk generate Snap Token
    const response = await fetch('../payment/payment.php', {
      method: 'POST',
      body: formData,
    });

    const token = await response.text();

    // Trigger Midtrans popup
    window.snap.pay(token, {
      onSuccess: function (result) {
        console.log('Pembayaran sukses:', result);
        
        // Kirim update stok ke backend
        fetch('../payment/update_stok.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ items: Alpine.store('cart').items })
        });
      },
      onPending: function (result) {
        console.log('Menunggu pembayaran:', result);
      },
      onError: function (result) {
        console.error('Pembayaran gagal:', result);
      },
      onClose: function () {
        alert('Kamu menutup popup sebelum menyelesaikan pembayaran.');
      }
    });

  } catch (error) {
    console.error(error.message);
  }
});
