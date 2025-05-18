<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Mengecek apakah form di-submit dan Ambil data dari form
    $nama = $_POST['nama'];// Menggunakan 'nama' dari form
    $email = $_POST['email'];// Menggunakan 'email' dari form
    $pesan = $_POST['pesan'];// Menggunakan 'pesan' dari form

    $sql = "INSERT INTO pesan (nama, email, pesan) 
            VALUES ('$nama', '$email', '$pesan')";// Query untuk menyimpan data ke database

    if (mysqli_query($conn, $sql)) {// Jika berhasil menyimpan data
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.php#contact';</script>";// Menggunakan alert untuk memberi tahu pengguna dan redirect ke halaman index

    } else {// Jika gagal menyimpan data
        echo "<script>alert('Gagal mengirim pesan!'); window.location.href='index.php#contact';</script>";// Menggunakan alert untuk memberi tahu pengguna dan redirect ke halaman index
    }
}
?>
