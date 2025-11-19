<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking Hub</title>
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
        }

        .navbar {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 16px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 700;
        }

        .logo i {
            font-size: 24px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            color: #003580;
            margin-bottom: 50px;
        }

        .hero h1 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .hero p {
            font-size: 16px;
            color: #6B7280;
            line-height: 1.6;
        }

        /* Pages Grid */
        .pages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .page-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
        }

        .page-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 119, 190, 0.15);
        }

        .page-card-header {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 24px;
            text-align: center;
            font-size: 40px;
        }

        .page-card-content {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .page-card-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
        }

        .page-card-description {
            font-size: 13px;
            color: #6B7280;
            line-height: 1.6;
            flex: 1;
        }

        .page-card-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #0077BE;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 12px;
            transition: all 0.3s ease;
        }

        .page-card:hover .page-card-link {
            gap: 10px;
            color: #005A9C;
        }

        /* Categories Section */
        .categories-section {
            background: white;
            border-radius: 12px;
            padding: 32px;
            margin-bottom: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 24px;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .category-item {
            background: linear-gradient(135deg, #F0F4FF 0%, #E8EFFF 100%);
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .category-item:hover {
            border-color: #0077BE;
            background: linear-gradient(135deg, #E0EFFF 0%, #D8E7FF 100%);
            transform: translateY(-4px);
        }

        .category-icon {
            font-size: 28px;
            color: #0077BE;
            margin-bottom: 8px;
        }

        .category-name {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Footer */
        .footer {
            background: white;
            border-top: 1px solid #E5E7EB;
            padding: 32px 0;
            margin-top: 50px;
            text-align: center;
            color: #6B7280;
            font-size: 12px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #0077BE;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: #005A9C;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            background-color: #D1FAE5;
            color: #065F46;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 28px;
            }

            .pages-grid {
                grid-template-columns: 1fr;
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <i class="fas fa-plane"></i>
                FlightHub
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Travel Booking Platform</h1>
            <p>Complete booking system with flights, hotels, visas, and more. Click any page below to explore.</p>
        </div>

        <!-- Flight Section -->
        <div class="categories-section">
            <h2 class="section-title"><i class="fas fa-plane" style="color: #0077BE; margin-right: 8px;"></i> Flight Services</h2>
            <div class="pages-grid">

            <a href="flight.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Flight Booking Form</div>
                        <div class="page-card-description">Fill details and book your flight with ease</div>
                        <div class="page-card-link">Book Flight <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>


                <a href="flightlist.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Flight List</div>
                        <div class="page-card-description">Browse available flights with pricing, routes, and timings</div>
                        <div class="page-card-link">View Flights <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                

                <a href="flightbooking.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Flight Booking Checkout</div>
                        <div class="page-card-description">Complete booking with passenger details and payment</div>
                        <div class="page-card-link">Proceed to Checkout <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="flightinvoice.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Flight Invoice</div>
                        <div class="page-card-description">Download and print your booking invoice</div>
                        <div class="page-card-link">View Invoice <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Hotel Section -->
        <div class="categories-section">
            <h2 class="section-title"><i class="fas fa-hotel" style="color: #0077BE; margin-right: 8px;"></i> Hotel Services</h2>
            <div class="pages-grid">

            
                <a href="index.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-pencil"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Hotel Booking Form</div>
                        <div class="page-card-description">Fill in your preferences and book a hotel room</div>
                        <div class="page-card-link">Book Hotel <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>


                <a href="hotellist.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-bed"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Hotel List</div>
                        <div class="page-card-description">Search and compare hotels by price and ratings</div>
                        <div class="page-card-link">Browse Hotels <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="hoteldetails.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Hotel Details</div>
                        <div class="page-card-description">View complete hotel information and amenities</div>
                        <div class="page-card-link">See Details <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="hotelbooking.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Hotel Booking</div>
                        <div class="page-card-description">Complete booking with passenger details and payment</div>
                        <div class="page-card-link">See Details <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>


                <a href="hotelinvoice.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Hotel Invoice</div>
                        <div class="page-card-description">Get your hotel booking confirmation and receipt</div>
                        <div class="page-card-link">View Invoice <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                
                <a href="demobookingmsg.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Demo Account Message</div>
                        <div class="page-card-description">Demo account limitations and upgrade options</div>
                        <div class="page-card-link">Demo Info <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Visa Section -->
        <div class="categories-section">
            <h2 class="section-title"><i class="fas fa-passport" style="color: #0077BE; margin-right: 8px;"></i> Visa Services</h2>
            <div class="pages-grid">
                <a href="visapage.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Visa Application Form</div>
                        <div class="page-card-description">Complete visa application with document uploads</div>
                        <div class="page-card-link">Apply Visa <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="visamsg.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Visa Confirmation</div>
                        <div class="page-card-description">Application submitted confirmation and tracking</div>
                        <div class="page-card-link">Track Application <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Blog & Content Section -->
        <div class="categories-section">
            <h2 class="section-title"><i class="fas fa-blog" style="color: #0077BE; margin-right: 8px;"></i> Blog & Information</h2>
            <div class="pages-grid">
                <a href="blog.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Blog Page</div>
                        <div class="page-card-description">Browse travel tips, guides, and destination articles</div>
                        <div class="page-card-link">Read Blog <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="blogdetail.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-article"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Blog Article</div>
                        <div class="page-card-description">Read full article with related posts</div>
                        <div class="page-card-link">Read Article <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="contact.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Contact Us</div>
                        <div class="page-card-description">Get in touch with our support team</div>
                        <div class="page-card-link">Contact <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="page.php" class="page-card">
                    <div class="page-card-header">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="page-card-content">
                        <div class="page-card-title">Policies & Info</div>
                        <div class="page-card-description">Terms, Privacy, About Us, and FAQ</div>
                        <div class="page-card-link">View Pages <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="categories-section">
            <h2 class="section-title"><i class="fas fa-chart-bar" style="color: #0077BE; margin-right: 8px;"></i> Platform Overview</h2>
            <div class="category-grid">
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="category-name">150+ Countries</div>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="category-name">5M+ Customers</div>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-hotel"></i>
                    </div>
                    <div class="category-name">50K+ Hotels</div>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-plane"></i>
                    </div>
                    <div class="category-name">500+ Airlines</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
            <a href="page.php?tab=terms">Terms & Conditions</a>
            <span>|</span>
            <a href="page.php?tab=privacy">Privacy Policy</a>
            <span>|</span>
            <a href="page.php?tab=about">About Us</a>
            <span>|</span>
            <a href="contact.php">Contact</a>
        </div>
        <p>&copy; 2024 FlightHub. All rights reserved.</p>
    </div>
</body>
</html>