<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM produk");
?>

<h2>Kelola Produk</h2>
<table border="1" cellpadding="10">
  <tr>
    <th>Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Gambar</th>
    <th>Aksi</th>
  </tr>
  <?php while ($p = $result->fetch_assoc()): ?>
  <tr>
    <td><?= htmlspecialchars($p['nama']) ?></td>
    <td><?= number_format($p['harga']) ?></td>
    <td><?= $p['stok'] ?></td>
    <td><img src="img/menu/<?= htmlspecialchars($p['gambar']) ?>" width="80" /></td>
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
