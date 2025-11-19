{{-- Hotel Search Form Component --}}

<style>
    .flatpickr-input {
        background: transparent !important;
        border: none !important;
        cursor: pointer;
    }

    .destination-dropdown,
    .traveler-dropdown,
    .country-dropdown {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        margin-top: 0.5rem;
        background: white;
        border-radius: 1rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        padding: 1rem;
        z-index: 100;
        max-height: 350px;
        overflow-y: auto;
        width: 100%;
        min-width: 280px;
    }

    .destination-dropdown.active,
    .traveler-dropdown.active,
    .country-dropdown.active {
        display: block;
    }

    .destination-search,
    .country-search {
        width: 100%;
        padding: 0.65rem 0.85rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        font-size: 0.9rem;
        outline: none;
        margin-bottom: 0.75rem;
    }

    .destination-search:focus,
    .country-search:focus {
        border-color: #0077BE;
    }

    .destination-item,
    .country-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        cursor: pointer;
        border-radius: 0.5rem;
        transition: background 0.2s;
    }

    .destination-item:hover,
    .country-item:hover {
        background: #f3f4f6;
    }

    .destination-icon,
    .country-flag {
        font-size: 1.25rem;
        width: 24px;
        text-align: center;
    }

    .destination-details {
        flex: 1;
    }

    .destination-name,
    .country-name {
        font-weight: 600;
        color: #111827;
        margin-bottom: 0.15rem;
        font-size: 0.95rem;
    }

    .destination-location {
        font-size: 0.8rem;
        color: #6b7280;
    }

    .location-wrapper {
        position: relative;
    }

    .traveler-dropdown {
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 320px;
    }

    .dropdown-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 40;
    }

    .dropdown-overlay.active {
        display: block;
    }

    .loading {
        text-align: center;
        padding: 1rem;
        color: #6b7280;
    }

    @media (max-width: 1024px) {
        .destination-dropdown,
        .country-dropdown {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 380px;
        }
    }
</style>

<div class="p-3 sm:p-5">
    <form id="hotelSearchForm" onsubmit="return submitHotelForm(event)">
        <div class="flex flex-col gap-2">
            <!-- Input Fields Row -->
            <div class="flex flex-col sm:flex-row items-stretch gap-2">
                <!-- Destination -->
                <div class="w-full sm:flex-1 bg-gray-50 rounded-lg p-2.5 location-wrapper border border-gray-200">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-map-marker-alt text-gray-400 text-xs mt-0.5"></i>
                        <div class="flex-1">
                            <label class="text-xs text-gray-500 block mb-0.5">Destination</label>
                            <div class="text-gray-900 font-semibold text-sm cursor-pointer" id="hotelDestinationBtn">
                                <span id="hotelDestinationDisplay">Dubai</span>
                            </div>
                            <input type="hidden" id="hotelDestinationValue" value="Dubai">
                        </div>
                    </div>

                    <!-- Hotel Destination Dropdown -->
                    <div id="hotelDestinationDropdown" class="destination-dropdown">
                        <input type="text" id="hotelDestinationSearch" class="destination-search" placeholder="Search destination...">
                        <div id="hotelDestinationList">
                            <div class="loading">Type at least 3 characters to search...</div>
                        </div>
                    </div>
                </div>

                <!-- Check-in Date -->
                <div class="w-full sm:flex-1 bg-gray-50 rounded-lg p-2.5 border border-gray-200">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-calendar-alt text-gray-400 text-xs mt-0.5"></i>
                        <div class="flex-1">
                            <label class="text-xs text-gray-500 block mb-0.5">Check-in</label>
                            <input type="text" id="hotelCheckinDate" class="w-full text-gray-900 font-semibold text-sm focus:outline-none cursor-pointer bg-transparent" value="<?= date('d-m-Y', strtotime('+2 days')) ?>" readonly>
                        </div>
                    </div>
                </div>

                <!-- Check-out Date -->
                <div class="w-full sm:flex-1 bg-gray-50 rounded-lg p-2.5 border border-gray-200">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-calendar-alt text-gray-400 text-xs mt-0.5"></i>
                        <div class="flex-1">
                            <label class="text-xs text-gray-500 block mb-0.5">Check-out</label>
                            <input type="text" id="hotelCheckoutDate" class="w-full text-gray-900 font-semibold text-sm focus:outline-none cursor-pointer bg-transparent" value="<?= date('d-m-Y', strtotime('+4 days')) ?>" readonly>
                        </div>
                    </div>
                </div>

                <!-- Travelers -->
                <div class="w-full sm:flex-1 bg-gray-50 rounded-lg p-2.5 relative border border-gray-200">
                    <div class="flex items-start gap-2 cursor-pointer" id="hotelTravelerBtn">
                        <i class="fas fa-user text-gray-400 text-xs mt-0.5"></i>
                        <div class="flex-1">
                            <label class="text-xs text-gray-500 block mb-0.5">Travelers</label>
                            <div class="text-gray-900 font-semibold text-sm">
                                <span id="hotelTravelerDisplay">2 Travelers, 1 Room</span>
                                <i class="fas fa-chevron-down text-gray-400 text-xs ml-1"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Traveler Dropdown -->
                    <div id="hotelTravelerDropdown" class="traveler-dropdown">
                        <h3 class="font-bold text-base mb-3">Travelers & Rooms</h3>

                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <div class="font-semibold text-sm">Adult</div>
                                <div class="text-xs text-gray-500">(12+ yr)</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" class="traveler-btn w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" data-type="adult" data-action="minus">
                                    <i class="fas fa-minus text-gray-600 text-xs"></i>
                                </button>
                                <span id="hotelAdultCount" class="w-6 text-center font-semibold text-sm">2</span>
                                <button type="button" class="traveler-btn w-7 h-7 rounded-full border-2 border-[#0077BE] bg-[#E6F3FB] flex items-center justify-center" data-type="adult" data-action="plus">
                                    <i class="fas fa-plus text-[#0077BE] text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <div class="font-semibold text-sm">Child</div>
                                <div class="text-xs text-gray-500">(2-11 yr)</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" class="traveler-btn w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" data-type="child" data-action="minus">
                                    <i class="fas fa-minus text-gray-600 text-xs"></i>
                                </button>
                                <span id="hotelChildCount" class="w-6 text-center font-semibold text-sm">0</span>
                                <button type="button" class="traveler-btn w-7 h-7 rounded-full border-2 border-[#0077BE] bg-[#E6F3FB] flex items-center justify-center" data-type="child" data-action="plus">
                                    <i class="fas fa-plus text-[#0077BE] text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <div class="font-semibold text-sm">Rooms</div>
                                <div class="text-xs text-gray-500">How many?</div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" class="traveler-btn w-7 h-7 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" data-type="room" data-action="minus">
                                    <i class="fas fa-minus text-gray-600 text-xs"></i>
                                </button>
                                <span id="hotelRoomCount" class="w-6 text-center font-semibold text-sm">1</span>
                                <button type="button" class="traveler-btn w-7 h-7 rounded-full border-2 border-[#0077BE] bg-[#E6F3FB] flex items-center justify-center" data-type="room" data-action="plus">
                                    <i class="fas fa-plus text-[#0077BE] text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <button type="button" id="hotelApplyTravelerBtn" class="w-full py-2.5 bg-[#0077BE] text-white rounded-xl font-semibold text-sm hover:bg-[#005f99] transition-all">
                            Apply
                        </button>
                    </div>
                </div>

                <!-- Nationality -->
                <div class="w-full sm:flex-1 bg-gray-50 rounded-lg p-2.5 relative border border-gray-200">
                    <div class="flex items-start gap-2 cursor-pointer" id="hotelNationalityBtn">
                        <i class="fas fa-flag text-gray-400 text-xs mt-0.5"></i>
                        <div class="flex-1">
                            <label class="text-xs text-gray-500 block mb-0.5">Nationality</label>
                            <div class="text-gray-900 font-semibold text-sm">
                                <span id="hotelNationalityDisplay">🇵🇰 Pakistan</span>
                                <i class="fas fa-chevron-down text-gray-400 text-xs ml-1"></i>
                            </div>
                            <input type="hidden" id="hotelNationalityValue" value="PK">
                        </div>
                    </div>

                    <!-- Country Dropdown -->
                    <div id="hotelCountryDropdown" class="country-dropdown">
                        <input type="text" id="hotelCountrySearch" class="country-search" placeholder="Search country...">
                        <div id="hotelCountryList">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <button type="submit" class="w-full px-6 py-3 bg-[#0077BE] text-white rounded-lg font-bold text-base hover:bg-[#005f99] transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                Search Hotels
                <i class="fas fa-search text-sm"></i>
            </button>
        </div>
    </form>
</div>

<!-- Overlay for mobile dropdowns -->
<div id="dropdownOverlay" class="dropdown-overlay"></div>
