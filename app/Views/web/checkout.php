<?= $this->extend('web/components/assemble') ?>

<?= $this->section('content') ?>

<main class="checkout-page">

    <header class="checkout-header">
        <button class="back-btn" onclick="window.history.back()" aria-label="Go Back">
            <svg viewBox="0 0 24 24" fill="none">
                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h1>Complete Your Booking</h1>
        <div style="width: 40px;"></div>
    </header>

    <section class="checkout-container">
        <div class="checkout-content">
            
            <!-- SELECTED CAR SUMMARY -->
            <div class="car-summary-card">
                <div class="car-summary-header">
                    <h3>🚗 Your Selected Car</h3>
                </div>
                
                <?php
                $modelSlug = $model['slug'] ?? 'default';
                $modelImagePath = 'public/assets/img/model/' . $modelSlug . '.png';
                $brandSlug = $brand['slug'] ?? 'default';
                ?>

                <div class="car-details-grid">
                    <div class="car-detail-item brand-item">
                        <div class="detail-icon">
                            <img src="<?= base_url('public/assets/img/brand/' . $brandSlug . '.png') ?>" 
                                 alt="<?= esc($brand['name'] ?? 'Brand') ?>" 
                                 class="brand-logo">
                        </div>
                        <div class="detail-content">
                            <span class="detail-label">Brand</span>
                            <strong class="detail-value" id="summaryBrand"><?= esc($brand['name'] ?? '-') ?></strong>
                        </div>
                    </div>
                    
                    <div class="car-detail-item model-item">
                        <div class="model-image">
                            <img src="<?= base_url($modelImagePath) ?>"
                                 alt="<?= esc($model['name'] ?? 'Model') ?>"
                                 class="model-image-img"
                                 onerror="this.src='<?= base_url('public/assets/img/model/alto.png') ?>'">
                        </div>
                        <div class="detail-content">
                            <span class="detail-label">Model</span>
                            <strong class="detail-value" id="summaryModel"><?= esc($model['name'] ?? '-') ?></strong>
                        </div>
                    </div>

                    <div class="price-section">
                        <div class="price-label">Service Price</div>
                        <div class="price-display">
                            <strong id="summaryPrice">₹<?= number_format($model['price'] ?? 0, 0) ?></strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHECKOUT FORM -->
            <form class="checkout-form" id="checkoutForm" method="POST" action="<?= base_url('checkout') ?>" novalidate>
                <h3 class="form-title">Your Details</h3>

                <?php $errors = session()->getFlashdata('errors') ?? []; ?>

                <div class="form-field">
                    <label>Name <span class="required-mark">*</span></label>
                    <input type="text" name="username" placeholder="Enter your name" value="<?= set_value('username') ?>" >
                    <?php if (isset($errors['username'])): ?>
                        <span class="field-error"><?= esc($errors['username']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-field">
                    <label>Phone Number <span class="required-mark">*</span></label>
                    <input type="tel" name="phone" placeholder="Enter 10-digit mobile number" value="<?= set_value('phone') ?>">
                    <?php if (isset($errors['phone'])): ?>
                        <span class="field-error"><?= esc($errors['phone']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-field">
                    <label>Email Address <span class="required-mark">*</span></label>
                    <input type="email" name="email" placeholder="your.email@example.com" value="<?= set_value('email') ?>" >
                    <?php if (isset($errors['email'])): ?>
                        <span class="field-error"><?= esc($errors['email']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-field">
                    <label>Service Address <span class="required-mark">*</span></label>
                    <textarea name="address" placeholder="Enter your complete address"  style="min-height: 100px;"><?= set_value('address') ?></textarea>
                    <?php if (isset($errors['address'])): ?>
                        <span class="field-error"><?= esc($errors['address']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-field">
                    <label>Additional Notes (Optional)</label>
                    <textarea name="message" placeholder="Preferred date/time or special requirements" style="min-height: 80px;"><?= set_value('message') ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <span class="field-error"><?= esc($errors['message']) ?></span>
                    <?php endif; ?>
                </div>

                <!-- Hidden fields for car data -->
                <input type="hidden" name="model_id" value="<?= esc($model['id'] ?? '') ?>">

                <button type="submit" class="btn-proceed">Proceed to Payment →</button>
            </form>
        </div>
    </section>

</main>

<style>
    .checkout-page {
        min-height: 100vh;
        background: #f2f4f7;
        padding-bottom: 40px;
    }

    .checkout-header {
        position: sticky;
        top: 0;
        z-index: 100;
        background: #ffffff;
        display: grid;
        grid-template-columns: 44px 1fr 44px;
        align-items: center;
        padding: 12px 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .checkout-header h1 {
        font-size: 1rem;
        font-weight: 700;
        text-align: center;
        margin: 0;
        color: #111827;
    }

    .back-btn {
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

    .back-btn svg {
        width: 20px;
        height: 20px;
        stroke: #111827;
        stroke-width: 2;
    }

    .back-btn:active {
        transform: scale(0.94);
    }

    .checkout-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 16px;
    }

    .checkout-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* CAR SUMMARY CARD */
    .car-summary-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.2);
        color: #fff;
        user-select: none; /* Prevent text selection */
        -webkit-user-select: none; /* Safari */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE/Edge */
    }

    .car-summary-header {
        margin-bottom: 24px;
        text-align: center;
    }

    .car-summary-header h3 {
        font-size: 1.3rem;
        margin: 0;
        font-weight: 800;
        color: #fff;
        letter-spacing: 0.5px;
        user-select: none;
    }

    .car-details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 24px;
        user-select: none;
    }

    /* Desktop: Price takes Model slot; Model spans full width below */
    .price-section {
        grid-column: 2;
        grid-row: 1;
    }

    .model-item {
        grid-column: 1 / -1;
        grid-row: 2;
    }

    .car-detail-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        background: rgba(255, 255, 255, 0.1);
        padding: 14px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        cursor: default; /* Show default cursor, not text cursor */
        user-select: none; /* Prevent text selection */
    }

    .brand-item {
        padding: 12px 14px;
    }

    .car-detail-item:hover {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    .detail-icon {
        font-size: 1.8rem;
        min-width: 48px;
        height: 48px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-logo {
        width: 48px;
        height: 48px;
        object-fit: contain;
        object-position: center;
        display: block;
        background: rgba(255, 255, 255, 0.2); /* Semi-transparent white to blend with purple gradient */
        border-radius: 50%; /* Makes it circular like logo carousel */
        padding: 4px; /* Small padding inside the circle */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .detail-content {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .model-item {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 14px;
        padding: 18px;
        text-align: center;
    }

    .model-image {
        width: 100%;
        height: 140px;
        border-radius: 12px;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .model-image-img {
        width: 140%;
        height: 120%;
        object-fit: contain;
        display: block;
        filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.2));
        max-width: none;
    }

    .detail-label {
        font-size: 0.75rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        font-size: 1.05rem;
        font-weight: 800;
        color: #fff;
    }

    .brand-item .detail-value {
        font-size: 1.5rem;
    }

    .model-item .detail-value {
        font-size: 1.4rem;
        font-weight: 800;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .model-item .detail-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .price-section {
        background: rgba(255, 255, 255, 0.15);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 14px;
        padding: 12px 16px;
        text-align: center;
        backdrop-filter: blur(10px);
        cursor: default; /* Show default cursor */
        user-select: none; /* Prevent text selection */
    }

    .price-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.8);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        user-select: none;
    }

    .price-display {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        user-select: none;
    }

    .price-display strong {
        font-size: 1.7rem;
        font-weight: 900;
        color: #fff;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        user-select: none;
    }

    /* CHECKOUT FORM */
    .checkout-form {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .field-error {
        display: block;
        margin-top: 6px;
        font-size: 0.85rem;
        color: #dc2626;
        font-weight: 600;
    }

    .form-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin: 0 0 20px 0;
        color: #111827;
    }

    .form-field {
        margin-bottom: 18px;
        display: flex;
        flex-direction: column;
    }

    .form-field label {
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 8px;
        color: #374151;
    }

    .required-mark {
        color: #ff3d2f;
        font-weight: 700;
    }

    .form-field input,
    .form-field textarea {
        padding: 12px 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        font-size: 0.95rem;
        font-family: inherit;
        transition: all 0.2s ease;
    }

    .form-field input:focus,
    .form-field textarea:focus {
        outline: none;
        border-color: #ff3d2f;
        box-shadow: 0 0 0 3px rgba(255, 61, 47, 0.1);
    }

    .btn-proceed {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #f75e54ff, #ff3d2f);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 800;
        cursor: pointer;
        margin-top: 16px;
        transition: all 0.2s ease;
        box-shadow: 0 6px 16px rgba(255, 122, 24, 0.45);
    }

    .btn-proceed:active {
        transform: scale(0.98);
    }

    /* MOBILE */
    @media (max-width: 767px) {
        .car-summary-card {
            display: flex !important;
            flex-direction: column !important;
        }

        .car-summary-header {
            width: 100%;
            margin-bottom: 16px;
        }

        .car-details-grid {
            display: grid !important;
            grid-template-columns: 1fr 135px !important;
            grid-template-rows: auto auto !important;
            gap: 10px 12px !important;
            margin-bottom: 0 !important;
            align-items: stretch !important;
        }

        .car-details-grid .brand-item {
            grid-column: 1 !important;
            grid-row: 1 !important;
        }

        .model-item {
            grid-column: 1 / -1 !important;
            grid-row: 2 !important;
            padding: 14px !important;
        }

        .model-item .model-image {
            height: 100px;
            padding: 8px;
        }

        .model-item .detail-content {
            width: 100%;
            align-items: center;
        }

        .model-item .detail-value {
            font-size: 1.2rem;
        }

        .price-section {
            grid-column: 2 !important;
            grid-row: 1 !important;
            position: static !important;
            transform: none !important;
            margin: 0 !important;
            padding: 18px 10px !important;
            width: 100% !important;
            height: 100% !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .car-detail-item {
            padding: 14px;
        }

        .price-label {
            font-size: 0.65rem;
            margin-bottom: 6px;
            white-space: nowrap;
        }

        .price-display strong {
            font-size: 1.5rem;
        }

        .checkout-header {
            padding: 10px 12px;
        }

        .checkout-header h1 {
            font-size: 0.9rem;
        }

        .checkout-form {
            padding: 18px;
        }

        .form-field input,
        .form-field textarea {
            font-size: 16px; /* Prevents zoom on mobile */
        }
    }
</style>

<?= $this->endSection() ?>
