<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>

<!-- =========================================================== -->

<div class="banner ba-banner">
    <h1><span class="typed-text typed-ba">Before/After</span></h1>
</div>



<!-- ========================================================= -->
<!-- BEFORE AFTER SECTION -->
<section class="before-after-slider-section">
    <div class="container">
        <h2 class="section-title">Our Work Gallery</h2>
        <p class="section-subtitle">See the stunning results of our detailing and polishing services.</p>

        <!-- GRID – Add as many cards as you want -->
        <div class="before-after-grid">

            <!-- CARD 1 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_creta.png" alt="Before" style="">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_creta.png" alt="After">
                    </div>
                </div>
                <h3>Hyundai Creta</h3>
                <p>Full Ceramic Coating</p>
            </div>

            <!-- CARD 2 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_swift.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_swift.png" alt="After">
                    </div>
                </div>
                <h3>Maruti Suzuki Swift</h3>
                <p>Detailing & Restoration</p>
            </div>

            <!-- CARD 3 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_wagon.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_wagon.png" alt="After">
                    </div>
                </div>
                <h3>Maruti Suzuki Wagon R </h3>
                <p>Premium Ceramic Package</p>
            </div>



            <!-- CARD 4 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_punch.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_punch.png" alt="After">
                    </div>
                </div>
                <h3>Tata Punch 2025</h3>
                <p>Full Ceramic Coating</p>
            </div>

            <!-- CARD  5-->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_ertiga.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_ertiga.png" alt="After">
                    </div>
                </div>
                <h3>Maruti Suzuki Ertiga</h3>
                <p>Detailing & Restoration</p>
            </div>

            <!-- CARD 6 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_brezza.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_brezza.png" alt="After">
                    </div>
                </div>
                <h3>Maruti Suzuki Brezza</h3>
                <p>Premium Ceramic Package</p>
            </div>



            <!-- CARD 7 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_nexon.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_nexon.png" alt="After">
                    </div>
                </div>
                <h3>Tata Nexon</h3>
                <p>Full Ceramic Coating</p>
            </div>

            <!-- CARD 8 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_scorpio.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_scorpio.png" alt="After">
                    </div>
                </div>
                <h3>Mahindra Scorpio</h3>
                <p>Detailing & Restoration</p>
            </div>

            <!-- CARD 9 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_desire.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_desire.png" alt="After">
                    </div>
                </div>
                <h3>Maruti Suzuki Dsire</h3>
                <p>Premium Ceramic Package</p>
            </div>



            <!-- CARD 10 -->
            <div class="comparison-card">
                <div class="img-comp">
                    <div class="img-comp-img">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\old_baleno.png" alt="Before">
                    </div>
                    <div class="img-comp-overlay">
                        <img loading="lazy" src="<?= base_url() ?>public\assets\img\new_baleno.png" alt="After">
                    </div>
                </div>
                <h3>Maruti Suzuki Baleno</h3>
                <p>Full Ceramic Coating</p>
            </div>


            <!-- ➕ ADD MORE CARDS HERE (Just Copy/Paste) -->
            <!--
      <div class="comparison-card">
        <div class="img-comp">
          <div class="img-comp-img">
            <img loading="lazy" src="public/uploads/before/your_before.jpg">
          </div>
          <div class="img-comp-overlay">
            <img loading="lazy" src="public/uploads/after/your_after.jpg">
          </div>
        </div>
        <h3>Your Car Title</h3>
        <p>Your description</p>
      </div>
      -->

        </div>
    </div>
</section>


























<!-- ===================================================================  -->

<?= $this->endSection(); ?>