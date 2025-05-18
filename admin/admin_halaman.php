<?php

session_start();
// Cek apakah pengguna sudah login dan memiliki peran admin

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php?msg=noaccess");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
       <a href="index.php"class="logo"> Admin_<span>Kora</span></a>

        <div class="navbar-nav">
            <a href="admin_kontak.php">pesan</a>
            <a href="admin_produk.php">tambahproduk</a>
            <a href="kelola_produk.php">kelolaproduk</a>

        </div>
    </div>

    <div class="title-box">
        <h1>Our Team</h1>
        <p> Kelompok 1 PJBL </p>
    </div>
    <div class="team-row">
        <div class= "profile-box">
            <h4>Salman</h4>
            <small>X PPLG 1 / 31</small>
            <img src="img/admin/salman.jpg">
            <div class="social-box">
                <a href="https://github.com/SalmanzGoadz">
                <i class="fa fa-github"></i>
                </a>

                <a href="https://www.instagram.com/salmandwiki_s/">
                <i class="fa fa-instagram"></i>
                </a>

                
            </div>
            <p> Leader Team dan Fullstack Dev </p>
        </div>
        <div class= "profile-box">
            <h4>Fadly</h4>
            <small>X PPLG 1 / 13</small>
            <img src="img/admin/fadly.jpg">
            <div class="social-box">
                <a href="https://github.com/fadlyy-sta">
                <i class="fa fa-github"></i>
                </a>
                
                <a href="https://www.instagram.com/_fadlyys/">
                <i class="fa fa-instagram"></i>
                </a>
            </div>
            <p> Desain Data System dan Front End Dev(login dan register)</p>
        </div>
        <div class= "profile-box">
            <h4>Raihan</h4>
            <small>X PPLG 1 / 26</small>
            <img src="img/admin/raihan.jpg">
            <div class="social-box">
                <a href="">
                <i class="fa fa-github"></i>
                </a>
                
                <a href="https://www.instagram.com/rean_offc._/">
                <i class="fa fa-instagram"></i>
                </a>
            </div>
            <p> Desain Data System dan Front End Dev(admin dashboard) </p>
        </div>
        <div class= "profile-box">
            <h4>Rakha</h4>
            <small>X PPLG 1 / 27</small>
            <img src="img/admin/raka.jpg">
            <div class="social-box">
               <a href="https://github.com/BlueTedV">
                <i class="fa fa-github"></i>
                </a>
                
                <a href="https://www.instagram.com/bluetedz/">
                <i class="fa fa-instagram"></i>
                </a>
            </div>
            <p> Front End Dev </p>
        </div>
        <div class= "profile-box">
            <h4>Dirdadivina</h4>
            <small>X PPLG 1 / 11 </small>
            <img src="img/admin/dirda.jpg">
            <div class="social-box">
                <a href="">
                <i class="fa fa-github"></i>
                </a>
                
                <a href="https://www.instagram.com/didadump.0_0/">
                <i class="fa fa-instagram"></i>
                </a>
            </div>
            <p> UI/UX dan Front End Dev(admin produk) </p>
        </div>
        <div class= "profile-box">
            <h4>Najwa</h4>
            <small>X PPLG 1 / 22</small>
            <img src="img/admin/awa.jpg">
            <div class="social-box">
              <a href="">
                <i class="fa fa-github"></i>
                </a>
                
                <a href="https://www.instagram.com/nnayyow/">
                <i class="fa fa-instagram"></i>
                </a>
            </div>
            <p>Front End Dev(admin pesan) dan UI/UX </p>
        </div>
    </div>
    
    <div class="halaman-img">
        <img src="" alt="">
    </div>

</body>
</html>