<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', sans-serif;
        }

        /* Flight Form Styles */
        .flight-form-wrapper {
            background-color: white;
            border-radius: 12px;
            padding: 24px;
            margin: 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .flight-trip-type {
            display: flex;
            gap: 24px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 2px solid #F3F4F6;
        }

        .flight-trip-option {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .flight-trip-option input[type="radio"] {
            cursor: pointer;
            width: 18px;
            height: 18px;
            accent-color: #0077BE;
        }

        .flight-trip-option label {
            cursor: pointer;
            font-weight: 600;
            color: #1A1A1A;
            font-size: 14px;
        }

        .flight-form-row {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 12px;
            align-items: flex-end;
        }

        .flight-form-field {
            grid-column: span 12;
            position: relative;
        }

        .flight-form-field.from-field {
            grid-column: span 6;
        }

        .flight-form-field.to-field {
            grid-column: span 6;
        }

        .flight-form-field.depart-field {
            grid-column: span 6;
        }

        .flight-form-field.return-field {
            grid-column: span 6;
            display: none;
        }

        .flight-form-field.return-field.active {
            display: block;
        }

        .flight-form-field.travelers-field {
            grid-column: span 12;
        }

        .flight-search-btn-wrapper {
            grid-column: span 12;
            display: flex;
        }

        .flight-reverse-btn {
            position: absolute;
            right: -18px;
            top: 32px;
            width: 36px;
            height: 36px;
            background-color: white;
            border: 2px solid #E5E7EB;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .flight-reverse-btn:hover {
            border-color: #0077BE;
            color: #0077BE;
            background-color: #F0F9FF;
        }

        /* Large Screen (Desktop) */
        @media (min-width: 1024px) {
            .flight-form-row {
                grid-template-columns: repeat(24, 1fr);
            }

            .flight-form-field.from-field {
                grid-column: span 8;
            }

            .flight-form-field.to-field {
                grid-column: span 8;
            }

            .flight-form-field.depart-field {
                grid-column: span 4;
            }

            .flight-form-field.return-field {
                grid-column: span 4;
            }

            .flight-form-field.travelers-field {
                grid-column: span 4;
            }

            .flight-search-btn-wrapper {
                grid-column: span 4;
                display: flex;
                align-items: flex-end;
            }
        }

        .flight-form-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .flight-form-input, .flight-form-select {
            width: 100%;
            padding: 11px 14px;
            border: 2px solid #E5E7EB;
            border-radius: 10px;
            font-size: 13px;
            transition: all 0.3s ease;
            color: #1A1A1A;
            font-family: inherit;
            background-color: #FFFFFF;
        }

        .flight-form-input:hover, .flight-form-select:hover {
            border-color: #D1D5DB;
            background-color: #FAFBFC;
        }

        .flight-form-input:focus, .flight-form-select:focus {
            border-color: #0077BE;
            background-color: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.1);
            outline: none;
        }

        .flight-form-input::placeholder {
            color: #9CA3AF;
        }

        /* Select2 Styling */
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            border: 2px solid #E5E7EB !important;
            border-radius: 10px !important;
            height: 42px !important;
            background-color: #FFFFFF !important;
            padding: 0 !important;
            box-shadow: none !important;
        }

        .select2-container--default .select2-selection--single:hover {
            border-color: #D1D5DB !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 42px !important;
            padding-left: 14px !important;
            color: #1A1A1A !important;
            font-size: 13px !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 42px !important;
            right: 14px !important;
            display: flex !important;
            align-items: center !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #0077BE transparent transparent transparent !important;
            margin-top: -2px !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #0077BE !important;
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.1) !important;
        }

        .select2-dropdown {
            border: 2px solid #E5E7EB !important;
            border-top: none !important;
            border-radius: 0 0 10px 10px !important;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
            background-color: white !important;
            margin-top: -2px !important;
        }

        .select2-results {
            padding: 6px 0 !important;
            max-height: 250px !important;
        }

        .select2-results__option {
            padding: 10px 14px !important;
            font-size: 13px !important;
            color: #1A1A1A !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            border-bottom: 1px solid #F3F4F6 !important;
            transition: all 0.2s ease !important;
        }

        .select2-results__option:last-child {
            border-bottom: none !important;
        }

        .select2-results__option:hover {
            background-color: #F0F9FF !important;
        }

        .select2-results__option--highlighted[aria-selected] {
            background-color: #EBF4FF !important;
            color: #0077BE !important;
            font-weight: 600 !important;
        }

        .select2-results__option[aria-selected=true] {
            background-color: #EBF4FF !important;
            color: #0077BE !important;
            font-weight: 600 !important;
        }

        .flight-search-btn {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            padding: 11px 20px;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            white-space: nowrap;
            height: 42px;
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.2);
        }

        .flight-search-btn:hover {
            background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
            box-shadow: 0 6px 16px rgba(0, 119, 190, 0.3);
            transform: translateY(-2px);
        }

        /* Modal Overlay */
        .flight-modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 16px;
            backdrop-filter: blur(3px);
        }

        .flight-modal-overlay.active {
            display: flex;
            animation: fadeInModal 0.25s ease-out;
        }

        @keyframes fadeInModal {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .flight-modal-content {
            background-color: white;
            border-radius: 12px;
            padding: 16px;
            width: 100%;
            max-width: 280px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
            animation: slideUpModal 0.3s ease-out;
            max-height: 80vh;
            overflow-y: auto;
        }

        @keyframes slideUpModal {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .flight-modal-header {
            font-size: 14px;
            font-weight: 700;
            color: #003580;
            margin-bottom: 14px;
            padding-bottom: 10px;
            border-bottom: 2px solid #F3F4F6;
        }

        .flight-passenger-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #F3F4F6;
            font-size: 13px;
        }

        .flight-passenger-item:last-of-type {
            border-bottom: none;
        }

        .flight-passenger-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: #1A1A1A;
            font-size: 12px;
        }

        .flight-counter-controls {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .flight-counter-btn {
            width: 28px;
            height: 28px;
            border: 2px solid #E5E7EB;
            background-color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 700;
            color: #003580;
            transition: all 0.2s ease;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .flight-counter-btn:hover {
            background-color: #F0F9FF;
            border-color: #0077BE;
            color: #0077BE;
        }

        .flight-counter-value {
            min-width: 24px;
            text-align: center;
            font-weight: 700;
            color: #1A1A1A;
            font-size: 12px;
        }

        .flight-class-select {
            width: 100%;
            padding: 8px 10px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 12px;
            margin-top: 10px;
            color: #1A1A1A;
            background-color: white;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .flight-class-select:hover {
            border-color: #D1D5DB;
        }

        .flight-class-select:focus {
            border-color: #0077BE;
            box-shadow: 0 0 0 3px rgba(0, 119, 190, 0.1);
            outline: none;
        }

        .flight-modal-buttons {
            display: flex;
            gap: 8px;
            margin-top: 14px;
        }

        .flight-modal-btn {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 12px;
        }

        .flight-modal-btn-cancel {
            background-color: #F3F4F6;
            color: #1A1A1A;
            border: 1px solid #E5E7EB;
        }

        .flight-modal-btn-cancel:hover {
            background-color: #E5E7EB;
        }

        .flight-modal-btn-apply {
            background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.2);
        }

        .flight-modal-btn-apply:hover {
            box-shadow: 0 6px 16px rgba(0, 119, 190, 0.3);
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .flight-form-wrapper {
                padding: 16px;
            }

            .flight-reverse-btn {
                right: -14px;
                width: 32px;
                height: 32px;
                font-size: 14px;
            }
        }

        @media (max-width: 640px) {
            .flight-form-wrapper {
                padding: 12px;
            }

            .flight-reverse-btn {
                right: -12px;
                width: 30px;
                height: 30px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<div class="flight-form-wrapper">
    <!-- Trip Type Selection -->
    <div class="flight-trip-type">
        <div class="flight-trip-option">
            <input type="radio" id="flightTripOneWay" name="tripType" value="oneway" checked>
            <label for="flightTripOneWay">One Way</label>
        </div>
        <div class="flight-trip-option">
            <input type="radio" id="flightTripRoundTrip" name="tripType" value="roundtrip">
            <label for="flightTripRoundTrip">Round Trip</label>
        </div>
    </div>

    <form id="flightSearchForm" class="flight-form-row">
        
        <div class="flight-form-field from-field">
            <label class="flight-form-label">From</label>
            <select id="flightFromCity" class="flight-form-select" required>
                <option></option>
            </select>
            <button type="button" id="flightReverseBtn" class="flight-reverse-btn" title="Reverse">
                <i class="fas fa-exchange-alt"></i>
            </button>
        </div>

        <div class="flight-form-field to-field">
            <label class="flight-form-label">To</label>
            <select id="flightToCity" class="flight-form-select" required>
                <option></option>
            </select>
        </div>

        <div class="flight-form-field depart-field">
            <label class="flight-form-label">Departure</label>
            <input type="text" id="flightDepartDate" class="flight-form-input" placeholder="Select date" required>
        </div>

        <div class="flight-form-field return-field">
            <label class="flight-form-label">Return</label>
            <input type="text" id="flightReturnDate" class="flight-form-input" placeholder="Select date">
        </div>

        <div class="flight-form-field travelers-field">
            <label class="flight-form-label">Travelers & Class</label>
            <button type="button" id="flightPassengersBtn" class="flight-form-input" style="text-align: left; cursor: pointer;">
                <span id="flightPassengersDisplay">1 Traveler, Economy</span>
            </button>
        </div>

        <div class="flight-search-btn-wrapper">
            <button type="submit" class="flight-search-btn" style="width: 100%; justify-content: center;">
                <i class="fas fa-search"></i>
                <span>Search</span>
            </button>
        </div>
    </form>
</div>

<!-- Passengers & Class Modal -->
<div id="flightPassengersModal" class="flight-modal-overlay">
    <div class="flight-modal-content">
        <div class="flight-modal-header">Select Passengers & Class</div>

        <div class="flight-passenger-item">
            <div class="flight-passenger-label">
                <i class="fas fa-user" style="color: #0077BE;"></i>
                <span>Adults</span>
            </div>
            <div class="flight-counter-controls">
                <button type="button" class="flight-counter-btn" id="flightAdultMinus">−</button>
                <div class="flight-counter-value" id="flightAdultValue">1</div>
                <button type="button" class="flight-counter-btn" id="flightAdultPlus">+</button>
            </div>
        </div>

        <div class="flight-passenger-item">
            <div class="flight-passenger-label">
                <i class="fas fa-child" style="color: #0077BE;"></i>
                <span>Children</span>
            </div>
            <div class="flight-counter-controls">
                <button type="button" class="flight-counter-btn" id="flightChildMinus">−</button>
                <div class="flight-counter-value" id="flightChildValue">0</div>
                <button type="button" class="flight-counter-btn" id="flightChildPlus">+</button>
            </div>
        </div>

        <div class="flight-passenger-item">
            <div class="flight-passenger-label">
                <i class="fas fa-baby" style="color: #0077BE;"></i>
                <span>Infants</span>
            </div>
            <div class="flight-counter-controls">
                <button type="button" class="flight-counter-btn" id="flightInfantMinus">−</button>
                <div class="flight-counter-value" id="flightInfantValue">0</div>
                <button type="button" class="flight-counter-btn" id="flightInfantPlus">+</button>
            </div>
        </div>

        <label style="display: block; font-size: 11px; font-weight: 700; color: #003580; margin: 12px 0 8px 0; text-transform: uppercase; letter-spacing: 0.5px;">Select Class</label>
        <select id="flightClassSelect" class="flight-class-select">
            <option value="economy">Economy</option>
            <option value="premium_economy">Premium Economy</option>
            <option value="business">Business</option>
            <option value="first">First Class</option>
        </select>

        <div class="flight-modal-buttons">
            <button type="button" class="flight-modal-btn flight-modal-btn-cancel" id="flightPassengersCancelBtn">Cancel</button>
            <button type="button" class="flight-modal-btn flight-modal-btn-apply" id="flightPassengersApplyBtn">Apply</button>
        </div>
    </div>
</div>

