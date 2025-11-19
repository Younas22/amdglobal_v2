<?php include 'header.php'; ?>

<div class="hotel-details-container">
    <!-- Header -->
    <div class="hotel-details-header">
        <h1 class="hotel-details-title">Pearl Continental Hotel Karachi</h1>
        <div class="hotel-details-meta">
            <div class="hotel-meta-item">
                <i class="fas fa-map-pin hotel-meta-icon"></i>
                <span>Shahrae-e-Firdousi, Karachi</span>
            </div>
            <div class="hotel-rating-badge">
                <span class="hotel-rating-stars">★★★★★</span>
                <span class="hotel-rating-score">4.8</span>
                <span class="hotel-review-count">(1,250 reviews)</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="hotel-details-main">
        <div>
            <!-- Image Gallery -->
            <div class="hotel-gallery">
                <div class="hotel-gallery-main">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=400&fit=crop" alt="Hotel" id="mainImage">
                    <button class="gallery-nav-btn prev" onclick="prevImage()"><i class="fas fa-chevron-left"></i></button>
                    <button class="gallery-nav-btn next" onclick="nextImage()"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="hotel-gallery-thumbnails">
                    <div class="gallery-thumbnail active" onclick="changeImage(0)">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=400&fit=crop">
                    </div>
                    <div class="gallery-thumbnail" onclick="changeImage(1)">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=400&fit=crop">
                    </div>
                    <div class="gallery-thumbnail" onclick="changeImage(2)">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=400&fit=crop">
                    </div>
                    <div class="gallery-thumbnail" onclick="changeImage(3)">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=400&fit=crop">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="hotel-description">
                <div class="section-title">About Hotel</div>
                <p class="hotel-description-text">
                    Pearl Continental Hotel Karachi is a luxurious 5-star hotel offering world-class accommodations and amenities. Located in the heart of Karachi, it provides easy access to major business and entertainment districts. The hotel features elegant rooms, fine dining restaurants, and state-of-the-art facilities.
                </p>
                <div class="section-title" style="margin-top: 16px;">Highlights</div>
                <div class="hotel-highlights">
                    <div class="highlight-item">
                        <i class="fas fa-check"></i>
                        Free Cancellation
                    </div>
                    <div class="highlight-item">
                        <i class="fas fa-check"></i>
                        Reserve Now, Pay Later
                    </div>
                    <div class="highlight-item">
                        <i class="fas fa-check"></i>
                        Room Service 24/7
                    </div>
                </div>
            </div>

            <!-- Rooms -->
            <div class="hotel-rooms">
                <div class="section-title">Available Rooms</div>

                <div class="room-card">
                    <div class="room-card-header">
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=150&h=150&fit=crop" alt="Room" class="room-card-image">
                        <div class="room-card-info">
                            <div class="room-name">Deluxe Room</div>
                            <div class="room-features">
                                <span><i class="fas fa-ruler-combined"></i> 40 sqm</span>
                                <span><i class="fas fa-bed"></i> 1 King Bed</span>
                                <span><i class="fas fa-wifi"></i> Free WiFi</span>
                            </div>
                        </div>
                    </div>
                    <div class="room-card-body">
                        <div class="room-price">
                            <div class="room-price-label">Per Night</div>
                            <div class="room-price-value">8,000 PKR</div>
                        </div>
                        <button class="room-select-btn">Select Room</button>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-card-header">
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=150&h=150&fit=crop" alt="Room" class="room-card-image">
                        <div class="room-card-info">
                            <div class="room-name">Premium Suite</div>
                            <div class="room-features">
                                <span><i class="fas fa-ruler-combined"></i> 60 sqm</span>
                                <span><i class="fas fa-bed"></i> 2 Beds</span>
                                <span><i class="fas fa-wifi"></i> Free WiFi</span>
                            </div>
                        </div>
                    </div>
                    <div class="room-card-body">
                        <div class="room-price">
                            <div class="room-price-label">Per Night</div>
                            <div class="room-price-value">12,000 PKR</div>
                        </div>
                        <button class="room-select-btn">Select Room</button>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-card-header">
                        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=150&h=150&fit=crop" alt="Room" class="room-card-image">
                        <div class="room-card-info">
                            <div class="room-name">Executive Room</div>
                            <div class="room-features">
                                <span><i class="fas fa-ruler-combined"></i> 50 sqm</span>
                                <span><i class="fas fa-bed"></i> 1 King Bed</span>
                                <span><i class="fas fa-wifi"></i> Free WiFi</span>
                            </div>
                        </div>
                    </div>
                    <div class="room-card-body">
                        <div class="room-price">
                            <div class="room-price-label">Per Night</div>
                            <div class="room-price-value">10,000 PKR</div>
                        </div>
                        <button class="room-select-btn">Select Room</button>
                    </div>
                </div>
            </div>

            <!-- Amenities -->
            <div class="hotel-amenities">
                <div class="section-title">Amenities</div>
                <div class="amenities-grid">
                    <div class="amenity-item">
                        <i class="fas fa-wifi amenity-icon"></i>
                        <span class="amenity-text">Free WiFi</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-car amenity-icon"></i>
                        <span class="amenity-text">Free Parking</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-water amenity-icon"></i>
                        <span class="amenity-text">Swimming Pool</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-dumbbell amenity-icon"></i>
                        <span class="amenity-text">Fitness Center</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-utensils amenity-icon"></i>
                        <span class="amenity-text">Restaurant</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-concierge-bell amenity-icon"></i>
                        <span class="amenity-text">24/7 Room Service</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-snowflake amenity-icon"></i>
                        <span class="amenity-text">Air Conditioning</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-tv amenity-icon"></i>
                        <span class="amenity-text">Smart TV</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-spa amenity-icon"></i>
                        <span class="amenity-text">Spa & Massage</span>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="hotel-location">
                <div class="section-title">Location & Map</div>
                <div class="hotel-address">
                    <i class="fas fa-map-pin hotel-address-icon"></i>
                    <div class="hotel-address-text">
                        Shahrae-e-Firdousi, Clifton, Karachi 75600, Pakistan
                    </div>
                </div>
                <div class="hotel-map-placeholder">
                    <i class="fas fa-map" style="font-size: 32px; margin-right: 8px;"></i>
                    Google Map Placeholder
                </div>
            </div>

            <!-- Reviews -->
            <div class="hotel-reviews">
                <div class="section-title">Guest Reviews</div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <div class="review-user-name">Ahmed Khan</div>
                            <div class="review-rating">★★★★★</div>
                        </div>
                        <div class="review-date">2 days ago</div>
                    </div>
                    <div class="review-text">
                        Excellent hotel with amazing service! The rooms are clean and comfortable, staff is very friendly. Highly recommended for anyone visiting Karachi.
                    </div>
                </div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <div class="review-user-name">Fatima Ali</div>
                            <div class="review-rating">★★★★</div>
                        </div>
                        <div class="review-date">5 days ago</div>
                    </div>
                    <div class="review-text">
                        Great location and good amenities. The breakfast was delicious. Only issue was a bit noisy at night, but overall a great stay.
                    </div>
                </div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <div class="review-user-name">Hassan Raza</div>
                            <div class="review-rating">★★★★★</div>
                        </div>
                        <div class="review-date">1 week ago</div>
                    </div>
                    <div class="review-text">
                        Premium 5-star experience. Everything was perfect from check-in to check-out. The pool and spa were exceptional. Will definitely stay here again.
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar - Booking Summary -->
        <div class="hotel-booking-sidebar">
            <div class="booking-summary-title">Booking Summary</div>

            <div class="booking-summary-item">
                <span class="booking-label">Check-in</span>
                <span class="booking-value">15 Nov 2024</span>
            </div>

            <div class="booking-summary-item">
                <span class="booking-label">Check-out</span>
                <span class="booking-value">18 Nov 2024</span>
            </div>

            <div class="booking-summary-item">
                <span class="booking-label">Nights</span>
                <span class="booking-value">3</span>
            </div>

            <div class="booking-summary-item">
                <span class="booking-label">Guests</span>
                <span class="booking-value">2 Adults</span>
            </div>

            <div class="booking-summary-item">
                <span class="booking-label">Room Type</span>
                <span class="booking-value">Deluxe Room</span>
            </div>

            <div class="booking-summary-item">
                <span class="booking-label">Price/Night</span>
                <span class="booking-value">8,000 PKR</span>
            </div>

            <div class="booking-total">
                <span class="booking-total-label">Total Price</span>
                <span class="booking-total-value">24,000 PKR</span>
            </div>

            <button class="booking-btn">
                <i class="fas fa-check"></i> Proceed to Booking
            </button>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>