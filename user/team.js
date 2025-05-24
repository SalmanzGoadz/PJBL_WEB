function goBack() { //fungsi untuk kembali ke halaman sebelumnya
      window.history.back();//kembali ke halaman sebelumnya
    }

    function showModal(imgElement) {//fungsi untuk menampilkan modal gambar
      const modal = document.getElementById("imageModal");//menampilkan modal gambar
      const modalImg = document.getElementById("modalImage");//menampilkan gambar modal
      const memberName = document.getElementById("memberName");//menampilkan nama anggota
      const memberFeature = document.getElementById("memberFeature");//menampilkan fitur anggota

      modal.style.display = "block";//menampilkan modal
      modalImg.src = imgElement.src;//menampilkan gambar modal
      memberName.textContent = imgElement.getAttribute("data-name");//menampilkan nama anggota
      memberFeature.textContent = imgElement.getAttribute("data-feature");//menampilkan fitur anggota
    }

    function closeModal() {//fungsi untuk menutup modal gambar
      document.getElementById("imageModal").style.display = "none";//menutup modal
    }
  



    let currentSlide = 0;

function showSlide(index) {
  const wrapper = document.getElementById('slideWrapper');
  const totalSlides = wrapper.children.length;

  if (index < 0) currentSlide = totalSlides - 1;
  else if (index >= totalSlides) currentSlide = 0;
  else currentSlide = index;

  wrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

// Inisialisasi tampilan awal
document.addEventListener("DOMContentLoaded", () => {
  showSlide(0);
});
