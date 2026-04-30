<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>

<style>
    .payment-container {
        max-width: 700px;
        margin: 60px auto 40px;
        padding: 0px 20px;
        padding-top: 40px;
    }

    .success-message {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
        padding: 25px;
        border-radius: 16px;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        animation: slideDown 0.5s ease;
    }

    .success-message-icon {
        font-size: 3rem;
        margin-bottom: 12px;
    }

    .success-message h2 {
        font-size: 1.5rem;
        margin: 0;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .success-message p {
        margin: 0;
        font-size: 0.95rem;
        opacity: 0.95;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes scaleIn {
        from { transform: scale(0); }
        to { transform: scale(1); }
    }

    .booking-details-card {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }

    .booking-details-card h3 {
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: #111;
        font-weight: 700;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 14px 0;
        border-bottom: 1px solid #f5f5f5;
        font-size: 0.95rem;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-row .label {
        color: #666;
        font-weight: 500;
    }

    .detail-row .value {
        color: #111;
        font-weight: 600;
        text-align: right;
    }

    .price-row {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        padding: 18px;
        border-radius: 12px;
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .price-row .label {
        font-size: 1.1rem;
        font-weight: 600;
    }

    .price-row .value {
        font-size: 1.8rem;
        font-weight: 900;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .btn {
        flex: 1;
        padding: 14px;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    }

    .btn-secondary {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-secondary:hover {
        background: #e5e7eb;
    }

    @media (max-width: 768px) {
        .payment-container {
            margin: 30px auto;
            padding: 40px 16px;
        }

        .booking-details-card {
            padding: 20px;
        }

        .action-buttons {
            flex-direction: row;
            gap: 10px;
        }

        .action-buttons .btn {
            flex: 1;
            padding: 12px;
            font-size: 0.95rem;
        }

        .price-row .value {
            font-size: 1.5rem;
        }

        .success-message h2 {
            font-size: 1.3rem;
        }
    }
</style>

<div class="payment-container">
    <div class="success-message">
        <div class="success-message-icon">✓</div>
        <h2>Booking Successful!</h2>
        <p>Your booking has been confirmed. Thank you for choosing our service!</p>
    </div>
    
    <div class="booking-details-card">
        <h3>📋 Booking Details</h3>
        
        <div class="detail-row">
            <span class="label">Booking ID:</span>
            <span class="value">#<?= esc($booking['id'] ?? 'N/A') ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Customer Name:</span>
            <span class="value"><?= esc($booking['username']) ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Phone:</span>
            <span class="value"><?= esc($booking['phone']) ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Service Address:</span>
            <span class="value"><?= esc($booking['address'] ?? 'N/A') ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Car Brand:</span>
            <span class="value"><?= esc($booking['car_brand'] ?? 'N/A') ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Car Model:</span>
            <span class="value"><?= esc($booking['car_model'] ?? 'N/A') ?></span>
        </div>

        <?php if (!empty($booking['message'])): ?>
        <div class="detail-row">
            <span class="label">Special Notes:</span>
            <span class="value"><?= esc($booking['message']) ?></span>
        </div>
        <?php endif; ?>

        <div class="price-row">
            <span class="label">Service Price:</span>
            <span class="value"><?= esc($booking['car_price'] ?? '₹0') ?></span>
        </div>
    </div>
    <div class="action-buttons">
        <button onclick="downloadBookingPDF()" class="btn btn-secondary">📥 Download PDF</button>
        <a href="<?= base_url('single-service') ?>" class="btn btn-primary">Book Another Service</a>
    </div>
</div>

<script>
function downloadBookingPDF() {
    // Direct download without opening new page
    window.location.href = "<?= base_url('home/download-booking-pdf') ?>";
}
</script>

<?= $this->endSection() ?>