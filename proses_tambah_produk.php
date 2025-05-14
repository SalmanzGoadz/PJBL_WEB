<?php
include 'koneksi.php';

// Ambil data dari form
$nama   = $_POST['name'];
$harga  = $_POST['price'];
$gambar = $_FILES['img']['name'];
$tmp    = $_FILES['img']['tmp_name'];
$desc   = $_POST['desc'] ?? "";
$stok   = $_POST['stok'];

// Tentukan folder tujuan dan pastikan folder tersebut ada
$folderTujuan = "./img/menu/"; // Menggunakan path relatif
if (!is_dir($folderTujuan)) {
    mkdir($folderTujuan, 0777, true); // Membuat folder jika belum ada
}

$pathGambar = $folderTujuan . basename($gambar);

// Pindahkan file
if (move_uploaded_file($tmp, $pathGambar)) {
  // Simpan ke database
  $query = "INSERT INTO produk (nama, harga, gambar, deskripsi, stok) VALUES (?, ?, ?, ?, ?)";
  $stmt  = $conn->prepare($query);
  $stmt->bind_param("sissi", $nama, $harga, $gambar, $desc, $stok);

  if ($stmt->execute()) {
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href='index.php';</script>";
  } else {
    echo "Gagal menyimpan ke database: " . $conn->error;
  }

  $stmt->close();
} else {
  echo "Gagal mengunggah gambar.";
}

$conn->close();
?>
