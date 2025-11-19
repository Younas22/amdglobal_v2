<style>
        .flatpickr-input {
            background: transparent !important;
            border: none !important;
            cursor: pointer;
        }
        
        .traveler-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            width: 350px;
            z-index: 50;
        }
        
        .traveler-dropdown.active {
            display: block;
        }

        .destination-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 1rem;
            z-index: 100;
            max-height: 400px;
            overflow-y: auto;
            min-width: 500px;
        }

        .destination-dropdown.active {
            display: block;
        }

        .destination-search {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            outline: none;
            margin-bottom: 1rem;
        }

        .destination-search:focus {
            border-color: #0077BE;
        }

        .destination-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            cursor: pointer;
            border-radius: 0.75rem;
            transition: background 0.2s;
        }

        .destination-item:hover {
            background: #f3f4f6;
        }

        .destination-icon {
            color: #6b7280;
            font-size: 1.5rem;
            width: 30px;
            text-align: center;
        }

        .destination-details {
            flex: 1;
        }

        .destination-name {
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }

        .destination-location {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .location-wrapper {
            position: relative;
        }

        .country-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 0.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            width: 350px;
            max-height: 400px;
            overflow-y: auto;
            z-index: 50;
        }
        
        .country-dropdown.active {
            display: block;
        }

        .country-search {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            outline: none;
            margin-bottom: 1rem;
        }

        .country-search:focus {
            border-color: #0077BE;
        }

        .country-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            cursor: pointer;
            border-radius: 0.5rem;
            transition: background 0.2s;
        }

        .country-item:hover {
            background: #f3f4f6;
        }

        .country-flag {
            font-size: 1.5rem;
        }

        .country-name {
            font-weight: 500;
            color: #111827;
        }
    </style>


    <div class="max-w-7xl mx-auto">
        <!-- Main Card -->
        <div class="bg-white rounded-3xl shadow-2xl p-8">
            <!-- Search Form -->
            <div class="flex flex-wrap lg:flex-nowrap items-stretch gap-0">
                <!-- Destination -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 rounded-l-2xl p-4 location-wrapper border-r border-gray-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Destination</label>
                            <div class="text-gray-900 font-semibold cursor-pointer" id="destinationBtn">
                                <span id="destinationDisplay">Dubai</span>
                            </div>
                        </div>
                    </div>

                    <!-- Destination Dropdown -->
                    <div id="destinationDropdown" class="destination-dropdown">
                        <input type="text" id="destinationSearch" class="destination-search" placeholder="Search destination...">
                        <div id="destinationList">
                            <div class="destination-item" data-code="DXB" data-name="Dubai">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">Dubai</div>
                                    <div class="destination-location">United Arab Emirates</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="NYC" data-name="New York">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">New York</div>
                                    <div class="destination-location">United States</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="LON" data-name="London">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">London</div>
                                    <div class="destination-location">United Kingdom</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="PAR" data-name="Paris">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">Paris</div>
                                    <div class="destination-location">France</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="TOK" data-name="Tokyo">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">Tokyo</div>
                                    <div class="destination-location">Japan</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="SIN" data-name="Singapore">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">Singapore</div>
                                    <div class="destination-location">Singapore</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="IST" data-name="Istanbul">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">Istanbul</div>
                                    <div class="destination-location">Turkey</div>
                                </div>
                            </div>
                            <div class="destination-item" data-code="BKK" data-name="Bangkok">
                                <i class="fas fa-building destination-icon"></i>
                                <div class="destination-details">
                                    <div class="destination-name">Bangkok</div>
                                    <div class="destination-location">Thailand</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Check-in Date -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 border-r border-gray-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-calendar-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Check-in</label>
                            <input type="text" id="checkinDate" class="w-full text-gray-900 font-semibold focus:outline-none cursor-pointer bg-transparent" value="Wed, Oct 22" readonly>
                        </div>
                    </div>
                </div>

                <!-- Check-out Date -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 border-r border-gray-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-calendar-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Check-out</label>
                            <input type="text" id="checkoutDate" class="w-full text-gray-900 font-semibold focus:outline-none cursor-pointer bg-transparent" value="Sat, Oct 25" readonly>
                        </div>
                    </div>
                </div>

                <!-- Travelers -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 relative border-r border-gray-200">
                    <div class="flex items-start gap-3 cursor-pointer" id="travelerBtn">
                        <i class="fas fa-user text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Travelers</label>
                            <div class="text-gray-900 font-semibold">
                                <span id="travelerDisplay">2 Adults, 0 Child</span>
                                <i class="fas fa-chevron-down text-gray-400 text-sm ml-2"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Traveler Dropdown -->
                    <div id="travelerDropdown" class="traveler-dropdown">
                        <h3 class="font-bold text-lg mb-4">Travelers</h3>
                        
                        <!-- Adult -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="font-semibold">Adult</div>
                                <div class="text-sm text-gray-500">(12+ yr)</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <button class="traveler-btn w-8 h-8 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" data-type="adult" data-action="minus">
                                    <i class="fas fa-minus text-gray-600 text-sm"></i>
                                </button>
                                <span id="adultCount" class="w-8 text-center font-semibold">2</span>
                                <button class="traveler-btn w-8 h-8 rounded-full border-2 border-[#0077BE] bg-[#E6F3FB] flex items-center justify-center hover:bg-[#E6F3FB]" data-type="adult" data-action="plus">
                                    <i class="fas fa-plus text-[#0077BE] text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Child -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="font-semibold">Child</div>
                                <div class="text-sm text-gray-500">(2-11 yr)</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <button class="traveler-btn w-8 h-8 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" data-type="child" data-action="minus">
                                    <i class="fas fa-minus text-gray-600 text-sm"></i>
                                </button>
                                <span id="childCount" class="w-8 text-center font-semibold">0</span>
                                <button class="traveler-btn w-8 h-8 rounded-full border-2 border-[#0077BE] bg-[#E6F3FB] flex items-center justify-center hover:bg-[#E6F3FB]" data-type="child" data-action="plus">
                                    <i class="fas fa-plus text-[#0077BE] text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <button id="applyTravelerBtn" class="w-full py-3 bg-[#0077BE] text-white rounded-xl font-semibold hover:bg-[#0077BE] transition-all">
                            Apply
                        </button>
                    </div>
                </div>

                <!-- Nationality -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 relative border-r border-gray-200">
                    <div class="flex items-start gap-3 cursor-pointer" id="nationalityBtn">
                        <i class="fas fa-flag text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Nationality</label>
                            <div class="text-gray-900 font-semibold">
                                <span id="nationalityDisplay">🇵🇰 Pakistan</span>
                                <i class="fas fa-chevron-down text-gray-400 text-sm ml-2"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Country Dropdown -->
                    <div id="countryDropdown" class="country-dropdown">
                        <input type="text" id="countrySearch" class="country-search" placeholder="Search country...">
                        <div id="countryList">
                            <div class="country-item" data-code="PK" data-name="Pakistan" data-flag="🇵🇰">
                                <span class="country-flag">🇵🇰</span>
                                <span class="country-name">Pakistan</span>
                            </div>
                            <div class="country-item" data-code="US" data-name="United States" data-flag="🇺🇸">
                                <span class="country-flag">🇺🇸</span>
                                <span class="country-name">United States</span>
                            </div>
                            <div class="country-item" data-code="GB" data-name="United Kingdom" data-flag="🇬🇧">
                                <span class="country-flag">🇬🇧</span>
                                <span class="country-name">United Kingdom</span>
                            </div>
                            <div class="country-item" data-code="AE" data-name="United Arab Emirates" data-flag="🇦🇪">
                                <span class="country-flag">🇦🇪</span>
                                <span class="country-name">United Arab Emirates</span>
                            </div>
                            <div class="country-item" data-code="IN" data-name="India" data-flag="🇮🇳">
                                <span class="country-flag">🇮🇳</span>
                                <span class="country-name">India</span>
                            </div>
                            <div class="country-item" data-code="CA" data-name="Canada" data-flag="🇨🇦">
                                <span class="country-flag">🇨🇦</span>
                                <span class="country-name">Canada</span>
                            </div>
                            <div class="country-item" data-code="AU" data-name="Australia" data-flag="🇦🇺">
                                <span class="country-flag">🇦🇺</span>
                                <span class="country-name">Australia</span>
                            </div>
                            <div class="country-item" data-code="FR" data-name="France" data-flag="🇫🇷">
                                <span class="country-flag">🇫🇷</span>
                                <span class="country-name">France</span>
                            </div>
                            <div class="country-item" data-code="DE" data-name="Germany" data-flag="🇩🇪">
                                <span class="country-flag">🇩🇪</span>
                                <span class="country-name">Germany</span>
                            </div>
                            <div class="country-item" data-code="JP" data-name="Japan" data-flag="🇯🇵">
                                <span class="country-flag">🇯🇵</span>
                                <span class="country-name">Japan</span>
                            </div>
                            <div class="country-item" data-code="CN" data-name="China" data-flag="🇨🇳">
                                <span class="country-flag">🇨🇳</span>
                                <span class="country-name">China</span>
                            </div>
                            <div class="country-item" data-code="SA" data-name="Saudi Arabia" data-flag="🇸🇦">
                                <span class="country-flag">🇸🇦</span>
                                <span class="country-name">Saudi Arabia</span>
                            </div>
                            <div class="country-item" data-code="TR" data-name="Turkey" data-flag="🇹🇷">
                                <span class="country-flag">🇹🇷</span>
                                <span class="country-name">Turkey</span>
                            </div>
                            <div class="country-item" data-code="SG" data-name="Singapore" data-flag="🇸🇬">
                                <span class="country-flag">🇸🇬</span>
                                <span class="country-name">Singapore</span>
                            </div>
                            <div class="country-item" data-code="MY" data-name="Malaysia" data-flag="🇲🇾">
                                <span class="country-flag">🇲🇾</span>
                                <span class="country-name">Malaysia</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search Button -->
                <button class="w-full lg:w-auto px-8 py-4 bg-[#0077BE] text-white rounded-r-2xl font-bold text-lg hover:bg-[#0077BE] transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-3 whitespace-nowrap">
                    Search Hotels
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
