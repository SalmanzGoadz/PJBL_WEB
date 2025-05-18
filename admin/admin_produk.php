<!-- File: admin/tambah-produk.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Produk</title>
  <style>
    body {
      padding: 2rem;
      font-family: sans-serif;
    }
    .form-container {
      max-width: 600px;
      margin: auto;
      background: #f9f9f9;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-container h2 {
      margin-bottom: 1rem;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
    }
    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 0.5rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .form-radio{
      padding: 2px;;
      margin: 2px;;
    }
    .btn-submit {
      background-color: #16a34a;
      color: white;
      padding: 0.7rem 1.5rem;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    .btn-submit:hover {
      background-color: #15803d;
    }
  </style>
</head>
<body>
  <a href="admin_halaman.php">back</a>
  <div class="form-container">
    <h2>Tambah Produk Baru</h2>
    <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
  
      <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" required />
      </div>
      <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" name="price" id="price" required />
      </div>
      <div class="form-group">
        <label for="img">Gambar Produk</label>
        <input type="file" name="img" id="img" accept="image/*" required />
      </div>
      <div class="form-group">
        <label for="desc">Deskripsi (opsional)</label>
        <textarea name="desc" id="desc" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok" required>
      </div>
      <div class="form-radio">
        <label>Jenis Produk:</label><br>
         <input type="radio" name="jenis" id="makanan" value="Makanan" required>
         <label for="makanan">Makanan</label><br>

        <input type="radio" name="jenis" id="minuman" value="Minuman" required>
        <label for="minuman">Minuman</label>
      </div>

      <button type="submit" class="btn-submit">Simpan Produk</button>
    </form>
  </div>
</body>
</html>
