<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - A-One Car Polish</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 700px;
            margin: 20px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #667eea;
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .header p {
            color: #666;
            font-size: 14px;
        }
        
        .success-message {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .success-message h2 {
            font-size: 22px;
            margin-bottom: 8px;
        }
        
        .success-message p {
            font-size: 14px;
            opacity: 0.95;
        }
        
        .details-section {
            margin-bottom: 25px;
        }
        
        .details-section h3 {
            font-size: 16px;
            color: #111;
            margin-bottom: 15px;
            font-weight: 700;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 14px;
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
            color: white;
            padding: 18px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        
        .price-row .label {
            font-size: 14px;
            font-weight: 600;
        }
        
        .price-row .value {
            font-size: 24px;
            font-weight: 900;
            color: white;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
            font-size: 12px;
            color: #666;
        }
        
        .footer p {
            margin: 5px 0;
        }
        
        @media print {
            body {
                background: white;
            }
            .container {
                box-shadow: none;
                margin: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>A-ONE CAR POLISH</h1>
            <p>Booking Confirmation Details</p>
        </div>
        
        <!-- Success Message -->
        <div class="success-message">
            <h2>✓ Booking Successful!</h2>
            <p>Your booking has been confirmed. Thank you for choosing our service!</p>
        </div>
        
        <!-- Booking Details -->
        <div class="details-section">
            <h3>📋 Booking Details</h3>
            
            <div class="detail-row">
                <span class="label">Booking ID:</span>
                <span class="value">#<?= esc($booking['id'] ?? 'N/A') ?></span>
            </div>
            
            <div class="detail-row">
                <span class="label">Customer Name:</span>
                <span class="value"><?= esc($booking['username'] ?? 'N/A') ?></span>
            </div>
            
            <div class="detail-row">
                <span class="label">Phone:</span>
                <span class="value"><?= esc($booking['phone'] ?? 'N/A') ?></span>
            </div>
            
            <div class="detail-row">
                <span class="label">Email:</span>
                <span class="value"><?= esc($booking['email'] ?? 'N/A') ?></span>
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
            
            <!-- Price Section -->
            <div class="price-row">
                <span class="label">Service Price:</span>
                <span class="value"><?= esc($booking['car_price'] ?? '₹0') ?></span>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>Thank you for choosing A-One Car Polish!</p>
            <p>Date: <?= date('d F Y') ?></p>
            <p style="margin-top: 10px; color: #999;">This document was generated on <?= date('d F Y H:i:s') ?></p>
        </div>
    </div>
    
    <script>
        // Auto-trigger print dialog
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
