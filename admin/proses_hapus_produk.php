<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {// Mengecek apakah form di-submit
  $id     = $_POST['id'];// Menggunakan 'id' dari form
  $gambar = $_POST['gambar'];// Menggunakan 'gambar' dari form

  // Hapus dari database
  $stmt = $conn->prepare("DELETE FROM produk WHERE id = ?");// Menggunakan prepared statement untuk mencegah SQL injection
  $stmt->bind_param("i", $id);// Menggunakan bind_param untuk mengikat parameter ke query

  if ($stmt->execute()) {// Jika berhasil
    // Hapus gambar dari folder jika ada
    $filePath = './img/menu/' . basename($gambar);// Menggunakan basename untuk menghindari path traversal
    if (file_exists($filePath)) {// Mengecek apakah file ada
      unlink($filePath);// Menghapus file
    }

    echo "<script>alert('Produk berhasil dihapus.'); window.location.href='kelola_produk.php';</script>";// Menggunakan alert untuk memberi tahu pengguna dan redirect ke halaman kelola_produk

  } else {// Jika gagal
    echo "Gagal menghapus produk: " . $conn->error;// Menggunakan error dari koneksi untuk memberi tahu pengguna
  }

  $stmt->close();// Menutup prepared statement
}

$conn->close();
