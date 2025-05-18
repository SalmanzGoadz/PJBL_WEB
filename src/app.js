// ambil produk dari db
document.addEventListener('alpine:init', () => {
  Alpine.store('products', {
    items: [],
    async fetchProducts() {
      try {
        const res = await fetch('get_produk.php');
        const data = await res.json();
        this.items = data.map(item => ({
          ...item,
          price: Number(item.price),
          stok: Number(item.stok)
        }));
      } catch (e) {
        console.error('Gagal mengambil data produk:', e);
      }
    }
  });

  // search produk and sortir/filter
 Alpine.data('products', () => ({
  search: '',
  filterJenis: '',
  init() {
    Alpine.store('products').fetchProducts();

    const input = document.querySelector('#product-search');
    if (input) {
      input.addEventListener('input', (e) => {
        this.search = e.target.value;
        const section = document.querySelector('#products');
        if (section) {
          section.scrollIntoView({ behavior: 'smooth' });
        }
      });
    }
  },
  get items() {
    return Alpine.store('products').items
      .filter(item =>
        item.name.toLowerCase().includes(this.search.toLowerCase())
      )
      .filter(item =>
        this.filterJenis ? item.jenis === this.filterJenis : true
      );
  }
}));

  // cart/keranjang
  Alpine.store('cart', {
    items: [],
    total: 0,
    quantity: 0,
    add(newItem) {
      const product = Alpine.store('products').items.find(item => item.id === newItem.id);
      if (product.stok < 1) {
        alert('Stok habis!');
        return;
      }

      const cartItem = this.items.find(item => item.id === newItem.id);
      if (!cartItem) {
        this.items.push({ ...newItem, quantity: 1, total: newItem.price });
      } else {
        cartItem.quantity++;
        cartItem.total = cartItem.price * cartItem.quantity;
      }

      product.stok--;
      this.quantity++;
      this.total += newItem.price;
    },
    remove(id) {
      const product = Alpine.store('products').items.find(item => item.id === id);
      const cartItem = this.items.find(item => item.id === id);
      if (!cartItem) return;

      if (cartItem.quantity > 1) {
        cartItem.quantity--;
        cartItem.total = cartItem.price * cartItem.quantity;
      } else {
        this.items = this.items.filter(item => item.id !== id);
      }

      product.stok++;
      this.quantity--;
      this.total -= cartItem.price;
    }
  });

  // Modal store for product detail
  Alpine.store('modal', {
    show: false,
    product: null,
    open(product) {
      this.product = product;
      this.show = true;
      document.body.style.overflow = 'hidden'; // Prevent background scroll
    },
    close() {
      this.show = false;
      this.product = null;
      document.body.style.overflow = ''; // Restore scroll
    }
  });
});


// jadiin rupiah
const rupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
  }).format(number);
};  


// untuk data user di payment gateway
document.addEventListener('alpine:init', () => {
  Alpine.data('checkoutForm', () => ({
    init() {
      if (window.loggedInUser) {
        const user = window.loggedInUser;
        this.$nextTick(() => {
          document.querySelector('#name').value = user.frisName + ' ' + user.lastName;
          document.querySelector('#email').value = user.email;
          document.querySelector('#phone').value = user.no_telpon;
        });
      }
    }
  }));
});

// validasi tombol checkout
const checkoutButton=document.querySelector('.checkout-button');
checkoutButton.disabled=true;

const form=document.querySelector('#checkoutForm');

form.addEventListener('keyup',function(){

  for (let i=0; i< form.elements.length;i++){
    if(form.elements[i].value.length !==0){
      checkoutButton.classList.remove('disabled')
      checkoutButton.classList.add('disabled')
    }
    else{
      return false;
    }
  }
  checkoutButton.disabled=false;
  checkoutButton.classList.remove('disabled');
});

checkoutButton.addEventListener('click', async function (e) {
  e.preventDefault();

  const formData = new FormData(form);
  formData.append('total', Alpine.store('cart').total);
  formData.append('items', JSON.stringify(Alpine.store('cart').items));

  try {
    const response = await fetch('payment/payment.php', {
      method: 'POST',
      body: formData,
    });

    const token = await response.text();
    // console.log(token);
    
    window.snap.pay(token, {
  onSuccess: function(result) {
    console.log('Pembayaran sukses:', result);
    // Kirim data ke backend buat simpan transaksi dan update stok
    fetch('payment/update_stok.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ items: Alpine.store('cart').items })
});

  },
  onPending: function(result) {
    console.log('Menunggu pembayaran:', result);
  },
  onError: function(result) {
    console.error('Pembayaran gagal:', result);
  },
  onClose: function() {
    alert('Kamu menutup popup sebelum menyelesaikan pembayaran.');
  }
});

  } catch (error) {
    console.error(error.message);
  }
});


