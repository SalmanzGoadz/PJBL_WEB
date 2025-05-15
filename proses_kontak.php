<<<<<<< HEAD
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO pesan (nama, email, pesan)
            VALUES ('$nama', '$email', '$pesan')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.php#contact';</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesan!'); window.location.href='index.php#contact';</script>";
    }
}
?>
=======
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO pesan (nama, email, pesan)
            VALUES ('$nama', '$email', '$pesan')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.php#contact';</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesan!'); window.location.href='index.php#contact';</script>";
    }
}
?>
>>>>>>> cd0a9dd9413469b337ef770834175199865ee366
