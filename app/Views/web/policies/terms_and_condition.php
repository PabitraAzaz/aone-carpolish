<?= $this->extend('web/components/assemble') ?>
<?= $this->section('content') ?>





<div class="banner">
    <h1><span class="">Terms and Conditions</span></h1>
</div>





<section class="terms-section">
    <div class="terms-container">
        <h1>Terms & Conditions</h1>
        <p><strong>Effective Date:</strong> 24 February 2026</p>
        <p><strong>Last Updated:</strong> 24 February 2026</p>

        <p>
            Welcome to <strong>A One Car Polish</strong>. By accessing our website and making payments through Razorpay,
            you agree to comply with and be bound by the following Terms & Conditions.
            If you do not agree, please do not use our services.
        </p>

        <h2>1. General</h2>
        <ul>
            <li>You must be at least 18 years old to book our services.</li>
            <li>You agree to provide accurate and complete booking and payment information.</li>
            <li>We reserve the right to update or modify these terms at any time without prior notice.</li>
        </ul>

        <h2>2. Services</h2>
        <p>
            A One Car Polish provides professional car detailing, polishing, cleaning,
            and related automotive services.
        </p>
        <ul>
            <li>Service pricing may vary depending on vehicle type and condition.</li>
            <li>We reserve the right to refuse service in case of unsafe or inappropriate conditions.</li>
        </ul>

        <h2>3. Payments</h2>
        <ul>
            <li>All payments are securely processed via Razorpay.</li>
            <li>We do not store your credit/debit card details.</li>
            <li>Full or partial advance payment may be required to confirm bookings.</li>
            <li>In case of payment failure, the deducted amount (if any) will be refunded as per banking timelines (5–7 business days).</li>
        </ul>

        <h2>4. Pricing</h2>
        <ul>
            <li>All prices are mentioned in INR (₹).</li>
            <li>Prices are inclusive of applicable taxes unless stated otherwise.</li>
            <li>Prices may change without prior notice.</li>
        </ul>

        <h2>5. Cancellation & Refund Policy</h2>
        <ul>
            <li>Cancellations must be requested at least 24 hours before the scheduled service time.</li>
            <li>Advance payments are refundable if cancelled within the permitted time.</li>
            <li>Refunds, if approved, will be processed within 7–10 business days.</li>
            <li>Refunds will be credited to the original payment method used during booking.</li>
        </ul>

        <h2>6. Limitation of Liability</h2>
        <ul>
            <li>We are not liable for indirect, incidental, or consequential damages.</li>
            <li>We are not responsible for delays caused by technical issues, third-party services, or payment gateway interruptions.</li>
            <li>Customers are responsible for removing valuable belongings from vehicles before service.</li>
        </ul>

        <h2>7. Governing Law</h2>
        <p>
            These Terms & Conditions are governed by the laws of India.
            Any disputes shall be subject to the jurisdiction of courts in Kolkata, West Bengal.
        </p>

        <h2>8. Contact Information</h2>
        <p>
            <strong>A One Car Polish</strong><br>
            Location: Kolkata, West Bengal, India<br>
            Email: support@aonecarpolish.in<br>
            Phone: +91-XXXXXXXXXX
        </p>
    </div>
</section>

<style>
    .terms-section {
        padding: 20px 15px;
        background: #f9f9f9;
    }

    .terms-container {
        max-width: 900px;
        margin: auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .terms-container h1 {
        font-size: 22px;
        margin-bottom: 15px;
    }

    .terms-container h2 {
        font-size: 18px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .terms-container p,
    .terms-container li {
        font-size: 14px;
        line-height: 1.6;
    }

    .terms-container ul {
        padding-left: 18px;
    }

    @media (max-width: 600px) {
        .terms-container {
            padding: 15px;
        }

        .terms-container h1 {
            font-size: 20px;
        }

        .terms-container h2 {
            font-size: 16px;
        }

        .terms-container p,
        .terms-container li {
            font-size: 13px;
        }

        .banner h1 {
            font-size: 18px;
        }
    }
</style>







<?= $this->endSection(); ?>