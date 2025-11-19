<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Solution - Hotel Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', sans-serif;
        }

        .mobile-menu.active {
            display: block;
            animation: slideDown 0.3s ease-out;
        }
        .mobile-menu {
            display: none;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .nav-bar {
            background-color: white;
            border-bottom: 1px solid #E5E7EB;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #003580;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            position: relative;
            padding: 8px 12px;
        }

        .nav-item:hover {
            color: #0077BE;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            right: 0;
            height: 3px;
            background-color: #0077BE;
            transition: opacity 0.3s ease;
            opacity: 0;
            border-radius: 2px;
        }

        .nav-item:hover::after {
            opacity: 1;
        }

        .nav-item i {
            font-size: 18px;
            color: #0077BE;
        }

        .btn-signin {
            background-color: #0077BE;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 119, 190, 0.15);
        }

        .btn-signin:hover {
            background-color: #0066A1;
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
            transform: translateY(-1px);
        }

        .hero-section {
            background-image: linear-gradient(135deg, rgba(0, 53, 128, 0.5), rgba(0, 119, 190, 0.5)), url('https://images.unsplash.com/photo-1564501049351-005e2b74547f?w=1400&h=600&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 500px;
            padding: 40px 20px;
        }

        .hero-content {
            animation: fadeInUp 0.8s ease-out;
            text-align: center;
            z-index: 10;
            position: relative;
            margin-bottom: 30px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            /* background-color: white; */
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            /* width: 100%;
            max-width: 1000px; */
            z-index: 20;
            position: relative;
        }

        .feature-card {
            text-align: center;
            padding: 24px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background-color: white;
            border: 1px solid #F3F4F6;
        }

        .feature-card:hover {
            box-shadow: 0 8px 24px rgba(0, 119, 190, 0.1);
            transform: translateY(-4px);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 16px;
            display: inline-block;
        }


.how-it-works {
            background: linear-gradient(135deg, #F7F9FC 0%, #EFF4F9 100%);
            padding: 80px 20px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 70px;
            animation: fadeInDown 0.8s ease-out;
        }

        .section-header h2 {
            font-size: 42px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        .section-header p {
            font-size: 18px;
            color: #666;
            max-width: 500px;
            margin: 0 auto;
        }

        .accent-text {
            color: #FF6B35;
            font-weight: 600;
        }

        .steps-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            position: relative;
        }

        .step-card {
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            box-shadow: 0 4px 15px rgba(0, 119, 190, 0.08);
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .step-card:nth-child(1) { animation-delay: 0.1s; }
        .step-card:nth-child(2) { animation-delay: 0.2s; }
        .step-card:nth-child(3) { animation-delay: 0.3s; }
        .step-card:nth-child(4) { animation-delay: 0.4s; }
        .step-card:nth-child(5) { animation-delay: 0.5s; }

        .step-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 119, 190, 0.15);
            border-top: 4px solid #0077BE;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #003580 100%);
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 20px;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
        }

        .step-card:hover .step-number {
            transform: scale(1.15) rotate(5deg);
            box-shadow: 0 8px 20px rgba(0, 119, 190, 0.3);
        }

        .step-icon {
            font-size: 32px;
            margin-top: 10px;
            animation: float 3s ease-in-out infinite;
        }

        .step-card:nth-child(2) .step-icon { animation-delay: 0.5s; }
        .step-card:nth-child(3) .step-icon { animation-delay: 1s; }
        .step-card:nth-child(4) .step-icon { animation-delay: 1.5s; }
        .step-card:nth-child(5) .step-icon { animation-delay: 2s; }

        .step-title {
            font-size: 22px;
            font-weight: 600;
            color: #003580;
            margin-top: 20px;
            margin-bottom: 12px;
        }

        .step-description {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .connector {
            position: absolute;
            top: 80px;
            left: 50%;
            width: 80%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #0077BE 50%, transparent);
            display: none;
            z-index: 1;
        }

        @media (min-width: 768px) {
            .steps-container {
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
            }

            .connector {
                display: block;
            }
        }

        .cta-section {
            text-align: center;
            margin-top: 60px;
            animation: fadeInUp 0.8s ease-out 0.8s backwards;
        }

        .cta-button {
            display: inline-block;
            padding: 16px 50px;
            background: linear-gradient(135deg, #0077BE 0%, #003580 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.4s ease;
            border: 2px solid #0077BE;
            cursor: pointer;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 119, 190, 0.3);
            background: linear-gradient(135deg, #003580 0%, #0077BE 100%);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @media (max-width: 768px) {
            .how-it-works {
                padding: 50px 20px;
            }

            .section-header h2 {
                font-size: 32px;
            }

            .section-header p {
                font-size: 16px;
            }

            .step-card {
                padding: 30px 20px;
            }

            .step-title {
                font-size: 18px;
            }

            .step-description {
                font-size: 14px;
            }
        }


                /* Main Footer */
        footer {
            background: linear-gradient(135deg, #001F3F 0%, #003580 50%, #0052A3 100%);
            color: white;
            padding-top: 60px;
            padding-bottom: 0;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-top {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 50px;
            margin-bottom: 50px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Brand Section */
        .footer-brand h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #FFD700;
            letter-spacing: -0.5px;
        }

        .footer-brand p {
            font-size: 14px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 20px;
        }

        .brand-modules {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .module-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(255, 107, 53, 0.2);
            border: 1px solid #FF6B35;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #FFD700;
            transition: all 0.3s ease;
        }

        .module-badge:hover {
            background: #FF6B35;
            color: white;
        }

        /* Footer Columns */
        .footer-column h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #FFD700;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            padding-bottom: 12px;
        }

        .footer-column h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #FF6B35;
            border-radius: 2px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 12px;
        }

        .footer-column a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-column a:hover {
            color: #FFD700;
            transform: translateX(5px);
        }

        /* Services Section */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 10px;
        }

        .service-link {
            padding: 10px 12px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            font-size: 13px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .service-link:hover {
            background: #FF6B35;
            border-color: #FFD700;
        }

        /* Newsletter Section */
        .newsletter {
            background: rgba(255, 107, 53, 0.1);
            border: 1px solid #FF6B35;
            padding: 25px;
            border-radius: 12px;
        }

        .newsletter h4 {
            margin-bottom: 15px;
        }

        .newsletter p {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 15px;
        }

        .newsletter-form {
            display: flex;
            gap: 8px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            background: white;
            color: #1A1A1A;
            outline: none;
            transition: all 0.3s ease;
        }

        .newsletter-form input::placeholder {
            color: #999;
        }

        .newsletter-form input:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
        }

        .newsletter-form button {
            padding: 12px 20px;
            background: #FF6B35;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .newsletter-form button:hover {
            background: #E55A25;
            transform: translateY(-2px);
        }

        /* Contact Info */
        .contact-item {
            display: flex;
            gap: 12px;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .contact-icon {
            font-size: 20px;
            flex-shrink: 0;
            color: #FF6B35;
        }

        .contact-content {
            flex: 1;
        }

        .contact-content p {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 4px;
        }

        .contact-content a {
            color: #FFD700;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .contact-content a:hover {
            color: #FF6B35;
        }

        /* Social Links */
        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .social-icon:hover {
            background: #FF6B35;
            transform: translateY(-5px) scale(1.1);
            border-color: #FFD700;
        }

        /* Payment Methods */
        .payment-methods {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .payment-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .payment-icon:hover {
            background: #FF6B35;
            transform: scale(1.1);
        }

        /* Footer Bottom */
        .footer-bottom {
            background: linear-gradient(90deg, #001F3F 0%, #003580 100%);
            padding: 30px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-bottom-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            align-items: center;
        }

        .copyright {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-links-bottom {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .footer-links-bottom a {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links-bottom a:hover {
            color: #FFD700;
        }

        .payment-partners {
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
        }

        /* Security Badges */
        .security-badges {
            display: flex;
            gap: 15px;
            justify-content: center;
            padding: 15px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 20px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
        }

        .badge-icon {
            font-size: 16px;
            color: #FFD700;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .footer-top {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .newsletter-form {
                flex-direction: column;
            }

            .footer-bottom-content {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .footer-links-bottom {
                justify-content: flex-start;
                gap: 15px;
            }

            footer {
                padding-top: 40px;
            }
        }

    </style>

<!-- hotel list -->
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

        .hotel-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Search Info */
        .hotel-search-info {
            background-color: white;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 4px solid #0077BE;
        }

        .hotel-search-info-row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: center;
        }

        .hotel-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hotel-info-label {
            font-size: 12px;
            font-weight: 600;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .hotel-info-value {
            font-size: 14px;
            font-weight: 600;
            color: #1A1A1A;
        }

        .hotel-info-icon {
            color: #0077BE;
            font-size: 16px;
        }

        /* Main Content */
        .hotel-main-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 1024px) {
            .hotel-main-content {
                grid-template-columns: 250px 1fr;
            }
        }

        /* Sidebar Filter */
        .hotel-sidebar {
            background-color: white;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            height: fit-content;
        }

        .hotel-filter-section {
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #F3F4F6;
        }

        .hotel-filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .hotel-filter-title {
            font-size: 13px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        /* Price Slider */
        .hotel-price-slider {
            width: 100%;
            height: 6px;
            border-radius: 3px;
            background: linear-gradient(to right, #E5E7EB 0%, #E5E7EB 100%);
            outline: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .hotel-price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 119, 190, 0.3);
            border: 2px solid white;
        }

        .hotel-price-slider::-moz-range-thumb {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 119, 190, 0.3);
            border: 2px solid white;
        }

        .hotel-price-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding: 10px;
            background-color: #F0F9FF;
            border-radius: 8px;
        }

        .hotel-price-label-sm {
            font-size: 12px;
            color: #6B7280;
            font-weight: 600;
        }

        .hotel-price-value-sm {
            font-size: 14px;
            font-weight: 700;
            color: #0077BE;
        }

        .hotel-filter-option {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .hotel-filter-option input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #0077BE;
        }

        .hotel-filter-option label {
            font-size: 13px;
            color: #1A1A1A;
            cursor: pointer;
            flex: 1;
        }

        /* Hotels Grid */
        .hotel-cards-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        @media (min-width: 768px) {
            .hotel-cards-container {
                grid-template-columns: 1fr;
            }
        }

        /* Hotel Card */
        .hotel-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            display: grid;
            grid-template-columns: 1fr;
            border: 1px solid #F3F4F6;
        }

        .hotel-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        @media (min-width: 768px) {
            .hotel-card {
                grid-template-columns: 280px 1fr;
            }
        }

        .hotel-card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            position: relative;
        }

        @media (min-width: 768px) {
            .hotel-card-image {
                height: 220px;
            }
        }

        .hotel-card-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: linear-gradient(135deg, #DC2626 0%, #991B1B 100%);
            color: white;
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
        }

        .hotel-card-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .hotel-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .hotel-card-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
        }

        .hotel-card-rating {
            display: flex;
            align-items: center;
            gap: 6px;
            background-color: #F0F9FF;
            padding: 4px 8px;
            border-radius: 6px;
            flex-shrink: 0;
        }

        .hotel-card-stars {
            color: #FFA500;
            font-size: 12px;
        }

        .hotel-card-rating-number {
            font-size: 12px;
            font-weight: 700;
            color: #0077BE;
        }

        .hotel-card-location {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #6B7280;
        }

        .hotel-card-location-icon {
            color: #0077BE;
        }

        .hotel-card-room-type {
            display: inline-block;
            background-color: #EBF4FF;
            color: #0077BE;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            width: fit-content;
        }

        .hotel-card-amenities {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hotel-amenity {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: #6B7280;
        }

        .hotel-amenity-icon {
            color: #0077BE;
            font-size: 14px;
        }

        .hotel-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding-top: 12px;
            border-top: 1px solid #F3F4F6;
        }

        .hotel-card-price {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .hotel-card-price-label {
            font-size: 11px;
            color: #6B7280;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .hotel-card-price-value {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
        }

        .hotel-card-price-original {
            font-size: 13px;
            color: #9CA3AF;
            text-decoration: line-through;
        }

        .hotel-select-btn {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(0, 119, 190, 0.2);
        }

        .hotel-select-btn:hover {
            background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
            transform: translateY(-2px);
        }

        .hotel-select-btn:active {
            transform: translateY(0);
        }

        .hotel-availability {
            font-size: 12px;
            color: #DC2626;
            font-weight: 600;
        }

        /* Search Form Collapse */
        .hotel-search-collapse {
            margin-bottom: 20px;
        }

        .hotel-search-collapse-btn {
            width: 100%;
            background-color: white;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 700;
            color: #003580;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
            gap: 8px;
        }

        .hotel-search-collapse-btn:hover {
            border-color: #0077BE;
            background-color: #F0F9FF;
        }

        .hotel-search-collapse-btn.active {
            border-color: #0077BE;
            background-color: #0077BE;
            color: white;
        }

        .hotel-search-collapse-content {
            display: none;
            background-color: white;
            border: 2px solid #E5E7EB;
            border-top: none;
            border-radius: 0 0 12px 12px;
            padding: 20px;
            animation: slideDown 0.3s ease-out;
        }

        .hotel-search-collapse-content.active {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hotel-form-placeholder {
            padding: 40px 20px;
            text-align: center;
            color: #9CA3AF;
            font-size: 14px;
            border: 2px dashed #E5E7EB;
            border-radius: 8px;
            background-color: #FAFBFC;
        }

        @media (max-width: 767px) {
            .hotel-sidebar {
                display: none;
            }

            .hotel-card-header {
                flex-direction: column;
            }

            .hotel-card-rating {
                align-self: flex-start;
            }

            .hotel-card-footer {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>


<!-- hotel details page -->
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

        .hotel-details-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .hotel-details-header {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .hotel-details-title {
            font-size: 28px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 8px;
        }

        .hotel-details-meta {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 12px;
        }

        .hotel-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            color: #6B7280;
        }

        .hotel-meta-icon {
            color: #0077BE;
            font-size: 16px;
        }

        .hotel-rating-badge {
            background-color: #F0F9FF;
            border: 1px solid #0077BE;
            padding: 8px 12px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .hotel-rating-stars {
            color: #FFA500;
            font-size: 14px;
        }

        .hotel-rating-score {
            font-size: 14px;
            font-weight: 700;
            color: #0077BE;
        }

        .hotel-review-count {
            font-size: 13px;
            color: #6B7280;
        }

        /* Main Content */
        .hotel-details-main {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 1024px) {
            .hotel-details-main {
                grid-template-columns: 1fr 350px;
            }
        }

        /* Image Gallery */
        .hotel-gallery {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .hotel-gallery-main {
            position: relative;
            width: 100%;
            height: 400px;
            background-color: #E5E7EB;
            overflow: hidden;
        }

        .hotel-gallery-main img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #003580;
            font-size: 16px;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .gallery-nav-btn:hover {
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery-nav-btn.prev {
            left: 12px;
        }

        .gallery-nav-btn.next {
            right: 12px;
        }

        .hotel-gallery-thumbnails {
            display: flex;
            gap: 8px;
            padding: 12px;
            background-color: #FAFBFC;
            overflow-x: auto;
        }

        .gallery-thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid #E5E7EB;
            overflow: hidden;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .gallery-thumbnail:hover,
        .gallery-thumbnail.active {
            border-color: #0077BE;
        }

        .gallery-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Description Section */
        .hotel-description {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F3F4F6;
        }

        .hotel-description-text {
            font-size: 14px;
            color: #1A1A1A;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .hotel-highlights {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        @media (min-width: 768px) {
            .hotel-highlights {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }

        .highlight-item {
            padding: 10px;
            background-color: #F0F9FF;
            border-radius: 8px;
            border-left: 3px solid #0077BE;
            font-size: 13px;
            color: #1A1A1A;
        }

        .highlight-item i {
            color: #0077BE;
            margin-right: 6px;
        }

        /* Rooms Section */
        .hotel-rooms {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .room-card {
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .room-card:hover {
            border-color: #0077BE;
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.1);
        }

        .room-card-header {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            padding: 12px;
            background-color: #FAFBFC;
        }

        @media (min-width: 768px) {
            .room-card-header {
                grid-template-columns: 120px 1fr;
            }
        }

        .room-card-image {
            width: 100%;
            height: 120px;
            border-radius: 8px;
            object-fit: cover;
            background-color: #E5E7EB;
        }

        .room-card-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .room-name {
            font-size: 15px;
            font-weight: 700;
            color: #003580;
        }

        .room-features {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            font-size: 12px;
            color: #6B7280;
        }

        .room-card-body {
            padding: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .room-price {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .room-price-label {
            font-size: 11px;
            color: #6B7280;
            text-transform: uppercase;
            font-weight: 600;
        }

        .room-price-value {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
        }

        .room-select-btn {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .room-select-btn:hover {
            background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
            transform: translateY(-2px);
        }

        /* Amenities */
        .hotel-amenities {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .amenities-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (min-width: 768px) {
            .amenities-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .amenity-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 8px;
            background-color: #F9FAFB;
        }

        .amenity-icon {
            font-size: 18px;
            color: #0077BE;
            min-width: 24px;
        }

        .amenity-text {
            font-size: 13px;
            color: #1A1A1A;
            font-weight: 500;
        }

        /* Location & Map */
        .hotel-location {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .hotel-address {
            display: flex;
            gap: 10px;
            margin-bottom: 16px;
            padding: 12px;
            background-color: #F0F9FF;
            border-radius: 8px;
            border-left: 3px solid #0077BE;
        }

        .hotel-address-icon {
            color: #0077BE;
            font-size: 16px;
            min-width: 20px;
        }

        .hotel-address-text {
            font-size: 14px;
            color: #1A1A1A;
            font-weight: 500;
        }

        .hotel-map-placeholder {
            width: 100%;
            height: 300px;
            background-color: #E5E7EB;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9CA3AF;
            font-size: 14px;
        }

        /* Sidebar - Booking Summary */
        .hotel-booking-sidebar {
            background-color: white;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .booking-summary-title {
            font-size: 15px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F3F4F6;
        }

        .booking-summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            font-size: 13px;
            border-bottom: 1px solid #F3F4F6;
        }

        .booking-summary-item:last-child {
            border-bottom: none;
        }

        .booking-label {
            color: #6B7280;
            font-weight: 500;
        }

        .booking-value {
            color: #1A1A1A;
            font-weight: 700;
        }

        .booking-total {
            background-color: #F0F9FF;
            padding: 12px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            border: 1px solid #0077BE;
        }

        .booking-total-label {
            font-size: 13px;
            color: #003580;
            font-weight: 600;
        }

        .booking-total-value {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
        }

        .booking-btn {
            width: 100%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            margin-top: 14px;
        }

        .booking-btn:hover {
            background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
            transform: translateY(-2px);
        }

        /* Reviews Section */
        .hotel-reviews {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .review-card {
            padding: 14px;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }

        .review-user-name {
            font-size: 13px;
            font-weight: 700;
            color: #1A1A1A;
        }

        .review-rating {
            color: #FFA500;
            font-size: 12px;
        }

        .review-date {
            font-size: 12px;
            color: #9CA3AF;
        }

        .review-text {
            font-size: 13px;
            color: #6B7280;
            line-height: 1.5;
        }

        @media (max-width: 1023px) {
            .hotel-booking-sidebar {
                position: static;
            }
        }
    </style>


<!-- hotel booking -->
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

        .booking-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Progress Steps */
        .booking-steps {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .steps-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            flex: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #E5E7EB;
            border: 2px solid #E5E7EB;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #9CA3AF;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .step.active .step-circle {
            background-color: #0077BE;
            border-color: #0077BE;
            color: white;
        }

        .step.completed .step-circle {
            background-color: #10B981;
            border-color: #10B981;
            color: white;
        }

        .step-line {
            flex: 1;
            height: 2px;
            background-color: #E5E7EB;
            margin: 0 -6px;
            transition: background-color 0.3s ease;
        }

        .step.completed .step-line {
            background-color: #10B981;
        }

        .step-label {
            font-size: 12px;
            font-weight: 600;
            color: #6B7280;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .step.active .step-label {
            color: #0077BE;
        }

        /* Main Content */
        .booking-main {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        @media (min-width: 1024px) {
            .booking-main {
                grid-template-columns: 1fr 350px;
            }
        }

        /* Form Container */
        .booking-form-container {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .form-section {
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 2px solid #F3F4F6;
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-icon {
            color: #0077BE;
            font-size: 18px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
            margin-bottom: 14px;
        }

        @media (min-width: 768px) {
            .form-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input, .form-select, .form-textarea {
            padding: 11px 14px;
            border: 2px solid #E5E7EB;
            border-radius: 10px;
            font-size: 13px;
            color: #1A1A1A;
            font-family: inherit;
            background-color: #FFFFFF;
            transition: all 0.3s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #0077BE;
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.1);
            outline: none;
        }

        .form-input:hover, .form-select:hover, .form-textarea:hover {
            border-color: #D1D5DB;
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-checkbox input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #0077BE;
        }

        .form-checkbox label {
            font-size: 13px;
            color: #1A1A1A;
            cursor: pointer;
            flex: 1;
        }

        /* Payment Section */
        .payment-section {
            margin-bottom: 14px;
        }

        .payment-info {
            background-color: #F0F9FF;
            border: 1px solid #0077BE;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 14px;
        }

        .payment-info-text {
            font-size: 12px;
            color: #0077BE;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .payment-info-icon {
            font-size: 14px;
        }

        .card-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .card-number-input {
            font-family: 'Courier New', monospace;
        }

        .card-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* Sidebar - Booking Summary */
        .booking-summary-sidebar {
            background-color: white;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .summary-title {
            font-size: 15px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 14px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F3F4F6;
        }

        .summary-hotel-info {
            margin-bottom: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid #F3F4F6;
        }

        .summary-hotel-name {
            font-size: 13px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 4px;
        }

        .summary-hotel-detail {
            font-size: 12px;
            color: #6B7280;
            margin-bottom: 2px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            font-size: 12px;
            border-bottom: 1px solid #F3F4F6;
        }

        .summary-item:last-of-type {
            border-bottom: none;
        }

        .summary-label {
            color: #6B7280;
            font-weight: 500;
        }

        .summary-value {
            color: #1A1A1A;
            font-weight: 600;
        }

        .summary-breakdown {
            background-color: #FAFBFC;
            padding: 12px;
            border-radius: 8px;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            margin-bottom: 6px;
            color: #6B7280;
        }

        .breakdown-item:last-child {
            margin-bottom: 0;
        }

        .summary-total {
            background: linear-gradient(135deg, #F0F9FF 0%, #E8F5FF 100%);
            border: 1px solid #0077BE;
            padding: 12px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
        }

        .summary-total-label {
            font-size: 13px;
            color: #003580;
            font-weight: 600;
        }

        .summary-total-value {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
        }

        /* Action Buttons */
        .booking-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .btn-back {
            flex: 1;
            padding: 12px;
            border: 2px solid #E5E7EB;
            background-color: white;
            color: #1A1A1A;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            border-color: #D1D5DB;
            background-color: #F9FAFB;
        }

        .btn-confirm {
            flex: 1;
            padding: 12px;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-confirm:hover {
            background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
            transform: translateY(-2px);
        }

        @media (max-width: 1023px) {
            .booking-summary-sidebar {
                position: static;
            }
        }

        @media (max-width: 640px) {
            .steps-container {
                flex-direction: column;
            }

            .step-line {
                display: none;
            }

            .booking-form-container {
                padding: 16px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    
</head>
<body>

    <!-- NAVIGATION BAR -->
    <nav class="nav-bar sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 md:py-4 flex items-center justify-between">
            
            <!-- Logo & Name -->
            <div class="flex items-center gap-2">
                <i class="fas fa-plane text-blue-600 text-2xl"></i>
                <div class="text-xl md:text-2xl font-bold" style="color: #003580;">Travel</div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex gap-8 items-center flex-1 justify-center">
                <a href="#flights" class="nav-item">
                    <i class="fas fa-plane"></i>
                    <span>Flights</span>
                </a>
                <a href="#hotels" class="nav-item">
                    <i class="fas fa-hotel"></i>
                    <span>Hotels</span>
                </a>
                <a href="#visa" class="nav-item">
                    <i class="fas fa-passport"></i>
                    <span>Visa</span>
                </a>
            </div>

            <!-- Desktop Sign In Button -->
            <div class="hidden md:flex gap-3 items-center">
                <button class="btn-signin px-8 py-2.5 font-semibold rounded-lg transition duration-300 text-sm flex items-center gap-2">
                    <i class="fas fa-user"></i>
                    <span>Sign In</span>
                </button>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <button class="hamburger md:hidden flex flex-col gap-1.5 cursor-pointer" onclick="toggleMobileMenu()">
                <span class="w-5 h-0.5 transition-all" style="background-color: #1A1A1A;"></span>
                <span class="w-5 h-0.5 transition-all" style="background-color: #1A1A1A;"></span>
                <span class="w-5 h-0.5 transition-all" style="background-color: #1A1A1A;"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu md:hidden border-t" style="background-color: #F7F9FC; border-color: #E5E7EB;">
            <div class="px-4 py-4 space-y-2">
                <a href="#flights" class="block font-medium py-3 px-4 rounded-lg hover:bg-blue-50 transition text-sm flex items-center gap-3" style="color: #003580;">
                    <i class="fas fa-plane"></i>
                    <span>Flights</span>
                </a>
                <a href="#hotels" class="block font-medium py-3 px-4 rounded-lg hover:bg-blue-50 transition text-sm flex items-center gap-3" style="color: #003580;">
                    <i class="fas fa-hotel"></i>
                    <span>Hotels</span>
                </a>
                <a href="#visa" class="block font-medium py-3 px-4 rounded-lg hover:bg-blue-50 transition text-sm flex items-center gap-3" style="color: #003580;">
                    <i class="fas fa-passport"></i>
                    <span>Visa</span>
                </a>
                <hr class="border-gray-300 my-4">
                <button class="btn-signin w-full px-4 py-2.5 font-semibold rounded-lg transition text-sm flex items-center justify-center gap-2">
                    <i class="fas fa-user"></i>
                    <span>Sign In</span>
                </button>
            </div>
        </div>
    </nav>