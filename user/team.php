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
      <div class="team-desc">
        <h3>KORA Team</h3>
        <div class="desc-box">
          <p>
            Kami adalah tim yang terdiri dari 6 orang siswa yang memiliki semangat dan dedikasi tinggi dalam mengembangkan aplikasi ini. Setiap anggota tim memiliki keahlian dan peran masing-masing, dan kami bekerja sama untuk menciptakan pengalaman terbaik bagi pengguna. Kami percaya bahwa kolaborasi dan inovasi adalah kunci untuk mencapai kesuksesan dalam proyek ini.
          </p>
          <p class="quote">
            Team 1 X PPLG 1
            <img src="../img/kora.jpg" alt="Logo KORA" style="height:40px; width:auto; vertical-align:middle; margin-left:8px;">
          </p>
        </div>
      </div>
    </div>
  </section>

  <script>
    function goBack() {
      window.history.back();
    }

    function showModal(imgElement) {
      const modal = document.getElementById("imageModal");
      const modalImg = document.getElementById("modalImage");
      const memberName = document.getElementById("memberName");
      const memberFeature = document.getElementById("memberFeature");

      modal.style.display = "block";
      modalImg.src = imgElement.src;
      memberName.textContent = imgElement.getAttribute("data-name");
      memberFeature.textContent = imgElement.getAttribute("data-feature");
    }

    function closeModal() {
      document.getElementById("imageModal").style.display = "none";
    }
  </script>
</body>
</html>
