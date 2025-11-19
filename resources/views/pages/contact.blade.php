@extends('common.layout')
@section('content')


    <div class="flight-container">
        <!-- Hero Section -->
        <div class="page-header">
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
                            <?= getSetting('business_address', 'contact'); ?>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Phone</div>
                        <a href="tel:<?= getSetting('contact_phone', 'contact'); ?>" class="info-link"><?= getSetting('contact_phone', 'contact'); ?></a>
                    </div>
                </div>

                @if(getSetting('emergency_contact', 'contact'))
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Alternate Phone</div>
                        <a href="tel:<?= getSetting('emergency_contact', 'contact'); ?>" class="info-link">
                            <?= getSetting('emergency_contact', 'contact'); ?></a>
                    </div>
                </div>
                @endif

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Email</div>
                        <a href="mailto:<?= getSetting('contact_email', 'contact'); ?>" class="info-link"><?= getSetting('contact_email', 'contact'); ?></a>
                    </div>
                </div>

                @if(getSetting('support_email', 'contact'))
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Support Email</div>
                        <a href="mailto:<?= getSetting('support_email', 'contact'); ?>" class="info-link"><?= getSetting('support_email', 'contact'); ?></a>
                    </div>
                </div>
                @endif

                <!-- Office Hours -->
                <div class="office-hours">
                    <div class="hours-title">Office Hours</div>
                    <div class="hours-item">
                        <span>Monday - Friday</span>
                        <span>09:30 AM - 06:00 PM</span>
                    </div>
                    <div class="hours-item">
                        <span>Saturday</span>
                        <span>Closed</span>
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
        @php
            $socialLinks = getSetting('all', 'social');
            $hasLinks = !empty(array_filter($socialLinks)); // true if at least one link has value
        @endphp

        @if($hasLinks)
            <div class="social-section">
                <h2 class="social-title">Follow Us</h2>

                <div class="social-links flex gap-2">
                    @if(!empty($socialLinks['facebook_url']))
                        <a href="{{ $socialLinks['facebook_url'] }}" target="_blank" class="social-btn" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif

                    @if(!empty($socialLinks['twitter_url']))
                        <a href="{{ $socialLinks['twitter_url'] }}" target="_blank" class="social-btn" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @endif

                    @if(!empty($socialLinks['instagram_url']))
                        <a href="{{ $socialLinks['instagram_url'] }}" target="_blank" class="social-btn" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif

                    @if(!empty($socialLinks['linkedin_url']))
                        <a href="{{ $socialLinks['linkedin_url'] }}" target="_blank" class="social-btn" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif

                    @if(!empty($socialLinks['youtube_url']))
                        <a href="{{ $socialLinks['youtube_url'] }}" target="_blank" class="social-btn" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif

                    @if(!empty($socialLinks['whatsapp_number']))
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $socialLinks['whatsapp_number']) }}" target="_blank" class="social-btn" title="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>
        @endif


        <!-- FAQ Section -->
        <div class="faq-section" style="display: none;">
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
 

@endsection
