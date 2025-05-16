<?php
include '../koneksi.php';

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data['items'] as $item) {
    $id = $item['id'];
    $qty = $item['quantity'];
    $stmt = $conn->prepare("UPDATE produk SET stok = stok - ? WHERE id = ?");
    $stmt->bind_param('ii', $qty, $id);
    $stmt->execute();
}
echo json_encode(['status' => 'ok']);
