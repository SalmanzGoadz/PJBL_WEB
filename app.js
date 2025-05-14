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

  Alpine.data('products', () => ({
    search: '',
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
      return Alpine.store('products').items.filter(item =>
        item.name.toLowerCase().includes(this.search.toLowerCase())
      );
    }
  }));

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
});

const rupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
  }).format(number);
};
