<?php
include 'koneksi.php';

$query = "SELECT id, nama AS name, harga AS price, gambar AS img,deskripsi, stok,jenis FROM produk";
$result = $conn->query($query);

$produk = [];

while ($row = $result->fetch_assoc()) {
    $produk[] = $row;
}

header('Content-Type: application/json');
echo json_encode($produk);
?>
