<?php include_once('header.php'); ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F5F7FA;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Navigation Tabs */
        .content-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 10px 20px;
            border: 2px solid #E5E7EB;
            background-color: white;
            color: #6B7280;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .tab-btn:hover {
            border-color: #0077BE;
            color: #0077BE;
            background-color: #F0F9FF;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            border-color: transparent;
        }

        /* Content Wrapper */
        .content-wrapper {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .page-header p {
            font-size: 14px;
            opacity: 0.95;
            line-height: 1.6;
        }

        /* Page Content */
        .page-content {
            padding: 40px;
            display: none;
        }

        .page-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Content Sections */
        .content-section {
            margin-bottom: 32px;
        }

        .content-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 24px;
            background-color: #0077BE;
            border-radius: 2px;
        }

        .content-text {
            font-size: 14px;
            color: #4B5563;
            line-height: 1.8;
            margin-bottom: 12px;
        }

        .content-list {
            margin-left: 20px;
            margin-bottom: 16px;
        }

        .content-list li {
            font-size: 14px;
            color: #4B5563;
            line-height: 1.8;
            margin-bottom: 8px;
        }

        .highlight-box {
            background-color: #F0F9FF;
            border-left: 4px solid #0077BE;
            padding: 16px;
            margin: 20px 0;
            border-radius: 6px;
        }

        .highlight-box p {
            font-size: 13px;
            color: #0077BE;
            margin: 0;
            line-height: 1.6;
        }

        .highlight-box strong {
            color: #003580;
            font-weight: 700;
        }

        /* Two Column Layout */
        .two-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 32px;
        }

        @media (max-width: 768px) {
            .two-column {
                grid-template-columns: 1fr;
            }
        }

        .column-content h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 12px;
        }

        .column-content p {
            font-size: 13px;
            color: #6B7280;
            line-height: 1.7;
            margin-bottom: 8px;
        }

        /* Icons List */
        .icon-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .icon-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .icon-item-icon {
            width: 40px;
            height: 40px;
            background-color: #F0F4FF;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0077BE;
            font-size: 18px;
            flex-shrink: 0;
        }

        .icon-item-content h4 {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .icon-item-content p {
            font-size: 12px;
            color: #6B7280;
            line-height: 1.6;
            margin: 0;
        }

        /* Footer Links */
        .footer-links {
            background-color: #F9FAFB;
            border-top: 1px solid #E5E7EB;
            padding: 20px 40px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-links a {
            color: #0077BE;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: #005A9C;
        }

        .footer-divider {
            color: #E5E7EB;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 24px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .page-content {
                padding: 24px;
            }

            .content-tabs {
                gap: 6px;
            }

            .tab-btn {
                padding: 8px 14px;
                font-size: 11px;
            }
        }
    </style>


    <div class="container">
        <!-- Navigation Tabs -->
        <div class="content-tabs">
            <button class="tab-btn active" onclick="switchTab('terms')">Terms & Conditions</button>
            <button class="tab-btn" onclick="switchTab('privacy')">Privacy Policy</button>
            <button class="tab-btn" onclick="switchTab('about')">About Us</button>
            <button class="tab-btn" onclick="switchTab('faq')">FAQ</button>
        </div>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- TERMS & CONDITIONS -->
            <div id="terms" class="page-content active">
                <div class="page-header">
                    <h1>Terms & Conditions</h1>
                    <p>Last Updated: October 25, 2024</p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Introduction</h2>
                    <p class="content-text">
                        These Terms & Conditions govern your use of FlightHub's website, mobile application, and services. By accessing or using our platform, you agree to be bound by these terms. If you do not agree to any part of these terms, please do not use our services.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">User Responsibilities</h2>
                    <ul class="content-list">
                        <li>You agree to provide accurate and complete information during the booking process</li>
                        <li>You are responsible for maintaining the confidentiality of your account credentials</li>
                        <li>You must not use the platform for illegal or unauthorized purposes</li>
                        <li>You agree not to engage in any form of harassment or abusive behavior</li>
                        <li>You accept full responsibility for activities occurring under your account</li>
                    </ul>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Booking & Cancellation Policy</h2>
                    <p class="content-text">
                        Bookings are subject to availability and confirmation by the respective service providers. Cancellations must be made according to the specific policy associated with your booking. Refund eligibility depends on the fare type and timing of cancellation.
                    </p>
                    <div class="highlight-box">
                        <p><strong>Important:</strong> Some bookings are non-refundable. Please review the specific terms of your fare type before completing your purchase.</p>
                    </div>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Limitation of Liability</h2>
                    <p class="content-text">
                        FlightHub acts as an intermediary and is not liable for any direct, indirect, incidental, special, or consequential damages arising from your use of our services. This includes but is not limited to lost profits, data loss, or business interruption.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Contact Us</h2>
                    <p class="content-text">
                        If you have questions about these Terms & Conditions, please contact us at legal@flighthub.com or call +1-800-FLIGHTS.
                    </p>
                </div>
            </div>

            <!-- PRIVACY POLICY -->
            <div id="privacy" class="page-content">
                <div class="page-header">
                    <h1>Privacy Policy</h1>
                    <p>Last Updated: October 25, 2024</p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Data Collection</h2>
                    <p class="content-text">
                        We collect information you provide directly to us, including your name, email, phone number, and travel preferences. We also automatically collect data about your browsing behavior and device information to improve our services.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">How We Use Your Data</h2>
                    <ul class="content-list">
                        <li>To process and complete your bookings</li>
                        <li>To send booking confirmations and updates</li>
                        <li>To personalize your experience</li>
                        <li>To improve our platform and services</li>
                        <li>To comply with legal obligations</li>
                    </ul>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Data Security</h2>
                    <p class="content-text">
                        We implement industry-standard security measures including SSL encryption and regular security audits to protect your personal information. However, no online transmission is completely secure, and we cannot guarantee absolute security.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Third-Party Sharing</h2>
                    <p class="content-text">
                        Your information may be shared with airlines, hotels, and payment processors necessary to complete your bookings. We do not sell or rent your personal information to third parties for marketing purposes without your consent.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Your Rights</h2>
                    <p class="content-text">
                        You have the right to access, update, or delete your personal information. To exercise these rights, please contact us at privacy@flighthub.com.
                    </p>
                </div>
            </div>

            <!-- ABOUT US -->
            <div id="about" class="page-content">
                <div class="page-header">
                    <h1>About FlightHub</h1>
                    <p>Your trusted travel booking partner since 2015</p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Our Mission</h2>
                    <p class="content-text">
                        At FlightHub, our mission is to make travel booking simple, affordable, and accessible to everyone. We believe that everyone deserves the freedom to explore the world without breaking the bank.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Our Story</h2>
                    <p class="content-text">
                        Founded in 2015, FlightHub started as a small startup with a big vision. Today, we've grown to serve over 5 million customers across 150+ countries. Our success is built on a foundation of trust, transparency, and exceptional customer service.
                    </p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Why Choose FlightHub?</h2>
                    <div class="icon-list">
                        <div class="icon-item">
                            <div class="icon-item-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="icon-item-content">
                                <h4>Best Prices</h4>
                                <p>We guarantee the lowest prices or we'll match any competitor's offer</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="icon-item-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="icon-item-content">
                                <h4>24/7 Support</h4>
                                <p>Our dedicated team is available round the clock to assist you</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="icon-item-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="icon-item-content">
                                <h4>Trust & Safety</h4>
                                <p>Secure payments and guaranteed bookings with travel protection</p>
                            </div>
                        </div>
                        <div class="icon-item">
                            <div class="icon-item-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="icon-item-content">
                                <h4>Global Network</h4>
                                <p>Access to flights and hotels from providers worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Our Team</h2>
                    <p class="content-text">
                        FlightHub is powered by a passionate team of travel enthusiasts, engineers, and customer service professionals who are dedicated to making your travel dreams come true. Our diverse team brings expertise from across the travel, technology, and finance industries.
                    </p>
                </div>
            </div>

            <!-- FAQ -->
            <div id="faq" class="page-content">
                <div class="page-header">
                    <h1>Frequently Asked Questions</h1>
                    <p>Find answers to your common questions</p>
                </div>

                <div class="content-section">
                    <h2 class="section-title">General Questions</h2>
                    
                    <div class="two-column">
                        <div class="column-content">
                            <h3>How do I book a flight?</h3>
                            <p>Simply search for your desired route, select the best option, fill in passenger details, and proceed to payment. Your confirmation will be sent to your email.</p>
                        </div>
                        <div class="column-content">
                            <h3>Is FlightHub safe?</h3>
                            <p>Yes, we use SSL encryption and industry-standard security protocols to protect your personal and payment information.</p>
                        </div>
                    </div>

                    <div class="two-column">
                        <div class="column-content">
                            <h3>Can I modify my booking?</h3>
                            <p>Modifications depend on your ticket type. Contact our support team with your booking reference to check modification availability and fees.</p>
                        </div>
                        <div class="column-content">
                            <h3>What payment methods are accepted?</h3>
                            <p>We accept credit/debit cards, PayPal, bank transfers, and digital wallets including Apple Pay and Google Pay.</p>
                        </div>
                    </div>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Booking & Cancellation</h2>
                    
                    <div class="two-column">
                        <div class="column-content">
                            <h3>What is your refund policy?</h3>
                            <p>Refund eligibility depends on the fare type purchased. Refundable tickets can be cancelled anytime before departure, while non-refundable tickets cannot be refunded.</p>
                        </div>
                        <div class="column-content">
                            <h3>How long does it take to receive a refund?</h3>
                            <p>Approved refunds are typically processed within 7-10 business days, depending on your bank's processing time.</p>
                        </div>
                    </div>
                </div>

                <div class="content-section">
                    <h2 class="section-title">Support & Assistance</h2>
                    <p class="content-text">
                        Still have questions? Contact our support team at support@flighthub.com or call +1-800-FLIGHTS. We're available 24/7 to assist you.
                    </p>
                </div>
            </div>

            <!-- Footer Links -->
            <div class="footer-links">
                <a href="#terms" onclick="switchTab('terms')">Terms & Conditions</a>
                <span class="footer-divider">|</span>
                <a href="#privacy" onclick="switchTab('privacy')">Privacy Policy</a>
                <span class="footer-divider">|</span>
                <a href="#about" onclick="switchTab('about')">About Us</a>
                <span class="footer-divider">|</span>
                <a href="#faq" onclick="switchTab('faq')">FAQ</a>
                <span class="footer-divider">|</span>
                <a href="mailto:support@flighthub.com">Contact Support</a>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all pages
            const pages = document.querySelectorAll('.page-content');
            pages.forEach(page => page.classList.remove('active'));

            // Remove active class from all buttons
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => btn.classList.remove('active'));

            // Show selected page
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked button
            event.target.classList.add('active');

            // Scroll to top
            window.scrollTo(0, 0);
        }
    </script>

<?php include 'footer.php'; ?>