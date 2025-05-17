<?php
include 'koneksi.php';

$query = "SELECT id, nama AS name, harga AS price, gambar AS img,deskripsi, stok,jenis FROM produk";// Ambil semua data produk dari database

$result = $conn->query($query); // Menggunakan query untuk mengambil data produk

$produk = [];// Inisialisasi array produk

while ($row = $result->fetch_assoc()) {// Menggunakan fetch_assoc untuk mengambil data produk
    $produk[] = $row;// Menambahkan data produk ke dalam array
}

header('Content-Type: application/json');// Mengatur header untuk JSON
echo json_encode($produk);// Menggunakan json_encode untuk mengubah array produk menjadi JSON
?>
