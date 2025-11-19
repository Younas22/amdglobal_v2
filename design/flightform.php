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

        .location-select {
            appearance: none;
            background: transparent;
            border: none;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
            color: #1f2937;
            cursor: pointer;
            outline: none;
        }

        .location-select:focus {
            outline: none;
        }

        .airport-dropdown {
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

        .airport-dropdown.active {
            display: block;
        }

        .airport-search {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            outline: none;
            margin-bottom: 1rem;
        }

        .airport-search:focus {
            border-color: #0077BE;
        }

        .airport-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            cursor: pointer;
            border-radius: 0.75rem;
            transition: background 0.2s;
        }

        .airport-item:hover {
            background: #0077BE;
        }

        .airport-icon {
            color: #6b7280;
            font-size: 1.5rem;
            width: 30px;
            text-align: center;
        }

        .airport-details {
            flex: 1;
        }

        .airport-name {
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }

        .airport-code {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .location-wrapper {
            position: relative;
        }
    </style>
    
    <div class="max-w-7xl mx-auto">
        <!-- Main Card -->
        <div class="bg-white rounded-3xl shadow-2xl p-8">
            <!-- Trip Type Tabs -->
            <div class="flex gap-4 mb-8">
                <button id="oneWayTab" class="trip-tab px-8 py-3 rounded-xl font-semibold text-white bg-[#0077BE] transition-all">
                    One way
                </button>
                <button id="roundTripTab" class="trip-tab px-8 py-3 rounded-xl font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-all">
                    Round trip
                </button>
                <button id="multiCityTab" class="trip-tab px-8 py-3 rounded-xl font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-all">
                    Multi city
                </button>
            </div>

            <!-- Search Form -->
            <div class="flex flex-wrap lg:flex-nowrap items-stretch gap-0">
                <!-- From Location -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 rounded-l-2xl p-4 location-wrapper border-r border-gray-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">From</label>
                            <div class="text-gray-900 font-semibold cursor-pointer" id="fromBtn">
                                <span id="fromDisplay">FVM</span>
                            </div>
                        </div>
                    </div>

                    <!-- From Dropdown -->
                    <div id="fromDropdown" class="airport-dropdown">
                        <input type="text" id="fromSearch" class="airport-search" placeholder="Search airport...">
                        <div id="fromList">
                            <div class="airport-item" data-code="FVM" data-name="FVM - Fuvahmulah, M">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Fuvahmulah Airport</div>
                                    <div class="airport-code">FVM - Fuvahmulah, Maldives</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="DXB" data-name="DXB - Dubai Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Dubai Airport</div>
                                    <div class="airport-code">DXB - Dubai, United Arab Emirates</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="GDX" data-name="GDX - Magadan Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Magadan Airport</div>
                                    <div class="airport-code">GDX - Magadan, Russian Federation</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="PDX" data-name="PDX - Portland Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Portland Airport</div>
                                    <div class="airport-code">PDX - Portland, United States</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="TDX" data-name="TDX - Trat Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Trat Airport</div>
                                    <div class="airport-code">TDX - Trat, Thailand</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Swap Button -->
                <div class="hidden lg:flex items-center justify-center bg-white px-2">
                    <button id="swapBtn" class="w-10 h-10 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center hover:bg-gray-50 transition-all">
                        <i class="fas fa-exchange-alt text-gray-600 text-sm"></i>
                    </button>
                </div>

                <!-- To Location -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 location-wrapper border-r border-gray-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">To</label>
                            <div class="text-gray-900 font-semibold cursor-pointer" id="toBtn">
                                <span id="toDisplay">CFE - Clermont-Ferrand</span>
                            </div>
                        </div>
                    </div>

                    <!-- To Dropdown -->
                    <div id="toDropdown" class="airport-dropdown">
                        <input type="text" id="toSearch" class="airport-search" placeholder="Search airport...">
                        <div id="toList">
                            <div class="airport-item" data-code="CFE" data-name="CFE - Clermont-Ferrand">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Clermont-Ferrand Airport</div>
                                    <div class="airport-code">CFE - Clermont-Ferrand, France</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="DXB" data-name="DXB - Dubai Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Dubai Airport</div>
                                    <div class="airport-code">DXB - Dubai, United Arab Emirates</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="GDX" data-name="GDX - Magadan Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Magadan Airport</div>
                                    <div class="airport-code">GDX - Magadan, Russian Federation</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="PDX" data-name="PDX - Portland Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Portland Airport</div>
                                    <div class="airport-code">PDX - Portland, United States</div>
                                </div>
                            </div>
                            <div class="airport-item" data-code="TDX" data-name="TDX - Trat Airport">
                                <i class="fas fa-plane airport-icon"></i>
                                <div class="airport-details">
                                    <div class="airport-name">Trat Airport</div>
                                    <div class="airport-code">TDX - Trat, Thailand</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Departure Date -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 border-r border-gray-200">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-calendar-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Departure</label>
                            <input type="text" id="departureDate" class="w-full text-gray-900 font-semibold focus:outline-none cursor-pointer bg-transparent" value="Wed, Oct 22" readonly>
                        </div>
                    </div>
                </div>

                <!-- Return Date (Hidden for One Way) -->
                <div id="returnDateSection" class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 border-r border-gray-200" style="display: none;">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-calendar-alt text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Return</label>
                            <input type="text" id="returnDate" class="w-full text-gray-900 font-semibold focus:outline-none cursor-pointer bg-transparent" value="Sat, Oct 25" readonly>
                        </div>
                    </div>
                </div>

                <!-- Traveler & Class -->
                <div class="w-full lg:w-auto lg:flex-1 bg-gray-50 p-4 relative border-r border-gray-200">
                    <div class="flex items-start gap-3 cursor-pointer" id="travelerBtn">
                        <i class="fas fa-user text-gray-400 mt-1"></i>
                        <div class="flex-1">
                            <label class="text-sm text-gray-500 block mb-1">Traveler & Class</label>
                            <div class="text-gray-900 font-semibold">
                                <span id="travelerDisplay">1 Traveler, Economy</span>
                                <i class="fas fa-chevron-down text-gray-400 text-sm ml-2"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Traveler Dropdown -->
                    <div id="travelerDropdown" class="traveler-dropdown">
                        <h3 class="font-bold text-lg mb-4">Traveler</h3>
                        
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
                                <span id="adultCount" class="w-8 text-center font-semibold">1</span>
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

                        <!-- Infant -->
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <div class="font-semibold">Infant</div>
                                <div class="text-sm text-gray-500">(0-2 yr)</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <button class="traveler-btn w-8 h-8 rounded-full border-2 border-gray-300 flex items-center justify-center hover:bg-gray-100" data-type="infant" data-action="minus">
                                    <i class="fas fa-minus text-gray-600 text-sm"></i>
                                </button>
                                <span id="infantCount" class="w-8 text-center font-semibold">0</span>
                                <button class="traveler-btn w-8 h-8 rounded-full border-2 border-[#0077BE] bg-[#E6F3FB] flex items-center justify-center hover:bg-[#E6F3FB]" data-type="infant" data-action="plus">
                                    <i class="fas fa-plus text-[#0077BE] text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Travel Class -->
                        <h3 class="font-bold text-lg mb-3">Travel Class</h3>
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <button class="class-btn py-3 px-4 rounded-xl font-semibold bg-[#0077BE] text-white" data-class="Economy">
                                Economy
                            </button>
                            <button class="class-btn py-3 px-4 rounded-xl font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200" data-class="Premium">
                                Premium
                            </button>
                            <button class="class-btn py-3 px-4 rounded-xl font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200" data-class="Business">
                                Business
                            </button>
                            <button class="class-btn py-3 px-4 rounded-xl font-semibold bg-gray-100 text-gray-700 hover:bg-gray-200" data-class="First">
                                First
                            </button>
                        </div>

                        <button id="applyBtn" class="w-full py-3 bg-[#0077BE] text-white rounded-xl font-semibold hover:bg-[#0077BE] transition-all">
                            Apply
                        </button>
                    </div>
                </div>

                <!-- Search Button -->
                <button class="w-full lg:w-auto px-8 py-4 bg-[#0077BE] text-white rounded-r-2xl font-bold text-lg hover:bg-[#0077BE] transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-3 whitespace-nowrap">
                    Let's Fly
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <!-- flight form -->
    <script>
        // Airport dropdown functionality
        const fromBtn = document.getElementById('fromBtn');
        const fromDropdown = document.getElementById('fromDropdown');
        const fromDisplay = document.getElementById('fromDisplay');
        const fromSearch = document.getElementById('fromSearch');
        const fromList = document.getElementById('fromList');

        const toBtn = document.getElementById('toBtn');
        const toDropdown = document.getElementById('toDropdown');
        const toDisplay = document.getElementById('toDisplay');
        const toSearch = document.getElementById('toSearch');
        const toList = document.getElementById('toList');

        let selectedFrom = 'FVM';
        let selectedTo = 'CFE';

        // From dropdown
        fromBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            fromDropdown.classList.toggle('active');
            toDropdown.classList.remove('active');
            travelerDropdown.classList.remove('active');
            fromSearch.focus();
        });

        fromSearch.addEventListener('input', (e) => {
            const searchText = e.target.value.toLowerCase();
            const items = fromList.querySelectorAll('.airport-item');
            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(searchText) ? 'flex' : 'none';
            });
        });

        fromList.querySelectorAll('.airport-item').forEach(item => {
            item.addEventListener('click', () => {
                selectedFrom = item.dataset.code;
                fromDisplay.textContent = item.dataset.name;
                fromDropdown.classList.remove('active');
                fromSearch.value = '';
                fromList.querySelectorAll('.airport-item').forEach(i => i.style.display = 'flex');
            });
        });

        // To dropdown
        toBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            toDropdown.classList.toggle('active');
            fromDropdown.classList.remove('active');
            travelerDropdown.classList.remove('active');
            toSearch.focus();
        });

        toSearch.addEventListener('input', (e) => {
            const searchText = e.target.value.toLowerCase();
            const items = toList.querySelectorAll('.airport-item');
            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(searchText) ? 'flex' : 'none';
            });
        });

        toList.querySelectorAll('.airport-item').forEach(item => {
            item.addEventListener('click', () => {
                selectedTo = item.dataset.code;
                toDisplay.textContent = item.dataset.name;
                toDropdown.classList.remove('active');
                toSearch.value = '';
                toList.querySelectorAll('.airport-item').forEach(i => i.style.display = 'flex');
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', (e) => {
            if (!fromDropdown.contains(e.target) && !fromBtn.contains(e.target)) {
                fromDropdown.classList.remove('active');
            }
            if (!toDropdown.contains(e.target) && !toBtn.contains(e.target)) {
                toDropdown.classList.remove('active');
            }
        });

        // Initialize Flatpickr for date inputs
        const departurePicker = flatpickr("#departureDate", {
            dateFormat: "D, M d",
            minDate: "today",
            defaultDate: "2025-10-22"
        });

        const returnPicker = flatpickr("#returnDate", {
            dateFormat: "D, M d",
            minDate: "today",
            defaultDate: "2025-10-25"
        });

        // Trip type tabs
        const oneWayTab = document.getElementById('oneWayTab');
        const roundTripTab = document.getElementById('roundTripTab');
        const multiCityTab = document.getElementById('multiCityTab');
        const returnDateSection = document.getElementById('returnDateSection');
        const tripTabs = document.querySelectorAll('.trip-tab');

        function setActiveTab(activeTab) {
            tripTabs.forEach(tab => {
                tab.classList.remove('bg-[#0077BE]', 'text-white');
                tab.classList.add('bg-gray-100', 'text-gray-600');
            });
            activeTab.classList.remove('bg-gray-100', 'text-gray-600');
            activeTab.classList.add('bg-[#0077BE]', 'text-white');
        }

        oneWayTab.addEventListener('click', () => {
            setActiveTab(oneWayTab);
            returnDateSection.style.display = 'none';
        });

        roundTripTab.addEventListener('click', () => {
            setActiveTab(roundTripTab);
            returnDateSection.style.display = 'block';
        });

        multiCityTab.addEventListener('click', () => {
            setActiveTab(multiCityTab);
            returnDateSection.style.display = 'none';
        });

        // Swap locations
        document.getElementById('swapBtn').addEventListener('click', () => {
            const tempFrom = selectedFrom;
            const tempFromDisplay = fromDisplay.textContent;
            
            selectedFrom = selectedTo;
            fromDisplay.textContent = toDisplay.textContent;
            
            selectedTo = tempFrom;
            toDisplay.textContent = tempFromDisplay;
        });

        // Traveler dropdown
        const travelerBtn = document.getElementById('travelerBtn');
        const travelerDropdown = document.getElementById('travelerDropdown');
        const travelerDisplay = document.getElementById('travelerDisplay');
        const applyBtn = document.getElementById('applyBtn');

        let travelers = {
            adult: 1,
            child: 0,
            infant: 0
        };
        let travelClass = 'Economy';

        travelerBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            travelerDropdown.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!travelerDropdown.contains(e.target) && !travelerBtn.contains(e.target)) {
                travelerDropdown.classList.remove('active');
            }
        });

        // Traveler counter buttons
        document.querySelectorAll('.traveler-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const type = btn.dataset.type;
                const action = btn.dataset.action;
                
                if (action === 'plus') {
                    travelers[type]++;
                } else if (action === 'minus' && travelers[type] > 0) {
                    if (type === 'adult' && travelers[type] === 1) return; // At least 1 adult
                    travelers[type]--;
                }
                
                document.getElementById(`${type}Count`).textContent = travelers[type];
            });
        });

        // Travel class buttons
        document.querySelectorAll('.class-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.class-btn').forEach(b => {
                    b.classList.remove('bg-[#0077BE]', 'text-white');
                    b.classList.add('bg-gray-100', 'text-gray-700');
                });
                btn.classList.remove('bg-gray-100', 'text-gray-700');
                btn.classList.add('bg-[#0077BE]', 'text-white');
                travelClass = btn.dataset.class;
            });
        });

        // Apply button
        applyBtn.addEventListener('click', () => {
            const totalTravelers = travelers.adult + travelers.child + travelers.infant;
            const travelerText = totalTravelers === 1 ? '1 Traveler' : `${totalTravelers} Travelers`;
            travelerDisplay.textContent = `${travelerText}, ${travelClass}`;
            travelerDropdown.classList.remove('active');
        });
    </script>