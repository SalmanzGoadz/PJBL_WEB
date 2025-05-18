<?php
include 'koneksi.php';
session_start();

// cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {// jika tidak ada session user
    header("Location:login_register.php");// redirect ke halaman login
    exit();// keluar dari script
}

$user = $_SESSION['user'];// ambil data user dari session

// proses upload foto profil
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {// jika ada file yang diupload
    $target_dir = "uploads/";//  masukan ke folder uploads
    
    // buat folder jika belum ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);// jika belum ada buat folder uploads
    }
    
    $file_extension = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);// ambil ekstensi file
    $new_filename = "profile_" . $user['id'] . "." . $file_extension;// buat nama file baru
    $target_file = $target_dir . $new_filename;// buat path lengkap untuk file
    
    // validasi file
    $valid_file = true;
    
    // Cek apakah file sudah ada
    if ($_FILES["profile_picture"]["size"] > 5000000) {// jika ukuran file lebih dari 5MB
        echo "<script>alert('File terlalu besar. Maksimal 5MB.');</script>";// tampilkan pesan error
        $valid_file = false;// set valid_file ke false
    }
    
    // Cek apakah file adalah gambar
    if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg" && $file_extension != "gif") {// jika bukan jpg, png, jpeg, atau gif
        
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.');</script>";// tampilkan pesan error
        $valid_file = false;// set valid_file ke false
    }
    
    if ($valid_file) { // jika file valid
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) { // jika berhasil memindahkan file
            
            // update database
            $update_query = mysqli_query($conn, "UPDATE user SET profile_picture='$target_file' WHERE id=".$user['id']);// update database dengan path file
            
            if ($update_query) {// jika berhasil update database
                // update session
                
                $_SESSION['user']['profile_picture'] = $target_file;// update session dengan path file
                echo "<script>alert('Foto profil berhasil diperbarui!');window.location='profile.php';</script>";// tampilkan pesan sukses dan redirect ke halaman profil
            } 
            
            else {// jika gagal update database
                echo "<script>alert('Terjadi kesalahan saat memperbarui database.');</script>"; // tampilkan pesan error
            }

        }
        
        else {// jika gagal memindahkan file 
            echo "<script>alert('Terjadi kesalahan saat mengunggah file.');</script>";// tampilkan pesan error
        }
    }

    if (isset($_GET['logout'])) { // jika ada parameter logout
        session_destroy();// hapus session
        header('Location: login_register.php'); // redirect ke halaman login
        exit; // keluar dari script
    }    
}

// ambil data user dari database
$user_query = mysqli_query($conn, "SELECT * FROM user WHERE id=".$user['id']);// ambil data user dari database
$current_user = mysqli_fetch_assoc($user_query);//  ambil data user dari query

// Update session dengan data terbaru
$_SESSION['user'] = $current_user;// update session dengan data terbaru
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil -Kopi Rakyat</title>
    <link rel="stylesheet" href="profile.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>

    <div class="profile-container">
        <div class="header">
            <a href="index.php"><i class="fas fa-house"></i></a>
            <h2>Profil</h2>
        </div>
        
        <div class="profile-picture-container">
            <img src="<?php echo !empty($current_user['profile_picture']) ? $current_user['profile_picture'] : 'default_avatar.png'; ?>" alt="Profile Picture" class="profile-picture" id="profileImage">
            
            <form id="uploadForm" action="profile.php" method="POST" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                 <button class="btn-upload-foto" type="button">Ubah Foto</button>
                 <input type="file" name="profile_picture" id="profilePictureInput" accept="image/*">
            </div>

                <button type="submit" class="submit-btn" id="submitBtn">Simpan</button>
            </form>
        </div>
        
        <div class="info-box">
            <p>Username : <?php echo $_SESSION['user']['frisName']; //  ?></p>
        </div>
        
        <div class="info-box">
            <p>Last Name : <?php echo $current_user ['lastName'] ; ?></p>
        </div>
        <div class="info-box">
            <p>No Telpon : <?php echo $current_user ['no_telpon'] ; ?></p>
        </div>
        
        <div class="info-box">
            <p>Email : <?php echo $current_user['email']; ?></p>
        </div>
        
        <div class="button-container">
            <a href="login_register.php" class="logout-btn"><i data-feather="log-out"></i> </a>
        </div>
    </div>

    <script>
        // Menampilkan tombol simpan hanya jika ada file yang dipilih
        document.getElementById('profilePictureInput').addEventListener('change', function(e) { 
            const file = e.target.files[0];// ambil file yang dipilih
            
            if (file) {// jika ada file
                const reader = new FileReader();// buat FileReader
                reader.onload = function(event) {// jika file sudah dibaca
                    document.getElementById('profileImage').src = event.target.result;// set src gambar dengan hasil pembacaan
                    document.getElementById('submitBtn').style.display = 'block';// tampilkan tombol simpan
                }
                reader.readAsDataURL(file);// baca file sebagai URL data
            }
        });
    </script>

<script>
      feather.replace();// Mengganti ikon dengan feather icons  
    </script>

</body>
</html>