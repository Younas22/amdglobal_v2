@extends('common.layout')
@section('content')

    <style>
        /* Hero Background Image - Crystal Clear */
        .hero-section {
            background: url('<?=url('public/assets/images/flight/h4.jpg')?>') center/cover no-repeat;
            min-height: 700px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding-top: 60px;
        }

        /* Curved Bottom Shape */
        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: #F9FAFB;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
            z-index: 1;
        }

        /* Hero Content */
        .hero-content {
            position: relative;
            z-index: 2;
            margin-bottom: 40px;
        }

        /* Search Form Container */
        .form-container-wrapper {
            position: relative;
            z-index: 2;
        }

        /* Hotel Cards Grid - 3 per row */
        .hotel-deals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (min-width: 1024px) {
            .hotel-deals-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Clean Minimal Hotel Card */
        .hotel-deal-card {
            background: white;
            border-radius: 16px;
            padding: 0;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
            border: 1px solid #E5E7EB;
            position: relative;
            overflow: hidden;
        }

        .hotel-deal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 119, 190, 0.15);
            border-color: #0077BE;
        }

        /* Card Image Styling */
        .hotel-card-image {
            width: 100%;
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .hotel-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .hotel-deal-card:hover .hotel-card-image img {
            transform: scale(1.1);
        }

        /* Rating Badge */
        .rating-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.95);
            color: #0077BE;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .rating-badge i {
            color: #FFA500;
            font-size: 11px;
        }

        /* Card Body */
        .hotel-card-body {
            padding: 20px;
        }

        .hotel-name {
            font-size: 18px;
            font-weight: 700;
            color: #1F2937;
            margin-bottom: 8px;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .hotel-location {
            font-size: 13px;
            color: #6B7280;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .hotel-location i {
            color: #0077BE;
            font-size: 12px;
        }

        /* Amenities */
        .hotel-amenities {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .amenity-item {
            font-size: 11px;
            color: #6B7280;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .amenity-item i {
            color: #0077BE;
            font-size: 12px;
        }

        /* Price Section */
        .hotel-price-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #E5E7EB;
        }

        .price-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .price-label {
            font-size: 11px;
            color: #9CA3AF;
            font-weight: 600;
            text-transform: uppercase;
        }

        .price-amount {
            font-size: 20px;
            font-weight: 700;
            color: #0077BE;
        }

        .price-currency {
            font-size: 14px;
            font-weight: 600;
        }

        .view-deal-btn {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .view-deal-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
        }

        /* Hover effect on text */
        .hotel-deal-card:hover .hotel-name {
            color: #0077BE;
        }

        /* Popular Badge */
        .popular-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 650px;
                padding-top: 40px;
            }
            
            .hero-section::after {
                height: 80px;
            }
        }


        .responsive-section {
    background-color: #F7F9FC;
    padding: 60px 8px; /* default for mobile */
}

@media (min-width: 1025px) {
    .responsive-section {
        padding: 60px 20px; /* for larger screens */
    }
}
    </style>


    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 style="color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Find Your Perfect Hotel</h1>
            <p style="color: white; text-shadow: 0 2px 8px rgba(0,0,0,0.2);">Discover amazing hotels and resorts for your next vacation</p>
        </div>

        <!-- Search Form -->
        <div class="form-container">
            <div class="tab-content active bg-white rounded-lg shadow-lg p-6 mb-8 relative z-10" id="form-flight">
            @include('forms.hotel-form')
            </div>
        </div>
    </section>

    <!-- Featured Hotels Section -->
    <section class="responsive-section">
        <div class="container">
            <div class="section-header">
                <h2>Featured Hotel Deals</h2>
                <p>Handpicked hotels with the best rates</p>
            </div>

            <div class="hotel-deals-grid">
                <!-- Hotel Card 1 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=300&fit=crop" alt="Luxury Hotel Dubai">
                        <div class="popular-badge">POPULAR</div>
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.8
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Burj Al Arab Jumeirah</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 850
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 2 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=400&h=300&fit=crop" alt="Hotel Kuala Lumpur">
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.6
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Petronas Tower Hotel</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 320
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 3 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=400&h=300&fit=crop" alt="Berlin Hotel">
                        <div class="popular-badge" style="background: linear-gradient(135deg, #10B981 0%, #059669 100%);">BEST VALUE</div>
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.7
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Grand Berlin Palace</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 280
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 4 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1455587734955-081b22074882?w=400&h=300&fit=crop" alt="Istanbul Hotel">
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.9
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Bosphorus Luxury Suites</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 420
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 5 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400&h=300&fit=crop" alt="London Hotel">
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.5
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">The Royal Thames Hotel</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 520
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 6 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=400&h=300&fit=crop" alt="Paris Hotel">
                        <div class="popular-badge" style="background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);">PREMIUM</div>
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 5.0
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Le Meurice Paris</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 980
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 7 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=400&h=300&fit=crop" alt="Bangkok Hotel">
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.6
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Mandarin Oriental Bangkok</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 380
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 8 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1496417263034-38ec4f0b665a?w=400&h=300&fit=crop" alt="New York Hotel">
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.8
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">The Plaza New York</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 750
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>

                <!-- Hotel Card 9 -->
                <a href="#" class="hotel-deal-card">
                    <div class="hotel-card-image">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&h=300&fit=crop" alt="Maldives Resort">
                        <div class="popular-badge" style="background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);">HOT DEAL</div>
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.9
                        </div>
                    </div>
                    <div class="hotel-card-body">
                        <h3 class="hotel-name">Paradise Island Resort & Spa</h3>
                        <div class="hotel-price-section">
                            <div class="price-info">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">
                                    <span class="price-currency">USD</span> 1,200
                                </div>
                            </div>
                            <button class="view-deal-btn">View Deal</button>
                        </div>
                    </div>
                </a>
            </div>

            <!-- View All Button -->
            <div class="cta-section">
                <a href="#" class="cta-button">
                    <i class="fas fa-hotel"></i> View All Hotels
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="how-it-works">
        <div class="section-header">
            <h2>Why Book Hotels With Us?</h2>
            <p>Your trusted partner for perfect accommodation</p>
        </div>

        <div class="steps-container">
            <div class="step-card">
                <div class="step-number">
                    <i class="fas fa-search step-icon"></i>
                </div>
                <h3 class="step-title">Easy Search</h3>
                <p class="step-description">Find the perfect hotel from thousands of options worldwide</p>
            </div>

            <div class="step-card">
                <div class="step-number">
                    <i class="fas fa-tags step-icon"></i>
                </div>
                <h3 class="step-title">Best Prices</h3>
                <p class="step-description">Exclusive deals and lowest rates guaranteed</p>
            </div>

            <div class="step-card">
                <div class="step-number">
                    <i class="fas fa-shield-alt step-icon"></i>
                </div>
                <h3 class="step-title">Secure Booking</h3>
                <p class="step-description">Safe payment and instant confirmation</p>
            </div>

            <div class="step-card">
                <div class="step-number">
                    <i class="fas fa-headset step-icon"></i>
                </div>
                <h3 class="step-title">24/7 Support</h3>
                <p class="step-description">Round-the-clock assistance for your stay</p>
            </div>
        </div>
    </section>

@endsection