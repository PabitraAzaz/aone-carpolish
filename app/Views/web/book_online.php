<?= $this->extend('web/components/assemble') ?>

<?= $this->section('content') ?>





<style>
    .booking-gradient {
        background: linear-gradient(135deg, #5f63f2, #8f5edb);
    }
</style>



<main>
    <div class="banner service-banner">
        <h1><span class="typed-text typed-service">Booking</span></h1>
    </div>

    <style>
        :root {
            --primary-gold: #c5a059;
            --dark-surface: #1a1a1a;
            --glass-bg: rgba(255, 255, 255, 0.05);
            /* Adding a sophisticated border color */
            --border-soft: rgba(0, 0, 0, 0.08);
            --border-gold-soft: rgba(197, 160, 89, 0.3);
        }

        /* Main Card with defined outer border */
        .booking-card {
            background: #ffffff;
            border: 1px solid var(--border-soft);
            transition: transform 0.3s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .booking-gradient {
            background: radial-gradient(at 0% 0%, #2c3e50 0%, #000000 100%);
            position: relative;
            overflow: hidden;
            /* Vertical border separating the two main sections */
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .booking-gradient::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(197, 160, 89, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Framing the car image with a subtle border box */
        .car-frame {
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.02);
            margin: 2rem 0;
        }

        .car-preview-img {
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.5));
            transition: transform 0.5s ease;
        }

        .car-preview-img:hover {
            transform: scale(1.05);
        }

        /* Form controls with structured borders */
        .form-control {
            border: 1px solid #dcdcdc;
            /* More defined border */
            padding: 12px 20px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 4px rgba(197, 160, 89, 0.1);
            outline: none;
        }

        /* Price badge with a prominent Gold Border */
        .price-badge {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 2px solid var(--primary-gold);
            /* Gold frame for the price */
            border-radius: 15px;
        }

        .btn-premium {
            background: var(--dark-surface);
            color: white;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 16px 40px;
            border: 2px solid var(--dark-surface);
            /* Border matching background */
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            background: transparent;
            color: var(--dark-surface);
            transform: translateY(-2px);
        }

        /* Section header with a bottom border divider */
        /* .section-divider {
            border-bottom: 1px solid var(--border-soft);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
        } */
    </style>

    <style>
        /* ... (Keep existing CSS from previous response) ... */

        /* New Button Loading State */
        .btn-premium:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .spinner-border-sm {
            margin-right: 8px;
            display: none;
        }

        /* Success Overlay Animation */
        #successOverlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            z-index: 10;
            text-align: center;
            padding-top: 100px;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }



        .btn-polishing {
            position: relative;
            overflow: hidden;
            background: var(--dark-surface);
            color: white;
            transition: all 0.4s ease;
            border: 2px solid var(--dark-surface);
        }

        .btn-polishing:disabled {
            background: #333;
            border-color: #333;
        }

        /* The "Buffing/Shine" Streak */
        .btn-polishing.is-loading::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -150%;
            width: 200%;
            height: 200%;
            background: linear-gradient(to right,
                    transparent 0%,
                    rgba(255, 255, 255, 0.1) 40%,
                    rgba(255, 255, 255, 0.6) 50%,
                    rgba(255, 255, 255, 0.1) 60%,
                    transparent 100%);
            transform: rotate(30deg);
            animation: buffing-shine 1.5s infinite;
        }

        @keyframes buffing-shine {
            0% {
                left: -150%;
            }

            100% {
                left: 150%;
            }
        }

        /* Success Checkmark Pop */
        .check-bounce {
            animation: check-bounce 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes check-bounce {
            0% {
                transform: scale(0);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 position-relative">
                <div class="card booking-card rounded-5 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-5 booking-gradient text-white p-5 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                                <img src="<?= base_url('public/assets/img/brand/') . $brand['logo'] ?>" width="50" class="me-3">
                                <div>
                                    <small class="text-uppercase tracking-wider opacity-50" style="font-size: 0.7rem;">Brand</small>
                                    <h4 class="mb-0 fw-bold"><?= $brand['name'] ?></h4>
                                </div>
                            </div>
                            <div class="car-frame text-center">
                                <img src="<?= base_url('public/assets/img/model/') . $model['image'] ?>" class="img-fluid" alt="Car Model">
                                <h2 class="mt-4 fw-light tracking-tight"><?= $model['name'] ?></h2>
                            </div>
                            <div class="price-badge p-3 text-center">
                                <small class="text-uppercase opacity-75 d-block mb-1">Total Service Investment</small>
                                <h2 class="fw-bold mb-0" style="color: #c5a059;">₹<?= number_format($model['price'], 0) ?></h2>
                            </div>
                        </div>

                        <div class="col-lg-7 bg-white p-5 position-relative">
                            <div id="successOverlay">
                                <div class="mb-4">
                                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                                </div>
                                <h2 class="fw-bold">Booking Confirmed!</h2>
                                <p class="text-muted px-5">Your reservation has been successfully processed. Our concierge will contact you shortly.</p>
                                <button onclick="location.reload()" class="btn btn-outline-dark rounded-pill mt-3">Book Another</button>
                            </div>

                            <div class="section-divider">
                                <h4 class="fw-bold text-dark mb-1">Service Details</h4>
                                <p class="text-muted mb-0" style="font-size: 12px;">What you will get</p>
                            </div>
                            <br>
                            <!-- Custom CSS -->
                            <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/service.css?v=124" />
                            <?= $this->include('web/components/service-modal.php') ?>

                            <div class="package-details">

                                <div class="title-row">
                                    <h5>Full Car Body Wax Polish</h5>
                                    <button class="add-btn" onclick="openModal(1)">View details</button>
                                </div>

                                <div class="rating">
                                    <i class="fa-solid fa-star"></i> 4.7 (5.5K services)
                                </div>

                                <div class="info">
                                    <span><i class="fa-regular fa-clock"></i> 2-3 hours</span>
                                    <span><i class="fa-solid fa-location-dot"></i> At your doorstep/workshop</span>
                                </div>
                            </div>
                            <b></b>
                            <hr>
                            <br>
                            <div id="formContent">
                                <div class="section-divider">
                                    <h3 class="fw-bold text-dark mb-1">Complete Your Booking</h3>
                                    <p class="text-muted mb-0">Experience excellence in every detail.</p>
                                </div>
                                <br>
                                <form id="bookingForm" novalidate>
                                    <input type="hidden" name="model_id" value="<?= $model['id'] ?>">

                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-uppercase opacity-75">Full Name</label>
                                            <input type="text" name="name" class="form-control rounded-3" placeholder="Mr. Anubhav" required minlength="3">
                                            <div class="invalid-feedback">Required (min. 3 chars)</div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-bold text-uppercase opacity-75">Number</label>
                                            <input type="tel" name="mobile" pattern="[0-9]{10}" class="form-control rounded-3" placeholder="0123456789" required>
                                            <div class="invalid-feedback">10-digit number required</div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label small fw-bold text-uppercase opacity-75">Service Address</label>
                                            <textarea name="address" rows="3" class="form-control rounded-3" placeholder="Salt Lake, Newtown, Kolkata" required></textarea>
                                            <div class="invalid-feedback">Please provide your address.</div>
                                        </div>

                                        <!-- Custom JS -->
                                        <script src="<?= base_url('public/assets/js/index.js') ?>"></script>

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

                                        <div class="col-12">
                                            <label class="form-label small fw-bold text-uppercase opacity-75">Special Instructions</label>
                                            <textarea name="note" rows="2" class="form-control rounded-3" placeholder="Any specific requirements..."></textarea>
                                        </div>

                                        <div class="col-12 pt-3">
                                            <button type="submit" id="submitBtn" class="btn btn-premium w-100 rounded-pill shadow-sm">
                                                <span class="spinner-border spinner-border-sm" role="status" id="btnSpinner"></span>
                                                <span id="btnText">Pay ₹<?= number_format($model['price'], 0) ?></span>
                                                <span class="spinner-border spinner-border-sm"
                                                    id="btnSpinner"
                                                    style="display:none;"></span>
                                            </button>

                                            <style>
                                                /* Container */
                                                .payment-info {
                                                    text-align: center;
                                                    margin-top: 12px;
                                                    padding: 0 10px;
                                                }

                                                /* Secure line */
                                                .secure-text {
                                                    font-size: 12px;
                                                    color: #28a745;
                                                    font-weight: 500;
                                                    margin-bottom: 10px;
                                                }

                                                /* 🔥 Highlighted second paragraph */
                                                .info-box {
                                                    font-size: 13px;
                                                    color: #333;
                                                    line-height: 1.5;

                                                    background: linear-gradient(135deg, #fff6e5, #ffe0cc);
                                                    border-left: 4px solid #ff3d2f;

                                                    padding: 10px 12px;
                                                    border-radius: 10px;

                                                    max-width: 330px;
                                                    margin: 0 auto;

                                                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
                                                }

                                                .info-box {
                                                    background: rgba(255, 255, 255, 0.6);
                                                    backdrop-filter: blur(6px);
                                                    border-radius: 10px;
                                                    padding: 10px;
                                                }

                                                .info-box {
                                                    background: #222;
                                                    color: #fff;
                                                    border-radius: 8px;
                                                    padding: 10px;
                                                }

                                                .info-box {
                                                    color: #000000;
                                                    background: #eafaf1;
                                                    border-left: 4px solid #28a745;
                                                }
                                            </style>
                                            <div class="payment-info">
                                                <p class="secure-text">
                                                    <i class="fas fa-lock"></i>
                                                    Your payment is secured by Razorpay
                                                </p>

                                                <p class="info-box">
                                                    Once the payment is completed successfully, you will receive the bill,
                                                    confirmation order number, and agent service details.
                                                </p>
                                            </div>

                                            <div id="errorMessage" class="text-danger small text-center mt-3" style="display:none;"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const bookingForm = document.getElementById('bookingForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const errorBox = document.getElementById('errorMessage');

            if (!bookingForm) return;

            bookingForm.addEventListener('submit', async function(e) {

                e.preventDefault();

                // Bootstrap validation
                bookingForm.classList.add('was-validated');
                if (!bookingForm.checkValidity()) return;

                // UI State
                submitBtn.disabled = true;
                btnSpinner.style.display = 'inline-block';
                btnText.innerText = 'Processing...';
                errorBox.style.display = 'none';

                // Collect form data
                const formData = new FormData(bookingForm);
                const data = Object.fromEntries(formData.entries());

                try {

                    // STEP 1: Save booking & create Razorpay order
                    const response = await fetch("<?= base_url('api/place-order') ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify(data)
                    });

                    const result = await response.json();

                    if (!response.ok || result.status !== 'success') {
                        throw new Error(result.message || 'Booking failed.');
                    }

                    // STEP 2: Open Razorpay Checkout
                    const options = {
                        key: result.key,
                        amount: result.amount,
                        currency: "INR",
                        name: "A-One Car Polish",
                        description: "Car Service Booking Payment",
                        order_id: result.order_id,

                        handler: function(response) {

                            // STEP 3: Verify Payment
                            fetch("<?= base_url('api/verify-payment') ?>", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                        razorpay_payment_id: response.razorpay_payment_id,
                                        razorpay_order_id: response.razorpay_order_id,
                                        razorpay_signature: response.razorpay_signature,
                                        booking_id: result.booking_id
                                    })
                                })
                                .then(res => res.json())
                                .then(data => {

                                    if (data.status === 'verified') {
                                        window.location.href = "<?= base_url('thankyou') ?>";
                                    } else {
                                        alert("Payment verification failed.");
                                        resetButton();
                                    }

                                })
                                .catch(() => {
                                    alert("Verification error.");
                                    resetButton();
                                });
                        },

                        modal: {
                            ondismiss: function() {
                                resetButton();
                            }
                        },

                        prefill: {
                            name: data.name || '',
                            email: data.email || '',
                            contact: data.mobile || ''
                        },

                        theme: {
                            color: "#c5a059"
                        }
                    };

                    const rzp = new Razorpay(options);
                    rzp.open();

                } catch (error) {

                    errorBox.innerText = error.message;
                    errorBox.style.display = 'block';
                    resetButton();
                }

            });

            // Reset Button Function
            function resetButton() {
                submitBtn.disabled = false;
                btnSpinner.style.display = 'none';
                btnText.innerText = 'Pay ₹<?= number_format($model["price"], 0) ?>';
            }

        });
    </script>

    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-body text-center p-5">
                    <img src="https://cdn-icons-gif.flaticon.com/13893/13893682.gif" alt="Success" class="img-fluid mb-4" style="max-height: 200px;">

                    <h3 class="fw-bold text-dark">Booking Confirmed!</h3>
                    <p class="text-muted">Your showroom shine is scheduled. Redirecting you to the confirmation page...</p>

                    <div class="progress mt-4" style="height: 6px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?= $this->endSection() ?>