<!-- Do NOT wrap this in a Bootstrap .container -->
<div class="polish-hero-bg padd-mar">
  <div class="w-100">
    <div class="polish-hero-title">
      India's fastest<br>car polish service
      <span class="polish-hero-heart">&hearts;</span>
    </div>
    <div class="polish-hero-brand">Aone Car Polish</div>
  </div>
</div>

<!-- Sticky Bottom Nav (Mobile) -->
<nav class="bottom-nav">
  <a href="<?= base_url() ?>" class="nav-item active">
    <i class="fas fa-home"></i>
    <span>Home</span>
  </a>
  <a href="<?= base_url('services') ?>" class="nav-item">
    <i class="fas fa-tools"></i>
    <span>Services</span>
  </a>

  <a href="<?= base_url('before-after') ?>" class="nav-item">
    <i class="fas fa-exchange-alt"></i>
    <span>Before/After</span>
  </a>

  <a href="<?= base_url('contact-us') ?>" class="nav-item">
    <i class="fa fa-address-book"></i>
    <span>Contact Us</span>
  </a>
</nav>

<!--=================== Footer Section ================= -->
<footer class="classic-footer">
  <div class="footer-overlay"></div>
  <div class="container footer-container">

    <!-- Brand Section -->
    <div class="footer-section about">
      <div class="footer-logo-box">
        <img src="<?= base_url() ?>public/assets/img/logo/logo-white.png" alt="Logo" class="footer-logo-img">
      </div>
      <p>Aone Car Polish can convert your oh-so-dirty-looking car into a shiny, luxurious vehicle.
        We provide a complete service package at affordable prices.
        You will always get a personal touch for your dearest car..</p>
      <hr>
      <div class="footer-socials">
        <a href="https://www.facebook.com/aonecarpolish" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/aonecarpolish?utm_source=ig_web_button_share_sheet&igsh=MWN5MDFpaXIwMmRzNA==" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://youtube.com/@aonebox?si=5shDW4wZafy_wrF2" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="https://wa.me/85850 52925" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      </div>
      <hr>
    </div>

    <!-- Quick Links -->
    <div class="footer-section links">
      <h4 class="footer-title text-white">Quick Links</h4>
      <ul>
        <li>
          <a href="<?= base_url() ?>">
            <i class="fa-solid fa-house"></i> Home
          </a>
        </li>
        <li>
          <a href="#"><i class="fa-solid fa-address-card"></i> About Us
          </a>
        </li>
        <li>
          <a href="<?= base_url('services') ?>">
            <i class="fa-solid fa-car-on"></i> Services
          </a>
        </li>
        <li>
          <a href="<?= base_url('before-after') ?>">
            <i class="fa-solid fa-sliders"></i> Before & After
          </a>
        </li>
        <li>
          <a href="<?= base_url('contact-us') ?>">
            <i class="fa-solid fa-phone-volume"></i> Contact
          </a>
        </li>
      </ul>
    </div>

    <!-- Services -->
    <div class="footer-section services">
      <h4 class="footer-title text-white">Services</h4>
      <ul>
        <li>
          <a href="<?= base_url('services') ?>">Ceramic Coating</a>
        </li>
        <li>
          <a href="<?= base_url('services') ?>">Interior Detailing</a>
        </li>
        <li>
          <a href="<?= base_url('services') ?>">Paint Protection</a>
        </li>
        <li>
          <a href="<?= base_url('services') ?>">Foam Wash</a>
        </li>
        <li>
          <a href="<?= base_url('services') ?>">Headlight Restoration</a>
        </li>
      </ul>
    </div>

    <!-- Contact -->
    <div class="footer-section contact">
      <h4 class="footer-title text-white">Contact Us</h4>
      <p><i class="fas fa-map-marker-alt"></i> 5D, Newtown Square, Near Chinar Park, Newtown AA-II, Kolkata - 700136, West Bengal
      </p>
      <p>
        <i class="fas fa-phone"></i>
        <a href="telto:8585052925" style="color: var(--orange); text-decoration: none; padding-top: 10px; padding-bottom: 10px;">+(91)85850 52925</a>
      </p>
      <p><i class="fas fa-envelope"></i>
        <a href="mailto:care@aonecarpolish.com" style="color: var(--orange); text-decoration: none">care@aonecarpolish.com</a>
      </p>
      <hr>
      <div class="subscribe-container">
        <div class="subscribe-form">
          <input type="email" placeholder="Enter Email" class="email-input" />
          <button class="subscribe-btn">Subscribe</button>
        </div>
      </div>
      <hr>

    </div>
  </div>

  <div class="footer-bottom">
    <p>
      © <?= date('Y') ?> Aone Car Polish. All Rights Reserved | Managed by
      <a href="https://www.aonebox.com/" style="color: var(--orange);">a-one box Media</a>
    </p>
  </div>
</footer>
<!-- ================================================== -->

<!-- =================== Before/After Section ======================= -->
<script>
  document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".img-comp").forEach(container => {

      const overlay = container.querySelector(".img-comp-overlay");
      const slider = document.createElement("div");
      const line = document.createElement("div");

      slider.className = "img-comp-slider";
      line.className = "img-comp-line";

      container.appendChild(line);
      container.appendChild(slider);

      let dragging = false;
      let pos = 0,
        target = 0,
        velocity = 0;

      const getX = e => (e.touches ? e.touches[0].clientX : e.clientX);

      const update = x => {
        const rect = container.getBoundingClientRect();
        let offset = Math.max(0, Math.min(x - rect.left, rect.width));

        overlay.style.width = offset + "px";
        line.style.left = offset + "px";
        slider.style.left = offset + "px";
      };

      const animate = () => {
        velocity *= 0.88;
        pos += velocity;
        pos += (target - pos) * 0.12;

        update(pos);
        requestAnimationFrame(animate);
      };
      animate();

      const start = e => {
        dragging = true;
        pos = target = getX(e);
      };
      const move = e => {
        if (!dragging) return;
        const x = getX(e);
        velocity = x - target;
        target = x;
      };
      const end = () => dragging = false;

      slider.addEventListener("mousedown", start);
      line.addEventListener("mousedown", start);
      window.addEventListener("mousemove", move);
      window.addEventListener("mouseup", end);

      slider.addEventListener("touchstart", start, {
        passive: false
      });
      line.addEventListener("touchstart", start, {
        passive: false
      });
      window.addEventListener("touchmove", move, {
        passive: false
      });
      window.addEventListener("touchend", end);

      const init = () => {
        const rect = container.getBoundingClientRect();
        const centerX = rect.left + rect.width / 2;
        pos = target = centerX;
        update(centerX);
      };

      window.addEventListener("resize", init);
      init();
    });

  });
</script>
<!-- ================================================================ -->

<!-- Custom JS -->
<script src="<?= base_url('public/assets/js/header.js') ?>"></script>

<!-- =========================================== -->
<!-- =========== Services Page ============== -->
<!-- =========================================== -->

<!-- =============== google review section =============== -->
<script>
  new Swiper(".googleReviewSwiper", {
    loop: true,
    centeredSlides: true,
    spaceBetween: 24,
    autoplay: {
      delay: 4500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 2,
        centeredSlides: true,
      },
      1200: {
        slidesPerView: 3,
        centeredSlides: true,
      },
    },
  });
</script>
<!-- =========================================== -->

</body>

</html>