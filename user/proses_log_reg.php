<?php 

include '../koneksi.php';

// Proses registrasi
if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName']; // Menggunakan frist name
    $lastName = $_POST['lName']; // ambil last name
    $noTelpon = $_POST['tlp']; // ambil no telpon
    $email = $_POST['email']; // ambil email
    $password = md5($_POST['password']); // langsung hashing di sini

    // Cek email sudah ada atau belum
    $checkEmail = "SELECT * FROM user WHERE email='$email'"; // query untuk cek email
    $result = $conn->query($checkEmail); // eksekusi query
    if ($result->num_rows > 0) { // jika email sudah ada
        echo "Email Address Already Exists!"; // tampilkan pesan
    } else { // jika email belum ada
        // Insert data ke database

        // Default role: user
        $insertQuery = "INSERT INTO user(frisName, lastName, no_telpon, email, password, role) 
                        VALUES ('$firstName', '$lastName', '$noTelpon', '$email', '$password', 'user')"; // query untuk insert data dan eksekusi query

        if ($conn->query($insertQuery) === TRUE) { // jika berhasil
            header("Location: login_register.php"); // redirect ke halaman login
        } else { // jika gagal
            echo "Error: " . $conn->error; // tampilkan pesan error
        }
    }
}

// Proses login
if (isset($_POST['signIn'])) { 
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;
        $_SESSION['role'] = $row['role'];

        if ($row['role'] === 'admin') {
            header("Location: ../admin/admin_halaman.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        // Instead of alert+redirect, reload login_register.php with email as GET parameter
        header("Location: login_register.php?login_error=1&email=" . urlencode($email));
        exit();
    }
}
?>
