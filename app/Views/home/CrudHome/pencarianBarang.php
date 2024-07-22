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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
 
  <!-- Fontawesome Icon -->
  <script src="https://kit.fontawesome.com/c23fedd423.js" crossorigin="anonymous"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar">
    <a href="#"><img class="logo" src="<?= BASE_URL; ?>assets/images/logo-web.png"></a>
    <div class="navbar-login">
      <a href="<?= BASE_URL; ?>">Home <i class="fa-solid fa-house" style="color: #5e72e4;"></i></a>
    </div>
    <a href="#menu" id="hamburger-menu">
      <button class="menu"
        onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))"
        aria-label="Main Menu">
        <svg width="100" height="100" viewBox="0 0 100 100">
          <path class="line line1"
            d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
          <path class="line line2" d="M 20,50 H 80" />
          <path class="line line3"
            d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
        </svg>
      </button>
    </a>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Section Start -->
  <div class="min-h-screen  flex justify-center items-center">
    <div class=" bg-indigo-500 rounded-lg p-14 px-20">
      <form action="cariBarang" method="post" enctype="multipart/form-data">
        <h1 class="text-center font-bold text-white text-3xl mb-4">Temukan Barang Anda</h1>
        <!-- <div class="sm:flex items-center bg-white rounded-lg overflow-hidden px-2 py-2 justify-between"> -->
        <input class="text-base text-gray-400 flex-grow outline-none px-2" type="text" placeholder="Masukan No Resi"
          name="no_resi" id="no_resi" />
        <div class="sm:flex items-center px-2 rounded-lg space-x-4 mx-auto">
          <button class="bg-white text-gray-400 text-base rounded-lg px-4 py-2 font-semibold">Temukan</button>
        </div>
    </div>
    </form>
  </div>
  </div>

  <!-- SCROLL REVEAL -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!-- Main JavaScript -->
  <script src="<?= BASE_URL; ?>assets/js/main.js"></script>

</body>

</html>