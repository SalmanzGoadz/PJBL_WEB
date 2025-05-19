<?php
include '../koneksi.php';

// Ambil data dari form
$nama   = $_POST['name'];// Menggunakan 'name' dari form
$harga  = $_POST['price'];// Menggunakan 'price' dari form
$gambar = $_FILES['img']['name'];// Menggunakan 'img' dari form
$tmp    = $_FILES['img']['tmp_name'];// Menggunakan 'img' dari form
$desc   = $_POST['desc'] ?? "";// Menggunakan 'desc' dari form, jika tidak ada gunakan string kosong
$stok   = $_POST['stok'];// Menggunakan 'stok' dari form
$jenis  = $_POST['jenis'];// Menggunakan 'jenis' dari form

// Tentukan folder tujuan dan pastikan folder tersebut ada
$folderTujuan = "./img/menu/"; // Menggunakan path relatif
if (!is_dir($folderTujuan)) {// Mengecek apakah folder tujuan ada
    mkdir($folderTujuan, 0777, true); // Membuat folder jika belum ada
}

$pathGambar = $folderTujuan . basename($gambar);// Menggunakan basename untuk menghindari path traversal
// Cek apakah file sudah ada


// Pindahkan file
if (move_uploaded_file($tmp, $pathGambar)) {// Jika berhasil memindahkan file buat query untuk menyimpan data ke database
  
  // Simpan ke database
  $query = "INSERT INTO produk (nama, harga, gambar, deskripsi, stok, jenis) VALUES (?, ?, ?, ?, ?, ?)";//Menggunakan prepared statement untuk mencegah SQL injection

  $stmt  = $conn->prepare($query);// Menggunakan prepared statement
  $stmt->bind_param("sissis", $nama, $harga, $gambar, $desc, $stok, $jenis);// Menggunakan bind_param untuk mengikat parameter ke query

  if ($stmt->execute()) {// Jika berhasil
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href='../user/index.php';</script>";// Menggunakan alert untuk memberi tahu pengguna dan redirect ke halaman index
  } else {// Jika gagal
    echo "Gagal menyimpan ke database: " . $conn->error;  // Menggunakan error dari koneksi untuk memberi tahu pengguna
  }

  $stmt->close();// Menutup prepared statement
} else {// Jika gagal memindahkan file
  echo "Gagal mengunggah gambar.";// Menggunakan alert untuk memberi tahu pengguna
}

$conn->close();// Menutup koneksi database
?>
