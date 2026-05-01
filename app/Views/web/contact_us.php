<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>



<!-- ========================================== -->

<div class="banner contact-banner">
  <h1><span class="typed-text typed-contact">Contact Us</span></h1>
</div>

<!-- ========================================== -->

<section class="contact-info-section container-row padd-mar">
  <div class="row gy-4 justify-content-center">
    <div class="col-12 col-md-4 info-col">
      <div class="info-card">
        <div class="info-icon"><i class="fas fa-phone"></i></div>
        <h6 class="info-title">Phone</h6>
        <p class="info-text">+(91) 85850 52925<br>+(91) 8585052925</p>
      </div>
    </div>
    <div class="col-12 col-md-4 info-col">
      <div class="info-card">
        <div class="info-icon"><i class="fas fa-envelope"></i></div>
        <h6 class="info-title">Email</h6>
        <p class="info-text">care@aonecarpolish.com<br>care@aonecarpolish.com</p>
      </div>
    </div>
    <div class="col-12 col-md-4 info-col">
      <div class="info-card">
        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
        <h6 class="info-title">Address</h6>
        <p class="info-text">5D, Newtown Square, Near Chinar Park, Newtown AA-II, <br>Kolkata - 700136, West Bengal</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= Google Maps================== -->
<style>
  .section-title {
    padding-bottom: 30px;
  }

  .map-box {
    border-radius: 18px;
    overflow: hidden;
    box-shadow: var(--shadow-heavy);
  }

  /* Optional smooth hover */
  .map-box:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    transition: 0.3s ease;
  }
</style>
<div class="container-row padd-mar" style="max-width: 1500px; margin: auto;">
  <h2 class="section-title">Our Working Area</h2>

  <div class="map-box">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58940.98248160649!2d88.49280095!3d22.58615595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275350398a5b9%3A0x75e165b244323425!2sNewtown%2C%20Kolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1763545191119!5m2!1sen!2sin"
      width="100%" height="450" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</div>

<!-- =========================================== -->

<section class="contact-section container padd-mar">
  <div class="row g-4 align-items-center">
    <!-- Image Column -->
    <div class="col-12 col-md-6 col-lg-6">
      <img src="<?= base_url() ?>public/assets/img/contact_us.jpeg" alt="Contact Us" class="contact-image" />
    </div>
    <!-- Form Column -->
    <div class="col-12 col-md-6 col-lg-6">
      <form class="contact-form" method="POST">
          <h3 class="section-title"> Let’s Talk to an experts</h3>
          <p></p>
          <input type="text" name="username" class="form-control" placeholder="Full Name" required />
          <input type="email" name="email" class="form-control" placeholder="Email Address" required />
          <input type="tel" name="phone" class="form-control" placeholder="Phone Number" />
          <textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea>
          <button type="submit" class="btn-submit">Send Message</button>
      </form>
    </div>
  </div>
</section>

<!-- =================================== -->

<?= $this->endSection(); ?>