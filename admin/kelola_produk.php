<?php
include '../koneksi.php';

$result = $conn->query("SELECT * FROM produk");// Ambil semua data produk dari database
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f5f0;
      margin: 0;
      padding: 20px;
      color: #3e2723;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #f2f2f2;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #795548;
      color: white;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
    }
    tr:nth-child(even) {
      background-color: #f0e6dc;
    }
    tr:hover {
      background-color: #e0d3c2;
      cursor: pointer;
    }
    a {
      display: inline-block;
      background-color: #6d4c41;
      border-radius: 5px;
      padding: 5px;
      margin-bottom: 20px;
      color: #f0e6dc;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <a href="admin_halaman.php">back</a>
<h2>Kelola Produk</h2>
<table border="1" cellpadding="10">
  <tr>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Gambar</th>
    <th>Aksi</th>
  </tr>
  <?php while ($p = $result->fetch_assoc()): // Looping untuk menampilkan semua produk  ?> 
  <tr>
    <td><?= htmlspecialchars($p['nama']) ?></td>
    <td><?= number_format($p['harga']) ?></td>
    <td><?= $p['stok'] ?></td>
    <td><img src="../img/menu/<?= htmlspecialchars($p['gambar']) ?>" width="80" /></td>
    <td>
      <form method="POST" action="proses_hapus_produk.php" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <input type="hidden" name="gambar" value="<?= $p['gambar'] ?>">
        <button type="submit">Hapus</button>
      </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
