<?php include 'header.php'; ?>

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

        .flight-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Search Info */
        .flight-search-info {
            background-color: white;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 4px solid #0077BE;
        }

        .flight-search-info-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        .flight-info-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .flight-info-label {
            font-size: 11px;
            font-weight: 600;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .flight-info-value {
            font-size: 13px;
            font-weight: 600;
            color: #1A1A1A;
        }

        .flight-info-icon {
            color: #0077BE;
            font-size: 14px;
        }

        .flight-modify-btn {
            margin-left: auto;
            background-color: #F0F9FF;
            color: #0077BE;
            border: 1px solid #0077BE;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .flight-modify-btn:hover {
            background-color: #0077BE;
            color: white;
        }

        /* Main Content */
        .flight-main-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        @media (min-width: 1024px) {
            .flight-main-content {
                grid-template-columns: 220px 1fr;
            }
        }

        /* Sidebar */
        .flight-sidebar {
            background-color: white;
            border-radius: 12px;
            padding: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            height: fit-content;
        }

        .flight-filter-section {
            margin-bottom: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid #F3F4F6;
        }

        .flight-filter-section:last-child {
            border-bottom: none;
        }

        .flight-filter-title {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 10px;
        }

        .flight-price-slider {
            width: 100%;
            height: 5px;
            border-radius: 3px;
            background: #E5E7EB;
            outline: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .flight-price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 119, 190, 0.3);
            border: 2px solid white;
        }

        .flight-price-slider::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 119, 190, 0.3);
            border: 2px solid white;
        }

        .flight-price-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            padding: 8px;
            background-color: #F0F9FF;
            border-radius: 6px;
            font-size: 11px;
        }

        .flight-price-value-sm {
            font-weight: 700;
            color: #0077BE;
        }

        .airline-filter-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
            cursor: pointer;
        }

        .airline-logo-sm {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 9px;
            flex-shrink: 0;
        }

        .airline-filter-item input[type="checkbox"] {
            width: 14px;
            height: 14px;
            cursor: pointer;
            accent-color: #0077BE;
        }

        .airline-filter-item label {
            font-size: 12px;
            color: #1A1A1A;
            cursor: pointer;
            flex: 1;
        }

        .flight-filter-option {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 9px;
        }

        .flight-filter-option input[type="checkbox"] {
            width: 14px;
            height: 14px;
            cursor: pointer;
            accent-color: #0077BE;
        }

        .flight-filter-option label {
            font-size: 12px;
            color: #1A1A1A;
            cursor: pointer;
            flex: 1;
        }

                .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #003580;
            margin: 30px 0 16px 0;
            padding-bottom: 12px;
            border-bottom: 2px solid #0077BE;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        .flight-cards-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        /* Main Flight Card */
        .flight-card-wrapper {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #E5E7EB;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 0;
        }

        /* Left Section */
        .flight-left-section {
            display: flex;
            flex-direction: column;
        }

        /* Trip Wrapper */
        .trip-wrapper {
            padding: 20px;
            border-bottom: 1px solid #E5E7EB;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .trip-wrapper:last-of-type {
            border-bottom: none;
        }

        .trip-header {
            font-size: 12px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .trip-header::before {
            content: '';
            display: inline-block;
            width: 3px;
            height: 14px;
            background-color: #0077BE;
            border-radius: 1px;
        }

        /* Route Details */
        .flight-route-top {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            align-items: center;
        }

        .flight-airport-section {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .airport-code {
            font-size: 18px;
            font-weight: 700;
            color: #003580;
        }

        .airport-name {
            font-size: 11px;
            color: #6B7280;
            line-height: 1.3;
        }

        .airport-time {
            font-size: 13px;
            font-weight: 600;
            color: #1F2937;
        }

        /* Route Timeline */
        .flight-route-section {
            display: flex;
            flex-direction: column;
            gap: 6px;
            align-items: center;
        }

        .route-time {
            font-size: 12px;
            font-weight: 600;
            color: #0077BE;
        }

        .route-timeline {
            width: 100%;
            position: relative;
            height: 28px;
            display: flex;
            align-items: center;
        }

        .timeline-line {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #E5E7EB;
            z-index: 1;
        }

        .timeline-dots-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .timeline-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #0077BE;
            box-shadow: 0 0 0 2px white;
        }

        .timeline-dot.stop {
            background-color: #FFA500;
        }

        .route-info {
            text-align: center;
            font-size: 11px;
        }

        .route-status {
            display: inline-block;
            padding: 3px 10px;
            background-color: #FEF3C7;
            color: #92400E;
            border-radius: 10px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .route-status.direct {
            background-color: #D1FAE5;
            color: #059669;
        }

        .stop-airport {
            font-size: 10px;
            color: #0077BE;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .stop-duration {
            font-size: 10px;
            color: #6B7280;
        }

        /* Segments */
        .segments-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .segment-wrapper {
            position: relative;
        }

        .segment-item {
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            gap: 12px;
            align-items: center;
            padding: 10px;
            background-color: #F9FAFB;
            border-radius: 6px;
            border: 1px solid #E5E7EB;
        }

        .airline-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 11px;
            flex-shrink: 0;
        }

        .airline-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .flight-number {
            font-size: 11px;
            font-weight: 700;
            color: #003580;
        }

        .airline-name {
            font-size: 10px;
            color: #6B7280;
        }

        .segment-times {
            display: flex;
            gap: 20px;
            font-size: 10px;
            text-align: center;
            min-width: 120px;
        }

        .time-column {
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .time-label {
            font-size: 9px;
            color: #9CA3AF;
            font-weight: 600;
            text-transform: uppercase;
        }

        .time-value {
            font-size: 11px;
            font-weight: 700;
            color: #1F2937;
        }

        /* Details */
        .details-checkbox {
            display: none;
        }

        .segment-details {
            display: none;
            padding: 12px;
            background-color: white;
            border: 1px solid #E5E7EB;
            margin-top: 6px;
            border-radius: 6px;
        }

        .details-checkbox:checked + .segment-item + .segment-details {
            display: block;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .detail-column {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .detail-section {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .detail-section-title {
            font-size: 10px;
            font-weight: 700;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .detail-section-info {
            font-size: 12px;
            color: #1F2937;
            font-weight: 500;
            line-height: 1.4;
        }

        .non-refundable-badge {
            display: inline-block;
            padding: 4px 8px;
            background-color: #FEE2E2;
            color: #DC2626;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
            width: fit-content;
            margin-top: 6px;
        }

        .details-btn {
            padding: 5px 10px;
            background-color: white;
            color: #0077BE;
            border: 1px solid #E5E7EB;
            border-radius: 5px;
            font-size: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .details-btn:hover {
            background-color: #F0F9FF;
            border-color: #0077BE;
        }

        /* Right Section: Price */
        .flight-price-section {
            background: linear-gradient(135deg, #F0F4FF 0%, #E8EFFF 100%);
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
            text-align: center;
            min-width: 200px;
            justify-content: center;
            border-left: 1px solid #E5E7EB;
        }

        .price-label {
            font-size: 11px;
            color: #6B7280;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .price-value {
            font-size: 36px;
            font-weight: 700;
            color: #003580;
        }

        .price-breakdown {
            font-size: 10px;
            color: #6B7280;
            line-height: 1.6;
            text-align: center;
        }

        .select-btn {
            width: 100%;
            padding: 12px 16px;
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            border: none;
            border-radius: 22px;
            font-weight: 700;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
        }

        .select-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
        }

        @media (max-width: 768px) {
            .flight-card-wrapper {
                grid-template-columns: 1fr;
            }

            .flight-price-section {
                border-left: none;
                border-top: 1px solid #E5E7EB;
            }

            .flight-route-top {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }
        }

                .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>


    <div class="flight-container">
            <!-- Search Collapse -->
    <div class="hotel-search-collapse">
        <button class="hotel-search-collapse-btn" id="searchCollapseBtn">
            <span><i class="fas fa-search"></i> Modify Search</span>
            <i class="fas fa-chevron-down" id="collapseIcon"></i>
        </button>
        <div class="hotel-search-collapse-content" id="searchCollapseContent">
             <?php include 'flightform.php'; ?>
        </div>
    </div>
        <!-- Search Info -->
        <div class="flight-search-info">
            <div class="flight-search-info-row">
                <div class="flight-info-item">
                    <i class="fas fa-map-marker-alt flight-info-icon"></i>
                    <div>
                        <div class="flight-info-label">From</div>
                        <div class="flight-info-value">JED</div>
                    </div>
                </div>
                <div class="flight-info-item">
                    <i class="fas fa-arrow-right flight-info-icon"></i>
                </div>
                <div class="flight-info-item">
                    <i class="fas fa-map-marker-alt flight-info-icon"></i>
                    <div>
                        <div class="flight-info-label">To</div>
                        <div class="flight-info-value">DXB</div>
                    </div>
                </div>
                <div class="flight-info-item">
                    <i class="fas fa-calendar flight-info-icon"></i>
                    <div>
                        <div class="flight-info-label">Date</div>
                        <div class="flight-info-value">21 Oct</div>
                    </div>
                </div>
                <div class="flight-info-item">
                    <i class="fas fa-users flight-info-icon"></i>
                    <div>
                        <div class="flight-info-label">Passengers</div>
                        <div class="flight-info-value">2</div>
                    </div>
                </div>
                <!-- <button class="flight-modify-btn">Modify</button> -->
            </div>
        </div>

        <!-- Main Content -->
        <div class="flight-main-content">
            <!-- Sidebar -->
            <div class="flight-sidebar">
                <div class="flight-filter-section">
                    <div class="flight-filter-title">Price</div>
                    <input type="range" min="50" max="500" value="300" class="flight-price-slider">
                    <div class="flight-price-display">
                        <span>USD 50</span>
                        <span class="flight-price-value-sm">USD 300+</span>
                    </div>
                </div>

                <div class="flight-filter-section">
                    <div class="flight-filter-title">Airlines</div>
                    <div class="airline-filter-item">
                        <div class="airline-logo-sm">SA</div>
                        <input type="checkbox" id="saudi" checked>
                        <label for="saudi">Saudi Arabian</label>
                    </div>
                    <div class="airline-filter-item">
                        <div class="airline-logo-sm" style="background: linear-gradient(135deg, #FF6B35 0%, #E55A25 100%);">FN</div>
                        <input type="checkbox" id="flynas" checked>
                        <label for="flynas">Flynas</label>
                    </div>
                </div>

                <div class="flight-filter-section">
                    <div class="flight-filter-title">Stops</div>
                    <div class="flight-filter-option">
                        <input type="checkbox" id="direct" checked>
                        <label for="direct">Direct</label>
                    </div>
                    <div class="flight-filter-option">
                        <input type="checkbox" id="oneStop" checked>
                        <label for="oneStop">1 Stop</label>
                    </div>
                </div>
            </div>

        <div class="container">
        <!-- ===== ONE WAY FLIGHTS ===== -->
        <h2 class="section-title">One-Way Flights</h2>

        <!-- One Way Flight 1 -->
        <div class="flight-cards-container">
            <div class="flight-card-wrapper">
                <div class="flight-left-section">
                    <div class="trip-wrapper">
                        <div class="flight-route-top">
                            <div class="flight-airport-section">
                                <div class="airport-code">KUL</div>
                                <div class="airport-name">Kuala Lumpur International Airport</div>
                                <div class="airport-time">11:15 pm</div>
                            </div>

                            <div class="flight-route-section">
                                <div class="route-time">11:50</div>
                                <div class="route-timeline">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-dots-container">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-dot stop"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <div class="route-status">1 Stop</div>
                                    <div class="stop-airport">ADD</div>
                                    <div class="stop-duration">4h 40m</div>
                                </div>
                            </div>

                            <div class="flight-airport-section">
                                <div class="airport-code">DXB</div>
                                <div class="airport-name">Dubai International Airport</div>
                                <div class="airport-time">03:45 pm</div>
                            </div>
                        </div>

                        <div class="segments-container">
                            <div class="segment-wrapper">
                                <input type="checkbox" id="ow1-seg1" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo">ET</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0639 • KUL-ADD</div>
                                        <div class="airline-name">Ethiopian Airlines</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">11:15 pm</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">05:50 am</div>
                                        </div>
                                    </div>
                                    <label for="ow1-seg1" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0639 • KUL → ADD</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>KUL - Kuala Lumpur Int'l<br>
                                                    <strong>Time:</strong><br>11:15 pm - 25-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Ethiopian Airlines</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>ADD - Addis Ababa Int'l<br>
                                                    <strong>Time:</strong><br>05:50 am - 25-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="segment-wrapper">
                                <input type="checkbox" id="ow1-seg2" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo">ET</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0602 • ADD-DXB</div>
                                        <div class="airline-name">Ethiopian Airlines</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">10:30 am</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">03:45 pm</div>
                                        </div>
                                    </div>
                                    <label for="ow1-seg2" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0602 • ADD → DXB</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>ADD - Addis Ababa Int'l<br>
                                                    <strong>Time:</strong><br>10:30 am - 25-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Ethiopian Airlines</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>DXB - Dubai Int'l<br>
                                                    <strong>Time:</strong><br>03:45 pm - 25-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flight-price-section">
                    <div class="price-label">From</div>
                    <div class="price-value">USD 411.00</div>
                    <button class="select-btn">
                        Select Flight
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- One Way Flight 2 -->
        <div class="flight-cards-container">
            <div class="flight-card-wrapper">
                <div class="flight-left-section">
                    <div class="trip-wrapper">
                        <div class="flight-route-top">
                            <div class="flight-airport-section">
                                <div class="airport-code">JED</div>
                                <div class="airport-name">King Abdulaziz Int'l</div>
                                <div class="airport-time">12:35 pm</div>
                            </div>

                            <div class="flight-route-section">
                                <div class="route-time">4h 0m</div>
                                <div class="route-timeline">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-dots-container">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <div class="route-status direct">Direct</div>
                                </div>
                            </div>

                            <div class="flight-airport-section">
                                <div class="airport-code">DXB</div>
                                <div class="airport-name">Dubai Int'l</div>
                                <div class="airport-time">04:45 pm</div>
                            </div>
                        </div>

                        <div class="segments-container">
                            <div class="segment-wrapper">
                                <input type="checkbox" id="ow2-seg1" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #D32F2F 0%, #B71C1C 100%);">SA</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0910 • JED-DXB</div>
                                        <div class="airline-name">Saudi Arabian Airlines</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">12:35 pm</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">04:35 pm</div>
                                        </div>
                                    </div>
                                    <label for="ow2-seg1" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0910 • JED → DXB</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>JED - King Abdulaziz Int'l<br>
                                                    <strong>Time:</strong><br>12:35 pm - 25-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Saudi Arabian Airlines</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>DXB - Dubai Int'l<br>
                                                    <strong>Time:</strong><br>04:35 pm - 25-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flight-price-section">
                    <div class="price-label">From</div>
                    <div class="price-value">USD 160.00</div>
                    <button class="select-btn">
                        Select Flight
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

 

        <!-- ===== ROUND TRIP FLIGHTS ===== -->
        <h2 class="section-title">Round Trip Flights</h2>

        <!-- Round Trip Flight 1 -->
        <div class="flight-cards-container">
            <div class="flight-card-wrapper">
                <div class="flight-left-section">
                    <!-- Outbound -->
                    <div class="trip-wrapper">
                        <div class="trip-header">Outbound Flight</div>
                        
                        <div class="flight-route-top">
                            <div class="flight-airport-section">
                                <div class="airport-code">LHE</div>
                                <div class="airport-name">Allama Iqbal International Airport</div>
                                <div class="airport-time">03:50 am</div>
                            </div>

                            <div class="flight-route-section">
                                <div class="route-time">4:50</div>
                                <div class="route-timeline">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-dots-container">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-dot stop"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <div class="route-status">1 Stop</div>
                                    <div class="stop-airport">KWI</div>
                                    <div class="stop-duration">3h 25m</div>
                                </div>
                            </div>

                            <div class="flight-airport-section">
                                <div class="airport-code">DXB</div>
                                <div class="airport-name">Dubai International Airport</div>
                                <div class="airport-time">12:05 pm</div>
                            </div>
                        </div>

                        <div class="segments-container">
                            <div class="segment-wrapper">
                                <input type="checkbox" id="rt1-out1" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #003399 0%, #001a66 100%);">KU</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0202 • LHE-KWI</div>
                                        <div class="airline-name">Kuwait Airways</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">03:50 am</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">05:55 am</div>
                                        </div>
                                    </div>
                                    <label for="rt1-out1" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0202 • LHE → KWI</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>LHE - Allama Iqbal Int'l<br>
                                                    <strong>Time:</strong><br>03:50 am - 25-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Kuwait Airways</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>KWI - Kuwait Int'l<br>
                                                    <strong>Time:</strong><br>05:55 am - 25-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="segment-wrapper">
                                <input type="checkbox" id="rt1-out2" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #003399 0%, #001a66 100%);">KU</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0671 • KWI-DXB</div>
                                        <div class="airline-name">Kuwait Airways</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">09:20 am</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">12:05 pm</div>
                                        </div>
                                    </div>
                                    <label for="rt1-out2" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0671 • KWI → DXB</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>KWI - Kuwait Int'l<br>
                                                    <strong>Time:</strong><br>09:20 am - 25-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Kuwait Airways</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>DXB - Dubai Int'l<br>
                                                    <strong>Time:</strong><br>12:05 pm - 25-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Return -->
                    <div class="trip-wrapper">
                        <div class="trip-header">Return Flight</div>
                        
                        <div class="flight-route-top">
                            <div class="flight-airport-section">
                                <div class="airport-code">DXB</div>
                                <div class="airport-name">Dubai International Airport</div>
                                <div class="airport-time">01:20 pm</div>
                            </div>

                            <div class="flight-route-section">
                                <div class="route-time">6:20</div>
                                <div class="route-timeline">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-dots-container">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-dot stop"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <div class="route-status">1 Stop</div>
                                    <div class="stop-airport">KWI</div>
                                    <div class="stop-duration">7h 5m</div>
                                </div>
                            </div>

                            <div class="flight-airport-section">
                                <div class="airport-code">LHE</div>
                                <div class="airport-name">Allama Iqbal International Airport</div>
                                <div class="airport-time">02:45 am</div>
                            </div>
                        </div>

                        <div class="segments-container">
                            <div class="segment-wrapper">
                                <input type="checkbox" id="rt1-ret1" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #003399 0%, #001a66 100%);">KU</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0672 • DXB-KWI</div>
                                        <div class="airline-name">Kuwait Airways</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">01:20 pm</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">02:00 pm</div>
                                        </div>
                                    </div>
                                    <label for="rt1-ret1" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0672 • DXB → KWI</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>DXB - Dubai Int'l<br>
                                                    <strong>Time:</strong><br>01:20 pm - 26-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Kuwait Airways</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>KWI - Kuwait Int'l<br>
                                                    <strong>Time:</strong><br>02:00 pm - 26-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="segment-wrapper">
                                <input type="checkbox" id="rt1-ret2" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #003399 0%, #001a66 100%);">KU</div>
                                    <div class="airline-info">
                                        <div class="flight-number">0201 • KWI-LHE</div>
                                        <div class="airline-name">Kuwait Airways</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">09:05 pm</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">02:45 am</div>
                                        </div>
                                    </div>
                                    <label for="rt1-ret2" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">0201 • KWI → LHE</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>KWI - Kuwait Int'l<br>
                                                    <strong>Time:</strong><br>09:05 pm - 26-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Kuwait Airways</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>LHE - Allama Iqbal Int'l<br>
                                                    <strong>Time:</strong><br>02:45 am - 27-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flight-price-section">
                    <div class="price-label">Total Price</div>
                    <div class="price-value">USD 593.00</div>
                    <div class="price-breakdown">Outbound +<br>Return</div>
                    <button class="select-btn">
                        Select Flight
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Round Trip Flight 2 -->
        <div class="flight-cards-container">
            <div class="flight-card-wrapper">
                <div class="flight-left-section">
                    <!-- Outbound -->
                    <div class="trip-wrapper">
                        <div class="trip-header">Outbound Flight</div>
                        
                        <div class="flight-route-top">
                            <div class="flight-airport-section">
                                <div class="airport-code">ISB</div>
                                <div class="airport-name">Islamabad International Airport</div>
                                <div class="airport-time">02:00 pm</div>
                            </div>

                            <div class="flight-route-section">
                                <div class="route-time">5h 30m</div>
                                <div class="route-timeline">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-dots-container">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <div class="route-status direct">Direct</div>
                                </div>
                            </div>

                            <div class="flight-airport-section">
                                <div class="airport-code">DXB</div>
                                <div class="airport-name">Dubai International Airport</div>
                                <div class="airport-time">07:30 pm</div>
                            </div>
                        </div>

                        <div class="segments-container">
                            <div class="segment-wrapper">
                                <input type="checkbox" id="rt2-out1" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #2D5016 0%, #1a2e0a 100%);">PK</div>
                                    <div class="airline-info">
                                        <div class="flight-number">PK-305 • ISB-DXB</div>
                                        <div class="airline-name">Pakistan International Airlines</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">02:00 pm</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">07:30 pm</div>
                                        </div>
                                    </div>
                                    <label for="rt2-out1" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">PK-305 • ISB → DXB</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>ISB - Islamabad Int'l<br>
                                                    <strong>Time:</strong><br>02:00 pm - 25-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Pakistan International Airlines</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>DXB - Dubai Int'l<br>
                                                    <strong>Time:</strong><br>07:30 pm - 25-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Return -->
                    <div class="trip-wrapper">
                        <div class="trip-header">Return Flight</div>
                        
                        <div class="flight-route-top">
                            <div class="flight-airport-section">
                                <div class="airport-code">DXB</div>
                                <div class="airport-name">Dubai International Airport</div>
                                <div class="airport-time">11:00 pm</div>
                            </div>

                            <div class="flight-route-section">
                                <div class="route-time">5h 45m</div>
                                <div class="route-timeline">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-dots-container">
                                        <div class="timeline-dot"></div>
                                        <div class="timeline-dot"></div>
                                    </div>
                                </div>
                                <div class="route-info">
                                    <div class="route-status direct">Direct</div>
                                </div>
                            </div>

                            <div class="flight-airport-section">
                                <div class="airport-code">ISB</div>
                                <div class="airport-name">Islamabad International Airport</div>
                                <div class="airport-time">04:45 am</div>
                            </div>
                        </div>

                        <div class="segments-container">
                            <div class="segment-wrapper">
                                <input type="checkbox" id="rt2-ret1" class="details-checkbox">
                                <div class="segment-item">
                                    <div class="airline-logo" style="background: linear-gradient(135deg, #2D5016 0%, #1a2e0a 100%);">PK</div>
                                    <div class="airline-info">
                                        <div class="flight-number">PK-306 • DXB-ISB</div>
                                        <div class="airline-name">Pakistan International Airlines</div>
                                    </div>
                                    <div class="segment-times">
                                        <div class="time-column">
                                            <div class="time-label">Depart</div>
                                            <div class="time-value">11:00 pm</div>
                                        </div>
                                        <div class="time-column">
                                            <div class="time-label">Arrive</div>
                                            <div class="time-value">04:45 am</div>
                                        </div>
                                    </div>
                                    <label for="rt2-ret1" class="details-btn">
                                        <i class="fas fa-chevron-down"></i> Details
                                    </label>
                                </div>
                                <div class="segment-details">
                                    <div class="details-grid">
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Flight</div>
                                                <div class="detail-section-info">PK-306 • DXB → ISB</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Departure</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>DXB - Dubai Int'l<br>
                                                    <strong>Time:</strong><br>11:00 pm - 26-10-2025
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail-column">
                                            <div class="detail-section">
                                                <div class="detail-section-title">Airline</div>
                                                <div class="detail-section-info">Pakistan International Airlines</div>
                                            </div>
                                            <div class="detail-section">
                                                <div class="detail-section-title">Arrival</div>
                                                <div class="detail-section-info">
                                                    <strong>Airport:</strong><br>ISB - Islamabad Int'l<br>
                                                    <strong>Time:</strong><br>04:45 am - 27-10-2025
                                                </div>
                                            </div>
                                            <div class="non-refundable-badge">Non-refundable</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flight-price-section">
                    <div class="price-label">Total Price</div>
                    <div class="price-value">USD 520.00</div>
                    <div class="price-breakdown">Outbound +<br>Return</div>
                    <button class="select-btn">
                        Select Flight
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        </div>
        </div>

        
    </div>



<?php include 'footer.php';