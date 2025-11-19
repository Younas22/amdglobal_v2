    <?php include 'header.php'; ?>
    
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 60px 40px;
            border-radius: 12px;
            margin-bottom: 50px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 119, 190, 0.2);
        }

        .hero-section h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .hero-section p {
            font-size: 16px;
            opacity: 0.95;
            line-height: 1.6;
        }

        /* Main Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }

        /* Contact Info Section */
        .contact-info {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .info-title {
            font-size: 20px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 24px;
        }

        .info-item {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            align-items: flex-start;
        }

        .info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .info-content {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 11px;
            color: #6B7280;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 14px;
            color: #1F2937;
            font-weight: 600;
        }

        .info-link {
            color: #0077BE;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .info-link:hover {
            color: #005A9C;
        }

        /* Office Hours */
        .office-hours {
            background-color: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 16px;
            margin-top: 24px;
        }

        .hours-title {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #6B7280;
            padding: 6px 0;
            line-height: 1.6;
        }

        /* Contact Form Section */
        .contact-form-wrapper {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .form-title {
            font-size: 20px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 700;
            color: #1F2937;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            display: block;
        }

        .form-label.required::after {
            content: ' *';
            color: #DC2626;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 13px;
            font-family: inherit;
            background-color: white;
            transition: all 0.3s ease;
            color: #1F2937;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #D1D5DB;
        }

        .form-input:hover,
        .form-select:hover,
        .form-textarea:hover {
            border-color: #D1D5DB;
            background-color: #FAFBFC;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #0077BE;
            background-color: #F0F9FF;
            box-shadow: 0 0 0 4px rgba(0, 119, 190, 0.15);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group.two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group.two-col .form-group {
            margin-bottom: 0;
        }

        /* Checkbox */
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 8px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-top: 2px;
            cursor: pointer;
            accent-color: #0077BE;
            flex-shrink: 0;
        }

        .checkbox-text {
            font-size: 12px;
            color: #6B7280;
            line-height: 1.6;
        }

        /* Button */
        .submit-btn {
            width: 100%;
            padding: 12px 24px;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
        }

        /* Social Section */
        .social-section {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            text-align: center;
            margin-bottom: 40px;
        }

        .social-title {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .social-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #F0F4FF;
            color: #0077BE;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-btn:hover {
            background-color: #0077BE;
            color: white;
            transform: translateY(-4px);
        }

        /* FAQ Section */
        .faq-section {
            background: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 40px;
        }

        .faq-title {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 20px;
        }

        .faq-item {
            border-bottom: 1px solid #E5E7EB;
            padding: 16px 0;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            font-size: 13px;
            font-weight: 700;
            color: #1F2937;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .faq-icon {
            color: #0077BE;
            transition: all 0.3s ease;
        }

        .faq-answer {
            display: none;
            font-size: 12px;
            color: #6B7280;
            line-height: 1.6;
            margin-top: 12px;
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 40px 20px;
            }

            .hero-section h1 {
                font-size: 28px;
            }

            .contact-info,
            .contact-form-wrapper,
            .social-section,
            .faq-section {
                padding: 24px;
            }

            .form-group.two-col {
                grid-template-columns: 1fr;
            }
        }
    </style>


    <div class="container">
        <!-- Hero Section -->
        <div class="hero-section">
            <h1>Get in Touch</h1>
            <p>Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>

        <!-- Main Content -->
        <div class="content-grid">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2 class="info-title">Contact Information</h2>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Address</div>
                        <div class="info-value">
                            123 Travel Street, Suite 100<br>
                            Dubai, UAE 12345
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Phone</div>
                        <a href="tel:+971234567890" class="info-link">+971 (0) 234 567 890</a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Email</div>
                        <a href="mailto:support@flighthub.com" class="info-link">support@flighthub.com</a>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Website</div>
                        <a href="#" class="info-link">www.flighthub.com</a>
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="office-hours">
                    <div class="hours-title">Office Hours</div>
                    <div class="hours-item">
                        <span>Monday - Friday</span>
                        <span>09:00 AM - 06:00 PM</span>
                    </div>
                    <div class="hours-item">
                        <span>Saturday</span>
                        <span>10:00 AM - 04:00 PM</span>
                    </div>
                    <div class="hours-item">
                        <span>Sunday</span>
                        <span>Closed</span>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2 class="form-title">Send us a Message</h2>
                <form onsubmit="handleSubmit(event)">
                    <div class="form-group two-col">
                        <div class="form-group">
                            <label class="form-label required">First Name</label>
                            <input type="text" class="form-input" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label required">Last Name</label>
                            <input type="text" class="form-input" placeholder="Enter last name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-input" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Subject</label>
                        <select class="form-select" required>
                            <option value="">Select Subject</option>
                            <option value="flight-booking">Flight Booking</option>
                            <option value="hotel-booking">Hotel Booking</option>
                            <option value="visa-support">Visa Support</option>
                            <option value="technical-issue">Technical Issue</option>
                            <option value="feedback">Feedback</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Message</label>
                        <textarea class="form-textarea" placeholder="Tell us how we can help..." required></textarea>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="privacy" required>
                        <label for="privacy" class="checkbox-text">
                            I agree to the privacy policy and terms of service
                        </label>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>

        <!-- Social Section -->
        <div class="social-section">
            <h2 class="social-title">Follow Us</h2>
            <div class="social-links">
                <button class="social-btn" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button class="social-btn" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </button>
                <button class="social-btn" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </button>
                <button class="social-btn" title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </button>
                <button class="social-btn" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </button>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 class="faq-title">Frequently Asked Questions</h2>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What is your average response time?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    We typically respond to inquiries within 24-48 business hours. For urgent matters, please call our phone number directly.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>How can I track my booking?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    You can track your booking by logging into your account and visiting the "My Bookings" section. You'll also receive email updates at each stage.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>What payment methods do you accept?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    We accept all major credit cards (Visa, Mastercard, American Express), PayPal, bank transfers, and digital payment methods.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Can I modify or cancel my booking?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Yes, modifications and cancellations are possible depending on the terms of your specific booking. Please contact our support team for assistance.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <span>Do you offer group discounts?</span>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    Yes! We offer special rates for group bookings. Please contact our group travel specialists for a custom quote.
                </div>
            </div>
        </div>
    </div>

    <script>
        function handleSubmit(event) {
            event.preventDefault();
            alert('Thank you for your message! We will get back to you soon.');
            // Form reset logic here
        }

        function toggleFAQ(element) {
            element.closest('.faq-item').classList.toggle('active');
        }
    </script>

        <?php include 'footer.php'; ?>