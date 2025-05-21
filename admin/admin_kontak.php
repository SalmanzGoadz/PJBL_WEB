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
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9f5f0;
      margin: 0;
      padding: 20px;
      color: #3e2723;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: #f2f2f2;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #795548;
      color: white;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 14px;
    }
    tr:nth-child(even) {
      background-color: #f0e6dc;
    }
    tr:hover {
      background-color: #e0d3c2;
      cursor: pointer;
    }
    a {
      display: inline-block;
      background-color: #6d4c41;
      border-radius: 5px;
      padding: 5px 10px;
      margin-bottom: 20px;
      color: #f0e6dc;
      text-decoration: none;
      font-weight: bold;
    }
    a:hover {
      text-decoration: underline;
    }
    h2 {
      text-align: center;
      color: #4e342e;
      margin-bottom: 20px;
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
