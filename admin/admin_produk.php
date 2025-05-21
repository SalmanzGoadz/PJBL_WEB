<!-- File: admin/tambah-produk.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Tambah Produk</title>
  <style>
    body {
      background: linear-gradient(to bottom right, #f8f4f0, #e6d3c7);
      margin: 0;
      padding: 0;
      color: #f5f5dc;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    a {
      display: inline-block;
      background-color: #b6895b;
      border-radius: 5px;
      padding: 10px;
      margin: 10px;
      color: #f0e6dc;
      text-decoration: none;
      font-weight: bold;
    }

    .form-container {
      max-width: 600px;
      margin: 40px auto;
      background: #b6895b;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 12px 25px rgba(0,0,0,0.3);
    }

    .form-container h2 {
      text-align: center;
      color: #fff8f0;
      margin-bottom: 30px;
      font-size: 28px;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #fff8f0;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #a1887f;
      background-color: #fff8f0;
      font-size: 16px;
      color: #4e342e;
    }

    .form-radio {
      margin-bottom: 20px;
    }

    .form-radio label {
      margin-right: 15px;
      color: #fff8f0;
      font-weight: 500;
    }

    .form-radio input {
      margin-right: 6px;
    }

    .btn-submit {
      width: 100%;
      background-color:rgb(158, 102, 82);
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
      background-color: #b6895b;
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
