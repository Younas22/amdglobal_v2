<style>

        .form-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            width: 100%;
            max-width: 1200px;
            z-index: 20;
            position: relative;
        }

        /* Tab Styles */
        .tab-buttons {
            display: flex;
            gap: 0;
            border-bottom: 2px solid #e5e7eb;
        }

        .tab-btn {
            flex: 1;
            padding: 14px 24px;
            background: transparent;
            border: none;
            font-weight: 600;
            font-size: 15px;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .tab-btn:hover {
            color: #0077BE;
            background: #f3f4f6;
        }

        .tab-btn.active {
            color: #0077BE;
            background: transparent;
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 3px;
            background: #0077BE;
            border-radius: 3px 3px 0 0;
        }

        /* Trip Type Toggle Styles */
        .trip-type-btn {
            background: #f3f4f6;
            color: #6b7280;
            border: 2px solid transparent;
        }

        .trip-type-btn:hover {
            background: #e5e7eb;
        }

        .trip-type-btn.active {
            background: #E6F3FB;
            color: #0077BE;
            border-color: #0077BE;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form Styles */
        .flatpickr-input {
            background: transparent !important;
            border: none !important;
            cursor: pointer;
        }
        
        .traveler-dropdown, .passenger-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0; 
            margin-top: 0.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 1.25rem;
            width: 280px;
            z-index: 50;
        }
        
        .traveler-dropdown.active, .passenger-dropdown.active {
            display: block;
        }

        .destination-dropdown, .airport-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
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

        .destination-dropdown.active, .airport-dropdown.active {
            display: block;
        }

        .destination-search, .airport-search {
            width: 100%;
            padding: 0.65rem 0.85rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.9rem;
            outline: none;
            margin-bottom: 0.75rem;
        }

        .destination-search:focus, .airport-search:focus {
            border-color: #0077BE;
        }

        .destination-item, .airport-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            cursor: pointer;
            border-radius: 0.5rem;
            transition: background 0.2s;
        }

        .destination-item:hover, .airport-item:hover {
            background: #f3f4f6;
        }

        .destination-icon, .airport-icon {
            color: #6b7280;
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
        }

        .destination-details, .airport-details {
            flex: 1;
        }

        .destination-name, .airport-name {
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.15rem;
            font-size: 0.95rem;
        }

        .destination-location, .airport-code {
            font-size: 0.8rem;
            color: #6b7280;
        }

        .location-wrapper {
            position: relative;
        }

        .country-dropdown, .class-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            width: 280px;
            max-height: 350px;
            overflow-y: auto;
            z-index: 50;
        }
        
        .country-dropdown.active, .class-dropdown.active {
            display: block;
        }

        .country-search {
            width: 100%;
            padding: 0.65rem 0.85rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.9rem;
            outline: none;
            margin-bottom: 0.75rem;
        }

        .country-search:focus {
            border-color: #0077BE;
        }

        .country-item, .class-item {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.65rem;
            cursor: pointer;
            border-radius: 0.5rem;
            transition: background 0.2s;
        }

        .country-item:hover, .class-item:hover {
            background: #f3f4f6;
        }

        .country-flag {
            font-size: 1.25rem;
        }

        .country-name, .class-name {
            font-weight: 500;
            color: #111827;
            font-size: 0.95rem;
        }

        /* Mobile responsive adjustments */
        @media (max-width: 1024px) {
            .traveler-dropdown,
            .passenger-dropdown,
            .country-dropdown,
            .class-dropdown {
                position: fixed;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                right: auto;
                width: 90%;
                max-width: 320px;
            }

            .destination-dropdown,
            .airport-dropdown {
                position: fixed;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 90%;
                max-width: 380px;
            }
        }

        @media (max-width: 640px) {
            .traveler-dropdown, .passenger-dropdown {
                padding: 1.25rem;
            }

            .destination-item, .airport-item {
                padding: 0.65rem;
                gap: 0.65rem;
            }

            .destination-icon, .airport-icon {
                font-size: 1.1rem;
                width: 20px;
            }

            .destination-name, .airport-name {
                font-size: 0.9rem;
            }

            .destination-location, .airport-code {
                font-size: 0.75rem;
            }
        }

        /* Overlay for mobile dropdowns */
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

        /* Make sure dropdowns appear above overlay */
        .destination-dropdown.active,
        .airport-dropdown.active,
        .traveler-dropdown.active,
        .passenger-dropdown.active,
        .country-dropdown.active,
        .class-dropdown.active {
            z-index: 100 !important;
        }

        @media (min-width: 1025px) {
            .dropdown-overlay {
                display: none !important;
            }
        }

        .loading {
            text-align: center;
            padding: 1rem;
            color: #6b7280;
        }



    </style>

        <!-- Search Form Container -->
        <!-- <div class="form-container"> -->
            <!-- Hotel Form -->
            <div class="form-container top-border">
            <div id="hotelForm" class="tab-content {{ request()->segment(1) == 'flights' ? '' : 'active' }} p-3 sm:p-5">
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
             </div>
        <!-- </div> -->
