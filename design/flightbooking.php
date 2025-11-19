<?php include 'header.php'; ?>

    <style>

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 20px;
            padding: 20px;
        }

        /* Left Section */
        .left-section {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Right Sidebar */
        .right-sidebar {
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        /* Section Title */
        .section-title {
            font-size: 16px;
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
            height: 20px;
            background-color: #0077BE;
            border-radius: 2px;
        }

        /* Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #E5E7EB;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        /* Personal Information */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-grid.full {
            grid-template-columns: 1fr;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #1F2937;
        }

        .form-input,
        .form-select {
            padding: 12px 14px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 13px;
            font-family: inherit;
            transition: all 0.3s ease;
            background-color: #FAFBFC;
        }

        .form-input:hover,
        .form-select:hover {
            border-color: #D1D5DB;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #0077BE;
            box-shadow: 0 0 0 4px rgba(0, 119, 190, 0.15);
            background-color: #F0F9FF;
        }

        .form-input::placeholder {
            color: #9CA3AF;
        }

        /* Travellers Section */
        .traveller-section {
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid #E5E7EB;
        }

        .traveller-section:last-of-type {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .traveller-title {
            font-size: 13px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .traveller-badge {
            background-color: #F0F4FF;
            color: #0077BE;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
        }

        /* Payment Methods */
        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .payment-option {
            border: 1px solid #E5E7EB;
            border-radius: 6px;
            padding: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .payment-option:hover {
            border-color: #0077BE;
            background-color: #F0F9FF;
        }

        .payment-option input[type="radio"] {
            cursor: pointer;
            width: 18px;
            height: 18px;
        }

        .payment-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex: 1;
        }

        .payment-name {
            font-size: 12px;
            font-weight: 600;
            color: #1F2937;
        }

        .payment-details {
            font-size: 11px;
            color: #6B7280;
        }

        .payment-icon {
            font-size: 20px;
            color: #0077BE;
            width: 30px;
            text-align: center;
        }

        /* Right Sidebar Cards */
        .sidebar-card {
            background: white;
            border-radius: 10px;
            border: 1px solid #E5E7EB;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            margin-bottom: 16px;
        }

        .sidebar-card-header {
            background-color: #F0F4FF;
            padding: 12px;
            border-bottom: 1px solid #E5E7EB;
        }

        .sidebar-card-title {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .sidebar-card-body {
            padding: 12px;
        }

        .flight-airline {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #E5E7EB;
        }

        .airline-logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #003399 0%, #001a66 100%);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 12px;
            flex-shrink: 0;
        }

        .airline-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .airline-name {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
        }

        .airline-flight {
            font-size: 10px;
            color: #6B7280;
        }

        /* Timer */
        .timer-box {
            background: linear-gradient(135deg, #FEF3C7 0%, #FEE8A0 100%);
            border: 1px solid #FCD34D;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .timer-icon {
            font-size: 20px;
            color: #D97706;
            flex-shrink: 0;
        }

        .timer-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .timer-label {
            font-size: 10px;
            color: #92400E;
            font-weight: 600;
            text-transform: uppercase;
        }

        .timer-time {
            font-size: 16px;
            font-weight: 700;
            color: #DC2626;
        }

        .flight-detail {
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #E5E7EB;
        }

        .flight-detail:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .flight-detail-label {
            font-size: 10px;
            color: #6B7280;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .flight-detail-value {
            font-size: 13px;
            color: #003580;
            font-weight: 700;
        }

        .flight-route {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
        }

        .flight-route-item {
            font-weight: 700;
            color: #003580;
        }

        .flight-route-arrow {
            color: #0077BE;
        }

        .price-summary {
            background-color: #F9FAFB;
            padding: 12px;
            border-radius: 6px;
            margin-top: 12px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .price-row:last-child {
            margin-bottom: 0;
            border-top: 1px solid #E5E7EB;
            padding-top: 8px;
        }

        .price-label {
            color: #6B7280;
            font-weight: 500;
        }

        .price-value {
            color: #1F2937;
            font-weight: 600;
        }

        .price-total {
            font-weight: 700;
            color: #003580;
            font-size: 14px;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #E5E7EB;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
        }

        .btn-back {
            background-color: #F3F4F6;
            color: #1F2937;
            border: 1px solid #D1D5DB;
        }

        .btn-back:hover {
            background-color: #E5E7EB;
        }

        .btn-continue {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            flex: 2;
        }

        .btn-continue:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 1fr;
            }

            .right-sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <!-- Personal Information -->
            <div class="card">
                <h2 class="section-title">Personal Information</h2>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">First Name *</label>
                        <input type="text" class="form-input" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name *</label>
                        <input type="text" class="form-input" placeholder="Enter last name">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-input" placeholder="example@gmail.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number *</label>
                        <input type="tel" class="form-input" placeholder="+92-300-1234567">
                    </div>
                </div>

                <div class="form-grid full">
                    <div class="form-group">
                        <label class="form-label">Address *</label>
                        <input type="text" class="form-input" placeholder="Enter your address">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">City *</label>
                        <input type="text" class="form-input" placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Country *</label>
                        <select class="form-select">
                            <option value="">Select Country</option>
                            <option value="pk">Pakistan</option>
                            <option value="sa">Saudi Arabia</option>
                            <option value="ae">United Arab Emirates</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Travellers Information -->
            <div class="card">
                <h2 class="section-title">Travellers Information</h2>

                <!-- Traveller 1 -->
                <div class="traveller-section">
                    <div class="traveller-title">
                        <i class="fas fa-user-circle" style="color: #0077BE;"></i>
                        Traveller 1
                        <span class="traveller-badge">Adult</span>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">First Name *</label>
                            <input type="text" class="form-input" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name *</label>
                            <input type="text" class="form-input" placeholder="Enter last name">
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Passport Number *</label>
                            <input type="text" class="form-input" placeholder="AB123456">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nationality *</label>
                            <select class="form-select">
                                <option value="">Select Nationality</option>
                                <option value="pk">Pakistan</option>
                                <option value="sa">Saudi Arabia</option>
                                <option value="ae">United Arab Emirates</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Date of Birth *</label>
                            <input type="date" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Gender *</label>
                            <select class="form-select">
                                <option value="">Select Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Traveller 2 -->
                <div class="traveller-section">
                    <div class="traveller-title">
                        <i class="fas fa-user-circle" style="color: #0077BE;"></i>
                        Traveller 2
                        <span class="traveller-badge">Adult</span>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">First Name *</label>
                            <input type="text" class="form-input" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name *</label>
                            <input type="text" class="form-input" placeholder="Enter last name">
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Passport Number *</label>
                            <input type="text" class="form-input" placeholder="AB123456">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nationality *</label>
                            <select class="form-select">
                                <option value="">Select Nationality</option>
                                <option value="pk">Pakistan</option>
                                <option value="sa">Saudi Arabia</option>
                                <option value="ae">United Arab Emirates</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Date of Birth *</label>
                            <input type="date" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Gender *</label>
                            <select class="form-select">
                                <option value="">Select Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="card">
                <h2 class="section-title">Payment Methods</h2>

                <div class="payment-options">
                    <label class="payment-option">
                        <input type="radio" name="payment" value="card" checked>
                        <div class="payment-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="payment-info">
                            <div class="payment-name">Credit/Debit Card</div>
                            <div class="payment-details">Visa, Mastercard, American Express</div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="paypal">
                        <div class="payment-icon">
                            <i class="fab fa-cc-paypal"></i>
                        </div>
                        <div class="payment-info">
                            <div class="payment-name">PayPal</div>
                            <div class="payment-details">Fast and secure payment</div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="bank">
                        <div class="payment-icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="payment-info">
                            <div class="payment-name">Bank Transfer</div>
                            <div class="payment-details">Direct bank payment</div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="applepay">
                        <div class="payment-icon">
                            <i class="fab fa-apple"></i>
                        </div>
                        <div class="payment-info">
                            <div class="payment-name">Apple Pay</div>
                            <div class="payment-details">Quick and secure</div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="googlepay">
                        <div class="payment-icon">
                            <i class="fab fa-google"></i>
                        </div>
                        <div class="payment-info">
                            <div class="payment-name">Google Pay</div>
                            <div class="payment-details">Easy mobile payment</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="card">
                <div class="button-group">
                    <button class="btn btn-back">
                        <i class="fas fa-arrow-left"></i> Back
                    </button>
                    <button class="btn btn-continue">
                        Pay Now <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="right-sidebar">
            <!-- Flight Details - One Way -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <div class="sidebar-card-title">Outbound Flight</div>
                </div>
                <div class="sidebar-card-body">
                    <!-- Timer -->
                    <div class="timer-box">
                        <div class="timer-icon">
                            <i class="fas fa-hourglass-end"></i>
                        </div>
                        <div class="timer-content">
                            <div class="timer-label">Complete Booking In</div>
                            <div class="timer-time" id="timer">30:00</div>
                        </div>
                    </div>

                    <!-- Airline Info -->
                    <div class="flight-airline">
                        <div class="airline-logo">KU</div>
                        <div class="airline-info">
                            <div class="airline-name">Kuwait Airways</div>
                            <div class="airline-flight">Flight 0202 • LHE-KWI</div>
                        </div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Route</div>
                        <div class="flight-route">
                            <span class="flight-route-item">LHE</span>
                            <span class="flight-route-arrow">→</span>
                            <span class="flight-route-item">DXB</span>
                        </div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Date</div>
                        <div class="flight-detail-value">25-10-2025</div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Time</div>
                        <div class="flight-detail-value">03:50 am - 12:05 pm</div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Duration</div>
                        <div class="flight-detail-value">4h 50m (1 Stop)</div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Baggage</div>
                        <div class="flight-detail-value">1x 23kg + 7kg</div>
                    </div>
                </div>
            </div>

            <!-- Flight Details - Return -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <div class="sidebar-card-title">Return Flight</div>
                </div>
                <div class="sidebar-card-body">
                    <!-- Airline Info -->
                    <div class="flight-airline">
                        <div class="airline-logo">KU</div>
                        <div class="airline-info">
                            <div class="airline-name">Kuwait Airways</div>
                            <div class="airline-flight">Flight 0672 • DXB-KWI</div>
                        </div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Route</div>
                        <div class="flight-route">
                            <span class="flight-route-item">DXB</span>
                            <span class="flight-route-arrow">→</span>
                            <span class="flight-route-item">LHE</span>
                        </div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Date</div>
                        <div class="flight-detail-value">26-10-2025</div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Time</div>
                        <div class="flight-detail-value">01:20 pm - 02:45 am</div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Duration</div>
                        <div class="flight-detail-value">6h 20m (1 Stop)</div>
                    </div>

                    <div class="flight-detail">
                        <div class="flight-detail-label">Baggage</div>
                        <div class="flight-detail-value">1x 23kg + 7kg</div>
                    </div>
                </div>
            </div>

            <!-- Price Summary -->
            <div class="sidebar-card">
                <div class="sidebar-card-header">
                    <div class="sidebar-card-title">Price Summary</div>
                </div>
                <div class="sidebar-card-body">
                    <div class="price-summary">
                        <div class="price-row">
                            <span class="price-label">Base Fare (2x)</span>
                            <span class="price-value">USD 466.00</span>
                        </div>
                        <div class="price-row">
                            <span class="price-label">Taxes & Fees</span>
                            <span class="price-value">USD 85.00</span>
                        </div>
                        <div class="price-row">
                            <span class="price-label price-total">Total</span>
                            <span class="price-value price-total">USD 551.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // 30 Minute Timer
        function startTimer() {
            let timeLeft = 30 * 60; // 30 minutes in seconds
            const timerDisplay = document.getElementById('timer');

            const interval = setInterval(() => {
                let minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;
                
                timerDisplay.textContent = 
                    String(minutes).padStart(2, '0') + ':' + 
                    String(seconds).padStart(2, '0');
                
                // Change color when time is running out
                if (timeLeft < 300) { // Last 5 minutes
                    timerDisplay.style.color = '#DC2626';
                }
                
                if (timeLeft === 0) {
                    clearInterval(interval);
                    timerDisplay.textContent = '00:00';
                    alert('Booking time expired! Please start over.');
                }
                
                timeLeft--;
            }, 1000);
        }

        // Start timer when page loads
        document.addEventListener('DOMContentLoaded', startTimer);
    </script>

    
<?php include 'footer.php'; ?>