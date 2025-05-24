<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - KORA Team</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="team.css">

  
</head>
<body>
  <header class="app-bar">
    <i class="fas fa-arrow-left back-icon" onclick="goBack()"></i>
    <h1>About Team</h1>
  </header>

  <section class="about-us">
    <h2>Team 1</h2>
    
    <!-- Modal -->
    <div id="imageModal" class="modal">
      <span class="close" onclick="closeModal()">&times;</span>
      <img class="modal-content" id="modalImage">
      <div class="modal-caption">
        <h3 id="memberName">Nama Anggota</h3>
        <p id="memberFeature">Fitur yang dikerjakan</p>
      </div>
    </div>

    
    <div class="team-photos">
     
      <img src="../img/admin/salman.jpg" alt="Anggota Tim 1" onclick="showModal(this)" data-name="Salman" data-feature="Leader team dan fullstack developer">
      <img src="../img/admin/fadly.jpg" alt="Anggota Tim 2" onclick="showModal(this)" data-name="Fadly" data-feature="Desain Data System dan Front End Dev (login dan register)">
      <img src="../img/admin/awa.jpg" alt="Anggota Tim 3" onclick="showModal(this)" data-name="Awa" data-feature="Front End Dev (admin pesan) dan UI/UX">
      <img src="../img/admin/dirda.jpg" alt="Anggota Tim 4" onclick="showModal(this)" data-name="Dirda" data-feature="UI/UX dan Front End Dev (admin produk)">
      <img src="../img/admin/raka.jpg" alt="Anggota Tim 5" onclick="showModal(this)" data-name="Raka" data-feature="Front End Dev">
      <img src="../img/admin/raihan.jpg" alt="Anggota Tim 6" onclick="showModal(this)" data-name="Raihan" data-feature="Desain Data System dan Front End Dev (admin dashboard)">
    </div>
  </section>
 
 
  <section class="team-section">
  <div class="team-container">
    <div class="team-photo">
      <img src="../img/admin/Mas alan.jpg" alt="Foto owner" onclick="showModal(this)" data-name="Mas Alan" data-feature="Owner(PRESIDEN KORA)">
    </div>
        <h3>KORA Team</h3>
        <div class="desc-box">
          <p class="slide-text">
            Kami adalah tim yang terdiri dari 6 orang siswa yang memiliki semangat dan dedikasi tinggi dalam mengembangkan aplikasi ini. Setiap anggota tim memiliki keahlian dan peran masing-masing, dan kami bekerja sama untuk menciptakan pengalaman terbaik bagi pengguna. Kami percaya bahwa kolaborasi dan inovasi adalah kunci untuk mencapai kesuksesan dalam proyek ini.
          </p>
          <p class="quote">--Team 1 X PPLG 1--</p>
          <p class="slide-text">
           Sebagai Presiden Kora (Kopi Rakyat), saya bukan pembuat kode atau tukang desain, tapi saya orang di balik layar yang percaya penuh pada potensi generasi muda.
           Saya mempercayakan pengembangan web ini kepada tim hebat dari X PPLG 1 enam siswa luar biasa dengan semangat, ide, dan energi yang kadang lebih ngopi dari saya.
           Tugas saya? Kasih visi, semangatin tim, dan tentu saja... nyicip hasil akhir sambil ngopi.
           Karena saya percaya, mimpi besar bisa dimulai dari warung kecil, asal dikerjakan bareng dengan hati dan KORA. 
          <p class="quote">
           --Presiden Kora--
            <img src="../img/kora.jpg" alt="Logo KORA" style="height:40px; width:auto; vertical-align:middle; margin-left:8px;">
          </p>
        </div>
      </div>
    </div>
  </section>
    <script src="team.js" defer></script>

  
</body>
</html>
