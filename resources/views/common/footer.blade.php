<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .travel-bg {
            background-image: 
                linear-gradient(135deg, rgba(0, 119, 190, 0.95) 0%, rgba(0, 92, 143, 0.92) 100%),
                url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1200');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        
        .glass-effect {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }
        
        .wave {
            position: absolute;
            top: -2px;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }
        
        .wave svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 80px;
        }
        
        .wave .shape-fill {
            fill: #EFF4F9;
        }
        
        .footer-link {
            position: relative;
            overflow: hidden;
        }
        
        .footer-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #60a5fa;
            transition: width 0.3s ease;
        }
        
        .footer-link:hover::after {
            width: 100%;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        .social-icon {
            position: relative;
            overflow: hidden;
        }
        
        .social-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .social-icon:hover::before {
            width: 200px;
            height: 200px;
        }

        /* Logo Container Fix */
        .logo-container {
            background: white;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 200px;
            width: auto;
        }

        .logo-container img {
            max-width: 100%;
            max-height: 60px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .logo-fallback {
            display: none;
        }

        /* IATA Logo Styling */
        .iata-logo-container {
            background: white;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .iata-logo-container img {
            max-height: 40px;
            width: auto;
            object-fit: contain;
        }
    </style>




    <!-- UNIQUE FOOTER WITH TRAVEL BACKGROUND -->
    <footer class="relative travel-bg text-white overflow-hidden">
        
        <!-- Decorative Wave -->
        <div class="wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
            
            <!-- Main Footer Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 mb-12">
                
                <!-- Brand Section - Takes more space -->
                <div class="lg:col-span-5">
                    <!-- Logo with Fallback -->

                    <!-- Logo with Fallback -->
                    <div class="flex flex-col items-start gap-2 mb-6">
                        <!-- Main Logo -->
                        <div class="float-animation">
                            <img 
                                src="{{ getSettingImage('business_logo_white', 'branding') }}" 
                                alt="Logo" 
                                class="w-32 h-32 object-contain"
                                style="max-height: 60px; width: auto; height: auto;"
                            >
                        </div>

                        <!-- IATA Logo on second line -->
                        <div class="iata-logo-container mt-2">
                            <img 
                                src="{{ url('public/assets/images/settings/iata.png') }}" 
                                alt="IATA Logo" 
                                class="w-24 h-auto object-contain"
                            >
                        </div>
                    </div>

                    
                    <p class="text-blue-100 text-sm leading-relaxed mb-6">
                        <?= getSetting('meta_description', 'seo') ?>
                    </p>

                    <!-- Social Links -->
                    @php
                        $socialLinks = getSetting('all', 'social');
                    @endphp

                    <div class="flex gap-3 mb-6">
                        @if(!empty($socialLinks['facebook_url']))
                            <a href="{{ $socialLinks['facebook_url'] }}" target="_blank" class="social-icon w-11 h-11 bg-white/10 rounded-xl flex items-center justify-center hover:bg-blue-500 transition-colors relative z-10">
                                <i class="fab fa-facebook-f text-white relative z-10"></i>
                            </a>
                        @endif

                        @if(!empty($socialLinks['twitter_url']))
                            <a href="{{ $socialLinks['twitter_url'] }}" target="_blank" class="social-icon w-11 h-11 bg-white/10 rounded-xl flex items-center justify-center hover:bg-sky-500 transition-colors relative z-10">
                                <i class="fab fa-twitter text-white relative z-10"></i>
                            </a>
                        @endif

                        @if(!empty($socialLinks['instagram_url']))
                            <a href="{{ $socialLinks['instagram_url'] }}" target="_blank" class="social-icon w-11 h-11 bg-white/10 rounded-xl flex items-center justify-center hover:bg-pink-500 transition-colors relative z-10">
                                <i class="fab fa-instagram text-white relative z-10"></i>
                            </a>
                        @endif

                        @if(!empty($socialLinks['linkedin_url']))
                            <a href="{{ $socialLinks['linkedin_url'] }}" target="_blank" class="social-icon w-11 h-11 bg-white/10 rounded-xl flex items-center justify-center hover:bg-blue-700 transition-colors relative z-10">
                                <i class="fab fa-linkedin-in text-white relative z-10"></i>
                            </a>
                        @endif

                        @if(!empty($socialLinks['youtube_url']))
                            <a href="{{ $socialLinks['youtube_url'] }}" target="_blank" class="social-icon w-11 h-11 bg-white/10 rounded-xl flex items-center justify-center hover:bg-red-600 transition-colors relative z-10">
                                <i class="fab fa-youtube text-white relative z-10"></i>
                            </a>
                        @endif

                        @if(!empty($socialLinks['whatsapp_number']))
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $socialLinks['whatsapp_number']) }}" target="_blank" class="social-icon w-11 h-11 bg-white/10 rounded-xl flex items-center justify-center hover:bg-green-500 transition-colors relative z-10">
                                <i class="fab fa-whatsapp text-white relative z-10"></i>
                            </a>
                        @endif
                    </div>


                </div>
                
                <!-- Quick Links -->
                <div class="lg:col-span-2">
                    <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-blue-400 rounded"></span>
                        Quick Links
                    </h4>
                    <ul class="space-y-2">
                        @foreach (get_menu_items('footer_quick_links') as $item)
                        <li><a href="{{ $item->full_url }}" class="footer-link text-blue-100 hover:text-white text-sm inline-block pb-1">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                
                <!-- Our Services -->
                <div class="lg:col-span-2">
                    <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-blue-400 rounded"></span>
                        Our Services
                    </h4>
                    <ul class="space-y-2">
                        @foreach (get_menu_items('footer_services') as $item)
                        <li><a href="{{ $item->full_url }}" class="footer-link text-blue-100 hover:text-white text-sm inline-block pb-1">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                
                <!-- Newsletter - Compact Design -->
                <div class="lg:col-span-3">
                    <h4 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <span class="w-1 h-6 bg-blue-400 rounded"></span>
                        Newsletter
                    </h4>
                    <p class="text-blue-100 text-xs mb-4">Get exclusive travel deals!</p>
                    <div class="space-y-2">
                        <input 
                            type="email" 
                            placeholder="Your email" 
                            class="w-full px-4 py-2.5 rounded-lg bg-white/10 border border-white/20 text-white placeholder-blue-200 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white/15 transition-all"
                        >
                        <button class="w-full bg-white text-blue-600 font-bold py-2.5 rounded-lg hover:bg-blue-50 transition-all hover:shadow-xl flex items-center justify-center gap-2 text-sm">
                            <i class="fas fa-paper-plane"></i>
                            Subscribe Now
                        </button>
                    </div>
                </div>
                
            </div>
            
            <!-- Footer Bottom -->
            <div class="border-t border-white/20 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-4">
                    <div class="flex items-center gap-3 text-sm text-blue-100">
                        <span>© <?= date('Y'); ?> <strong class="text-white"><?= getSetting('business_name', 'main') ?></strong></span>
                        <span class="hidden md:inline">•</span>
                        <span class="hidden md:inline">All rights reserved. | IATA Accredited Agent</span>
                        <span class="hidden md:inline">•</span>
                        <span class="hidden md:inline">Made By <i class="fas fa-heart text-red-400"></i> <a href="https://travelbookingpanel.com/">TravelBookingPanel</a></span>
                    </div>
                    <div class="flex gap-6 text-sm">
                         @foreach (get_menu_items('footer_support') as $item)
                        <a href="{{ $item->full_url }}" class="text-blue-100 hover:text-white transition-colors">{{ $item->name }}</a>
                        @endforeach

                    </div>
                </div>

                <!-- AMD Business Information -->
                <div class="border-t border-white/20 pt-4 text-center text-xs text-blue-100">
                    <p class="mb-2"><strong class="text-white">AMD Asian-Market-Deutschland</strong> Inh. Iftikhar Ahmed e.K.</p>
                    <p>Licensed travel agency. All bookings are financially protected. Terms & Conditions apply.</p>
                </div>
            </div>
            
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 opacity-10">
            <i class="fas fa-plane text-white text-9xl transform rotate-45"></i>
        </div>
        <div class="absolute bottom-20 left-10 opacity-10">
            <i class="fas fa-globe text-white text-8xl"></i>
        </div>
        
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        function toggleMobileMenu() {
            const hamburger = document.querySelector('.hamburger');
            const mobileMenu = document.querySelector('.mobile-menu');
            hamburger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        }
    </script>




<script>
    // ========== API Configuration ==========
    const fullPath = window.location.pathname.split('/');
    const baseFolder = fullPath[1];
    const API_BASE_URL = window.location.origin + "/" + baseFolder;

    // ========== GLOBAL VARIABLES ==========
    let tripType = 'round';
    let hotelTravelers = { adult: 2, child: 0, room: 1 };
    let flightPassengers = { adult: 1, child: 0, infant: 0 };

    // ========== DATE FORMATTERS ==========
    function formatDate(date) {
        const d = new Date(date);
        const day = String(d.getDate()).padStart(2, '0');
        const month = String(d.getMonth() + 1).padStart(2, '0');
        const year = d.getFullYear();
        return `${day}-${month}-${year}`;
    }

    // ========== DROPDOWN MANAGEMENT ==========
    function closeAllHotelDropdowns() {
        const hotelDestinationDropdown = document.getElementById('hotelDestinationDropdown');
        const hotelTravelerDropdown = document.getElementById('hotelTravelerDropdown');
        const hotelCountryDropdown = document.getElementById('hotelCountryDropdown');
        const dropdownOverlay = document.getElementById('dropdownOverlay');

        if (hotelDestinationDropdown) hotelDestinationDropdown.classList.remove('active');
        if (hotelTravelerDropdown) hotelTravelerDropdown.classList.remove('active');
        if (hotelCountryDropdown) hotelCountryDropdown.classList.remove('active');
        if (dropdownOverlay) dropdownOverlay.classList.remove('active');
    }

    function closeAllFlightDropdowns() {
        const flightFromDropdown = document.getElementById('flightFromDropdown');
        const flightToDropdown = document.getElementById('flightToDropdown');
        const flightPassengerDropdown = document.getElementById('flightPassengerDropdown');
        const flightClassDropdown = document.getElementById('flightClassDropdown');
        const flightDropdownOverlay = document.getElementById('flightDropdownOverlay');

        if (flightFromDropdown) flightFromDropdown.classList.remove('active');
        if (flightToDropdown) flightToDropdown.classList.remove('active');
        if (flightPassengerDropdown) flightPassengerDropdown.classList.remove('active');
        if (flightClassDropdown) flightClassDropdown.classList.remove('active');
        if (flightDropdownOverlay) flightDropdownOverlay.classList.remove('active');
    }

    function showOverlay(overlayId) {
        if (window.innerWidth <= 1024) {
            const overlay = document.getElementById(overlayId);
            if (overlay) overlay.classList.add('active');
        }
    }

    // ========== API FUNCTIONS ==========
    async function loadHotelDestinations(searchTerm, listElement) {
        if (searchTerm.length < 3) {
            listElement.innerHTML = '<div class="loading">Type at least 3 characters...</div>';
            return;
        }

        listElement.innerHTML = '<div class="loading">Searching...</div>';

        try {
            const response = await fetch(`${API_BASE_URL}/api/hotel_destinations?search=${searchTerm}`);
            const data = await response.json();

            if (data.success && data.data && data.data.length > 0) {
                listElement.innerHTML = '';
                data.data.forEach(destination => {
                    const destItem = document.createElement('div');
                    destItem.className = 'destination-item';
                    destItem.dataset.name = destination.city;
                    destItem.dataset.country = destination.country;
                    destItem.innerHTML = `
                        <i class="fas fa-map-marker-alt destination-icon"></i>
                        <div class="destination-details">
                            <div class="destination-name">${destination.city}</div>
                            <div class="destination-location">${destination.country}</div>
                        </div>
                    `;
                    listElement.appendChild(destItem);
                });
            } else {
                listElement.innerHTML = '<div class="loading">No destinations found</div>';
            }
        } catch (error) {
            console.error('Error loading destinations:', error);
            listElement.innerHTML = '<div class="loading">Error loading destinations</div>';
        }
    }

    async function loadAirports(searchTerm, listElement) {
        if (searchTerm.length < 2) {
            listElement.innerHTML = '<div class="loading">Type at least 2 characters...</div>';
            return;
        }

        listElement.innerHTML = '<div class="loading">Searching...</div>';

        try {
            const response = await fetch(`${API_BASE_URL}/api/flights_airports?code=${searchTerm}`);
            const data = await response.json();

            if (data.success && data.data && data.data.length > 0) {
                listElement.innerHTML = '';
                data.data.forEach(airport => {
                    const airportItem = document.createElement('div');
                    airportItem.className = 'airport-item';
                    airportItem.dataset.name = airport.city || airport.name;
                    airportItem.dataset.code = airport.code;
                    airportItem.innerHTML = `
                        <i class="fas fa-plane airport-icon"></i>
                        <div class="airport-details">
                            <div class="airport-name">${airport.city || airport.name}</div>
                            <div class="airport-code">${airport.code} - ${airport.name}</div>
                        </div>
                    `;
                    listElement.appendChild(airportItem);
                });
            } else {
                listElement.innerHTML = '<div class="loading">No airports found</div>';
            }
        } catch (error) {
            console.error('Error loading airports:', error);
            listElement.innerHTML = '<div class="loading">Error loading airports</div>';
        }
    }

    async function loadCountries(listElement, searchInput) {
        try {
            const response = await fetch(`${API_BASE_URL}/api/countries`);
            const data = await response.json();

            if (data.success && data.data && data.data.length > 0) {
                listElement.innerHTML = '';
                data.data.forEach(country => {
                    const countryItem = document.createElement('div');
                    countryItem.className = 'country-item';
                    countryItem.dataset.name = country.country;
                    countryItem.dataset.flag = country.flag;
                    countryItem.dataset.code = country.country_code;
                    countryItem.innerHTML = `
                        <span class="country-flag">${country.flag}</span>
                        <span class="country-name">${country.country}</span>
                    `;
                    listElement.appendChild(countryItem);
                });

                searchInput.addEventListener('input', (e) => {
                    const searchText = e.target.value.toLowerCase();
                    listElement.querySelectorAll('.country-item').forEach(item => {
                        const text = item.textContent.toLowerCase();
                        item.style.display = text.includes(searchText) ? 'flex' : 'none';
                    });
                });
            }
        } catch (error) {
            console.error('Error loading countries:', error);
            listElement.innerHTML = '<div class="loading">Error loading countries</div>';
        }
    }

    // ========== TAB SWITCHING ==========
    function initializeTabs() {
        const tabButtons = document.querySelectorAll('.tab-btn');

        tabButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const tabName = button.dataset.tab;

                // Prevent default and stop propagation
                e.preventDefault();
                e.stopPropagation();

                if (!tabName) return;

                console.log('Switching to tab:', tabName);

                // Remove active from all buttons that have data-tab
                tabButtons.forEach(btn => {
                    if (btn.dataset.tab) {
                        btn.classList.remove('active');
                    }
                });

                // Hide all content tabs
                const allTabContents = document.querySelectorAll('.tab-content');
                allTabContents.forEach(content => {
                    content.classList.remove('active');
                });

                // Add active to clicked button
                button.classList.add('active');

                // Show the selected tab content
                const formElement = document.getElementById('form-' + tabName);
                if (formElement) {
                    formElement.classList.add('active');
                    console.log('Tab activated:', tabName);
                } else {
                    console.error('Form element not found for tab:', tabName);
                }
            });
        });
    }

    // ========== HOTEL FORM INITIALIZATION ==========
    function initializeHotelForm() {
        // Hotel Destination
        const hotelDestinationBtn = document.getElementById('hotelDestinationBtn');
        const hotelDestinationDropdown = document.getElementById('hotelDestinationDropdown');
        const hotelDestinationDisplay = document.getElementById('hotelDestinationDisplay');
        const hotelDestinationValue = document.getElementById('hotelDestinationValue');
        const hotelDestinationSearch = document.getElementById('hotelDestinationSearch');
        const hotelDestinationList = document.getElementById('hotelDestinationList');

        if (hotelDestinationBtn) {
            hotelDestinationBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllHotelDropdowns();
                hotelDestinationDropdown.classList.add('active');
                showOverlay('dropdownOverlay');
                hotelDestinationSearch.focus();
            });

            hotelDestinationSearch.addEventListener('input', (e) => {
                loadHotelDestinations(e.target.value, hotelDestinationList);
            });

            hotelDestinationList.addEventListener('click', (e) => {
                const destItem = e.target.closest('.destination-item');
                if (destItem) {
                    e.stopPropagation();
                    const city = destItem.dataset.name;
                    const country = destItem.dataset.country;
                    hotelDestinationDisplay.textContent = `${city}, ${country}`;
                    hotelDestinationValue.value = city;
                    hotelDestinationSearch.value = '';
                    closeAllHotelDropdowns();
                }
            });
        }

        // Hotel Dates
        // Auto dates for Hotel
        const today = new Date();

        // Check-in = 2 days after today
        const checkInDate = new Date();
        checkInDate.setDate(today.getDate() + 2);

        // Check-out = 4 days after today
        const checkOutDate = new Date();
        checkOutDate.setDate(today.getDate() + 4);
        const hotelCheckinDate = document.getElementById('hotelCheckinDate');
        const hotelCheckoutDate = document.getElementById('hotelCheckoutDate');

        if (hotelCheckinDate) {
            const hotelCheckinPicker = flatpickr(hotelCheckinDate, {
                dateFormat: "d-m-Y",
                minDate: "today",
                defaultDate: checkInDate,
                onChange: function(selectedDates) {
                    if (selectedDates.length > 0) {
                        const checkin = new Date(selectedDates[0]);
                        const autoCheckout = new Date(checkin);
                        autoCheckout.setDate(autoCheckout.getDate() + 2);
                        hotelCheckoutPicker.set('minDate', checkin);
                        hotelCheckoutPicker.setDate(autoCheckout, true);
                    }
                }
            });

            const hotelCheckoutPicker = flatpickr(hotelCheckoutDate, {
                dateFormat: "d-m-Y",
                minDate: checkInDate,
                defaultDate: checkOutDate
            });

            window.hotelCheckinPicker = hotelCheckinPicker;
            window.hotelCheckoutPicker = hotelCheckoutPicker;
        }

        // Hotel Travelers
        const hotelTravelerBtn = document.getElementById('hotelTravelerBtn');
        const hotelTravelerDropdown = document.getElementById('hotelTravelerDropdown');
        const hotelTravelerDisplay = document.getElementById('hotelTravelerDisplay');
        const hotelApplyTravelerBtn = document.getElementById('hotelApplyTravelerBtn');

        if (hotelTravelerBtn) {
            hotelTravelerBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllHotelDropdowns();
                hotelTravelerDropdown.classList.add('active');
                showOverlay('dropdownOverlay');
            });

            document.querySelectorAll('#hotelTravelerDropdown .traveler-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const type = btn.dataset.type;
                    const action = btn.dataset.action;

                    if (action === 'plus') {
                        hotelTravelers[type]++;
                    } else if (action === 'minus' && hotelTravelers[type] > 0) {
                        if (type === 'adult' && hotelTravelers[type] === 1) return;
                        if (type === 'room' && hotelTravelers[type] === 1) return;
                        hotelTravelers[type]--;
                    }

                    const countElement = document.getElementById(`hotel${type.charAt(0).toUpperCase() + type.slice(1)}Count`);
                    if (countElement) {
                        countElement.textContent = hotelTravelers[type];
                    }
                });
            });

            hotelApplyTravelerBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const adults = hotelTravelers.adult;
                const children = hotelTravelers.child;
                const rooms = hotelTravelers.room;
                const totalTravelers = adults + children;
                const finalText = `${totalTravelers} Travelers, ${rooms} Room${rooms > 1 ? 's' : ''}`;
                hotelTravelerDisplay.textContent = finalText;
                closeAllHotelDropdowns();
            });
        }

        // Hotel Nationality
        const hotelNationalityBtn = document.getElementById('hotelNationalityBtn');
        const hotelCountryDropdown = document.getElementById('hotelCountryDropdown');
        const hotelNationalityDisplay = document.getElementById('hotelNationalityDisplay');
        const hotelNationalityValue = document.getElementById('hotelNationalityValue');
        const hotelCountrySearch = document.getElementById('hotelCountrySearch');
        const hotelCountryList = document.getElementById('hotelCountryList');

        if (hotelNationalityBtn) {
            hotelNationalityBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllHotelDropdowns();
                hotelCountryDropdown.classList.add('active');
                showOverlay('dropdownOverlay');

                if (!hotelCountryList.querySelector('.country-item')) {
                    hotelCountryList.innerHTML = '<div class="loading">Loading countries...</div>';
                    loadCountries(hotelCountryList, hotelCountrySearch);
                }

                hotelCountrySearch.focus();
            });

            hotelCountryList.addEventListener('click', (e) => {
                const countryItem = e.target.closest('.country-item');
                if (countryItem) {
                    e.stopPropagation();
                    hotelNationalityDisplay.textContent = `${countryItem.dataset.flag} ${countryItem.dataset.name}`;
                    hotelNationalityValue.value = countryItem.dataset.code;
                    hotelCountrySearch.value = '';
                    hotelCountryList.querySelectorAll('.country-item').forEach(i => i.style.display = 'flex');
                    closeAllHotelDropdowns();
                }
            });
        }

        // Hotel Form Submission
        const hotelSearchForm = document.getElementById('hotelSearchForm');
        if (hotelSearchForm) {
            hotelSearchForm.addEventListener('submit', submitHotelForm);
        }
    }

    function submitHotelForm(e) {
        e.preventDefault();

        const hotelDestinationValue = document.getElementById('hotelDestinationValue');
        const hotelCheckinDate = document.getElementById('hotelCheckinDate');
        const hotelCheckoutDate = document.getElementById('hotelCheckoutDate');
        const hotelNationalityValue = document.getElementById('hotelNationalityValue');

        const country = hotelDestinationValue.value.toLowerCase().replace(/\s+/g, '-');
        let checkinDate = window.hotelCheckinPicker && window.hotelCheckinPicker.selectedDates.length > 0 
            ? formatDate(window.hotelCheckinPicker.selectedDates[0]) 
            : hotelCheckinDate.value;
        let checkoutDate = window.hotelCheckoutPicker && window.hotelCheckoutPicker.selectedDates.length > 0 
            ? formatDate(window.hotelCheckoutPicker.selectedDates[0]) 
            : hotelCheckoutDate.value;

        const adult = hotelTravelers.adult;
        const child = hotelTravelers.child;
        const room = hotelTravelers.room;
        const nationality = hotelNationalityValue.value;

        const url = `${API_BASE_URL}/hotels/${country}/${checkinDate}/${checkoutDate}/${adult}/${child}/${room}/${nationality}`;
        window.location.href = url;
        return false;
    }

    // ========== FLIGHT FORM INITIALIZATION ==========
    function initializeFlightForm() {
        // Trip Type Toggle
        const roundTripBtn = document.getElementById('roundTripBtn');
        const oneWayBtn = document.getElementById('oneWayBtn');
        const returnDateField = document.getElementById('returnDateField');

        if (roundTripBtn) {
            roundTripBtn.addEventListener('click', () => {
                tripType = 'round';
                roundTripBtn.classList.add('active');
                oneWayBtn.classList.remove('active');
                if (returnDateField) returnDateField.style.display = 'block';
            });

            oneWayBtn.addEventListener('click', () => {
                tripType = 'oneway';
                oneWayBtn.classList.add('active');
                roundTripBtn.classList.remove('active');
                if (returnDateField) returnDateField.style.display = 'none';
            });
        }

        // Flight From
        const flightFromBtn = document.getElementById('flightFromBtn');
        const flightFromDropdown = document.getElementById('flightFromDropdown');
        const flightFromDisplay = document.getElementById('flightFromDisplay');
        const flightFromValue = document.getElementById('flightFromValue');
        const flightFromSearch = document.getElementById('flightFromSearch');
        const flightFromList = document.getElementById('flightFromList');

        if (flightFromBtn) {
            flightFromBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllFlightDropdowns();
                flightFromDropdown.classList.add('active');
                showOverlay('flightDropdownOverlay');
                flightFromSearch.focus();
            });

            flightFromSearch.addEventListener('input', (e) => {
                loadAirports(e.target.value, flightFromList);
            });

            flightFromList.addEventListener('click', (e) => {
                const airportItem = e.target.closest('.airport-item');
                if (airportItem) {
                    e.stopPropagation();
                    flightFromDisplay.textContent = `${airportItem.dataset.name} (${airportItem.dataset.code})`;
                    flightFromValue.value = airportItem.dataset.code;
                    flightFromSearch.value = '';
                    closeAllFlightDropdowns();
                }
            });
        }

        // Flight To
        const flightToBtn = document.getElementById('flightToBtn');
        const flightToDropdown = document.getElementById('flightToDropdown');
        const flightToDisplay = document.getElementById('flightToDisplay');
        const flightToValue = document.getElementById('flightToValue');
        const flightToSearch = document.getElementById('flightToSearch');
        const flightToList = document.getElementById('flightToList');

        if (flightToBtn) {
            flightToBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllFlightDropdowns();
                flightToDropdown.classList.add('active');
                showOverlay('flightDropdownOverlay');
                flightToSearch.focus();
            });

            flightToSearch.addEventListener('input', (e) => {
                loadAirports(e.target.value, flightToList);
            });

            flightToList.addEventListener('click', (e) => {
                const airportItem = e.target.closest('.airport-item');
                if (airportItem) {
                    e.stopPropagation();
                    flightToDisplay.textContent = `${airportItem.dataset.name} (${airportItem.dataset.code})`;
                    flightToValue.value = airportItem.dataset.code;
                    flightToSearch.value = '';
                    closeAllFlightDropdowns();
                }
            });
        }

        // Flight Dates
        // Auto dates for Flight
        const flightToday = new Date();

        // Departure = +2 days
        const departureDateAuto = new Date();
        departureDateAuto.setDate(flightToday.getDate() + 2);

        // Return = +4 days
        const returnDateAuto = new Date();
        returnDateAuto.setDate(flightToday.getDate() + 4);

        const flightDepartureDate = document.getElementById('flightDepartureDate');
        const flightReturnDate = document.getElementById('flightReturnDate');

        if (flightDepartureDate) {

        const flightDeparturePicker = flatpickr(flightDepartureDate, {
            dateFormat: "d-m-Y",
            minDate: "today",
            defaultDate: departureDateAuto,
            onChange: function(selectedDates) {
                if (selectedDates.length > 0) {
                    const depart = new Date(selectedDates[0]);
                    const autoReturn = new Date(depart);
                    autoReturn.setDate(autoReturn.getDate() + 2);
                    flightReturnPicker.set('minDate', depart);
                    flightReturnPicker.setDate(autoReturn, true);
                }
            }
        });

        const flightReturnPicker = flatpickr(flightReturnDate, {
            dateFormat: "d-m-Y",
            minDate: departureDateAuto,
            defaultDate: returnDateAuto
        });

            window.flightDeparturePicker = flightDeparturePicker;
            window.flightReturnPicker = flightReturnPicker;
        }

        // Flight Passengers
        const flightPassengerBtn = document.getElementById('flightPassengerBtn');
        const flightPassengerDropdown = document.getElementById('flightPassengerDropdown');
        const flightPassengerDisplay = document.getElementById('flightPassengerDisplay');
        const flightApplyPassengerBtn = document.getElementById('flightApplyPassengerBtn');

        if (flightPassengerBtn) {
            flightPassengerBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllFlightDropdowns();
                flightPassengerDropdown.classList.add('active');
                showOverlay('flightDropdownOverlay');
            });

            document.querySelectorAll('#flightPassengerDropdown .passenger-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const type = btn.dataset.type;
                    const action = btn.dataset.action;

                    if (action === 'plus') {
                        flightPassengers[type]++;
                    } else if (action === 'minus' && flightPassengers[type] > 0) {
                        if (type === 'adult' && flightPassengers[type] === 1) return;
                        flightPassengers[type]--;
                    }

                    const countElement = document.getElementById(`flight${type.charAt(0).toUpperCase() + type.slice(1)}Count`);
                    if (countElement) {
                        countElement.textContent = flightPassengers[type];
                    }
                });
            });

            flightApplyPassengerBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const total = flightPassengers.adult + flightPassengers.child + flightPassengers.infant;
                const text = total === 1 ? '1 Passenger' : `${total} Passengers`;
                flightPassengerDisplay.textContent = text;
                closeAllFlightDropdowns();
            });
        }

        // Flight Class
        const flightClassBtn = document.getElementById('flightClassBtn');
        const flightClassDropdown = document.getElementById('flightClassDropdown');
        const flightClassDisplay = document.getElementById('flightClassDisplay');
        const flightClassValue = document.getElementById('flightClassValue');
        const flightClassList = document.getElementById('flightClassList');

        if (flightClassBtn) {
            flightClassBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                closeAllFlightDropdowns();
                flightClassDropdown.classList.add('active');
                showOverlay('flightDropdownOverlay');
            });

            flightClassList.querySelectorAll('.class-item').forEach(item => {
                item.addEventListener('click', (e) => {
                    e.stopPropagation();
                    flightClassDisplay.textContent = item.querySelector('.class-name').textContent;
                    flightClassValue.value = item.dataset.class;
                    closeAllFlightDropdowns();
                });
            });
        }

        // Flight Form Submission
        const flightSearchForm = document.getElementById('flightSearchForm');
        if (flightSearchForm) {
            flightSearchForm.addEventListener('submit', submitFlightForm);
        }
    }

    function submitFlightForm(e) {
        e.preventDefault();

        const flightFromValue = document.getElementById('flightFromValue');
        const flightToValue = document.getElementById('flightToValue');
        const flightDepartureDate = document.getElementById('flightDepartureDate');
        const flightReturnDate = document.getElementById('flightReturnDate');
        const flightClassValue = document.getElementById('flightClassValue');

        const origin = flightFromValue.value.toLowerCase();
        const destination = flightToValue.value.toLowerCase();
        const selectedTripType = tripType === 'oneway' ? 'oneway' : 'round';
        const flightClass = flightClassValue.value;

        let departureDate = window.flightDeparturePicker && window.flightDeparturePicker.selectedDates.length > 0 
            ? formatDate(window.flightDeparturePicker.selectedDates[0]) 
            : flightDepartureDate.value;
        let returnDate = null;

        if (selectedTripType === 'round') {
            returnDate = window.flightReturnPicker && window.flightReturnPicker.selectedDates.length > 0 
                ? formatDate(window.flightReturnPicker.selectedDates[0]) 
                : flightReturnDate.value;
        }

        const adult = flightPassengers.adult;
        const child = flightPassengers.child || 0;
        const infant = flightPassengers.infant || 0;

        let url = `${API_BASE_URL}/flights/${origin}/${destination}/${selectedTripType}/${flightClass}/${departureDate}`;

        if (returnDate) {
            url += `/${returnDate}`;
        }

        url += `/${adult}/${child}/${infant}`;

        window.location.href = url;
        return false;
    }

    // ========== GLOBAL CLICK HANDLERS ==========
    document.addEventListener('click', (e) => {
        const clickedInsideDropdown = e.target.closest('.destination-dropdown, .traveler-dropdown, .country-dropdown, .airport-dropdown, .passenger-dropdown, .class-dropdown');
        const clickedButton = e.target.closest('[id*="Btn"]');

        if (!clickedInsideDropdown && !clickedButton) {
            closeAllHotelDropdowns();
            closeAllFlightDropdowns();
        }
    });

    // Overlay click handlers
    const dropdownOverlay = document.getElementById('dropdownOverlay');
    const flightDropdownOverlay = document.getElementById('flightDropdownOverlay');

    if (dropdownOverlay) {
        dropdownOverlay.addEventListener('click', closeAllHotelDropdowns);
    }

    if (flightDropdownOverlay) {
        flightDropdownOverlay.addEventListener('click', closeAllFlightDropdowns);
    }

    // ========== INITIALIZE ON DOM READY ==========
    document.addEventListener('DOMContentLoaded', function() {
        initializeTabs();
        initializeHotelForm();
        initializeFlightForm();
    });

</script>


</body>
</html>

