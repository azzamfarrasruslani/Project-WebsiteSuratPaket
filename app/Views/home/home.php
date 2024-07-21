<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Paket | Politeknik Caltex Riau</title>
  <!-- Shortcut Icon -->
  <link rel="icon" type="image/png" href="<?= BASE_URL; ?>assets/images/envelope icon.svg" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&family=Baloo+Thambi+2&family=Barlow+Semi+Condensed:ital,wght@1,100&family=Montserrat:wght@200;300;500;700&family=Poppins:wght@100;200;300;500;700&family=Roboto:wght@300&display=swap"
    rel="stylesheet" />
  <!-- Style -->
  <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/home.css">
  <!-- <link href="<?= BASE_URL; ?>assets/css/argon-dashboard-tailwind.css" rel="stylesheet" /> -->
  <!-- Fontawesome Icon -->
  <script src="https://kit.fontawesome.com/c23fedd423.js" crossorigin="anonymous"></script>
  <!-- Bootstrap Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
    integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>


<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#"><img class="logo" src="<?= BASE_URL; ?>assets/images/logo-web.png"></a>
    <div class="navbar-nav">
      <a href="#home">Beranda</a>
      <a href="#tentang">Tentang</a>
      <a href="#kontak">Kontak</a>
    </div>
    <div class="navbar-login">
      <a href="<?php BASE_URL; ?>auth/login">Login <i class="fa-solid fa-right-to-bracket"></i></a>
    </div>

    <a href="#menu" id="hamburger-menu"><button class="menu"
        onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))"
        aria-label="Main Menu">
        <svg width="100" height="100" viewBox="0 0 100 100">
          <path class="line line1"
            d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
          <path class="line line2" d="M 20,50 H 80" />
          <path class="line line3"
            d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
        </svg>
      </button></a>
  </nav>
  <!-- Navbar End -->
  <!-- Hero Section Start -->
  <section class="hero " id="home">
    <!--Content before waves-->
    <div class="content flex">
      <div class="content-judul">
        <h1>Surat Paket</h1>
        <h2>Politeknik Caltex Riau</h2>
        <a href="<?= BASE_URL; ?>Home/viewPencarianBarang" class="cta"><i class="bi bi-search"></i> Cari Barang</a>
      </div>
      <div class="image-hero">
        <img src="<?= BASE_URL; ?>assets/images/logistics.svg">
      </div>
    </div>
    <!--Waves Container-->
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
      </g>
    </svg>
    <!--Waves end-->
  </section>
  <!-- Hero Section End -->


  <!-- Tentang Section Start -->
  <section class="about" id="tentang">
    <h2>Tentang</h2><br>
    <div class="about-container">
      <img src="<?= BASE_URL; ?>assets/images/home-delivery-service.svg" alt="Politeknik Caltex Riau"
        class="about-image">

      <div class="about-text">
        <p>
          Website ini adalah sebuah sistem surat atau paket yang ada di Politeknik Caltex Riau.
          Website ini bertujuan untuk membantu memudahkan security dalam kegiatan masuknya surat atau paket ke dalam
          <b>Politeknik Caltex Riau (PCR)</b>. Website ini dirancang untuk meningkatkan efisiensi dan akurasi dalam
          pencatatan
          serta pengelolaan surat dan paket yang diterima. Dengan adanya Website ini security dapat dengan mudah
          mencatat
          informasi detail tentang surat atau paket yang masuk, serta pengguna dapat melacak status pengiriman secara
          real-time.
          Hal ini diharapkan dapat mengurangi kesalahan dalam pencatatan dan penyerahan Paket di PCR, mempercepat proses
          distribusi, dan meningkatkan kepuasan warga PCR.
        </p>
      </div>
  </section>
  <!-- Tentang Section End -->


  <!-- Kontak Section Start -->
  <section class="contact" id="kontak">
    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <div class="content">
      <h2>Kontak</h2>
    </div>
    <div class="container">
      <div class="form-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6202092678095!2d101.42352197472347!3d0.5709751994234532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab67086f2e89%3A0x65a24264fec306bb!2sPoliteknik%20Caltex%20Riau!5e0!3m2!1sid!2sid!4v1721579143808!5m2!1sid!2sid"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="contact-container">
        <h2>Kontak Kami</h2><br>
        <p><strong>Politeknik Caltex Riau</strong><br>
          Jl. Umban Sari (Patin) No. 1 Rumbai<br>
          Pekanbaru-Riau 28265<br><br>
          <span>📞 (0761) - 53939 atau 0811 758 0101</span><br>
          <span>📞 (0761) - 554224</span><br>
          <span>📧 pcr@pcr.ac.id</span>
        </p><br>
        <p><strong>Bagian Akademik dan Kemahasiswaan</strong><br>
          📞 +62761 53939</p><br>
        <p><strong>Kontak Security</strong><br>
          📞 +622288678924</p>

      </div>
    </div>
  </section>
  <!-- Kontak Section End -->

  <!-- footer start -->
  <footer class="footer bg-blue-300 text-black py-6 text-center">
    <div class="footer-container max-w-5xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
      <div class="footer-left mb-4 md:mb-0">
        <h3 class="text-xl font-bold">Politeknik Caltex Riau</h3>
        <p>Jl. Umban Sari (Patin) No. 1 Rumbai, Pekanbaru - 28265 Riau, Indonesia</p>
        <p><i class="fa-solid fa-phone"></i> +62 761 53939</p>
        <p><i class="fa-solid fa-envelope"></i> info@pcr.ac.id</p>
      </div>
      <div class="footer-right">
        <h3 class="text-xl font-bold">Follow Us</h3><br>
        <a href="#" target="_blank" class="text-black hover:text-white"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" target="_blank" class="text-black hover:text-white"><i class="fa-brands fa-twitter"></i></a>
        <a href="#" target="_blank" class="text-black hover:text-white"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" target="_blank" class="text-black hover:text-white"><i class="fa-brands fa-linkedin-in"></i></a>
      </div>
    </div>
    </div>
    <div class="footer-bottom mt-4 border-t border-black pt-4">
      <p>&copy; 2024 Politeknik Caltex Riau.</p>
    </div>
  </footer>
  <!-- footer end -->



 


  <!--===== SCROLL REVEAL =====  !!ini harus diletakan diatas dari main java!!-->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Main java script -->
  <script src="<?= BASE_URL; ?>assets/js/main.js"></script>

</body>

</html>