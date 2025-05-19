<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kopi Rakyat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital, wght@0,100;0,300; 0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <!--icons-->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- My Style -->
    <link rel="stylesheet" href="style.css" />
    <!-- AlpineJS -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <script src="src/app.js"></script>
  </head>

  <body>
    <!-- Navbar start -->

    <nav class="navbar" x-data>
      <a href="#" class="navbar-logo">Kopi<span>Rakyat</span>.</a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#products">Produk</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shop-button">
          <i data-feather="shopping-cart"></i>
          <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
        </a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>

      <!-- Search Form start -->
      <div class="search-form">
        <input
          type="search"
          id="search-box"
          placeholder="cari menu..."
          oninput="searchItems()"
        />
        <label for="search-box"><i data-feather="search"></i></label>
      </div>
      <!-- Search Form end -->

      <!-- Shopping Cart Start-->
      <div class="shopping-cart">
        <template x-for="(item, index) in $store.cart.items" x-keys="index">
        <div class="cart-item">
          <img :src="`img/menu/${item.img}`" :alt="item.name" />
          <div class="item-detail">
            <h3 x-text="item.name"></h3>
            <div class="item-price">
              <span x-text="rupiah(item.price)"></span> &times;
              <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
              <span x-text="item.quantity"></span>
              <button id="add" @click="$store.cart.add(item)">&plus;</button>&equals;
              <span x-text="rupiah(item.total)"></span>
            </div>
          </div>
        </div>
        </template>
        <h4 x-show="!$store.cart.items.length">Cart is Empty</h4>
        <h4 x-show="$store.cart.items.length">Total : <span x-text="rupiah($store.cart.total)"></span></h4>

        <div class="form-container" x-show="$store.cart.items.length">
          <form action="" id="checkoutForm">
            <h5>Customer Detail</h5>

            <label for="name">
              <span>Name</span>
              <input type="text" id="name" name="name"/>
            </label>

            <label for="email">
              <span>Email</span>
              <input type="email" id="email" email="email"/>
            </label>

            <label for="phone">
              <span>Phone</span>
              <input type="number" id="phone" phone="phone" autocomplete="off"/>
            </label>

            <button class="checkout-button" type="submit" id="checkout-button">Checkout</button>
          </form>
        </div>
      </div>
      <!-- Sopping Cart End-->

    </nav>
    <!-- Navbar end -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
        <p>
          Secangkir Kopi dengan harga yang merakyat. <br />
          Hanya ada di kopi rakyat.
        </p>
        <a
          href="https://gofood.co.id/semarang/restaurant/kopi-rakyat-semarang-kora-truntum-16da3902-f9f8-4954-a95b-f6a6d0ec5811"
          class="cta"
          >Beli Sekarang</a
        >
      </main>
    </section>
    <!-- Hero Section End -->

    <!-- About Section start-->
    <section id="about" class="about">
      <h2><span>Tentang </span>Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/bg/Coffee+table.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kenapa memilih kopi kami?</h3>
          <p>
            Bijih Kopi Rakyat dipilih dari biji berkualitas tinggi, memastikan
            setiap cangkir menawarkan cita rasa yang kaya dan aroma yang
            menggugah selera. Dengan teknik pengolahan yang cermat dan
            berstandar tinggi, kami menjaga keaslian rasa kopi, memberikan
            pengalaman menikmati kopi yang tak terlupakan.Kami berkomitmen
            terhadap keberlanjutan. Produk kami dihasilkan dengan metode yang
            ramah lingkungan, menjaga ekosistem dan mendukung petani
            lokal.Dengan memilih produk kami, Anda turut berkontribusi pada
            pemberdayaan komunitas petani kopi lokal, membantu mereka untuk
            tumbuh dan berkembang.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section end-->

    <!-- Menu Section start-->
    <section id="menu" class="menu">
      <h2><span>Menu </span>Favorit</h2>
      <p>
        Kami menyajikan beberapa menu di kedai kopi kami,seperti makanan dan
        minuman moderen dan tradisional.Pilihlah menu kami untuk menikmati
        hidangan berkualitas tinggi yang bervariasi, kreatif, dan disajikan
        dengan pelayanan ramah, menjadikan setiap momen bersantap Anda tak
        terlupakan.
      </p>

      <div class="row">
        <div class="menu-card">
          <img src="img/menu/kts.jpg" alt="kts" class="menu-card-img" />
          <h3 class="menu-card-title">- Kopi Tarik Susu -</h3>
          <p class="menu-card-price">IDR 10K</p>
        </div>
        <div class="menu-card">
          <img
            src="img/menu/milopejabat.jpg"
            alt="milo pejabat"
            class="menu-card-img"
          />
          <h3 class="menu-card-title">- milo pejabat -</h3>
          <p class="menu-card-price">IDR 10K</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/mix.jpg" alt="mix" class="menu-card-img" />
          <h3 class="menu-card-title">- Mix Platter -</h3>
          <p class="menu-card-price">IDR 15K</p>
        </div>
        <div class="menu-card">
          <img src="img/menu/sing.jpg" alt="sing" class="menu-card-img" />
          <h3 class="menu-card-title">- Singkong Keju -</h3>
          <p class="menu-card-price">IDR 15K</p>
        </div>
      </div>
    </section>
    <!-- Menu Section end-->

    
    <!-- Products Section Start-->
<section class="products" id="products" x-data="products">
  <h2><span>Produk</span></h2>
  <p>Masukkan sesuatu yang penting disini</p>

  <!-- Tombol Tambah Produk -->
  <div style="margin-bottom: 2rem;">
    <a href="admin_produk.php" class="btn-add-product">
      + Tambah Produk
    </a>
  </div>

  <div class="row">
    <template x-for="(item, index) in items" x-key="index">
      <div class="product-card">
        <div class="product-icons">
          <a href="#" @click.prevent="$store.cart.add(item)">
            <svg
              width="24"
              height="24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <use href="img/feather-sprite.svg#shopping-cart" />
            </svg>
          </a>
          <a href="#" class="item-detail-button">
            <svg
              width="24"
              height="24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <use href="img/feather-sprite.svg#eye" />
            </svg>
          </a>
        </div>
        <div class="product-image">
          <img :src="`img/menu/${item.img}`" :alt="item.name" />
        </div>
        <div class="product-content">
          <h3 x-text="item.name"></h3>
          <div class="product-stars">
            <template x-for="i in 5">
              <svg
                width="24"
                height="24"
                fill="currentColor"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <use href="img/feather-sprite.svg#star" />
              </svg>
            </template>
          </div>
          <div class="product-price">
            <span x-text="rupiah(item.price)"></span>
          </div>
          <div class="product-price">
                 Stok: <span x-text="item.stok"></span>
          </div>

        </div>
      </div>
    </template>
  </div>
</section>
  

<style>
  .btn-add-product {
    display: inline-block;
    padding: 0.5rem 1rem;
    background-color: #16a34a;
    color: white;
    font-weight: bold;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .btn-add-product:hover {
    background-color: #15803d;
  }
</style>

    <!-- Products Section End-->

    <!-- Contact Section start -->

    <section id="contact" class="contact">
      <h2><span>Kontak </span>Kami</h2>
      <p>Berikut adalah lokasi kedai kami dan info kontak kedai kami</p>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2026630.86781871!2d107.93370012574297!3d-7.210762092579923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d4476ad49d7%3A0xf8dd33a68f23c5f4!2s%22KORA%22%20Kopi%20Rakyat%20Semarang!5e0!3m2!1sid!2sid!4v1728913684538!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="nama" />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="email" placeholder="email" />
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="number" placeholder="no" />
          </div>
          <!-- <button type="submit" class="btn">Kirim pesan</button> -->
          <a class="btn" href="mail.html">Kirim Pesan</a>
        </form>
      </div>
    </section>
    <!-- Contact Section end -->

    <footer>
      <div class="socials">
        <a
          href="https://www.instagram.com/kora_smg?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
          ><i data-feather="instagram"></i
        ></a>
        <a href="https://wa.link/ij0s77"
          ><i data-feather="message-circle"></i
        ></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>
          Created by
          <a
            href="https://www.instagram.com/bluetedz?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
            >Rakha & </a
          ><a href="https://www.instagram.com/salmandwiki_s/">Salman</a>. &copy;
          2024.
        </p>
      </div>
    </footer>

    <!-- Modal Box Item Detail Start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/menu/Espresso.jpg" alt="Product 1" />
          <div class="product-content">
            <h3>Product 1</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Doloremque quo officiis, nam culpa ipsa inventore illum ex
              voluptatibus maiores fuga porro quia laborum ducimus magni ullam
              quam odio. Velit, tempore.
            </p>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 30K <span>IDR 55K</span></div>
            <a href="#"
              ><i data-feather="shopping-cart"></i><span>add to cart</span></a
            >
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Box Item Detail End -->

    <!-- Feathers icons-->
    <script>
      feather.replace();
    </script>

    <!--My JavaScript-->
    <script src="script.js"></script>
  </body>
</html>
