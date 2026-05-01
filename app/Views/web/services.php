<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>

<!-- ============== Banner ================= -->

<!-- Banner with animated "Services" text -->
<div class="banner service-banner">
  <h1><span class="typed-text typed-service">Services</span></h1>
</div>
<!-- ==================================== -->


<!-- ============= Car Services =================  -->
<section style="max-width: 1500px; margin: auto;">
  <div class="padd-mar">
    <h2 class="section-title">Our Premium Services</h2>
  </div>

  <div class="services-grid-2col">
    <!-- Left column -->
    <div class="services-col">

      <!-- Tall card with YouTube video -->
      <div class="service-card tall">
        <div class="card-img-wrapper">
          <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Premium Detailing">
          <div class="play-button">&#9658;</div>
        </div>
        <div class="card-content">
          <div class="card-title">Premium Detailing</div>
        </div>
      </div>

      <!-- Short card with static image -->
      <div class="service-card short">
        <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Mini Wash">
        <div class="card-content">
          <div class="card-title">Mini Wash</div>
        </div>
      </div>

      <!-- Another tall card with YouTube video -->
      <div class="service-card tall">
        <div class="card-img-wrapper">
          <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Luxury Polish">
          <div class="play-button">&#9658;</div>
        </div>
        <div class="card-content">
          <div class="card-title">Luxury Polish</div>
        </div>
      </div>

      <!-- Another short card with static image -->
      <div class="service-card short">
        <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Seat Foam Wash">
        <div class="card-content">
          <div class="card-title">Seat Foam Wash</div>
        </div>
      </div>

    </div>

    <!-- Right column -->
    <div class="services-col">

      <div class="service-card short">
        <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Vacuum Interior">
        <div class="card-content">
          <div class="card-title">Vacuum Interior</div>
        </div>
      </div>

      <div class="service-card tall">
        <div class="card-img-wrapper">
          <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Scratch Removal">
          <div class="play-button">&#9658;</div>
        </div>
        <div class="card-content">
          <div class="card-title">Scratch Removal</div>
        </div>
      </div>

      <div class="service-card short">
        <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Seat Foam Wash">
        <div class="card-content">
          <div class="card-title">Seat Foam Wash</div>
        </div>
      </div>

      <div class="service-card tall">
        <div class="card-img-wrapper">
          <img class="card-img" src="<?= base_url() ?>public/assets/img/serv.jpeg" alt="Scratch Removal">
          <div class="play-button">&#9658;</div>
        </div>
        <div class="card-content">
          <div class="card-title">Scratch Removal</div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ================================================================ -->

<hr>

<!-- Brands Section -->
<section class="brand-glass-section" style="max-width: 1500px; margin: auto;">
  <h2 class="section-title">Brands We Trust</h2>

  <div class="swiper glassBrandSwiper">
    <div class="swiper-wrapper">

      <!-- BRAND CARD -->
      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/motul1.png') ?>" alt="Motul">
      </div>

      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/carpro.png') ?>" alt="Carpro">
      </div>

      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/Sonax.png') ?>" alt="Carpro">
      </div>

      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/armor.jpg') ?>" alt="Carpro">
      </div>
      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/motul1.png') ?>" alt="Motul">
      </div>

      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/turtleWax.png') ?>" alt="TurtleWax">
      </div>
      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/autoglm.png') ?>" alt="Autoglm">
      </div>
      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/carpro.png') ?>" alt="Carpro">
      </div>



      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/armor.jpg') ?>" alt="Carpro">
      </div>
      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/Sonax.png') ?>" alt="Carpro">
      </div>
      <div class="swiper-slide glass-card">
        <img src="<?= base_url('public/assets/img/brand/autoglm.png') ?>" alt="Carpro">
      </div>


    </div>
  </div>
</section>

<hr>

<style>
  /* SECTION BACKGROUND */
  .brand-glass-section {
    background: var(--background);
    padding: 20px 0;
    overflow: hidden;
  }



  /* SLIDER */
  .glassBrandSwiper {
    width: 90%;
    margin: auto;
  }

  /* GLASS CARD */
  .glass-card {
    position: relative;
    height: 160px;
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    transition: transform 0.4s ease;
    opacity: 1 !important;
    transform: none !important;
  }

  .glass-card img {
    max-width: 120px;
    filter: grayscale(0%);
    opacity: 0.9;
    transition: all 0.4s ease;
  }

  /* HOVER */
  .glass-card:hover {
    transform: translateY(-6px) scale(1.04);
  }

  .glass-card:hover img {
    filter: grayscale(0);
    opacity: 1;
  }

  /* HEADLIGHT SWEEP */
  .glass-card::after {
    content: "";
    position: absolute;
    top: 0;
    left: -150%;
    width: 120%;
    height: 100%;
    background: linear-gradient(120deg,
        transparent 25%,
        rgba(255, 255, 255, 0.55),
        transparent 75%);
    transform: skewX(-25deg);
  }

  .glass-card:hover::after {
    animation: headlight 1.1s ease;
  }

  @keyframes headlight {
    from {
      left: -150%;
    }

    to {
      left: 150%;
    }
  }

  @media (max-width: 576px) {
    .glass-card {
      height: 120px;
      padding-top: 15px;
    }

    .glass-card img {
      max-width: 90px;

    }
  }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  new Swiper(".glassBrandSwiper", {
    loop: true,
    speed: 900,
    autoplay: {
      delay: 2200,
      disableOnInteraction: false,
    },
    slidesPerView: 5,
    spaceBetween: 30,
    breakpoints: {
      0: {
        slidesPerView: 3,
        spaceBetween: 12
      },
      576: {
        slidesPerView: 3,
        spaceBetween: 16
      },
      768: {
        slidesPerView: 3.5
      },
      1024: {
        slidesPerView: 5
      },
    },
  });
</script>

<!-- ============== Types of Car Wash============================= -->
<section style="max-width: 1500px; margin: auto;">
  <div class="container car-wash padd-mar">
    <h3 class="section-title">Types of Car Washes</h4>
      <div class="row g-3">
        <!-- Basic Wash -->
        <div class="col-6 col-md-3">
          <div class="car-wash-type-card">
            <img src="<?= base_url() ?>public/assets/img/car_wash/basic_wash.png" class="car-wash-type-bg" alt="Basic Wash">
            <div class="car-wash-type-overlay"></div>
            <div class="car-wash-type-content">
              <div class="car-wash-type-title">Basic Wash</div>
            </div>
          </div>

        </div>
        <!-- Foam Wash -->
        <div class="col-6 col-md-3">
          <div class="car-wash-type-card">
            <img src="<?= base_url() ?>public/assets/img/car_wash/foam_wash.png" class="car-wash-type-bg" alt="Foam Wash">
            <div class="car-wash-type-overlay"></div>
            <div class="car-wash-type-content">
              <div class="car-wash-type-title">Foam Wash</div>
            </div>
          </div>
        </div>
        <!-- Interior Cleaning -->
        <div class="col-6 col-md-3">
          <div class="car-wash-type-card">
            <img src="<?= base_url() ?>public/assets/img/car_wash/interior_cleaning.png" class="car-wash-type-bg" alt="Interior Cleaning">
            <div class="car-wash-type-overlay"></div>
            <div class="car-wash-type-content">
              <div class="car-wash-type-title">Interior Cleaning</div>
            </div>
          </div>
        </div>
        <!-- Ceramic Coating -->
        <div class="col-6 col-md-3">
          <div class="car-wash-type-card">
            <img src="<?= base_url() ?>public/assets/img/car_wash/ceramic_coating.png" class="car-wash-type-bg" alt="Ceramic Coating">
            <div class="car-wash-type-overlay"></div>
            <div class="car-wash-type-content">

              <div class="car-wash-type-title">Ceramic Coating</div>
            </div>
          </div>
        </div>
        <!-- Add more types as needed -->
      </div>
  </div>
</section>
<!-- ========================== -->

<!-- =============== Tyre POlish =================== -->
<section style="max-width: 1500px; margin: auto;">
  <div class="tyre-polish-deals-section padd-mar">
    <div class="container">
      <div class="section-title">Tyre Polish Types</div>
      <div class="tyre-polish-scroll">
        <!-- Water Based -->
        <div class="tyre-polish-card container">
          <img src="<?= base_url() ?>public/assets/img/tyre.png" class="tyre-polish-img" alt="Water Based Polish">
          <div class="tyre-polish-title">Water Based</div>
          <div class="tyre-polish-label">Matte/Satin Finish</div>
        </div>
        <!-- Solvent/Silicone Based -->
        <div class="tyre-polish-card container">
          <img src="<?= base_url() ?>public/assets/img/tyre.png" class="tyre-polish-img" alt="Solvent Polish">
          <div class="tyre-polish-title">Solvent Based</div>
          <div class="tyre-polish-label">High Gloss Shine</div>
        </div>
        <!-- Gel Polish -->
        <div class="tyre-polish-card container">
          <img src="<?= base_url() ?>public/assets/img/tyre.png" class="tyre-polish-img" alt="Gel Polish">
          <div class="tyre-polish-title">Gel Polish</div>
          <div class="tyre-polish-label">Durable Protection</div>
        </div>
        <!-- Spray Shine -->
        <div class="tyre-polish-card container">
          <img src="<?= base_url() ?>public/assets/img/tyre.png" class="tyre-polish-img" alt="Spray Shine">
          <div class="tyre-polish-title">Spray Shine</div>
          <div class="tyre-polish-label">Fast Application</div>
        </div>
        <!-- Foam Cleaner/Polish -->
        <div class="tyre-polish-card container">
          <img src="<?= base_url() ?>public/assets/img/tyre.png" class="tyre-polish-img" alt="Foam Polish">
          <div class="tyre-polish-title">Foam Polish</div>
          <div class="tyre-polish-label">Clean + Polish</div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ======================================== -->

<!-- ================ Testimonial Section ================= -->
<section class="google-review-section padd-mar">
  <div class="container">
    <div class="google-review-heading">
      <div class="section-title">Google Reviews</div>
    </div>

    <div class="swiper googleReviewSwiper">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="gr-card">
            <span class="gr-quote">“</span>

            <div class="gr-badge">
              <img src="<?= base_url() ?>public/assets/img/g-logo.png">
              <span>Google Review</span>
            </div>

            <div class="gr-stars">★★★★★</div>

            <p class="gr-text">
              Excellent service and authentic gemstones. Very professional guidance.
              Highly recommended for genuine gemstone purchases.
            </p>

            <div class="gr-user">
              <img src="<?= base_url() ?>public/assets/img/testimonial_icon.png">
              <div>
                <h4>Alena Rosser</h4>
                <span>Local Guide • 8 Reviews</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Duplicate -->
        <div class="swiper-slide">
          <div class="gr-card">
            <span class="gr-quote">“</span>

            <div class="gr-badge">
              <img src="<?= base_url() ?>public/assets/img/g-logo.png">
              <span>Google Review</span>
            </div>

            <div class="gr-stars">★★★★★</div>

            <p class="gr-text">
              One of the best gemstone shops in Kolkata. Trusted and transparent.
            </p>

            <div class="gr-user">
              <img src="<?= base_url() ?>public/assets/img/testimonial_icon.png">
              <div>
                <h4>Manish Bhaskar</h4>
                <span>Local Guide • 12 Reviews</span>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="swiper-pagination"></div>
    </div>
  </div>

</section>
<!-- ======================================== -->

<?= $this->endSection(); ?>