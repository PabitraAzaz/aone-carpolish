<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>

<!-- HERO BANNER -->
<main>
  <header class="app-nav">
    <button class="app-nav-icon back-btn" aria-label="Go Back">
      <svg viewBox="0 0 24 24" fill="none">
        <path d="M15 18L9 12L15 6" />
      </svg>
    </button>

    <h1>Premium Car Detailing & Ceramic Coating in Newtown, Kolkata</h1>

    <button class="app-nav-icon action-btn" aria-label="Share">
      <svg viewBox="0 0 24 24" fill="none">
        <path d="M4 12v7a1 1 0 001 1h14a1 1 0 001-1v-7" />
        <path d="M12 16V4" />
        <path d="M8 8l4-4 4 4" />
      </svg>
    </button>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      /* BACK BUTTON */
      const backBtn = document.querySelector('.app-nav .back-btn');
      if (backBtn) {
        backBtn.addEventListener('click', () => {
          if (window.history.length > 1) {
            window.history.back();
          } else {
            window.location.href = '/'; // fallback (home)
          }
        });
      }

      /* SHARE BUTTON */
      const shareBtn = document.querySelector('.app-nav .action-btn');
      if (shareBtn) {
        shareBtn.addEventListener('click', async () => {
          const shareData = {
            title: document.title,
            text: 'Check out this service',
            url: window.location.href
          };

          // Native Share (Mobile)
          if (navigator.share) {
            try {
              await navigator.share(shareData);
            } catch (err) {
              console.log('Share cancelled');
            }
          }
          // Desktop fallback → copy link
          else {
            try {
              await navigator.clipboard.writeText(window.location.href);
              alert('Link copied to clipboard');
            } catch (err) {
              alert('Unable to copy link');
            }
          }
        });
      }

    });
  </script>

  <section class="service-1">
    <section class="app-hero-slider">
      <div class="slider-track">
        <img src="<?= base_url() ?>public/assets/img/services/full-car-body-1.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/full-car-body-2.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/full-car-body-3.png" alt="">
      </div>

      <div class="hero-overlay">
        <span class="summary-chip">Premium Shine</span>
        <h2>Full Car Body Wax Polish</h2>
        <p>Available in <?= esc($city ?? 'Your City') ?></p>

        <div class="summary-tags">
          <span>Paint Enhancement</span>
          <span>Surface Protection</span>
          <span>Deep Gloss Finish</span>
        </div>
      </div>

      <div class="slider-dots">
        <span class="active"></span>
        <span></span>
        <span></span>
      </div>
    </section>

    <div class="row p-0 m-0">

      <!-- LEFT CONTENT -->
      <div class="col-lg-8" style="overflow: hidden;">

        <section class="service-intro-text">
          <h2 class="service-heading">About Our Ceramic Coating & Full Detailing Service</h2>
          <p>
            Ceramic coating is a premium paint protection solution that enhances your car’s gloss while protecting it from UV rays, dust, pollution, water spots, oxidation, and minor scratches.
          </p>
          <p>
            Our home-based ceramic coating process ensures professional-grade results with long-lasting shine, easy maintenance, and improved resale value, all without leaving your home.

          </p>
        </section>

        <section class="service-block timeline-card ">
          <h2 class="service-heading">At Your Doorstep – All Under One Roof
          </h2>

          <ul class="timeline-list">
            <li>✔ Service at Home Only</li>
            <li> ✔ One Complete Package for All Cars</li>
            <li> ✔ Price Varies by Car Brand & Model</li>
            <li> ✔ Professional Tools & Premium Products</li>
          </ul>
        </section>


      </div>

      <div class="col-lg-4 d-none d-lg-block">
        <section class="package-card">
          <h3>Ceramic Coating Package</h3>

          <div class="package-price-row">
            <span class="package-price">₹7,999</span>
            <span class="package-tag">Sedan / Hatchback</span>
          </div>

          <p class="package-note">
            Price may vary based on vehicle size, condition, and coating option.
          </p>

          <hr>

          <ul class="package-details">
            <li>Service time: <strong>5–8 hours</strong></li>
            <li>Location: <strong>At your doorstep* / Workshop</strong></li>
            <li><strong>Advance booking required</strong></li>
          </ul>

          <button class="btn-primary">Call to Book</button>
          <button class="btn-secondary">Book Online</button>
        </section>
      </div>
    </div>



  </section>

  <section class="service-2">


    <section class="app-hero-slider">
      <div class="slider-track">
        <img src="<?= base_url() ?>public/assets/img/services/dashboard-1.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/dashboard-2.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/dashboard-3.png" alt="">
      </div>

      <div class="hero-overlay">
        <span class="summary-chip">Interior Care</span>
        <h2>Dashboard Cleaning & Wax Polish</h2>
        <p>Available in <?= esc($city ?? 'Your City') ?></p>

        <div class="summary-tags">
          <span>Dust Removal</span>
          <span>UV Protection</span>
          <span>Matte / Gloss Finish</span>
        </div>
      </div>

      <div class="slider-dots">
        <span class="active"></span>
        <span></span>
        <span></span>
      </div>
    </section>

    <div class="row p-0 m-0">

      <!-- LEFT CONTENT -->
      <div class="col-lg-8" style="overflow: hidden;">

        <section class="service-intro-text">
          <h2 class="service-heading">About Our Ceramic Coating & Full Detailing Service</h2>
          <p>
            Dashboard cleaning & wax polish is a premium interior care service designed to clean, protect, and restore your car’s dashboard and interior panels. It removes dust, stains, and buildup while applying a protective wax layer that prevents cracking, fading, and sun damage, keeping interiors fresh and well-maintained.
          </p>
        </section>

        <section class="service-block timeline-card ">
          <h2 class="service-heading">Why Choose A-One Car Polish in Newtown Kolkata?
          </h2>

          <ul class="timeline-list">
            <li><b>100% Doorstep Service</b> - No vehicle movement </li>
            <li><b>One All-in-One Service Package</b> - Exterior + Interior care </li>
            <li><b>Safe for All Car Types</b> - Hatchback, Sedan, SUV, Luxury Cars </li>
            <li><b>OEM Paint & Interior Safe</b> </li>
            <li><b>Ideal for Busy Professionals & Families</b> </li>
          </ul>
        </section>



      </div>

      <div class="col-lg-4 d-none d-lg-block">
        <section class="package-card">
          <h3>Ceramic Coating Package</h3>

          <div class="package-price-row">
            <span class="package-price">₹7,999</span>
            <span class="package-tag">Sedan / Hatchback</span>
          </div>

          <p class="package-note">
            Price may vary based on vehicle size, condition, and coating option.
          </p>

          <hr>

          <ul class="package-details">
            <li>Service time: <strong>5–8 hours</strong></li>
            <li>Location: <strong>At your doorstep* / Workshop</strong></li>
            <li><strong>Advance booking required</strong></li>
          </ul>

          <button class="btn-primary">Call to Book</button>
          <button class="btn-secondary">Book Online</button>
        </section>
      </div>
    </div>

  </section>

  <section class="service-3">


    <section class="app-hero-slider">
      <div class="slider-track">
        <img src="<?= base_url() ?>public/assets/img/services/vacuum-cleaning-1.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/vacuum-cleaning-2.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/vacuum-cleaning-3.png" alt="">
      </div>

      <div class="hero-overlay">
        <span class="summary-chip">Cabin Clean</span>
        <h2>Full Interior Vacuum Cleaning</h2>
        <p>Available in <?= esc($city ?? 'Your City') ?></p>

        <div class="summary-tags">
          <span>Dust-Free Cabin</span>
          <span> All Areas Covered</span>
          <span>Fresh Interior Feel</span>
        </div>
      </div>

      <div class="slider-dots">
        <span class="active"></span>
        <span></span>
        <span></span>
      </div>
    </section>

    <div class="row p-0 m-0">

      <!-- LEFT CONTENT -->
      <div class="col-lg-8" style="overflow: hidden;">

        <section class="service-intro-text">
          <h2 class="service-heading">About Full Interior Vacuum Cleaning</h2>
          <p>
            Full interior vacuum cleaning is a comprehensive cabin-cleaning service that removes dust, debris, and dirt from seats, carpets, footwells, boot space, and hard-to-reach areas. It improves air quality inside the car and maintains a neat, comfortable, and fresh interior environment.
          </p>
        </section>
      </div>

      <div class="col-lg-4 d-none d-lg-block">
        <section class="package-card">
          <h3>Ceramic Coating Package</h3>

          <div class="package-price-row">
            <span class="package-price">₹7,999</span>
            <span class="package-tag">Sedan / Hatchback</span>
          </div>

          <p class="package-note">
            Price may vary based on vehicle size, condition, and coating option.
          </p>

          <hr>

          <ul class="package-details">
            <li>Service time: <strong>5–8 hours</strong></li>
            <li>Location: <strong>At your doorstep* / Workshop</strong></li>
            <li><strong>Advance booking required</strong></li>
          </ul>

          <button class="btn-primary">Call to Book</button>
          <button class="btn-secondary">Book Online</button>
        </section>
      </div>
    </div>









  </section>

  <section class="service-4">
    <section class="app-hero-slider">
      <div class="slider-track">
        <img src="<?= base_url() ?>public/assets/img/services/seat-foam-wash-1.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/seat-foam-wash-2.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/seat-foam-wash-3.png" alt="">
      </div>

      <div class="hero-overlay">
        <span class="summary-chip">Deep Interior Refresh</span>
        <h2>All Seat Foam Wash & Polish</h2>
        <p>Available in <?= esc($city ?? 'Your City') ?></p>

        <div class="summary-tags">
          <span>Deep Fabric Cleaning</span>
          <span>Odour Removal</span>
          <span>Hygienic Finish</span>
        </div>
      </div>

      <div class="slider-dots">
        <span class="active"></span>
        <span></span>
        <span></span>
      </div>
    </section>

    <div class="row p-0 m-0">

      <!-- LEFT CONTENT -->
      <div class="col-lg-8" style="overflow: hidden;">

        <section class="service-intro-text">
          <h2 class="service-heading">About All Seat Foam Wash & Polish</h2>
          <p>
            All seat foam wash & polish is a deep interior cleaning service that targets fabric and leather seats. Using professional foam-based cleaners, this process removes dirt, stains, and odours while restoring softness and comfort, ensuring a clean, hygienic, and refreshed seating experience.
          </p>
        </section>

        <section class="service-block timeline-card ">
          <h2 class="service-heading">Complete Car Care – One Service, All Included</h2>
          <p>
            We offer one comprehensive detailing package that covers every aspect of your car, regardless of brand or model:
          </p>

          <ul class="timeline-list">
            <li>✔ Full Car Body Wax Polish</li>
            <li>✔ Premium Ceramic Coating Application</li>
            <li>✔ Dashboard Cleaning & Wax Polish</li>
            <li>✔ All Seat Foam Wash & Polish</li>
            <li>✔ Complete Interior Vacuum Cleaning</li>
            <li>✔ Nickel & Chrome Wax Polish</li>
            <li>✔ Headlamp Restoration & Glass Scratch Removal</li>
            <li>✔ Tyre, Trim & Exterior Finishing</li>
          </ul>
        </section>



      </div>

      <div class="col-lg-4 d-none d-lg-block">
        <section class="package-card">
          <h3>Ceramic Coating Package</h3>

          <div class="package-price-row">
            <span class="package-price">₹7,999</span>
            <span class="package-tag">Sedan / Hatchback</span>
          </div>

          <p class="package-note">
            Price may vary based on vehicle size, condition, and coating option.
          </p>

          <hr>

          <ul class="package-details">
            <li>Service time: <strong>5–8 hours</strong></li>
            <li>Location: <strong>At your doorstep* / Workshop</strong></li>
            <li><strong>Advance booking required</strong></li>
          </ul>

          <button class="btn-primary">Call to Book</button>
          <button class="btn-secondary">Book Online</button>
        </section>
      </div>
    </div>

  </section>

  <section class="service-5">
    <section class="app-hero-slider">

      <div class="slider-track">
        <img src="<?= base_url() ?>public/assets/img/services/nickle-polish-1.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/nickle-polish-2.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/nickle-polish-3.png" alt="">
      </div>

      <div class="hero-overlay">
        <span class="summary-chip">Metal Care</span>
        <h2>Nickel & Chrome Wax Polish</h2>
        <p>Available in <?= esc($city ?? 'Your City') ?></p>

        <div class="summary-tags">
          <span>Rust Protection</span>
          <span>Mirror Shine</span>
          <span>Long-Lasting Finish</span>
        </div>
      </div>

      <div class="slider-dots">
        <span class="active"></span>
        <span></span>
        <span></span>
      </div>
    </section>

    <div class="row p-0 m-0">

      <!-- LEFT CONTENT -->
      <div class="col-lg-8" style="overflow: hidden;">

        <section class="service-intro-text">
          <h2 class="service-heading">About Nickel & Chrome Wax Polish</h2>
          <p>
            Nickel & chrome wax polish is a specialised detailing service that restores shine to metal parts such as grills, exhaust tips, emblems, and trims. It removes oxidation, water marks, and dullness while adding a protective layer that prevents rust and corrosion, enhancing your car’s overall appearance.
          </p>
        </section>

        <section class="service-block timeline-card ">
          <h2 class="service-heading">Service Timelines & Protection</h2>


          <ul class="timeline-list">
            <li> <b>⏳ Service Duration :</b> 2–3 Hours (varies by car condition) </li>
            <li> <b>🎨 100% OEM Paint & Interior Safe</b></li>
            <li> <b> 🛡 Ceramic Protection</b> Long-lasting shine & protection </li>
          </ul>
        </section>


      </div>

      <div class="col-lg-4 d-none d-lg-block">
        <section class="package-card">
          <h3>Ceramic Coating Package</h3>

          <div class="package-price-row">
            <span class="package-price">₹7,999</span>
            <span class="package-tag">Sedan / Hatchback</span>
          </div>

          <p class="package-note">
            Price may vary based on vehicle size, condition, and coating option.
          </p>

          <hr>

          <ul class="package-details">
            <li>Service time: <strong>5–8 hours</strong></li>
            <li>Location: <strong>At your doorstep* / Workshop</strong></li>
            <li><strong>Advance booking required</strong></li>
          </ul>

          <button class="btn-primary">Call to Book</button>
          <button class="btn-secondary">Book Online</button>
        </section>
      </div>
    </div>
  </section>

  <section class="service-6">
    <section class="app-hero-slider">

      <div class="slider-track">
        <img src="<?= base_url() ?>public/assets/img/services/nickle-polish-1.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/nickle-polish-2.png" alt="">
        <img src="<?= base_url() ?>public/assets/img/services/nickle-polish-3.png" alt="">
      </div>

      <div class="hero-overlay">
        <span class="summary-chip">Visibility Restore</span>
        <h2>Headlamp & All Glass Scratch Removing</h2>
        <p>Available in <?= esc($city ?? 'Your City') ?></p>

        <div class="summary-tags">
          <span>Improved Visibility</span>
          <span>Scratch Reduction</span>
          <span>Crystal-Clear Finish</span>
        </div>
      </div>

      <div class="slider-dots">
        <span class="active"></span>
        <span></span>
        <span></span>
      </div>
    </section>

    <div class="row p-0 m-0">

      <!-- LEFT CONTENT -->
      <div class="col-lg-8" style="overflow: hidden;">

        <section class="service-intro-text">
          <h2 class="service-heading">About Headlamp & All Glass Scratch Removing</h2>
          <p>
            Headlamp and glass scratch removal is a precision restoration service that reduces minor scratches, swirl marks, and haze on headlights and glass surfaces. This process enhances clarity, improves night-time visibility, and restores a clean, clear finish for safer and more confident driving.
          </p>
        </section>

        <section class="service-block timeline-card ">
          <h2 class="service-heading">Simple Steps After Booking</h2>


          <ul class="timeline-list">
            <li> <b>Book Your Slot :</b> Choose your preferred date & time </li>
            <li> <b>On-Site Service at Home</b> Our team arrives fully equipped </li>
            <li> <b>Service Completion</b> Professional detailing done at your location </li>
            <li> <b>Instant Delivery</b> Car ready to drive the same day </li>
          </ul>
        </section>


      </div>

      <div class="col-lg-4 d-none d-lg-block">
        <section class="package-card">
          <h3>Ceramic Coating Package</h3>

          <div class="package-price-row">
            <span class="package-price">₹7,999</span>
            <span class="package-tag">Sedan / Hatchback</span>
          </div>

          <p class="package-note">
            Price may vary based on vehicle size, condition, and coating option.
          </p>

          <hr>

          <ul class="package-details">
            <li>Service time: <strong>5–8 hours</strong></li>
            <li>Location: <strong>At your doorstep* / Workshop</strong></li>
            <li><strong>Advance booking required</strong></li>
          </ul>

          <button class="btn-primary">Call to Book</button>
          <button class="btn-secondary">Book Online</button>
        </section>
      </div>
    </div>

    <?= $this->include('web/components/car_modal.php') ?>
    <div class="bottom-cta">
      <span id="selectedPrice">₹999 onwards</span>
      <button id="openCarModal">Select Car</button>
    </div>








  </section>

  <style>
    /* =====================================================
        DESKTOP / LAPTOP DEFAULT (PC FIRST)
          ===================================================== */

    :root {
      --white: #ffffff;
      --bacckground: #f6f7f9;
      --light-grey: #f1f2f4;
      --border-grey: #e3e4e8;
      --blue: #3b82f6;
      --shadow: 0 6px 18px rgba(0, 0, 0, .08);
      --shadow-heavy: 0 18px 50px rgba(0, 0, 0, .25);
      --brand-color-2: #ff3d2f;
      --desktop-header-height: 88px;
    }

    /* RESET */
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background: #f2f4f7;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    /* =========================
        MAIN DESKTOP LAYOUT
          ========================= */

    main {
      max-width: 1320px;
      margin: 0 auto;
      padding: calc(var(--desktop-header-height) + 24px) 24px 160px;
      /* display: grid;
            grid-template-columns: minmax(0, 1fr) 380px;
            gap: 32px; */
    }

    /* =========================
        HERO (DESKTOP)
      ========================= */

    .app-hero-slider {
      margin-top: 24px;
      margin-bottom: 24px;
      grid-column: 1 / -1;
      grid-row: 0;
      position: relative;
      height: 420px;
      border-radius: 28px;
      overflow: hidden;
    }

    .slider-track {
      display: flex;
      height: 100%;
      animation: slideHero 18s infinite;
    }

    .slider-track img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      flex-shrink: 0;
    }

    @keyframes slideHero {

      0%,
      30% {
        transform: translateX(0);
      }

      35%,
      65% {
        transform: translateX(-100%);
      }

      70%,
      100% {
        transform: translateX(-200%);
      }
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, .7), rgba(0, 0, 0, .2));
      color: #fff;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
    }

    .hero-overlay h2 {
      font-size: 2.4rem;
      line-height: 1.2;
      max-width: 720px;
      margin: 8px 0 4px;
    }

    .hero-overlay p {
      font-size: 1.05rem;
      opacity: .9;
    }

    .summary-chip {
      background: rgba(255, 255, 255, .2);
      padding: 8px 14px;
      border-radius: 999px;
      font-size: .8rem;
      width: fit-content;
    }

    .summary-tags {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 14px;
    }

    .summary-tags span {
      background: rgba(255, 255, 255, .15);
      padding: 8px 14px;
      border-radius: 999px;
      font-size: .75rem;
    }

    .slider-dots {
      position: absolute;
      bottom: 14px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 6px;
    }

    .slider-dots span {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: rgba(255, 255, 255, .5);
    }

    .slider-dots span.active {
      background: #fff;
    }

    /* =========================
      LEFT CONTENT (DESKTOP)
      ========================= */

    .service-intro-text,
    .service-block,
    .app-card,
    .trust-strip,
    .faq-section {
      grid-column: 1 / 2;
      background: var(--white);
      padding: 14px;
      border-radius: 22px;
      margin-bottom: 10px;
      box-shadow: var(--shadow);
    }

    .service-heading {
      font-size: 1.2rem;
      font-weight: 500;
      margin-bottom: 8px;
    }

    .service-block p,
    .step-item p,
    .timeline-list li,
    .included-list li {
      font-size: 1rem;
      line-height: 1.65;
      color: #444;
    }

    /* Timeline */
    .timeline-list {
      list-style: none;
      padding: 0;
      margin: 8px 0 0;
    }

    /* Steps */
    .step-item {
      display: flex;
      gap: 14px;
    }

    .step-item span {
      min-width: 32px;
      height: 32px;
      background: var(--brand-color-2);
      color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
    }

    /* Included list desktop columns */
    .included-list {
      list-style: none;
      padding: 0;
      margin-top: 12px;
      columns: 2;
      column-gap: 32px;
    }

    /* =========================
      RIGHT SIDEBAR (STICKY PRICE)
      ========================= */

    .package-card {
      grid-column: 2 / 3;
      grid-row: 3;
      position: sticky;
      top: 96px;
      align-self: start;
      background: #fff7eb;
      padding: 26px;
      border-radius: 24px;
      box-shadow: var(--shadow);
    }

    .package-card h3 {
      font-size: 1.25rem;
      font-weight: 800;
    }

    .package-price {
      font-size: 1.8rem;
      font-weight: 800;
    }

    .package-price-row {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .package-tag {
      background: #ffe08a;
      color: #6b5200;
      padding: 4px 10px;
      border-radius: 999px;
      font-size: .7rem;
      font-weight: 700;
    }

    .btn-primary,
    .btn-secondary {
      width: 100%;
      border: none;
      padding: 12px;
      border-radius: 10px;
      font-weight: 800;
      cursor: pointer;
    }

    .btn-primary {
      background: #222;
      color: #fff;
      margin-bottom: 10px;
    }

    .btn-secondary {
      background: #f1f1f1;
      color: #222;
    }

    /* =========================
      FAQ
      ========================= */

    .faq-item {
      border-bottom: 1px solid var(--border-grey);
    }

    .faq-question {
      width: 100%;
      background: none;
      border: none;
      padding: 18px 0;
      text-align: left;
      font-size: 1rem;
      font-weight: 700;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
    }

    /* FAQ ANSWER */
    .faq-answer {
      color: black;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.35s ease, opacity 0.25s ease;
      opacity: 0;
    }

    /* ACTIVE STATE */
    .faq-item.active .faq-answer {
      max-height: 240px;
      opacity: 1;
      margin-bottom: 12px;
    }

    /* ICON */
    .faq-icon {
      transition: transform 0.3s ease;
      font-size: 1rem;
    }

    /* ROTATE ICON */
    .faq-item.active .faq-icon {
      transform: rotate(180deg);
    }

    /* =========================
      REVIEW
      ========================= */

    .review-card {
      /* width: 100%; */
      display: flex;
      gap: 14px;
      background: var(--light-grey);
      padding: 18px;
      border-radius: 18px;
    }

    .avatar {
      width: 46px;
      height: 36px;
      border-radius: 50%;
      background: var(--blue);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
    }

    /* =========================
      BOTTOM CTA (DESKTOP)
      ========================= */

    .bottom-cta {
      position: fixed;
      bottom: 24px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--white);
      backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      padding: 18px 28px;
      border-radius: 18px;
      max-width: 1320px;
      width: calc(100% - 64px);
      box-shadow: 0 10px 28px rgba(0, 0, 0, 0.18);
      justify-content: space-between;
      z-index: 999;
    }

    .bottom-cta button {
      background: linear-gradient(135deg, #f75e54ff, #ff3d2f);
      color: #fff;
      border: none;
      padding: 8px 14px;
      border-radius: 999px;
      font-size: 0.8rem;
      font-weight: 800;
      cursor: pointer;
      box-shadow: 0 6px 16px rgba(255, 122, 24, 0.45);
    }

    .bottom-cta button:active {
      transform: scale(0.96);
    }

    /* =========================
      REVIEWS – DESKTOP
      ========================= */

    .reviews-wrapper {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }

    .review-card {
      display: flex;
      gap: 14px;
      background: var(--light-grey);
      padding: 18px;
      border-radius: 18px;
    }

    /* =====================================================
      MOBILE ONLY (APP UI)
      ===================================================== */

    @media (max-width: 767px) {

      body {
        background: var(--bacckground);
      }

      main {
        padding: 0px;
        display: block;
        max-width: 100%;
        padding-bottom: 88px;
        background: var(--bacckground);
      }

      .app-nav {
        position: sticky;
        top: 0;
        /* ✅ KEY FIX */
        z-index: 999;
        height: 56px;
        background: #ffffff;
        display: grid;
        grid-template-columns: 44px 1fr 44px;
        align-items: center;
        padding: 0 10px;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
      }

      /* ICON BUTTON */
      .app-nav-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #f3f4f6;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
      }

      /* ICON SVG */
      .app-nav-icon svg {
        width: 20px;
        height: 20px;
        stroke: #ff3d2f;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
      }

      /* HOVER / ACTIVE */
      .app-nav-icon:hover {
        background: #e5e7eb;
      }

      .app-nav-icon:active {
        transform: scale(0.94);
      }

      /* TITLE */
      .app-nav h1 {
        margin: 0;
        text-align: center;
        font-size: 0.95rem;
        font-weight: 700;
        color: #111827;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .app-hero-slider {
        height: 220px;
        margin-top: 0px;
        margin-bottom: 0px;
      }

      .hero-overlay {
        padding: 16px;
      }

      .hero-overlay h2 {
        font-size: 1.25rem;
      }

      .hero-overlay p {
        font-size: .8rem;
      }

      .service-intro-text,
      .service-block,
      .app-card,
      .trust-strip,
      .faq-section,
      .app-hero-slider {
        border-radius: 0px;
      }

      .package-card {
        border-radius: 18px;
      }

      .service-intro-text,
      .service-block,
      .app-card,
      .trust-strip,
      .faq-section,
      .service-block:not(.timeline-card) {
        grid-column: 1 / 2;
        grid-row: 3;
      }

      .step-item {
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed #e5e7eb;
      }

      .step-item span {
        min-width: 25px;
        height: 25px;
        font-weight: 500;
      }

      .step-item:last-child {
        border-bottom: none;
      }

      .step-item p {
        font-size: 0.9rem;
        margin-bottom: 0px;
      }

      .package-card {
        position: static;
      }

      .included-list {
        columns: 1;
      }

      .bottom-cta {
        position: fixed;
        bottom: 16px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        border-radius: 999px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.18);
        z-index: 1000;
        width: 90%;
      }

      .bottom-cta span {
        font-size: 0.9rem;
        font-weight: 800;
        color: #111;
        white-space: nowrap;
      }

      .bottom-cta button {
        background: linear-gradient(135deg, #f75e54ff, #ff3d2f);
        color: #fff;
        border: none;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 6px 16px rgba(255, 122, 24, 0.45);
      }

      .bottom-cta button:active {
        transform: scale(0.96);
      }


      /* =========================
        REVIEWS – MOBILE SLIDER
        ========================= */

      .reviews-wrapper {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        padding-bottom: 8px;
      }

      .review-card {
        width: 90%;
        scroll-snap-align: start;
        flex-shrink: 0;
      }

      /* Hide scrollbar */
      .reviews-wrapper::-webkit-scrollbar {
        display: none;
      }

      .reviews-wrapper {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }
    }

    /* ===============================
        APP NAV → MOBILE ONLY
      =============================== */

    /* Desktop / Laptop */
    @media (min-width: 768px) {
      .app-hero-slider {
        margin-top: 0;
      }

      .app-nav {
        display: none;
      }
    }

    /* Mobile */
    @media (max-width: 767px) {

      .main-header,
      .bottom-nav {
        display: none;
      }
    }
  </style>

</main>

<?= $this->endSection(); ?>