<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', sans-serif;
            background-color: #F9FAFB;
        }

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Actions */
        .invoice-actions {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            justify-content: flex-end;
        }

        .action-btn {
            padding: 10px 16px;
            border: 2px solid #E5E7EB;
            background-color: white;
            color: #1A1A1A;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .action-btn:hover {
            border-color: #0077BE;
            background-color: #F0F9FF;
            color: #0077BE;
        }

        .action-btn-primary {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 119, 190, 0.2);
        }

        .action-btn-primary:hover {
            background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
            border-color: transparent;
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
            transform: translateY(-2px);
        }

        /* Invoice Container */
        .invoice-wrapper {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .invoice-header {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .invoice-logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .invoice-logo {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .invoice-company-info h1 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .invoice-company-info p {
            font-size: 12px;
            opacity: 0.9;
        }

        .invoice-number-section {
            text-align: right;
        }

        .invoice-number-section p {
            font-size: 12px;
            opacity: 0.9;
            margin-bottom: 4px;
        }

        .invoice-number-section strong {
            font-size: 16px;
            display: block;
        }

        /* Invoice Body */
        .invoice-body {
            padding: 30px;
        }

        .invoice-section {
            margin-bottom: 30px;
        }

        .invoice-section-title {
            font-size: 13px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            padding-bottom: 8px;
            border-bottom: 2px solid #F3F4F6;
        }

        .invoice-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .invoice-grid {
                grid-template-columns: 1fr;
            }
        }

        .invoice-address-block {
            font-size: 13px;
        }

        .invoice-address-label {
            font-weight: 700;
            color: #003580;
            margin-bottom: 6px;
            font-size: 12px;
            text-transform: uppercase;
        }

        .invoice-address-text {
            color: #6B7280;
            line-height: 1.6;
        }

        /* Booking Details */
        .booking-details {
            background-color: #F9FAFB;
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (min-width: 768px) {
            .details-grid {
                grid-template-columns: 1fr 1fr 1fr 1fr;
            }
        }

        .detail-item {
            border-right: 1px solid #E5E7EB;
            padding-right: 16px;
        }

        .detail-item:last-child {
            border-right: none;
        }

        .detail-label {
            font-size: 11px;
            color: #6B7280;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.3px;
            margin-bottom: 4px;
        }

        .detail-value {
            font-size: 14px;
            color: #1A1A1A;
            font-weight: 700;
        }

        /* Items Table */
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table thead {
            background-color: #F0F9FF;
            border: 1px solid #E5E7EB;
        }

        .invoice-table th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid #E5E7EB;
        }

        .invoice-table td {
            padding: 12px;
            font-size: 13px;
            color: #1A1A1A;
            border: 1px solid #E5E7EB;
        }

        .invoice-table tbody tr:last-child {
            background-color: #FAFBFC;
            font-weight: 600;
            border-top: 2px solid #0077BE;
        }

        /* Summary Section */
        .invoice-summary {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .invoice-summary {
                grid-template-columns: 1fr;
            }
        }

        .summary-left {
            font-size: 12px;
            color: #6B7280;
            line-height: 1.8;
        }

        .summary-left strong {
            color: #003580;
            font-weight: 700;
        }

        .summary-right {
            background-color: #F0F9FF;
            border: 2px solid #0077BE;
            border-radius: 10px;
            padding: 16px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 13px;
        }

        .summary-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .summary-label {
            color: #6B7280;
            font-weight: 500;
        }

        .summary-value {
            color: #1A1A1A;
            font-weight: 600;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 2px solid #0077BE;
        }

        .summary-total-label {
            font-size: 14px;
            color: #003580;
            font-weight: 700;
        }

        .summary-total-value {
            font-size: 20px;
            color: #003580;
            font-weight: 700;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 12px;
        }

        .status-confirmed {
            background-color: #D1FAE5;
            color: #065F46;
            border: 1px solid #6EE7B7;
        }

        /* Terms & Footer */
        .invoice-terms {
            background-color: #FAFBFC;
            border-top: 1px solid #E5E7EB;
            padding: 20px;
            margin-top: 30px;
        }

        .invoice-terms-title {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .invoice-terms-text {
            font-size: 11px;
            color: #6B7280;
            line-height: 1.6;
        }

        .invoice-footer {
            background-color: #F9FAFB;
            border-top: 1px solid #E5E7EB;
            padding: 20px 30px;
            text-align: center;
            font-size: 11px;
            color: #9CA3AF;
        }

        /* Print Styles */
        @media print {
            body {
                background-color: white;
            }

            .invoice-actions {
                display: none;
            }

            .invoice-container {
                padding: 0;
            }

            .invoice-wrapper {
                box-shadow: none;
                border-radius: 0;
            }

            .invoice-header {
                page-break-after: avoid;
            }
        }
    </style>
</head>
<body>

<div class="invoice-container">
    <!-- Action Buttons -->
    <div class="invoice-actions">
        <button class="action-btn" onclick="window.print()">
            <i class="fas fa-print"></i> Print
        </button>
        <button class="action-btn" onclick="downloadPDF()">
            <i class="fas fa-download"></i> Download PDF
        </button>
        <button class="action-btn action-btn-primary" onclick="sendEmail()">
            <i class="fas fa-envelope"></i> Send Email
        </button>
    </div>

    <!-- Invoice -->
    <div class="invoice-wrapper">
        <!-- Header -->
        <div class="invoice-header">
            <div class="invoice-logo-section">
                <div class="invoice-logo">
                    <i class="fas fa-hotel"></i>
                </div>
                <div class="invoice-company-info">
                    <h1>TravelBooX</h1>
                    <p>Hotel Booking Platform</p>
                </div>
            </div>
            <div class="invoice-number-section">
                <p>INVOICE</p>
                <strong>#INV-2024-00547</strong>
                <p>Date: 18 Nov 2024</p>
            </div>
        </div>

        <!-- Body -->
        <div class="invoice-body">
            <!-- Addresses -->
            <div class="invoice-grid">
                <div class="invoice-address-block">
                    <div class="invoice-address-label">From</div>
                    <div class="invoice-address-text">
                        <strong>Pearl Continental Hotel</strong><br>
                        Shahrae-e-Firdousi<br>
                        Clifton, Karachi 75600<br>
                        Pakistan<br>
                        <br>
                        Phone: +92 (21) 5860-8000<br>
                        Email: reservations@pckarachi.com
                    </div>
                </div>
                <div class="invoice-address-block">
                    <div class="invoice-address-label">Bill To</div>
                    <div class="invoice-address-text">
                        <strong>Ahmed Khan</strong><br>
                        Block 4-A, Clifton<br>
                        Karachi, 75600<br>
                        Pakistan<br>
                        <br>
                        Phone: +92 300 1234567<br>
                        Email: ahmed.khan@email.com
                    </div>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="booking-details">
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">Booking Reference</div>
                        <div class="detail-value">BK-2024-547-XYZ</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Check-in Date</div>
                        <div class="detail-value">15 Nov 2024</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Check-out Date</div>
                        <div class="detail-value">18 Nov 2024</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Number of Nights</div>
                        <div class="detail-value">3</div>
                    </div>
                </div>
            </div>

            <!-- Items Table -->
            <div class="invoice-section">
                <div class="invoice-section-title">Booking Details</div>
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Room Type</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hotel Accommodation</td>
                            <td>Deluxe Room</td>
                            <td>3 nights</td>
                            <td>8,000 PKR</td>
                            <td>24,000 PKR</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: right; font-weight: 700;">Subtotal</td>
                            <td>24,000 PKR</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="invoice-summary">
                <div class="summary-left">
                    <strong>Payment Terms:</strong> Due upon booking confirmation<br>
                    <strong>Cancellation Policy:</strong> Free cancellation until 24 hours before check-in<br>
                    <strong>Check-in Time:</strong> 2:00 PM<br>
                    <strong>Check-out Time:</strong> 11:00 AM<br>
                    <br>
                    <strong style="color: #10B981;">✓ Payment Status: CONFIRMED</strong><br>
                    Payment Method: Credit Card (Stripe)
                </div>
                <div class="summary-right">
                    <div class="summary-row">
                        <span class="summary-label">Room Charges</span>
                        <span class="summary-value">24,000 PKR</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Taxes & Fees (13%)</span>
                        <span class="summary-value">3,120 PKR</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Discount (-5%)</span>
                        <span class="summary-value" style="color: #10B981;">-1,206 PKR</span>
                    </div>
                    <div class="summary-total">
                        <span class="summary-total-label">Total Amount</span>
                        <span class="summary-total-value">25,914 PKR</span>
                    </div>
                </div>
            </div>

            <div class="status-badge status-confirmed">
                ✓ Booking Confirmed
            </div>

            <!-- Terms -->
            <div class="invoice-terms">
                <div class="invoice-terms-title">Important Information</div>
                <div class="invoice-terms-text">
                    • Your booking confirmation has been sent to your email. Please keep it safe for reference during check-in.<br>
                    • Payment has been successfully processed through Stripe secure payment gateway.<br>
                    • Check-in is available from 2:00 PM and check-out by 11:00 AM on your checkout date.<br>
                    • For any queries or modifications, please contact the hotel directly or visit our website.<br>
                    • This invoice is valid proof of your booking confirmation.
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="invoice-footer">
            <p>© 2024 TravelBooX. All rights reserved. | This is a computer-generated invoice and does not require a signature.</p>
            <p>For support, contact: support@travelbooox.com | +92 (21) 1234-5678</p>
        </div>
    </div>
</div>

<script>
    function downloadPDF() {
        alert('PDF download functionality would be implemented with a library like html2pdf or jsPDF');
        // window.print(); // Temporary solution
    }

    function sendEmail() {
        alert('Invoice sent to: ahmed.khan@email.com');
        // Email functionality would be implemented on backend
    }
</script>

</body>
</html>