<?php include 'header.php'; ?>


<div class="hotel-container">
    <!-- Search Collapse -->
    <div class="hotel-search-collapse">
        <button class="hotel-search-collapse-btn" id="searchCollapseBtn">
            <span><i class="fas fa-search"></i> Modify Search</span>
            <i class="fas fa-chevron-down" id="collapseIcon"></i>
        </button>
        <div class="hotel-search-collapse-content" id="searchCollapseContent">
             <?php include 'hotelform.php'; ?>
        </div>
    </div>

    <!-- Search Info -->
    <div class="hotel-search-info">
        <div class="hotel-search-info-row">
            <div class="hotel-info-item">
                <i class="fas fa-map-pin hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Destination</div>
                    <div class="hotel-info-value">Karachi, Pakistan</div>
                </div>
            </div>
            <div class="hotel-info-item">
                <i class="fas fa-calendar hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Check-in</div>
                    <div class="hotel-info-value">15 Nov 2024</div>
                </div>
            </div>
            <div class="hotel-info-item">
                <i class="fas fa-calendar hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Check-out</div>
                    <div class="hotel-info-value">18 Nov 2024</div>
                </div>
            </div>
            <div class="hotel-info-item">
                <i class="fas fa-users hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Guests</div>
                    <div class="hotel-info-value">2 Adults, 1 Room</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="hotel-main-content">
        <!-- Sidebar Filter -->
        <div class="hotel-sidebar">
            <div class="hotel-filter-section">
                <div class="hotel-filter-title">Price Range</div>
                <input type="range" id="priceSlider" class="hotel-price-slider" min="0" max="20000" value="10000" step="500">
                <div class="hotel-price-display">
                    <span class="hotel-price-label-sm">Max Price:</span>
                    <span class="hotel-price-value-sm" id="priceValue">10,000 PKR</span>
                </div>
            </div>

            <div class="hotel-filter-section">
                <div class="hotel-filter-title">Star Rating</div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="star5" checked>
                    <label for="star5">⭐⭐⭐⭐⭐ 5 Star</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="star4" checked>
                    <label for="star4">⭐⭐⭐⭐ 4 Star</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="star3" checked>
                    <label for="star3">⭐⭐⭐ 3 Star</label>
                </div>
            </div>

            <div class="hotel-filter-section">
                <div class="hotel-filter-title">Amenities</div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="wifi" checked>
                    <label for="wifi">Free WiFi</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="parking" checked>
                    <label for="parking">Free Parking</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="pool" checked>
                    <label for="pool">Swimming Pool</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="ac" checked>
                    <label for="ac">Air Conditioning</label>
                </div>
            </div>
        </div>

        <!-- Hotel Cards -->
        <div class="hotel-cards-container">
            <!-- Hotel Card 1 -->
            <div class="hotel-card">
                <div style="position: relative;">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&h=300&fit=crop" alt="Pearl Continental" class="hotel-card-image">
                    <div class="hotel-card-badge">-20% OFF</div>
                </div>
                <div class="hotel-card-body">
                    <div class="hotel-card-header">
                        <div>
                            <div class="hotel-card-title">Pearl Continental Hotel</div>
                            <div class="hotel-card-location">
                                <i class="fas fa-map-pin hotel-card-location-icon"></i>
                                <span>Shahrae-e-Firdousi, Karachi</span>
                            </div>
                        </div>
                        <div class="hotel-card-rating">
                            <span class="hotel-card-stars">★★★★★</span>
                            <span class="hotel-card-rating-number">4.8</span>
                        </div>
                    </div>

                    <div class="hotel-card-room-type">Deluxe Room</div>

                    <div class="hotel-card-amenities">
                        <div class="hotel-amenity">
                            <i class="fas fa-wifi hotel-amenity-icon"></i>
                            <span>WiFi</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-car hotel-amenity-icon"></i>
                            <span>Parking</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-water hotel-amenity-icon"></i>
                            <span>Pool</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-snowflake hotel-amenity-icon"></i>
                            <span>AC</span>
                        </div>
                    </div>

                    <div class="hotel-card-footer">
                        <div class="hotel-card-price">
                            <div class="hotel-card-price-label">Per Night</div>
                            <div>
                                <div class="hotel-card-price-value">8,000 PKR</div>
                                <div class="hotel-card-price-original">10,000 PKR</div>
                            </div>
                        </div>
                        <button class="hotel-select-btn">Select & Continue</button>
                    </div>
                </div>
            </div>

            <!-- Hotel Card 2 -->
            <div class="hotel-card">
                <div style="position: relative;">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&h=300&fit=crop" alt="Distt Pearls" class="hotel-card-image">
                    <div class="hotel-card-badge">-15% OFF</div>
                </div>
                <div class="hotel-card-body">
                    <div class="hotel-card-header">
                        <div>
                            <div class="hotel-card-title">Distt Pearls Hotel</div>
                            <div class="hotel-card-location">
                                <i class="fas fa-map-pin hotel-card-location-icon"></i>
                                <span>Defence, Karachi</span>
                            </div>
                        </div>
                        <div class="hotel-card-rating">
                            <span class="hotel-card-stars">★★★★</span>
                            <span class="hotel-card-rating-number">4.5</span>
                        </div>
                    </div>

                    <div class="hotel-card-room-type">Premium Suite</div>

                    <div class="hotel-card-amenities">
                        <div class="hotel-amenity">
                            <i class="fas fa-wifi hotel-amenity-icon"></i>
                            <span>WiFi</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-car hotel-amenity-icon"></i>
                            <span>Parking</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-snowflake hotel-amenity-icon"></i>
                            <span>AC</span>
                        </div>
                    </div>

                    <div class="hotel-card-footer">
                        <div class="hotel-card-price">
                            <div class="hotel-card-price-label">Per Night</div>
                            <div>
                                <div class="hotel-card-price-value">6,500 PKR</div>
                                <div class="hotel-card-price-original">7,650 PKR</div>
                            </div>
                        </div>
                        <button class="hotel-select-btn">Select & Continue</button>
                    </div>
                </div>
            </div>

            <!-- Hotel Card 3 -->
            <div class="hotel-card">
                <div style="position: relative;">
                    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=400&h=300&fit=crop" alt="Avari Towers" class="hotel-card-image">
                </div>
                <div class="hotel-card-body">
                    <div class="hotel-card-header">
                        <div>
                            <div class="hotel-card-title">Avari Towers Karachi</div>
                            <div class="hotel-card-location">
                                <i class="fas fa-map-pin hotel-card-location-icon"></i>
                                <span>Club Road, Karachi</span>
                            </div>
                        </div>
                        <div class="hotel-card-rating">
                            <span class="hotel-card-stars">★★★★★</span>
                            <span class="hotel-card-rating-number">4.7</span>
                        </div>
                    </div>

                    <div class="hotel-card-room-type">Executive Room</div>

                    <div class="hotel-card-amenities">
                        <div class="hotel-amenity">
                            <i class="fas fa-wifi hotel-amenity-icon"></i>
                            <span>WiFi</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-car hotel-amenity-icon"></i>
                            <span>Parking</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-water hotel-amenity-icon"></i>
                            <span>Pool</span>
                        </div>
                        <div class="hotel-amenity">
                            <i class="fas fa-snowflake hotel-amenity-icon"></i>
                            <span>AC</span>
                        </div>
                    </div>

                    <div class="hotel-card-footer">
                        <div class="hotel-card-price">
                            <div class="hotel-card-price-label">Per Night</div>
                            <div>
                                <div class="hotel-card-price-value">12,500 PKR</div>
                            </div>
                        </div>
                        <button class="hotel-select-btn">Select & Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php';