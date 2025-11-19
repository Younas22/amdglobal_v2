<?php include 'header.php'; ?>
<div class="booking-container">
    <!-- Progress Steps -->
    <div class="booking-steps">
        <div class="steps-container">
            <div class="step completed">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-label">Hotel Selection</div>
            </div>
            <div class="step-line"></div>

            <div class="step active">
                <div class="step-circle">2</div>
                <div class="step-label">Guest Details</div>
            </div>
            <div class="step-line"></div>

            <div class="step">
                <div class="step-circle">3</div>
                <div class="step-label">Payment</div>
            </div>
            <div class="step-line"></div>

            <div class="step">
                <div class="step-circle">4</div>
                <div class="step-label">Confirmation</div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="booking-main">
        <!-- Booking Form -->
        <div class="booking-form-container">
            <form id="bookingForm">
                <!-- Guest Information -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-user section-icon"></i>
                        Guest Information
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">First Name *</label>
                            <input type="text" class="form-input" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name *</label>
                            <input type="text" class="form-input" placeholder="Enter last name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-input" placeholder="example@email.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" class="form-input" placeholder="+92 300 1234567" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Country *</label>
                            <select class="form-select" required>
                                <option value="">Select Country</option>
                                <option value="pk">Pakistan</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ae">United Arab Emirates</option>
                                <option value="sa">Saudi Arabia</option>
                                <option value="fr">France</option>
                                <option value="de">Germany</option>
                                <option value="jp">Japan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Special Requests</label>
                        <textarea class="form-textarea" placeholder="Any special requests or preferences..."></textarea>
                    </div>
                </div>

                <!-- Billing Address -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-map-pin section-icon"></i>
                        Billing Address
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address Line 1 *</label>
                        <input type="text" class="form-input" placeholder="Street address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address Line 2</label>
                        <input type="text" class="form-input" placeholder="Apartment, suite, etc.">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">City *</label>
                            <input type="text" class="form-input" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Postal Code *</label>
                            <input type="text" class="form-input" placeholder="Postal code" required>
                        </div>
                    </div>

                    <div class="form-checkbox">
                        <input type="checkbox" id="sameAddress" checked>
                        <label for="sameAddress">Same as guest address</label>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="form-section">
                    <div class="section-title">
                        <i class="fas fa-credit-card section-icon"></i>
                        Payment Method (Stripe)
                    </div>

                    <div class="payment-info">
                        <div class="payment-info-text">
                            <i class="fas fa-info-circle payment-info-icon"></i>
                            <span>Secure payment powered by Stripe</span>
                        </div>
                    </div>

                    <div class="card-form-grid">
                        <div class="form-group">
                            <label class="form-label">Card Number *</label>
                            <input type="text" class="form-input card-number-input" placeholder="1234 5678 9012 3456" maxlength="19" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Cardholder Name *</label>
                            <input type="text" class="form-input" placeholder="Name on card" required>
                        </div>

                        <div class="card-row">
                            <div class="form-group">
                                <label class="form-label">Expiry Date *</label>
                                <input type="text" class="form-input" placeholder="MM/YY" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">CVV *</label>
                                <input type="text" class="form-input" placeholder="123" maxlength="4" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-checkbox">
                        <input type="checkbox" id="agreeTerms" required>
                        <label for="agreeTerms">I agree to the <strong>terms and conditions</strong> and <strong>cancellation policy</strong></label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="booking-actions">
                    <button type="button" class="btn-back">
                        <i class="fas fa-chevron-left"></i> Back
                    </button>
                    <button type="submit" class="btn-confirm">
                        <i class="fas fa-check"></i> Confirm Booking
                    </button>
                </div>
            </form>
        </div>

        <!-- Booking Summary Sidebar -->
        <div class="booking-summary-sidebar">
            <div class="summary-title">Booking Summary</div>

            <div class="summary-hotel-info">
                <div class="summary-hotel-name">Pearl Continental Hotel</div>
                <div class="summary-hotel-detail"><i class="fas fa-map-pin"></i> Karachi, Pakistan</div>
                <div class="summary-hotel-detail"><i class="fas fa-star"></i> ⭐⭐⭐⭐⭐ 4.8</div>
            </div>

            <div class="summary-item">
                <span class="summary-label">Room Type</span>
                <span class="summary-value">Deluxe Room</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Check-in</span>
                <span class="summary-value">15 Nov 2024</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Check-out</span>
                <span class="summary-value">18 Nov 2024</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Nights</span>
                <span class="summary-value">3</span>
            </div>

            <div class="summary-item">
                <span class="summary-label">Guests</span>
                <span class="summary-value">2 Adults</span>
            </div>

            <div class="summary-breakdown">
                <div class="breakdown-item">
                    <span>Room Charges (3 nights)</span>
                    <span>24,000 PKR</span>
                </div>
                <div class="breakdown-item">
                    <span>Taxes & Fees (13%)</span>
                    <span>3,120 PKR</span>
                </div>
                <div class="breakdown-item" style="color: #10B981;">
                    <span>Discount (-5%)</span>
                    <span>-1,206 PKR</span>
                </div>
            </div>

            <div class="summary-total">
                <span class="summary-total-label">Total Amount</span>
                <span class="summary-total-value">25,914 PKR</span>
            </div>

            <div style="font-size: 11px; color: #9CA3AF; margin-top: 12px; text-align: center;">
                <i class="fas fa-lock"></i> Secure & encrypted payment
            </div>
        </div>
    </div>
</div>



<?php include 'footer.php'; ?>