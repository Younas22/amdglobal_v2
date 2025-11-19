<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', sans-serif;
    }

    /* Hotel Form Styles */
    .hotel-form-wrapper {
        background-color: white;
        border-radius: 12px;
        padding: 24px;
        margin: 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .hotel-form-row {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 14px;
        align-items: flex-end;
    }

    .hotel-form-field {
        grid-column: span 12;
    }

    .hotel-form-field.city-field {
        grid-column: span 12;
    }

    .hotel-form-field.checkin-field {
        grid-column: span 6;
    }

    .hotel-form-field.checkout-field {
        grid-column: span 6;
    }

    .hotel-form-field.travelers-field {
        grid-column: span 12;
    }

    .hotel-search-btn-wrapper {
        grid-column: span 12;
        display: flex;
    }

    /* Large Screen (Desktop) */
    @media (min-width: 1024px) {
        .hotel-form-row {
            grid-template-columns: repeat(24, 1fr);
        }

        .hotel-form-field.city-field {
            grid-column: span 7;
        }

        .hotel-form-field.checkin-field {
            grid-column: span 5;
        }

        .hotel-form-field.checkout-field {
            grid-column: span 5;
        }

        .hotel-form-field.travelers-field {
            grid-column: span 4;
        }

        .hotel-search-btn-wrapper {
            grid-column: span 3;
            display: flex;
            align-items: flex-end;
        }
    }

    .hotel-form-label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #003580;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .hotel-form-input, .hotel-form-select {
        width: 100%;
        padding: 13px 16px;
        border: 2px solid #E5E7EB;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s ease;
        color: #1A1A1A;
        font-family: inherit;
        background-color: #FFFFFF;
    }

    .hotel-form-input:hover, .hotel-form-select:hover {
        border-color: #D1D5DB;
        background-color: #FAFBFC;
    }

    .hotel-form-input:focus, .hotel-form-select:focus {
        border-color: #0077BE;
        background-color: #FFFFFF;
        box-shadow: 0 0 0 4px rgba(0, 119, 190, 0.1);
        outline: none;
    }

    .hotel-form-input::placeholder {
        color: #9CA3AF;
    }

    /* Select2 Styling */
    .select2-container {
        width: 100% !important;
    }

    .select2-container--default .select2-selection--single {
        border: 2px solid #E5E7EB !important;
        border-radius: 12px !important;
        height: 46px !important;
        background-color: #FFFFFF !important;
        padding: 0 !important;
        box-shadow: none !important;
    }

    .select2-container--default .select2-selection--single:hover {
        border-color: #D1D5DB !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 46px !important;
        padding-left: 16px !important;
        color: #1A1A1A !important;
        font-size: 14px !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 46px !important;
        right: 16px !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #0077BE transparent transparent transparent !important;
        margin-top: -2px !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #0077BE !important;
        box-shadow: 0 0 0 4px rgba(0, 119, 190, 0.1) !important;
    }

    .select2-dropdown {
        border: 2px solid #E5E7EB !important;
        border-top: none !important;
        border-radius: 0 0 12px 12px !important;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
        background-color: white !important;
        margin-top: -2px !important;
    }

    .select2-results {
        padding: 8px 0 !important;
        max-height: 300px !important;
    }

    .select2-results__option {
        padding: 12px 16px !important;
        font-size: 14px !important;
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

    .select2-search__field {
        border: 1px solid #D1D5DB !important;
        padding: 10px 14px !important;
        font-size: 14px !important;
        margin: 8px !important;
        border-radius: 8px !important;
    }

    .select2-search__field:focus {
        border-color: #0077BE !important;
        outline: none !important;
    }

    .hotel-search-btn {
        background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
        color: white;
        padding: 13px 24px;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        white-space: nowrap;
        height: 46px;
        box-shadow: 0 4px 12px rgba(0, 119, 190, 0.2);
    }

    .hotel-search-btn:hover {
        background: linear-gradient(135deg, #005A9C 0%, #004080 100%);
        box-shadow: 0 6px 16px rgba(0, 119, 190, 0.3);
        transform: translateY(-2px);
    }

    .hotel-search-btn:active {
        transform: translateY(0);
    }

    /* Modal Overlay */
    .hotel-modal-overlay {
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

    .hotel-modal-overlay.active {
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

    .hotel-modal-content {
        background-color: white;
        border-radius: 16px;
        padding: 24px;
        width: 100%;
        max-width: 320px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        animation: slideUpModal 0.3s ease-out;
        max-height: 85vh;
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

    .hotel-modal-header {
        font-size: 16px;
        font-weight: 700;
        color: #003580;
        margin-bottom: 18px;
        padding-bottom: 12px;
        border-bottom: 2px solid #F3F4F6;
    }

    .hotel-traveler-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid #F3F4F6;
        font-size: 14px;
    }

    .hotel-traveler-item:last-of-type {
        border-bottom: none;
    }

    .hotel-traveler-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1A1A1A;
        font-size: 14px;
    }

    .hotel-traveler-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .hotel-counter-btn {
        width: 32px;
        height: 32px;
        border: 2px solid #E5E7EB;
        background-color: white;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 700;
        color: #003580;
        transition: all 0.2s ease;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hotel-counter-btn:hover {
        background-color: #F0F9FF;
        border-color: #0077BE;
        color: #0077BE;
    }

    .hotel-counter-value {
        min-width: 30px;
        text-align: center;
        font-weight: 700;
        color: #1A1A1A;
        font-size: 14px;
    }

    .hotel-nationality-select {
        width: 100%;
        padding: 12px 14px;
        border: 2px solid #E5E7EB;
        border-radius: 10px;
        font-size: 14px;
        margin-top: 14px;
        color: #1A1A1A;
        background-color: white;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .hotel-nationality-select:hover {
        border-color: #D1D5DB;
    }

    .hotel-nationality-select:focus {
        border-color: #0077BE;
        box-shadow: 0 0 0 4px rgba(0, 119, 190, 0.1);
        outline: none;
    }

    .hotel-modal-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .hotel-modal-btn {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .hotel-modal-btn-cancel {
        background-color: #F3F4F6;
        color: #1A1A1A;
        border: 1px solid #E5E7EB;
    }

    .hotel-modal-btn-cancel:hover {
        background-color: #E5E7EB;
    }

    .hotel-modal-btn-apply {
        background: linear-gradient(135deg, #0077BE 0%, #005A9C 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(0, 119, 190, 0.2);
    }

    .hotel-modal-btn-apply:hover {
        box-shadow: 0 6px 16px rgba(0, 119, 190, 0.3);
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .hotel-form-wrapper {
            padding: 16px;
        }

        .hotel-form-row {
            gap: 12px;
        }
    }

    @media (max-width: 640px) {
        .hotel-form-wrapper {
            padding: 12px;
        }

        .hotel-form-input, .hotel-form-select {
            font-size: 13px;
            padding: 11px 14px;
        }

        .hotel-search-btn {
            padding: 11px 18px;
            font-size: 13px;
            height: 42px;
        }

        .hotel-modal-content {
            max-width: 85vw;
            padding: 20px;
        }
    }
</style>


<div class="hotel-form-wrapper">
    <form id="hotelSearchForm" class="hotel-form-row">
        
        <div class="hotel-form-field city-field">
            <label class="hotel-form-label">Destination</label>
            <select id="citySelect" class="hotel-form-select" required>
                <option></option>
            </select>
        </div>

        <div class="hotel-form-field checkin-field">
            <label class="hotel-form-label">Check-in</label>
            <input type="text" id="checkinDate" class="hotel-form-input" placeholder="Select date" required>
        </div>

        <div class="hotel-form-field checkout-field">
            <label class="hotel-form-label">Check-out</label>
            <input type="text" id="checkoutDate" class="hotel-form-input" placeholder="Select date" required>
        </div>

        <div class="hotel-form-field travelers-field">
            <label class="hotel-form-label">Travelers</label>
            <button type="button" id="travelersBtn" class="hotel-form-input" style="text-align: left; cursor: pointer;">
                <span id="travelersDisplay">2, 1R</span>
            </button>
        </div>

        <div class="hotel-search-btn-wrapper">
            <button type="submit" class="hotel-search-btn" style="width: 100%; justify-content: center;">
                <i class="fas fa-search"></i>
                <span>Search</span>
            </button>
        </div>
    </form>
</div>

<!-- Travelers Modal -->
<div id="travelersModal" class="hotel-modal-overlay">
    <div class="hotel-modal-content">
        <div class="hotel-modal-header">Select Travelers</div>

        <div class="hotel-traveler-item">
            <div class="hotel-traveler-label">
                <i class="fas fa-bed" style="color: #0077BE;"></i>
                <span>Rooms</span>
            </div>
            <div class="hotel-traveler-controls">
                <button type="button" class="hotel-counter-btn" id="roomMinus">−</button>
                <div class="hotel-counter-value" id="roomValue">1</div>
                <button type="button" class="hotel-counter-btn" id="roomPlus">+</button>
            </div>
        </div>

        <div class="hotel-traveler-item">
            <div class="hotel-traveler-label">
                <i class="fas fa-user" style="color: #0077BE;"></i>
                <span>Adults</span>
            </div>
            <div class="hotel-traveler-controls">
                <button type="button" class="hotel-counter-btn" id="adultMinus">−</button>
                <div class="hotel-counter-value" id="adultValue">2</div>
                <button type="button" class="hotel-counter-btn" id="adultPlus">+</button>
            </div>
        </div>

        <div class="hotel-traveler-item">
            <div class="hotel-traveler-label">
                <i class="fas fa-child" style="color: #0077BE;"></i>
                <span>Children</span>
            </div>
            <div class="hotel-traveler-controls">
                <button type="button" class="hotel-counter-btn" id="childMinus">−</button>
                <div class="hotel-counter-value" id="childValue">0</div>
                <button type="button" class="hotel-counter-btn" id="childPlus">+</button>
            </div>
        </div>

        <select id="nationality" class="hotel-nationality-select">
            <option value="">Select Nationality</option>
            <option value="US">United States</option>
            <option value="UK">United Kingdom</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
            <option value="JP">Japan</option>
            <option value="AU">Australia</option>
            <option value="CA">Canada</option>
            <option value="AE">UAE</option>
            <option value="SG">Singapore</option>
            <option value="TH">Thailand</option>
            <option value="PK">Pakistan</option>
        </select>

        <div class="hotel-modal-buttons">
            <button type="button" class="hotel-modal-btn hotel-modal-btn-cancel" id="cancelBtn">Cancel</button>
            <button type="button" class="hotel-modal-btn hotel-modal-btn-apply" id="applyBtn">Apply</button>
        </div>
    </div>
</div>

