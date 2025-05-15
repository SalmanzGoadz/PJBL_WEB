<?php 

include 'koneksi.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $noTelpon = $_POST['tlp'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // langsung hashing di sini

    // Cek email sudah ada atau belum
    $checkEmail = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        // Default role: user
        $insertQuery = "INSERT INTO user(frisName, lastName, no_telpon, email, password, role)
                        VALUES ('$firstName', '$lastName', '$noTelpon', '$email', '$password', 'user')";

        if ($conn->query($insertQuery) === TRUE) {
            header("Location: login_register.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;

        // Cek role dan redirect
        if ($row['role'] === 'admin') {
            header("Location: admin_halaman.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
?>
