<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url() ?>public/assets/css/service.css?v=124" />

<!-- Custom JS -->
<!-- <script src="<?= base_url('public/assets/js/index.js') ?>"></script> -->

<!-- HERO BANNER -->
<main class="app-container">

    <!-- ================= MOBILE FLOW ================= -->
    <div class="mobile-flow">

        <!-- ===== Banner ===== -->
        <div class="banner-wrapper">
            <div class="banner-slider">

                <div class="banner-header">
                    <div class="circle-btn"><i class="fa-solid fa-arrow-left"></i></div>
                    <!-- CENTER TITLE (hidden initially) -->
                    <div class="header-title">Car Service</div>
                    <div class="header-actions">
                        <div class="circle-btn"><i class="fa-solid fa-magnifying-glass"></i></div>
                        <div class="circle-btn"><i class="fa-solid fa-share-nodes"></i></div>
                    </div>
                </div>

                <div class="slides">
                    <div class="slide">
                        <img src="<?= base_url('public/assets/img/services/full-car-body-3.png') ?>">
                    </div>
                    <div class="slide">
                        <img src="<?= base_url('public/assets/img/services/full-car-body-2.png') ?>">
                    </div>
                    <div class="slide">
                        <img src="<?= base_url('public/assets/img/services/full-car-body-1.png') ?>">
                    </div>
                </div>

                <div class="pagination">
                    <span class="active"></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </div>

        <!-- ===== Service Section ===== -->
        <div class="service-section">
            <div class="service-header">
                <div>
                    <h2>Car Service</h2>
                    <p class="rating">
                        <i class="fa-solid fa-star"></i> 4.8 (8.5K services)
                        <br>
                    <div class="price">
                        <i class="fa-solid fa-tag"></i>
                        ₹7,999 <span>₹10,000</span>
                    </div>
                    </p>
                </div>

                <div class="instant-box">
                    <span class="instant-badge">
                        <i class="fa-solid fa-bolt"></i> Instant
                    </span>
                    <small>In 45 mins</small>
                </div>
            </div>

            <div class="warranty-card">
                <div class="left">
                    <i class="fa-solid fa-circle-check"></i>
                    <div>
                        <span class="uc">CAR COVER</span>
                        <p>Up to 30 days warranty on servicing</p>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right arrow"></i>
            </div>
        </div>

        <div class="section-divider"></div>

        <!-- ===== Services Row ===== -->
        <div class="services-row">
            <div class="services-scroll">

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-house"></i></div>
                    <p>Doorstep Service</p>
                </div>

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-star"></i></div>
                    <p>Top Rated Experts</p>
                </div>

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-shield-halved"></i></div>
                    <p>Safe for All Cars</p>
                </div>

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-gem"></i></div>
                    <p>Premium Products</p>
                </div>

            </div>
        </div>

        <div class="section-divider"></div>

        <!-- ===== Packages Section ===== -->
        <div class="packages-section">

            <h3 class="section-heading">Service</h3>

            <!-- SERVICE 1 -->
            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Premium Shine</span>
                    <img src="<?= base_url('public/assets/img/services/1.png') ?>">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Full Car Body Wax Polish</h5>
                        <button class="add-btn" onclick="openModal(1)">View details</button>
                    </div>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i> 4.8 (12K services)
                    </div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                        <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                    </div>

                    <ul class="features">
                        <li>Paint enhancement & deep gloss finish</li>
                        <li>UV, dust & water protection</li>
                        <li>Professional-grade ceramic coating</li>
                        <li>Improves resale value</li>
                    </ul>

                </div>

            </div>

            <hr>

            <!-- SERVICE 2 -->
            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Interior Care</span>
                    <img src="<?= base_url('public/assets/img/services/dashboard.png') ?>">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Dashboard Cleaning & Wax Polish</h5>
                        <button class="add-btn" onclick="openModal(2)">View details</button>
                    </div>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i> 4.7 (9K services)
                    </div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                        <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                    </div>

                    <ul class="features">
                        <li>Dust & stain removal from dashboard</li>
                        <li>Interior panel deep cleaning</li>
                        <li>Protective wax coating</li>
                        <li>UV protection to prevent fading & cracking</li>
                    </ul>

                </div>

            </div>

            <hr>

            <!-- SERVICE 3 -->
            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Cabin Clean</span>
                    <img src="<?= base_url('public/assets/img/services/vacuum-cleaning.png') ?>">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Full Interior Vacuum Cleaning</h5>
                        <button class="add-btn" onclick="openModal(3)">View details</button>
                    </div>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i> 4.9 (15K services)
                    </div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                        <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                    </div>

                    <ul class="features">
                        <li>Dust & debris removal from seats & carpets</li>
                        <li>Boot space & hard-to-reach area cleaning</li>
                        <li>Complete cabin vacuuming</li>
                        <li>Improves air quality inside car</li>
                    </ul>

                </div>

            </div>

            <hr>

            <!-- SERVICE 4 -->
            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Deep Interior Refresh</span>
                    <img src="<?= base_url('public/assets/img/services/seat-foam-wash.png') ?>">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>All Seat Foam Wash & Polish</h5>
                        <button class="add-btn" onclick="openModal(4)">View details</button>
                    </div>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i> 4.8 (11K services)
                    </div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                        <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                    </div>

                    <ul class="features">
                        <li>Deep foam cleaning for fabric & leather seats</li>
                        <li>Stain & dirt removal</li>
                        <li>Odour removal treatment</li>
                        <li>Restores softness & comfort</li>
                    </ul>

                </div>

            </div>

            <hr>

            <!-- SERVICE 5 -->
            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Metal Care</span>
                    <img src="<?= base_url('public/assets/img/services/nickle-polish.png') ?>">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Nickel & Chrome Wax Polish</h5>
                        <button class="add-btn" onclick="openModal(5)">View details</button>
                    </div>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i> 4.7 (8K services)
                    </div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 2–3 hours</span>
                        <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                    </div>

                    <ul class="features">
                        <li>Restores shine on chrome & metal parts</li>
                        <li>Removes oxidation & water marks</li>
                        <li>Rust & corrosion protection</li>
                        <li>Enhances overall vehicle appearance</li>
                    </ul>

                </div>

            </div>

            <hr>

            <!-- SERVICE 6 -->
            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Visibility Restore</span>
                    <img src="<?= base_url('public/assets/img/services/headlamp.png') ?>">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Headlamp & All Glass Scratch Removing</h5>
                        <button class="add-btn" onclick="openModal(6)">View details</button>
                    </div>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i> 4.8 (10K services)
                    </div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                        <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                    </div>

                    <ul class="features">
                        <li>Removes minor scratches & swirl marks</li>
                        <li>Restores headlamp clarity</li>
                        <li>Improves night-time visibility</li>
                        <li>Crystal-clear glass finish</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>


    <!-- ================= DESKTOP LAYOUT ================= -->
    <div class="desktop-layout">

        <!-- LEFT -->
        <div class="left-scroll">

            <!-- Banner -->
            <div class="banner-wrapper">
                <div class="banner-slider">

                    <div class="banner-header">
                        <!-- CENTER TITLE (hidden initially) -->
                        <div class="header-title">Car Service</div>
                        <div class="header-actions">
                            <div class="circle-btn"><i class="fa-solid fa-share-nodes"></i></div>
                        </div>
                    </div>

                    <div class="slides">
                        <div class="slide">
                            <img src="<?= base_url('public/assets/img/services/full-car-body-3.png') ?>">
                        </div>
                        <div class="slide">
                            <img src="<?= base_url('public/assets/img/services/full-car-body-2.png') ?>">
                        </div>
                        <div class="slide">
                            <img src="<?= base_url('public/assets/img/services/full-car-body-1.png') ?>">
                        </div>
                    </div>

                    <div class="pagination">
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                    </div>

                </div>
            </div>

            <!-- Packages -->
            <div class="packages-section">

                <!-- 1 -->
                <div class="package-card desktop-card">
                    <div class="package-left">
                        <span class="tag">Premium Shine</span>
                        <img src="<?= base_url('public/assets/img/services/1.png') ?>">
                    </div>

                    <div class="package-right">
                        <div class="title-row">
                            <h5>Full Car Body Wax Polish</h5>
                            <button class="add-btn" onclick="openModal(1)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.8 (12K services)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                            <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                        </div>

                        <ul class="features">
                            <li>Paint enhancement & deep gloss finish</li>
                            <li>UV, dust & water protection</li>
                            <li>Professional-grade ceramic coating</li>
                            <li>Improves resale value</li>
                        </ul>
                    </div>
                </div>

                <hr>

                <!-- 2 -->
                <div class="package-card desktop-card">
                    <div class="package-left">
                        <span class="tag">Interior Care</span>
                        <img src="<?= base_url('public/assets/img/services/dashboard.png') ?>">
                    </div>

                    <div class="package-right">
                        <div class="title-row">
                            <h5>Dashboard Cleaning & Wax Polish</h5>
                            <button class="add-btn" onclick="openModal(2)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.7 (9K services)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                            <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                        </div>

                        <ul class="features">
                            <li>Dust & stain removal from dashboard</li>
                            <li>Interior panel deep cleaning</li>
                            <li>Protective wax coating</li>
                            <li>UV protection to prevent fading & cracking</li>
                        </ul>
                    </div>
                </div>

                <hr>

                <!-- 3 -->
                <div class="package-card desktop-card">
                    <div class="package-left">
                        <span class="tag">Cabin Clean</span>
                        <img src="<?= base_url('public/assets/img/services/vacuum-cleaning.png') ?>">
                    </div>

                    <div class="package-right">
                        <div class="title-row">
                            <h5>Full Interior Vacuum Cleaning</h5>
                            <button class="add-btn" onclick="openModal(3)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.9 (15K services)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                            <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                        </div>

                        <ul class="features">
                            <li>Dust & debris removal from seats & carpets</li>
                            <li>Boot space & hard-to-reach area cleaning</li>
                            <li>Complete cabin vacuuming</li>
                            <li>Improves air quality inside car</li>
                        </ul>
                    </div>
                </div>

                <hr>

                <!-- 4 -->
                <div class="package-card desktop-card">
                    <div class="package-left">
                        <span class="tag">Deep Interior Refresh</span>
                        <img src="<?= base_url('public/assets/img/services/seat-foam-wash.png') ?>">
                    </div>

                    <div class="package-right">
                        <div class="title-row">
                            <h5>All Seat Foam Wash & Polish</h5>
                            <button class="add-btn" onclick="openModal(4)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.8 (11K services)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                            <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                        </div>

                        <ul class="features">
                            <li>Deep foam cleaning for fabric & leather seats</li>
                            <li>Stain & dirt removal</li>
                            <li>Odour removal treatment</li>
                            <li>Restores softness & comfort</li>
                        </ul>
                    </div>
                </div>

                <hr>

                <!-- 5 -->
                <div class="package-card desktop-card">
                    <div class="package-left">
                        <span class="tag">Metal Care</span>
                        <img src="<?= base_url('public/assets/img/services/nickle-polish.png') ?>">
                    </div>

                    <div class="package-right">
                        <div class="title-row">
                            <h5>Nickel & Chrome Wax Polish</h5>
                            <button class="add-btn" onclick="openModal(5)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.7 (8K services)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 2–3 hours</span>
                            <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                        </div>

                        <ul class="features">
                            <li>Restores shine on chrome & metal parts</li>
                            <li>Removes oxidation & water marks</li>
                            <li>Rust & corrosion protection</li>
                            <li>Enhances overall vehicle appearance</li>
                        </ul>
                    </div>
                </div>

                <hr>

                <!-- 6 -->
                <div class="package-card desktop-card">
                    <div class="package-left">
                        <span class="tag">Visibility Restore</span>
                        <img src="<?= base_url('public/assets/img/services/headlamp.png') ?>">
                    </div>

                    <div class="package-right">
                        <div class="title-row">
                            <h5>Headlamp & All Glass Scratch Removing</h5>
                            <button class="add-btn" onclick="openModal(6)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.8 (10K services)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 5–8 hours</span>
                            <span><i class="fa-solid fa-location-dot"></i> At your doorstep / Workshop</span>
                        </div>

                        <ul class="features">
                            <li>Removes minor scratches & swirl marks</li>
                            <li>Restores headlamp clarity</li>
                            <li>Improves night-time visibility</li>
                            <li>Crystal-clear glass finish</li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>

        <!-- RIGHT (STICKY) -->
        <div class="right-fixed">
            <div class="right-inner">

                <div class="service-section">
                    <div class="service-header">
                        <div>
                            <h2>Car Service</h2>
                            <p class="rating">
                                <i class="fa-solid fa-star"></i> 4.8 (8.5K services)
                            </p>
                        </div>

                        <div class="instant-box">
                            <span class="instant-badge">
                                <i class="fa-solid fa-bolt"></i> Instant
                            </span>
                            <small>In 45 mins</small>
                        </div>
                    </div>

                    <div class="warranty-card">
                        <div class="left">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                <span class="uc">CAR COVER</span>
                                <p>Up to 30 days warranty on servicing</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-right arrow"></i>
                    </div>
                </div>

                <div class="services-row">
                    <div class="services-scroll">

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-house"></i></div>
                            <p>Doorstep Service</p>
                        </div>

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-star"></i></div>
                            <p>Top Rated Experts</p>
                        </div>

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-shield-halved"></i></div>
                            <p>Safe for All Cars</p>
                        </div>

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-gem"></i></div>
                            <p>Premium Products</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


    <style>
        .bottom-nav {
            display: none;
        }

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
            max-width: 1200px;
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

        @media (max-width: 767px) {
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
        }
    </style>
    <?= $this->include('web/components/car_modal.php') ?>
    <div class="bottom-cta">
        <span id="selectedPrice">₹999 onwards</span>
        <button id="openCarModal">Select Car</button>
    </div>

</main>

<?= $this->include('web/components/service-modal.php') ?>

<script>
    let index = 0;
    const slides = document.querySelector(".slides");
    const total = document.querySelectorAll(".slide").length;
    const bars = document.querySelectorAll(".pagination span");

    function showSlide(i) {
        slides.style.transform = `translateX(-${i * 100}%)`;
        bars.forEach(b => b.classList.remove("active"));
        bars[i].classList.add("active");
    }

    setInterval(() => {
        index = (index + 1) % total;
        showSlide(index);
    }, 3000);

    showSlide(0);
</script>

<script>
    const header = document.querySelector(".banner-header");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 120) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    });
</script>

<?= $this->endSection(); ?>