<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>

<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url() ?>public/assets/css/index.css?v=124" />

<!-- Custom JS -->
<script src="<?= base_url('public/assets/js/index.js') ?>"></script>

<!-- Header -->
<header id="siteHeader" style="display: none">
    <span>
        <a href="<?= base_url() ?>">
            <img src="<?= base_url('public/assets/img/logo/logo.png') ?>"
                id="headerLogo"
                class="header-logo"
                alt="A-One Car Polish">
        </a>
    </span>
</header>

<!-- PRELOADER START -->
<?= $this->include('web/components/preloader.php') ?>
<!-- PRELOADER END  -->

<main>
    <!-- Banner Section -->
    <div id="banner-section">
        <div class="banner-swiper swiper">
            <div class="swiper-wrapper">


                <div class="swiper-slide">
                    <picture>
                        <!-- MOBILE IMAGE -->
                        <source
                            srcset="<?= base_url() ?>public/assets/img/newimg/mob/1.png"
                            media="(max-width: 768px)" />

                        <!-- DESKTOP IMAGE -->
                        <img
                            src="<?= base_url() ?>public/assets/img/newimg/1.png"
                            alt="BMW Car Polishing" />
                    </picture>

                    <div class="banner-center">
                        <h2><span></span> Car Polish and Detailing Service in Newtown</h2>
                        <p>Shine with us....</p>
                    </div>
                </div>

                <div class="swiper-slide">
                    <picture>
                        <!-- MOBILE IMAGE -->
                        <source
                            srcset="<?= base_url() ?>public/assets/img/newimg/mob/2.png"
                            media="(max-width: 768px)" />

                        <!-- DESKTOP IMAGE -->
                        <img
                            src="<?= base_url() ?>public/assets/img/newimg/2.png"
                            alt="BMW Car Polishing" />
                    </picture>


                    <div class="banner-center">
                        <h2><span>Top Car Detailing Services In Newtown Kolkata</span> </h2>
                        <p>Luxury Inside • Perfection Outside</p>
                    </div>
                </div>


                <div class="swiper-slide">

                    <picture>
                        <!-- MOBILE IMAGE -->
                        <source
                            srcset="<?= base_url() ?>public/assets/img/newimg/mob/3.png"
                            media="(max-width: 768px)" />

                        <!-- DESKTOP IMAGE -->
                        <img
                            src="<?= base_url() ?>public/assets/img/newimg/3.png"
                            alt="BMW Car Polishing" />
                    </picture>

                    <div class="banner-center">
                        <h2><span>Best Car Polish Service In Newtown Kolkata</span> </h2>
                        <p>Luxury Inside • Perfection Outside</p>
                    </div>
                </div>


                <div class="swiper-slide">

                    <picture>
                        <!-- MOBILE IMAGE -->
                        <source
                            srcset="<?= base_url() ?>public/assets/img/newimg/mob/4.png"
                            media="(max-width: 768px)" />

                        <!-- DESKTOP IMAGE -->
                        <img
                            src="<?= base_url() ?>public/assets/img/newimg/4.png"
                            alt="BMW Car Polishing" />
                    </picture>
                    <div class="banner-center">
                        <h2><span>Branded Car Service Packages Are Available</span> </h2>
                        <p>Luxury Inside • Perfection Outside</p>
                    </div>
                </div>

                <!-- <div class="swiper-slide">
          <img src="<?= base_url() ?>public/assets/img/newimg/4.png" alt="Mercedes Detailing" />
          <div class="banner-center">
            <h2><span>Best Car Polish Service In Newtown Kolkata</span> </h2>
            <p>Luxury Inside • Perfection Outside</p>
          </div>
        </div>


        <div class="swiper-slide">
          <img src="<?= base_url() ?>public/assets/img/newimg/5.png" alt="Mercedes Detailing" />
          <div class="banner-center">
            <h2><span>Branded Car Service Packages Are Available</span> </h2>
            <p>Luxury Inside • Perfection Outside</p>
          </div>
        </div> -->





            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="mobile-search sticky-search">
            <input type="text" placeholder="Search for vehicles, services..." class="search-input" />
            <i class="fas fa-search search-icon"></i>
        </div>
    </div>
    <!-- ======================================= -->

    <!-- =============== Sticky Logo Courasel ================  -->
    <div class="container  logo-courasel">
        <div class="swiper logo-carousel p-0">
            <div class="swiper-wrapper">


                <?php if (!empty($brands)): ?>
                    <?php foreach ($brands as $b): ?>
                        <div class="swiper-slide"
                            onclick="window.location.href='<?= base_url('brands/' . $b['slug']) ?>'"
                            style="cursor: pointer;">
                            <img src="<?= base_url('public/assets/img/brand/') . $b['logo'] ?>" alt="<?= $b['name'] ?>">
                            <span class="brand-caption"><?= $b['name'] ?></span>
                        </div>

                    <?php endforeach ?>
                <?php else : ?>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/1.png" alt="Suzuki">
                        <span class="brand-caption">Suzuki</span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/2.png" alt="Hyundai">
                        <span class="brand-caption">Hyundai</span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/3.png" alt="Tata">
                        <span class="brand-caption">Tata</span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/4.png" alt="Mahindra ">
                        <span class="brand-caption">Mahindra </span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/5.png" alt="Honda">
                        <span class="brand-caption">Honda</span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/6.png" alt="Ford">
                        <span class="brand-caption">Ford</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/8.png" alt="Toyota">
                        <span class="brand-caption">Toyota</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/10.png" alt="Renault">
                        <span class="brand-caption">Renault</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/11.png" alt="Nissan">
                        <span class="brand-caption">Nissan</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/7.png" alt="Morris Garages">
                        <span class="brand-caption">MG</span>
                    </div>


                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/9.png" alt="Volkswagen">
                        <span class="brand-caption">Volkswagen</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/12.png" alt="Kia">
                        <span class="brand-caption">Kia</span>
                    </div>


                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/13.png" alt="Skoda">
                        <span class="brand-caption">Skoda</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/14.png" alt="Mercedes ">
                        <span class="brand-caption">Mercedes </span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/15.png" alt="BMW">
                        <span class="brand-caption">BMW</span>
                    </div>



                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/16.png" alt="Audi">
                        <span class="brand-caption">Audi</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/17.png" alt="Jaguar">
                        <span class="brand-caption">Jaguar</span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/18.png" alt="Volvo">
                        <span class="brand-caption">Volvo</span>
                    </div>
                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/19.png" alt="Jeep">
                        <span class="brand-caption">Jeep</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/20.png" alt="Land Rover">
                        <span class="brand-caption">Land Rover</span>
                    </div>

                    <div class="swiper-slide">
                        <img src="<?= base_url() ?>public/assets/img/brand_logos/21.png" alt="Mitsubishi Motors">
                        <span class="brand-caption"> Mitsubishi</span>
                    </div>

                <?php endif ?>
                <!-- Add more slides as needed -->
            </div>
        </div>
    </div>
    <!-- ====================================================================== -->

    <!-- ============= Car Services =================  -->
    <section class="services-section" style="margin-top: 0;">
        <div class="container service-container">

            <!-- Section Heading -->
            <div class="section-heading text-center mb-4">
                <h1 class="section-title">Services - All In One</h2>
                    <p class="section-subtitle">Choose the perfect care for your car</p>
            </div>

            <!-- Services Grid -->
            <div class="row g-3 justify-content-center">

                <!-- Card 1 -->
                <div class="col-4 col-md-6">
                    <a href="<?= base_url('single-service') ?>">
                        <div class="service-card bg-service-1 text-center">
                            <i class="fa-solid fa-spray-can-sparkles"></i>
                            <h5>Wax Polish</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="col-4 col-md-6">
                    <a href="<?= base_url('single-service') ?>">
                        <div class="service-card bg-service-2 text-center">
                            <i class="fa-solid fa-gauge-high"></i>
                            <h5>Dashboard Polish</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="col-4 col-md-6">
                    <a href="<?= base_url('single-service') ?>">
                        <div class="service-card bg-service-3 text-center">
                            <i class="fa-solid fa-broom"></i>
                            <h5>Vaccum Cleaning</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 4 -->
                <div class="col-4 col-md-6">
                    <a href="<?= base_url('single-service') ?>">
                        <div class="service-card bg-service-4 text-center">
                            <i class="fa-solid fa-soap"></i>
                            <h5>Foam Wash</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 5 -->
                <div class="col-4 col-md-6">
                    <a href="<?= base_url('single-service') ?>">
                        <div class="service-card bg-service-5 text-center">
                            <i class="fa-solid fa-gem"></i>
                            <h5>Nickel Polish</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 6 -->
                <div class="col-4 col-md-6">
                    <a href="<?= base_url('single-service') ?>">
                        <div class="service-card bg-service-6 text-center">
                            <i class="fa-solid fa-splotch"></i>
                            <h5>Glass Scratch Removing</h5>
                        </div>
                    </a>
                </div>

                <!-- Book Now Button -->
                <div class="col-12 text-center mt-4">
                    <a href="<?= base_url('single-service') ?>" style="text-decoration: none;">
                        <button class="book-now-btn" style="
                            background: linear-gradient(135deg, #ff3d2f, #ff5644);
                            color: white;
                            border: none;
                            padding: 14px 40px;
                            font-size: 1.1rem;
                            font-weight: 700;
                            border-radius: 10px;
                            cursor: pointer;
                            box-shadow: 0 6px 20px rgba(255, 61, 47, 0.4);
                            transition: all 0.3s ease;
                            " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 28px rgba(255, 61, 47, 0.5)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 6px 20px rgba(255, 61, 47, 0.4)';">
                            Book Now →
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- ==============================  -->

    <!-- ========= About Section ============= -->
    <section class="about-section">
        <div class="about-container">

            <div class="about-text">
                <h3 class="about-title section-title">A-One Car Polish</h3>

                <p class="about-short">
                    Welcome to A-One Car Polish, the only first-class best car polish service in Newtown Kolkata.
                    Our experts can provide the best car detailing services in Newtown Kolkata because they
                    have the training and several years of experience in this field.

                    <!-- <p class="about-short"> We have turned ordinary-looking Maruti Suzuki, Hyundai, Tata, Mahindra, Mercedes, BMW, Audi,
                            Toyota and others into shiny and sparkling vehicles.</p>
                        </p> -->

                    <!-- Hidden extra content -->
                <div class="about-extra">
                    <h3 class="section-title">
                        Luxury Teatment For Luxury Cars
                        </h2>
                        <p>
                            uses top car polish brands like Turtle, Foxcare, 3M, and Sheeba to bring the lost shine to your car.
                            Customers trust us because we provide the correct car polish for the right car. For example,
                            a polish meant for leather seats will damage if used on vinyl upholstery.

                        <p> A-One Car Polish equals trust. Our personal treatment of your cars will bring them back to life.</p>

                        <p>However, you often meet with disappointment because either the service is not up to the mark or
                            they use cheap products for your luxurious cars. It is where we differ. We look for quality over
                            anything else so our customers can receive their cars with big smiles. Contact us today for our
                            top set of car services.</p>
                        </p>

                        <h3 class="section-title">We Ensure Best Quality Service</h3>
                        <p>
                            Customers from all over the city and the suburbs have availed of our top car polish service in
                            Newtown Kolkata because of our quality service. We understand that you spend your hard-earned
                            money to polish up your car and maintain them to your very best. So, you search for the best
                            car detailing service in Newtown Kolkata on the internet.
                        </p>
                </div>

                <div class="btn-group">
                    <button class="read-more-btn">Read More</button>
                    <a href="<?= base_url('single-service') ?>" class="service-btn">Explore Our Services</a>
                </div>

            </div>

            <div class="about-img">
                <img src="<?= base_url() ?>public/assets/img/about.png" alt="Car Image">
            </div>

        </div>
    </section>
    <!-- ====================================== -->

    <!-- ========== Top services Near You ============== -->
    <section>
        <div class="container services-nearu">
            <h3 class="section-title">Top Car Polish Services Near You</h3>
            <div class="swiper polish-swiper">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide container">
                        <div class="car-service-card">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url() ?>public/assets/img/top-car/2.png" class="card-service-img" alt="Premium Polish">
                                <div class="offer-badge">20% OFF</div>
                            </div>
                            <div class="car-service-card-body">
                                <div class="car-service-title">Premium Car Polish</div>
                                <div class="small text-secondary mb-1">
                                    <span class="text-success">&#9733; 4.8</span> • 90-120 mins
                                </div>
                                <div class="small">From ₹1,499</div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="swiper-slide container">
                        <div class="car-service-card">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url() ?>public/assets/img/top-car/3.png" class="card-service-img" alt="Express Detailing">
                                <div class="offer-badge">Free Pickup</div>
                            </div>
                            <div class="car-service-card-body">
                                <div class="car-service-title">Express Detailing</div>
                                <div class="small text-secondary mb-1">
                                    <span class="text-success">&#9733; 4.7</span> • 60-90 mins
                                </div>
                                <div class="small">From ₹999</div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="swiper-slide container">
                        <div class="car-service-card">
                            <div class="service-image-wrapper">
                                <img src="<?= base_url() ?>public/assets/img/top-car/4.png" class="card-service-img" alt="Ceramic Shine">
                                <div class="offer-badge">Best Seller</div>
                            </div>
                            <div class="car-service-card-body">
                                <div class="car-service-title">Ceramic Shine</div>
                                <div class="small text-secondary mb-1">
                                    <span class="text-success">&#9733; 4.9</span> • 3 hrs
                                </div>
                                <div class="small">From ₹2,499</div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more cards as needed -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- ======================= -->

    <!-- ================= Banner Sliders with Offers ===========================  -->
    <section>
        <div class="container banner-slider">
            <div class="swiper banner-carousel">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <img class="slide-bg" src="<?= base_url() ?>public/assets/img/1.png" alt="Polish Offer">
                        <div class="slide-overlay"></div>

                        <div class="slide-text">
                            <div class="slide-headline">Full Body Wax Polish</div>
                            <div class="slide-subtext">
                                A-One Car Polish offers top-quality car polish service in Newtown Kolkata at attractive prices.
                                Our service can make your dull-looking car shine like never before.
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <img class="slide-bg" src="<?= base_url() ?>public/assets/img/2.png" alt="Express Service">
                        <div class="slide-overlay"></div>

                        <div class="slide-text">
                            <div class="slide-headline">Dashboard & Door Wax Polish</div>
                            <div class="slide-subtext">
                                A-One Car Polish provides a specific dashboard and door polish service for your car.
                                This helps maintain one of the most neglected parts of your vehicle, keeping it clean and shiny.
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <img class="slide-bg" src="<?= base_url() ?>public/assets/img/3.png" alt="Detailing Package">
                        <div class="slide-overlay"></div>

                        <div class="slide-text">
                            <div class="slide-headline">Full Interior Vacuum Cleaning</div>
                            <div class="slide-subtext">
                                Get interior vacuum cleaning service and save yourself from the time and hassle of cleaning
                                the nooks and corners of your car’s interior. We ensure a spotless and refreshed cabin experience.
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <img class="slide-bg" src="<?= base_url() ?>public/assets/img/4.png" alt="Polish Offer">
                        <div class="slide-overlay"></div>

                        <div class="slide-text">
                            <div class="slide-headline">All Seat Foam Wash</div>
                            <div class="slide-subtext">
                                A-One Car Polish offers seat foam wash and polish service that cleans your dirty seat covers
                                and restores shine.
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="swiper-slide">
                        <img class="slide-bg" src="<?= base_url() ?>public/assets/img/5.png" alt="Express Service">
                        <div class="slide-overlay"></div>

                        <div class="slide-text">
                            <div class="slide-headline">NICKEL Chrome Wax Polish</div>
                            <div class="slide-subtext">
                                Bring back the lost shine to your nickel chrome with A-One Car Polish’s top-class polishing service.
                            </div>
                        </div>
                    </div>

                    <!-- Slide 6 -->
                    <div class="swiper-slide">
                        <img class="slide-bg" src="<?= base_url() ?>public/assets/img/6.png" alt="Detailing Package">
                        <div class="slide-overlay"></div>

                        <div class="slide-text">
                            <div class="slide-headline">Headlamp & Scratch Removing</div>
                            <div class="slide-subtext">
                                Avoid accidents with expert yellow headlamp cleaning and polishing service at an affordable price.
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination -->
                <div class="swiper-pagination" style="z-index: 3; bottom:-5px;"></div>
            </div>
        </div>
    </section>
    <!-- ============================================  -->

    <!-- ============== Types of Car Wash============================= -->
    <section>
        <div class="container car-wash">
            <h4 class="section-title">Service Highlights</h4>
            <div class="row g-3">
                <!-- Basic Wash -->
                <div class="col-6 col-md-3">
                    <div class="car-wash-type-card">
                        <img src="<?= base_url() ?>public/assets/img/car_wash/2.png" class="car-wash-type-bg" alt="Basic Wash">
                        <div class="car-wash-type-overlay"></div>
                        <div class="car-wash-type-content">
                            <div class="car-wash-type-title">Super Clean</div>
                        </div>
                    </div>

                </div>
                <!-- Foam Wash -->
                <div class="col-6 col-md-3">
                    <div class="car-wash-type-card">
                        <img src="<?= base_url() ?>public/assets/img/car_wash/3.png" class="car-wash-type-bg" alt="Foam Wash">
                        <div class="car-wash-type-overlay"></div>
                        <div class="car-wash-type-content">
                            <div class="car-wash-type-title">Foam Wash</div>
                        </div>
                    </div>
                </div>
                <!-- Interior Cleaning -->
                <div class="col-6 col-md-3">
                    <div class="car-wash-type-card">
                        <img src="<?= base_url() ?>public/assets/img/car_wash/4.png" class="car-wash-type-bg" alt="Interior Cleaning">
                        <div class="car-wash-type-overlay"></div>
                        <div class="car-wash-type-content">
                            <div class="car-wash-type-title">Vacuum Cleaning</div>
                        </div>
                    </div>
                </div>
                <!-- Ceramic Coating -->
                <div class="col-6 col-md-3">
                    <div class="car-wash-type-card">
                        <img src="<?= base_url() ?>public/assets/img/car_wash/5.png" class="car-wash-type-bg" alt="Ceramic Coating">
                        <div class="car-wash-type-overlay"></div>
                        <div class="car-wash-type-content">

                            <div class="car-wash-type-title">Wax Coating</div>
                        </div>
                    </div>
                </div>
                <!-- Add more types as needed -->
            </div>
        </div>
    </section>
    <!-- ========================== -->

    <!--=======================================  -->
    <section>
        <div class="responsive-offer-banner mt-2 mb-2">
            <img src="<?= base_url() ?>public/assets/img/newimg/book_now.png" alt="Offer Banner">
            <div class="offer-banner-content">
                <span id="animated-text" class="offer-banner-text"></span>
                <a href="#book" class="offer-banner-btn">Book Now</a>
            </div>
        </div>
    </section>
    <!-- ======================================== -->

    <!-- =============== Tyre POlish =================== -->
    <section>
        <div class="tyre-polish-deals-section">
            <div class="container">
                <div class="section-title">Step by step tyre polishing</div>
                <div class="tyre-polish-scroll">
                    <!-- Water Based -->
                    <div class="tyre-polish-card container">
                        <img src="<?= base_url() ?>public/assets/img/tyre/water.png" class="tyre-polish-img" alt="Water Based Polish">
                        <div class="tyre-polish-title">Water Based</div>
                        <div class="tyre-polish-label">Matte/Satin Finish</div>
                    </div>
                    <!-- Solvent/Silicone Based -->
                    <div class="tyre-polish-card container">
                        <img src="<?= base_url() ?>public/assets/img/tyre/Solvent.png" class="tyre-polish-img" alt="Solvent Polish">
                        <div class="tyre-polish-title">Solvent Based</div>
                        <div class="tyre-polish-label">High Gloss Shine</div>
                    </div>
                    <!-- Gel Polish -->
                    <div class="tyre-polish-card container">
                        <img src="<?= base_url() ?>public/assets/img/tyre/Gel.png" class="tyre-polish-img" alt="Gel Polish">
                        <div class="tyre-polish-title">Gel Polish</div>
                        <div class="tyre-polish-label">Durable Protection</div>
                    </div>
                    <!-- Spray Shine -->
                    <div class="tyre-polish-card container">
                        <img src="<?= base_url() ?>public/assets/img/tyre/Spray.png" class="tyre-polish-img" alt="Spray Shine">
                        <div class="tyre-polish-title">Spray Shine</div>
                        <div class="tyre-polish-label">Fast Application</div>
                    </div>
                    <!-- Foam Cleaner/Polish -->
                    <div class="tyre-polish-card container">
                        <img src="<?= base_url() ?>public/assets/img/tyre/Foam.png" class="tyre-polish-img" alt="Foam Polish">
                        <div class="tyre-polish-title">Foam Polish</div>
                        <div class="tyre-polish-label">Clean + Polish</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================================== -->

    <!-- ================ Why Chooses Us ========================== -->
    <section class="features-section">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center ">
                <h3 class="section-title">Why Choose Us</h3>

            </div>

            <!-- Features Row -->
            <div class="feature-row d-flex justify-content-between ">
                <div class="feature-card ">
                    <div class="feature-icon mb-2">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h6 class="feature-title">Trusted & Safe</h6>
                </div>

                <div class="feature-card ">
                    <div class="feature-icon mb-2">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h6 class="feature-title">Quick & Efficient</h6>
                </div>

                <div class="feature-card ">
                    <div class="feature-icon mb-2">
                        <i class="fas fa-star"></i>
                    </div>
                    <h6 class="feature-title"> High Quality</h6>
                </div>

                <div class="feature-card ">
                    <div class="feature-icon mb-2">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <h6 class="feature-title">Guranteed Low Prices</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================ -->

    <!-- ============== Services FAQ ================= -->
    <section class="faq-section door-services">
        <div class="overlay"></div>
        <div class="container position-relative">
            <div class="text-center mb-5">
                <h3 class="section-title text-white">Services at your door step</h3>

            </div>

            <div class="accordion" id="faqAccordion">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="faq-icon me-2">+</span>
                            Full Car Body Wax Polish
                        </button>
                    </h4>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <ol>
                                <li> We clean the car body of dust and dirt by spraying water.</li>
                                <li> Wipe the car body to remove fingerprints, oil stains and bird droppings.</li>
                                <li>Use hi-quality softner or shampoo solution to remove excess dirt and dust.</li>
                                <li> Apply polish most suitable for your car body using a proper brush.</li>
                                <li> Use a sealant or wax to protect the car polish.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="faq-icon me-2">+</span>
                            Dashboard Cleaning & Wax Polish
                        </button>
                    </h4>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <ol>
                                <li>First, we take all the trash out of your car.</li>
                                <li> We use a vacuum cleaner to remove dirt and small dust particles.</li>
                                <li>Use professional dashboard cleaner to wipe off dirt and dust.</li>
                                <li> Apply dashboard-specific polish to make it shine.</li>
                                <li> A cleansing solution and a cloth to wipe off the infotainment screen.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="faq-icon me-2">+</span>
                            All Seat Foam Wash & Polish


                        </button>
                    </h4>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <ol>
                                <li>Inspection of perforated areas before vacuuming.</li>
                                <li> A solution to clean your dirty seat.</li>
                                <li>We use a microfiber cloth to wipe the seats.</li>
                                <li> Polishing time for leather or vinyl upholstery car seats.</li>
                                <li> Application of conditioner to protect the polish.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <span class="faq-icon me-2">+</span>
                            Nickel Chrome Wax Polish
                        </button>
                    </h4>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">

                            <ol>
                                <li>Soap and water for basic cleaning of your nickel chrome.</li>
                                <li> We use vinegar & baking soda to remove stubborn spots.</li>
                                <li>Removal of rust from your car nickel chrome.</li>
                                <li> Application of polish meant for nickel.</li>
                                <li>Buffing off with a small cloth to dry it.</li>
                            </ol>
                        </div>
                    </div>
                </div>


                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <span class="faq-icon me-2">+</span>
                            Full Interior Vaccum Cleaning
                        </button>
                    </h4>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">

                            <ol>
                                <li>Selection of the correct vacuum cleaner and attachments.</li>
                                <li> Use a crevice tool to drag dirt out from unreachable places.</li>
                                <li> Use dusting brush to avoid damage to any part of a car.</li>
                                <li>Vacuum cleaner extensions help to clean dirt from invisible places.</li>
                                <li>A turbo brush removes hair from upholstery seats.</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="accordion-item">
                    <h4 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <span class="faq-icon me-2">+</span>
                            Headlamp & All Glass Scratch Removing
                        </button>
                    </h4>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">

                            <ol>
                                <li>Soap and water to remove dirt and dust from headlamps and glasses.</li>
                                <li> We use tape to cover all the painted areas around the headlights.</li>
                                <li>Sandpaper and toothpaste to clean the glasses.</li>
                                <li> Polishing up of headlights for shine, gloss and better beam.</li>
                                <li>Use of sealant to protect polish on your car headlights.</li>
                            </ol>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- ======================================================= -->

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

    <!-- =================== Choose Your Package ==========================  -->
    <section class="packages-section">
        <div class="container text-center">
            <h2 class="section-title">Choose Your Package</h2>

            <div class="row mb-4 g-2 justify-content-center">
                <div class="col-6 col-sm-4">
                    <select id="brand_id" class="form-select">
                        <option value="" disabled selected>Select Brand</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?= $brand['brand_id'] ?>" data-slug="<?= $brand['slug'] ?>">
                                <?= esc($brand['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-6 col-sm-4">
                    <select id="model_id" class="form-select" disabled>
                        <option value="" disabled selected>Select Model</option>
                    </select>
                </div>
            </div>

            <div id="packagesGrid">
                <p class="text-muted">Pick a manufacturer to see available models.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const brandDropdown = document.getElementById('brand_id');
            const modelDropdown = document.getElementById('model_id');

            // Mapping models to brand IDs from PHP
            const carsByBrand = {
                <?php
                $entries = [];
                foreach ($carData as $brandId => $models) {
                    $modelList = array_map(function ($m) {
                        return [
                            'name' => $m['name'],
                            'slug' => $m['slug']
                        ];
                    }, $models);
                    $entries[] = (int)$brandId . ": " . json_encode($modelList);
                }
                echo implode(',', $entries);
                ?>
            };

            // 1. When Brand Changes
            brandDropdown.addEventListener('change', function() {
                const selectedBrandId = this.value;
                const availableModels = carsByBrand[selectedBrandId] || [];

                // Clear existing options
                modelDropdown.innerHTML = '<option value="" disabled selected>Select Model</option>';

                if (availableModels.length > 0) {
                    availableModels.forEach(model => {
                        const opt = document.createElement('option');
                        opt.value = model.slug; // Value is model slug for the URL
                        opt.textContent = model.name;
                        modelDropdown.appendChild(opt);
                    });
                    modelDropdown.disabled = false; // Enable dropdown
                    modelDropdown.style.border = "1px solid #c5a059"; // Optional: Highlight it
                } else {
                    modelDropdown.disabled = true;
                }
            });

            // 2. When Model Changes -> Redirect to Slug-based URL
            modelDropdown.addEventListener('change', function() {
                const brandOption = brandDropdown.options[brandDropdown.selectedIndex];
                const brandSlug = brandOption.getAttribute('data-slug');
                const modelSlug = this.value;

                if (brandSlug && modelSlug) {
                    // Final URL: /brands/audi/a3/book-online/
                    const destination = `<?= base_url('brands/') ?>${brandSlug}/${modelSlug}/book-online/`;
                    window.location.href = destination;
                }
            });
        });
    </script>
    <!-- =============================================  -->

    <!-- ================== Youtube Shorts Area  ======================= -->
    <section>
        <div class="shorts-section">
            <h3 class="section-title">Our Car Polish Shorts</h3>
            <div class="swiper portrait-slider">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/b6jvx8l7cJo?si=P24Fc67lMJz8HhXg" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/Wak9lxoUzCU?si=RiyeEUdyN7I7Q-dc" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/E9597CR7VoA?si=_HHgWiPKYCI1rYbC" allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <div class="video-container">
                            <iframe src="https://www.youtube.com/embed/E9597CR7VoA?si=_HHgWiPKYCI1rYbC" allowfullscreen></iframe>
                        </div>
                    </div>
                    <!-- Add as many slides as needed -->
                </div>
                <!-- Navigation Arrows (Desktop Only) -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- ==================================================== -->

    <!-- ===================== Blogs Section =========================== -->
    <section class="blogs-section">
        <h2 class="section-title">Our Latest Car Polish Tips</h2>
        <div class="blogs-grid blog-row">

            <?php if (!empty($blg)) : ?>
                <?php
                $index = 0;
                foreach ($blg as $blog) :
                    $index++;
                ?>

                    <div class="blog-card blog-page blog-item item-<?= $index ?>">
                        <img class="blog-img" src="<?= base_url('public/uploads/blogs/' . $blog['b_img']) ?>" alt="<?= esc($blog['b_title']) ?>">

                        <div class="blog-content">

                            <?php if (!empty($blog['b_tags'])): ?>
                                <?php $tag = explode(',', $blog['b_tags']); ?>
                                <?php foreach ($tag as $t): ?>
                                    <div class="blog-tags"><?= esc($t) ?></div>
                                <?php endforeach ?>
                            <?php endif ?>

                            <div class="blog-title"><?= esc($blog['b_title']) ?></div>
                            <div class="blog-desc">
                                <?= substr(html_entity_decode($blog['b_desc']), 0, 80) ?>
                            </div>


                            <div class="blog-date fas fa-calendar"> <?= date('j F Y', strtotime($blog['created_at'])) ?></div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else : ?>
                <p>No blogs available right now.</p>
            <?php endif; ?>

        </div>
        <a href="<?= base_url('/blogs') ?>" class="explore-bttn">Explore Our Blogs</a>
    </section>
    <!-- ===================================================================== -->

    <!-- =================== FAQ Section  ========================= -->
    <section class="faq-section">
        <div class="overlay"></div>
        <div class="container position-relative">
            <div class="text-center mb-5">
                <h3 class="section-title text-white">Frequently Asked Questions</h3>

            </div>

            <div class="accordion" id="faqAccordion">
                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h5 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="faq-icon me-2">+</span>
                            What services do you offer?
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We provide car polishing, detailing, ceramic coating, interior cleaning, and many more to make your car shine like new.
                            </div>
                        </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="faq-icon me-2">+</span>
                            How long does the detailing process take?
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Depending on the package, it can take anywhere from 1 to 4 hours to complete your car’s detailing process.
                            </div>
                        </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="faq-icon me-2">+</span>
                            Do I need to book an appointment in advance?
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we recommend booking your appointment in advance to ensure availability and faster service.
                            </div>
                        </div>
                </div>






                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <span class="faq-icon me-2">+</span>
                            What payment methods do you accept?
                        </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We accept cash, credit/debit cards, UPI, and most major online payment methods.
                            </div>
                        </div>
                </div>






            </div>
        </div>
    </section>
    <!-- =================================== -->

    <!-- ========================= -->
    <!-- ⭐ MOBILE OFFER POPUP ⭐ -->
    <!-- ========================= -->
    <?= $this->include('web/components/pop-up.php') ?>

</main>

<?= $this->endSection(); ?>