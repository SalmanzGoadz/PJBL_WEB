<<<<<<< HEAD
<?php
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = "SELECT id, nama AS name, harga AS price, gambar AS img, deskripsi, stok, jenis FROM produk";
$result = $conn->query($query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['error' => $conn->error]);
    exit;
}

$produk = [];

while ($row = $result->fetch_assoc()) {
    $produk[] = $row;
}

header('Content-Type: application/json');
echo json_encode($produk);
?>
=======
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
>>>>>>> cd0a9dd9413469b337ef770834175199865ee366
