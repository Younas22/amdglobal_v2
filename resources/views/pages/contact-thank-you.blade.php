@extends('common.layout')
@section('content')

<div class="flight-container">
    <!-- Thank You Header -->
    <div class="thank-you-container">
        <div class="thank-you-icon">
            <i class="fas fa-check-circle"></i>
        </div>

        <h1 class="thank-you-title">Thank You for Contacting Us!</h1>

        <p class="thank-you-message">
            We have received your message and our team will review it shortly.
            You should receive a confirmation email at the address you provided.
        </p>

        <!-- Message Details Card -->
        <div class="confirmation-card">
            <h3 class="confirmation-title">What Happens Next?</h3>

            <div class="next-steps">
                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="step-content">
                        <h4>We Review Your Message</h4>
                        <p>Our team will carefully review your inquiry</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="step-content">
                        <h4>Response Within 24-48 Hours</h4>
                        <p>We typically respond within 1-2 business days</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-reply"></i>
                    </div>
                    <div class="step-content">
                        <h4>We'll Get Back to You</h4>
                        <p>You'll receive our response via email</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="step-content">
                        <h4>Need Urgent Help?</h4>
                        <p>Call us at <?= getSetting('contact_phone', 'contact'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="contact-info-box">
            <h3>Need Immediate Assistance?</h3>
            <p>If your matter is urgent, please don't hesitate to contact us directly:</p>

            <div class="info-row">
                <div class="info-col">
                    <i class="fas fa-envelope"></i>
                    <span>Email: <a href="mailto:<?= getSetting('contact_email', 'contact'); ?>"><?= getSetting('contact_email', 'contact'); ?></a></span>
                </div>
                <div class="info-col">
                    <i class="fas fa-phone"></i>
                    <span>Phone: <a href="tel:<?= getSetting('contact_phone', 'contact'); ?>"><?= getSetting('contact_phone', 'contact'); ?></a></span>
                </div>
            </div>

            <div class="office-hours-box">
                <i class="fas fa-clock"></i>
                <span><strong>Office Hours:</strong> Monday - Friday, 09:30 AM - 06:00 PM</span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('home') }}" class="btn-primary">
                <i class="fas fa-home"></i> Back to Home
            </a>
            <a href="{{ route('contact') }}" class="btn-secondary">
                <i class="fas fa-envelope"></i> Send Another Message
            </a>
        </div>
    </div>
</div>

<style>
.thank-you-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 40px 20px;
    text-align: center;
}

.thank-you-icon {
    margin-bottom: 30px;
}

.thank-you-icon i {
    font-size: 80px;
    color: #28a745;
    animation: scaleIn 0.5s ease-out;
}

@keyframes scaleIn {
    from {
        transform: scale(0);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.thank-you-title {
    font-size: 36px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}

.thank-you-message {
    font-size: 18px;
    color: #666;
    line-height: 1.6;
    margin-bottom: 40px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.confirmation-card {
    background: #f8f9ff;
    border: 2px solid #e3f2fd;
    border-radius: 15px;
    padding: 40px 30px;
    margin-bottom: 30px;
    text-align: left;
}

.confirmation-title {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
    text-align: center;
}

.next-steps {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.step-item {
    display: flex;
    gap: 15px;
    align-items: start;
    background: white;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #e3f2fd;
    transition: all 0.3s ease;
}

.step-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.step-icon {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.step-content h4 {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin: 0 0 8px 0;
}

.step-content p {
    font-size: 14px;
    color: #666;
    margin: 0;
    line-height: 1.5;
}

.contact-info-box {
    background: #fff3cd;
    border: 2px solid #ffc107;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
}

.contact-info-box h3 {
    font-size: 20px;
    font-weight: 700;
    color: #856404;
    margin-bottom: 10px;
}

.contact-info-box p {
    font-size: 15px;
    color: #856404;
    margin-bottom: 20px;
}

.info-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-bottom: 15px;
}

.info-col {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 15px;
    color: #856404;
}

.info-col i {
    font-size: 18px;
    color: #ffc107;
}

.info-col a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
}

.info-col a:hover {
    text-decoration: underline;
}

.office-hours-box {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #f0c36d;
    font-size: 15px;
    color: #856404;
}

.office-hours-box i {
    font-size: 18px;
    color: #ffc107;
}

.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary, .btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 15px 30px;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
    background: white;
    color: #667eea;
    border: 2px solid #667eea;
}

.btn-secondary:hover {
    background: #667eea;
    color: white;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .thank-you-title {
        font-size: 28px;
    }

    .thank-you-message {
        font-size: 16px;
    }

    .next-steps {
        grid-template-columns: 1fr;
    }

    .info-row {
        grid-template-columns: 1fr;
    }

    .action-buttons {
        flex-direction: column;
    }

    .btn-primary, .btn-secondary {
        width: 100%;
        justify-content: center;
    }
}
</style>

@endsection
