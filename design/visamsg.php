<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Application Submitted</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #F0F4FF 0%, #E8EFFF 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            width: 100%;
        }

        .confirmation-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 119, 190, 0.15);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Success Header */
        .success-header {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            padding: 40px 24px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .success-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .success-icon {
            font-size: 64px;
            margin-bottom: 16px;
            display: inline-block;
            animation: bounceIn 0.8s ease-out;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .success-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .success-header p {
            font-size: 14px;
            opacity: 0.95;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        /* Content */
        .confirmation-content {
            padding: 32px 24px;
            text-align: center;
        }

        .message-box {
            background-color: #F0FDF4;
            border: 1px solid #BBFAA0;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
        }

        .message-box p {
            font-size: 13px;
            color: #166534;
            line-height: 1.6;
        }

        .message-box strong {
            color: #15803D;
            font-weight: 700;
        }

        /* Reference Number */
        .reference-section {
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
            text-align: center;
        }

        .reference-label {
            font-size: 11px;
            color: #6B7280;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .reference-number {
            font-size: 20px;
            font-weight: 700;
            color: #003580;
            font-family: 'Courier New', monospace;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .copy-btn {
            background: none;
            border: none;
            color: #0077BE;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s ease;
            padding: 4px 8px;
        }

        .copy-btn:hover {
            color: #005A9C;
            background-color: #F0F9FF;
            border-radius: 4px;
        }

        /* Info Grid */
        .info-grid {
            background-color: #F9FAFB;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .info-item {
            padding: 16px;
            border-bottom: 1px solid #E5E7EB;
            text-align: left;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            align-items: center;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 11px;
            color: #6B7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 13px;
            color: #1F2937;
            font-weight: 600;
            text-align: right;
        }

        /* Timeline */
        .timeline-section {
            background-color: #F9FAFB;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .timeline-title {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
        }

        .timeline {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .timeline-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .timeline-dot {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #10B981;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .timeline-dot.pending {
            background-color: #F59E0B;
        }

        .timeline-dot.future {
            background-color: #D1D5DB;
        }

        .timeline-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
            text-align: left;
            flex: 1;
        }

        .timeline-status {
            font-size: 12px;
            font-weight: 700;
            color: #1F2937;
        }

        .timeline-date {
            font-size: 11px;
            color: #6B7280;
        }

        /* What's Next */
        .whats-next {
            background-color: #FEF3C7;
            border: 1px solid #FCD34D;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            text-align: left;
        }

        .whats-next-title {
            font-size: 12px;
            font-weight: 700;
            color: #92400E;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .whats-next-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 12px;
            color: #78350F;
            line-height: 1.6;
        }

        .whats-next-item {
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .whats-next-item::before {
            content: '✓';
            color: #D97706;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;
            flex-direction: column;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(0, 119, 190, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
        }

        .btn-secondary {
            background-color: #F3F4F6;
            color: #1F2937;
            border: 1px solid #D1D5DB;
        }

        .btn-secondary:hover {
            background-color: #E5E7EB;
        }

        /* Footer */
        .confirmation-footer {
            background-color: #F9FAFB;
            border-top: 1px solid #E5E7EB;
            padding: 20px 24px;
            text-align: center;
            font-size: 11px;
            color: #9CA3AF;
            line-height: 1.6;
        }

        .footer-note {
            color: #6B7280;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .success-header {
                padding: 30px 16px;
            }

            .success-header h1 {
                font-size: 24px;
            }

            .success-icon {
                font-size: 48px;
            }

            .confirmation-content {
                padding: 24px 16px;
            }

            .reference-number {
                font-size: 16px;
            }

            .info-item {
                grid-template-columns: 1fr;
                gap: 4px;
            }

            .info-value {
                text-align: left;
            }

            .button-group {
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="confirmation-card">
            <!-- Success Header -->
            <div class="success-header">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h1>Request Received!</h1>
                <p>Your visa application has been submitted successfully</p>
            </div>

            <!-- Content -->
            <div class="confirmation-content">
                <!-- Message -->
                <div class="message-box">
                    <p>
                        <strong>Your request has been received.</strong> We will contact you soon with updates on your visa application.
                    </p>
                </div>

                <!-- Reference Number -->
                <div class="reference-section">
                    <div class="reference-label">Application Reference Number</div>
                    <div class="reference-number">
                        #VISA-2024-89234
                        <button class="copy-btn" onclick="copyToClipboard('VISA-2024-89234')">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- Application Details -->
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Applicant Name</div>
                        <div class="info-value">Ahmed Ali Khan</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Application Type</div>
                        <div class="info-value">Tourist Visa</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Passport Number</div>
                        <div class="info-value">AB1234567</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Submission Date</div>
                        <div class="info-value">25 Oct, 2024</div>
                    </div>
                </div>

                <!-- Status Timeline -->
                <div class="timeline-section">
                    <div class="timeline-title">Application Status</div>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-dot">✓</div>
                            <div class="timeline-content">
                                <div class="timeline-status">Application Submitted</div>
                                <div class="timeline-date">25 Oct, 2024 - 2:30 PM</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot pending">!</div>
                            <div class="timeline-content">
                                <div class="timeline-status">Under Review</div>
                                <div class="timeline-date">Expected: 26-30 Oct, 2024</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot future">•</div>
                            <div class="timeline-content">
                                <div class="timeline-status">Contact & Document Verification</div>
                                <div class="timeline-date">Pending</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-dot future">•</div>
                            <div class="timeline-content">
                                <div class="timeline-status">Visa Approval/Decision</div>
                                <div class="timeline-date">Pending</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- What's Next -->
                <div class="whats-next">
                    <div class="whats-next-title">What Happens Next?</div>
                    <div class="whats-next-list">
                        <div class="whats-next-item">
                            <span>Our team will review your application within 1-2 business days</span>
                        </div>
                        <div class="whats-next-item">
                            <span>We'll contact you via phone/email for any additional information</span>
                        </div>
                        <div class="whats-next-item">
                            <span>You can track your application status anytime using your reference number</span>
                        </div>
                        <div class="whats-next-item">
                            <span>Visa approval will be notified through email and SMS</span>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <button class="btn btn-primary" onclick="trackApplication()">
                        <i class="fas fa-search"></i> Track Application
                    </button>
                    <button class="btn btn-secondary" onclick="goHome()">
                        <i class="fas fa-home"></i> Back to Home
                    </button>
                </div>
            </div>

            <!-- Footer -->
            <div class="confirmation-footer">
                <div class="footer-note">
                    A confirmation email has been sent to your registered email address.
                    <br>
                    Contact: support@flighthub.com | +1-800-FLIGHTS
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Reference number copied to clipboard!');
            });
        }

        function trackApplication() {
            alert('Redirecting to application tracker...');
            // window.location.href = '/track/VISA-2024-89234';
        }

        function goHome() {
            alert('Redirecting to home page...');
            // window.location.href = '/';
        }
    </script>
</body>
</html>