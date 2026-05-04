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
                        <img src="https://img.freepik.com/free-photo/technician-repairing-air-conditioner_23-2149334146.jpg">
                    </div>
                    <div class="slide">
                        <img src="https://img.freepik.com/free-photo/repairman-fixing-air-conditioner_23-2149334145.jpg">
                    </div>
                    <div class="slide">
                        <img src="https://img.freepik.com/free-photo/air-conditioner-cleaning_23-2149334147.jpg">
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
                        <i class="fa-solid fa-tag"></i>  ₹ 999
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
                    <div class="img-box"><i class="fa-solid fa-tags"></i></div>
                    <p>Annual Plan</p>
                </div>

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                    <p>Service</p>
                </div>

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-gas-pump"></i></div>
                    <p>Repair & gas refill</p>
                </div>

                <div class="service-item">
                    <div class="img-box"><i class="fa-solid fa-toolbox"></i></div>
                    <p>Installation</p>
                </div>

            </div>
        </div>

        <div class="section-divider"></div>

        <!-- ===== Packages Section ===== -->
        <div class="packages-section">

            <h3 class="section-heading">Service</h3>

            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Free inspection</span>
                    <img src="https://img.freepik.com/free-photo/car-wash-service_23-2149334136.jpg">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Premium Car Wash & Interior Cleaning</h5>
                        <button class="add-btn" onclick="openModal(1)">View details</button>
                    </div>

                    <div class="rating"><i class="fa-solid fa-star"></i> 4.8 (12K services)</div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 60 mins</span>
                        <span><i class="fa-solid fa-shield-halved"></i> 7-day service guarantee</span>
                    </div>

                    <ul class="features">
                        <li>Exterior foam wash with high-pressure rinse</li>
                        <li>Interior vacuuming & dashboard polishing</li>
                    </ul>

                </div>

            </div>

            <hr>

            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Engine care</span>
                    <img src="https://img.freepik.com/free-photo/car-engine-maintenance_23-2149334138.jpg">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Engine Oil Change & Health Check</h5>
                        <button class="add-btn" onclick="openModal(2)">View details</button>
                    </div>

                    <div class="rating"><i class="fa-solid fa-star"></i> 4.7 (9K services)</div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 45 mins</span>
                        <span><i class="fa-solid fa-car"></i> All car types</span>
                    </div>

                    <ul class="features">
                        <li>Oil replacement with premium grade lubricants</li>
                        <li>Complete engine diagnostics & performance check</li>
                    </ul>

                </div>

            </div>

            <hr>

            <div class="package-card">

                <div class="package-banner">
                    <span class="tag">Deep clean</span>
                    <img src="https://img.freepik.com/free-photo/car-interior-cleaning_23-2149334137.jpg">
                </div>

                <div class="package-details">

                    <div class="title-row">
                        <h5>Full Interior Detailing & Sanitization</h5>
                        <button class="add-btn" onclick="openModal(3)">View details</button>
                    </div>

                    <div class="rating"><i class="fa-solid fa-star"></i> 4.9 (15K services)</div>

                    <div class="info">
                        <span><i class="fa-regular fa-clock"></i> 90 mins</span>
                        <span><i class="fa-solid fa-spray-can"></i> Anti-bacterial treatment</span>
                    </div>

                    <ul class="features">
                        <li>Seat shampooing & stain removal</li>
                        <li>Odor elimination & cabin sanitization</li>
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
                    <div class="slides">
                        <div class="slide">
                            <img src="https://img.freepik.com/free-photo/technician-repairing-air-conditioner_23-2149334146.jpg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Packages -->
            <div class="packages-desktop">
                <!-- SAME CARD -->
                <div class="package-card desktop-card">

                    <!-- LEFT IMAGE -->
                    <div class="package-left">
                        <span class="tag">Free gas check</span>
                        <img src="https://img.freepik.com/free-photo/air-conditioner-cleaning_23-2149334147.jpg">
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="package-right">

                        <div class="title-row">
                            <h5>Foam-jet service (2 ACs)</h5>
                            <button class="add-btn" onclick="openModal(1)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.76 (2.6M reviews)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 60 mins</span>
                            <span><i class="fa-solid fa-shield-halved"></i> 7-day service guarantee</span>
                        </div>

                        <ul class="features">
                            <li>Applicable for both window or split ACs</li>
                            <li>Indoor unit deep cleaning with foam & jet spray</li>
                        </ul>

                    </div>

                </div>
                <hr>
                <div class="package-card desktop-card">

                    <!-- LEFT IMAGE -->
                    <div class="package-left">
                        <span class="tag">Free gas check</span>
                        <img src="https://img.freepik.com/free-photo/air-conditioner-cleaning_23-2149334147.jpg">
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="package-right">

                        <div class="title-row">
                            <h5>Foam-jet service (2 ACs)</h5>
                            <button class="add-btn" onclick="openModal(1)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.76 (2.6M reviews)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 60 mins</span>
                            <span><i class="fa-solid fa-shield-halved"></i> 7-day service guarantee</span>
                        </div>

                        <ul class="features">
                            <li>Applicable for both window or split ACs</li>
                            <li>Indoor unit deep cleaning with foam & jet spray</li>
                        </ul>

                    </div>

                </div>
                <hr>
                <div class="package-card desktop-card">

                    <!-- LEFT IMAGE -->
                    <div class="package-left">
                        <span class="tag">Free gas check</span>
                        <img src="https://img.freepik.com/free-photo/air-conditioner-cleaning_23-2149334147.jpg">
                    </div>

                    <!-- RIGHT CONTENT -->
                    <div class="package-right">

                        <div class="title-row">
                            <h5>Foam-jet service (2 ACs)</h5>
                            <button class="add-btn" onclick="openModal(1)">View details</button>
                        </div>

                        <div class="rating">
                            <i class="fa-solid fa-star"></i> 4.76 (2.6M reviews)
                        </div>

                        <div class="info">
                            <span><i class="fa-regular fa-clock"></i> 60 mins</span>
                            <span><i class="fa-solid fa-shield-halved"></i> 7-day service guarantee</span>
                        </div>

                        <ul class="features">
                            <li>Applicable for both window or split ACs</li>
                            <li>Indoor unit deep cleaning with foam & jet spray</li>
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
                            <div class="img-box"><i class="fa-solid fa-tags"></i></div>
                            <p>Annual Plan</p>
                        </div>

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                            <p>Service</p>
                        </div>

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-gas-pump"></i></div>
                            <p>Repair & gas refill</p>
                        </div>

                        <div class="service-item">
                            <div class="img-box"><i class="fa-solid fa-toolbox"></i></div>
                            <p>Installation</p>
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