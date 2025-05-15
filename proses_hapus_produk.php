<<<<<<< HEAD
<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id     = $_POST['id'];
  $gambar = $_POST['gambar'];

  // Hapus dari database
  $stmt = $conn->prepare("DELETE FROM produk WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    // Hapus gambar dari folder jika ada
    $filePath = './img/menu/' . basename($gambar);
    if (file_exists($filePath)) {
      unlink($filePath);
    }

    echo "<script>alert('Produk berhasil dihapus.'); window.location.href='kelola_produk.php';</script>";
  } else {
    echo "Gagal menghapus produk: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
=======
<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id     = $_POST['id'];
  $gambar = $_POST['gambar'];

  // Hapus dari database
  $stmt = $conn->prepare("DELETE FROM produk WHERE id = ?");
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    // Hapus gambar dari folder jika ada
    $filePath = './img/menu/' . basename($gambar);
    if (file_exists($filePath)) {
      unlink($filePath);
    }

    echo "<script>alert('Produk berhasil dihapus.'); window.location.href='kelola_produk.php';</script>";
  } else {
    echo "Gagal menghapus produk: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
>>>>>>> cd0a9dd9413469b337ef770834175199865ee366
