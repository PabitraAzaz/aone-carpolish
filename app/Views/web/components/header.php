<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A-one Car Polish</title>

  <!-- Bootstrap (optional, for your global site styles) -->
  <link href="<?= base_url() ?>public/assets/css/bootstrap-bundle-min.css" rel="stylesheet">

  <!-- Bootstrap JS  -->
  <script src="<?= base_url() ?>public/assets/js/bootstrap-bundle-min.js"></script>

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/swiper-bundle.min.css" />

  <!-- SwiperJS JS -->
  <script src="<?= base_url() ?>public/assets/js/swiper-bundle-min.js"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/font-awesome-min.css">

  <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/bootstrap-icons.css">

  <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/googleapis.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/style.css?v=124" />
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/header.css?v=124" />

  <!-- IMMEDIATE PRELOADER SKIP - Before DOM renders -->
  <script>
    (function() {
      // Check sessionStorage immediately on page load
      if (sessionStorage.getItem("preloaderShown") === "true") {
        // Create inline style to hide preloader before it renders
        const style = document.createElement("style");
        style.innerHTML = `
          #preloader {
            display: none !important;
            visibility: hidden !important;
          }
        `;
        document.head.appendChild(style);
      }
    })();
  </script>

</head>

<body>

  <!-- ===================== HEADER ===================== -->
  <header class="main-header">
    <div class="header-container">

      <!-- Brand Logo (Mobile) -->
      <a href="<?= base_url() ?>" class="logo logo--mobile">
        <img src="<?= base_url('public/assets/img/logo/logo.png') ?>" alt="AONE Car Polish" />
      </a>

      <!-- Mobile Brand Text -->
      <span class="mobile-brand-text"><span style="color: red;">A-One</span> Car Polish</span>

      <!-- Brand Logo (Desktop) -->
      <a href="<?= base_url() ?>" class="logo logo--desktop">
        <img src="<?= base_url('public/assets/img/logo/logo-black.png') ?>" alt="A-One Car Polish Logo" />
      </a>

      <!-- Profile Icon -->
      <a class="header-icon" id="profileBtn" href="<?= base_url('profile') ?>">
  <i class="fas fa-user"></i>
  <span>Profile</span>
</a>
      <style>
        .header-icon {
          display: flex;
          flex-direction: column;
          /* Stack items vertically */
          align-items: center;
          /* Center horizontally */
          text-decoration: none;
        }

        .header-icon i {
          font-size: 18px;
          /* Adjust icon size if needed */
        }

        .header-icon span {
          font-size: 10px;
          margin-top: 4px;
        }
      </style>
    </div>

    <!-- Desktop Navigation -->
    <nav class="desktop-nav">
      <a href="<?= base_url() ?>" class="nav-link active">Home</a>
      <a href="<?= base_url('services') ?>" class="nav-link">Services</a>
      <a href="<?= base_url('before-after') ?>" class="nav-link">Before/After</a>
      <a href="<?= base_url('contact-us') ?>" class="nav-link">Contact</a>
      <a href="<?= base_url('blogs') ?>" class="nav-link">Blogs</a>
    </nav>
  </header>

  <style>
    /* Mobile brand text */
    .mobile-brand-text {
      display: none;
      font-weight: 700;
      font-size: 24px;
      color: #111;
      white-space: nowrap;
    }

    /* Mobile view only */
    @media (max-width: 768px) {
      .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .mobile-brand-text {
        display: block;
        flex: 1;
        text-align: center;
      }
    }
  </style>