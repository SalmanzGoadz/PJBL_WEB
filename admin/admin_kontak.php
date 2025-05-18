<?php
include("../koneksi.php"); // koneksi ke database

$query = "SELECT * FROM pesan ORDER BY id DESC"; // Query untuk mengambil semua data pesan dari database
$result = mysqli_query($conn, $query);// Eksekusi query
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pesan Kontak</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
    }
  </style>
</head>
<body>
<a href="admin_halaman.php">back</a>
<h2>Daftar Pesan dari Form Kontak</h2>

<table>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Pesan</th>
    <th>tanggal</th>
  </tr>

  <?php
  $no = 1;// Inisialisasi nomor urut
  while ($row = mysqli_fetch_assoc($result)) {// Mengambil data dari hasil query
    echo "<tr>
            <td>".$no++."</td>
            <td>".$row['nama']."</td>
            <td>".$row['email']."</td>
            <td>".$row['pesan']."</td>
            <td>".$row['tanggal']."</td>
          </tr>";
  }
  ?>
</table>

</body>
</html>
