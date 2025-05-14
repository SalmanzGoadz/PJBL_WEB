<?php
include 'koneksi.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location:login_register.php");
    exit();
}

$user = $_SESSION['user'];

// Handle profile picture upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $target_dir = "uploads/";
    
    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $file_extension = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
    $new_filename = "profile_" . $user['id'] . "." . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    // Check if image file is valid
    $valid_file = true;
    
    // Check file size - limit to 5MB
    if ($_FILES["profile_picture"]["size"] > 5000000) {
        echo "<script>alert('File terlalu besar. Maksimal 5MB.');</script>";
        $valid_file = false;
    }
    
    // Allow certain file formats
    if ($file_extension != "jpg" && $file_extension != "png" && $file_extension != "jpeg" && $file_extension != "gif") {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.');</script>";
        $valid_file = false;
    }
    
    if ($valid_file) {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            // Update database with new profile picture path
            $update_query = mysqli_query($conn, "UPDATE user SET profile_picture='$target_file' WHERE id=".$user['id']);
            
            if ($update_query) {
                // Update session data
                $_SESSION['user']['profile_picture'] = $target_file;
                echo "<script>alert('Foto profil berhasil diperbarui!');window.location='profile.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan saat memperbarui database.');</script>";
            }
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengunggah file.');</script>";
        }
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: login_register.php'); 
        exit;
    }    
}

// Get latest user data
$user_query = mysqli_query($conn, "SELECT * FROM user WHERE id=".$user['id']);
$current_user = mysqli_fetch_assoc($user_query);

// Update session with latest data
$_SESSION['user'] = $current_user;
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
        // Show preview of selected image
        document.getElementById('profilePictureInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('profileImage').src = event.target.result;
                    document.getElementById('submitBtn').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

<script>
      feather.replace();
    </script>

</body>
</html>