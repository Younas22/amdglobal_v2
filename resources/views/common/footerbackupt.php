



    <!-- FOOTER SECTION -->
<footer style="background-color: #003580; color: #E5E7EB; padding: 60px 20px 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">

        <!-- Footer Top -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-bottom: 50px;">

            <!-- Column 1: Brand -->
            <div>
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px;">
                    <i class="fas fa-plane" style="font-size: 24px; color: #FF6B35;"></i>
                    <h3 style="font-size: 24px; font-weight: bold; color: white; margin: 0;">Travel</h3>
                </div>
                <p style="font-size: 14px; color: #BED3F3; margin-bottom: 16px; line-height: 1.6;">Your trusted partner for discovering and booking the perfect hotels worldwide.</p>
                <div style="display: flex; gap: 12px;">
                    <a href="#" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.1); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0077BE'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.1)'">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.1); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0077BE'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.1)'">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.1); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0077BE'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.1)'">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" style="width: 36px; height: 36px; background-color: rgba(255, 255, 255, 0.1); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0077BE'" onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.1)'">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div>
                <h4 style="font-size: 16px; font-weight: bold; color: white; margin-bottom: 20px; margin-top: 0;">Quick Links</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach (get_menu_items('footer_quick_links') as $item)
                    <li style="margin-bottom: 12px;"><a href="{{ $item->full_url }}" style="color: #BED3F3; text-decoration: none; font-size: 14px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 3: Services -->
            <div>
                <h4 style="font-size: 16px; font-weight: bold; color: white; margin-bottom: 20px; margin-top: 0;">Services</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach (get_menu_items('footer_services') as $item)
                    <li style="margin-bottom: 12px;"><a href="{{ $item->full_url }}" style="color: #BED3F3; text-decoration: none; font-size: 14px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Column 4: Support -->
            <div>
                <h4 style="font-size: 16px; font-weight: bold; color: white; margin-bottom: 20px; margin-top: 0;">Support</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach (get_menu_items('footer_support') as $item)
                    <li style="margin-bottom: 12px;"><a href="{{ $item->full_url }}" style="color: #BED3F3; text-decoration: none; font-size: 14px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- Newsletter Subscribe -->
        <div style="background-color: rgba(0, 119, 190, 0.1); border: 1px solid rgba(0, 119, 190, 0.3); border-radius: 12px; padding: 30px; margin-bottom: 40px;">
            <h4 style="font-size: 18px; font-weight: bold; color: white; margin-bottom: 10px; margin-top: 0;">Subscribe to Our Newsletter</h4>
            <p style="font-size: 14px; color: #BED3F3; margin-bottom: 20px; margin-top: 0;">Get exclusive deals and travel tips delivered to your inbox</p>
            <div style="display: flex; gap: 10px;">
                <input type="email" placeholder="Enter your email" style="flex: 1; padding: 12px 16px; border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 6px; background-color: rgba(255, 255, 255, 0.05); color: white; font-size: 14px;" onfocus="this.style.borderColor='#0077BE'; this.style.backgroundColor='rgba(0, 119, 190, 0.1)'" onblur="this.style.borderColor='rgba(255, 255, 255, 0.2)'; this.style.backgroundColor='rgba(255, 255, 255, 0.05)'">
                <button style="background-color: #0077BE; color: white; border: none; padding: 12px 28px; border-radius: 6px; font-weight: bold; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0066A1'; this.style.transform='translateY(-2px)'" onmouseout="this.style.backgroundColor='#0077BE'; this.style.transform='translateY(0)'">Subscribe</button>
            </div>
        </div>

        <!-- Divider -->
        <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); margin-bottom: 30px;"></div>

        <!-- Footer Bottom -->
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            <p style="color: #BED3F3; font-size: 13px; margin: 0;">© 2025 Travel Solution. All rights reserved.</p>
            <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                <a href="#" style="color: #BED3F3; text-decoration: none; font-size: 13px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">Privacy Policy</a>
                <a href="#" style="color: #BED3F3; text-decoration: none; font-size: 13px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">Terms of Service</a>
                <a href="#" style="color: #BED3F3; text-decoration: none; font-size: 13px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">Cookie Policy</a>
                <a href="#" style="color: #BED3F3; text-decoration: none; font-size: 13px; transition: all 0.3s ease;" onmouseover="this.style.color='#0077BE'" onmouseout="this.style.color='#BED3F3'">Sitemap</a>
            </div>
        </div>

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



<!-- hotel list -->

<!-- <script>
    // Search Collapse Toggle
    const searchCollapseBtn = document.getElementById('searchCollapseBtn');
    const searchCollapseContent = document.getElementById('searchCollapseContent');
    const collapseIcon = document.getElementById('collapseIcon');

    searchCollapseBtn.addEventListener('click', function() {
        searchCollapseBtn.classList.toggle('active');
        searchCollapseContent.classList.toggle('active');
        collapseIcon.style.transform = searchCollapseContent.classList.contains('active') 
            ? 'rotate(180deg)' 
            : 'rotate(0deg)';
    });


    // Price Slider
    const priceSlider = document.getElementById('priceSlider');
    const priceValue = document.getElementById('priceValue');

    priceSlider.addEventListener('input', function() {
        const price = parseInt(this.value);
        priceValue.textContent = price.toLocaleString('en-PK') + ' PKR';
    });

    // Filter functionality
    document.querySelectorAll('.hotel-filter-option input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            console.log(this.id + ' changed');
            // Filter logic will go here
        });
    });


</script> -->

<!-- hotel details -->


<!-- hotel booking -->
 <!-- <script>
    // Card number formatting
    const cardInput = document.querySelector('.card-number-input');
    cardInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s/g, '');
        let formattedValue = value.replace(/(\d{4})/g, '$1 ').trim();
        e.target.value = formattedValue;
    });

    // Expiry date formatting
    const expiryInput = document.querySelectorAll('.form-input')[document.querySelectorAll('.form-input').length - 2];
    expiryInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        e.target.value = value;
    });

    // Form submission
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Booking confirmed! Your confirmation details will be sent to your email.');
        // Redirect to confirmation page
    });

    // Back button
    document.querySelector('.btn-back').addEventListener('click', function() {
        window.history.back();
    });
</script> -->



<script>
    function showForm(form) {
        // Hide all
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(el => {
            el.classList.remove('bg-blue-600', 'text-white', 'hover:bg-blue-700');
            el.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
        });

        // Show selected form
        document.getElementById(`${form}-form`).classList.remove('hidden');

        // Highlight active button
        const btn = document.getElementById(`btn-${form}`);
        btn.classList.add('bg-blue-600', 'text-white', 'hover:bg-blue-700');
        btn.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
    }
</script>



<!-- hotel and flight form -->

<script>
        // API Base URL - Update this to your Laravel API URL
        const fullPath = window.location.pathname.split('/');
        const baseFolder = fullPath[1]; // get the first folder
        let site;
        const API_BASE_URL = window.location.origin + "/" + baseFolder;

        // Tab Switching
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const tabName = button.dataset.tab;

                if (!tabName) return; // Skip if it's the visa link

                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to clicked button and corresponding content
                button.classList.add('active');
                document.getElementById(tabName + 'Form').classList.add('active');
            });
        });

        // Overlay functions
        const dropdownOverlay = document.getElementById('dropdownOverlay');

        function showOverlay() {
            if (window.innerWidth <= 1024) {
                dropdownOverlay.classList.add('active');
            }
        }

        function hideOverlay() {
            dropdownOverlay.classList.remove('active');
        }

        // Close all dropdowns
        function closeAllDropdowns() {
            document.querySelectorAll('.destination-dropdown, .airport-dropdown, .traveler-dropdown, .passenger-dropdown, .country-dropdown, .class-dropdown').forEach(dropdown => {
                dropdown.classList.remove('active');
            });
            hideOverlay();
        }

        // Function to load airports from API
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

        // Function to load hotel destinations from API
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

        // Function to load all countries from API
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

                    // Add search functionality
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

        // Format date to DD-MM-YYYY
        function formatDate(date) {
            const d = new Date(date);
            const day = String(d.getDate()).padStart(2, '0');
            const month = String(d.getMonth() + 1).padStart(2, '0');
            const year = d.getFullYear();
            return `${day}-${month}-${year}`;
        }

        // Hotel Form Submission
        function submitHotelForm(e) {
            e.preventDefault();

            const country = document.getElementById('hotelDestinationValue').value.toLowerCase().replace(/\s+/g, '-');

            // Auto fallback for Check-in (today + 2 days)
            let checkinDate;
            if (hotelCheckinPicker.selectedDates.length === 0) {
                const autoIn = new Date();
                autoIn.setDate(autoIn.getDate() + 2);
                checkinDate = formatDate(autoIn);
            } else {
                checkinDate = formatDate(hotelCheckinPicker.selectedDates[0]);
            }

            // Auto fallback for Check-out (today + 4 days)
            let checkoutDate;
            if (hotelCheckoutPicker.selectedDates.length === 0) {
                const autoOut = new Date();
                autoOut.setDate(autoOut.getDate() + 4);
                checkoutDate = formatDate(autoOut);
            } else {
                checkoutDate = formatDate(hotelCheckoutPicker.selectedDates[0]);
            }

            const adult = hotelTravelers.adult;
            const child = hotelTravelers.child;
            const room = hotelTravelers.room;
            const nationality = document.getElementById('hotelNationalityValue').value;

            //  SEO-friendly URL
            const url = `${API_BASE_URL}/hotels/${country}/${checkinDate}/${checkoutDate}/${adult}/${child}/${room}/${nationality}`;

            console.log('Hotel Search URL:', url);
            window.location.href = url;

            return false;
        }


        // Trip Type Toggle
        const roundTripBtn = document.getElementById('roundTripBtn');
        const oneWayBtn = document.getElementById('oneWayBtn');
        const returnDateField = document.getElementById('returnDateField');

        let tripType = 'round';

        roundTripBtn.addEventListener('click', () => {
            tripType = 'round';
            roundTripBtn.classList.add('active');
            oneWayBtn.classList.remove('active');
            returnDateField.style.display = 'block';
        });

        oneWayBtn.addEventListener('click', () => {
            tripType = 'oneway';
            oneWayBtn.classList.add('active');
            roundTripBtn.classList.remove('active');
            returnDateField.style.display = 'none';
        });

        // Flight Form Submission

        function submitFlightForm(e) {
            e.preventDefault();

            const origin = document.getElementById('flightFromValue').value.toLowerCase();
            const destination = document.getElementById('flightToValue').value.toLowerCase();
            const selectedTripType = tripType === 'oneway' ? 'oneway' : 'round';

            const flightClass = document.getElementById('flightClassValue').value;

            //  Fallback: If no date selected → use today + 2 days
            let departureDate;
            if (flightDeparturePicker.selectedDates.length === 0) {
                const autoDate = new Date();
                autoDate.setDate(autoDate.getDate() + 2);
                departureDate = formatDate(autoDate);
            } else {
                departureDate = formatDate(flightDeparturePicker.selectedDates[0]);
            }

            let returnDate = null;

            //  Round trip fallback: today + 4 days
            if (selectedTripType === 'round') {
                if (flightReturnPicker.selectedDates.length === 0) {
                    const autoReturn = new Date();
                    autoReturn.setDate(autoReturn.getDate() + 4);
                    returnDate = formatDate(autoReturn);
                } else {
                    returnDate = formatDate(flightReturnPicker.selectedDates[0]);
                }
            }

            const adult = flightPassengers.adult;
            const child = flightPassengers.child || 0;
            const infant = flightPassengers.infant || 0;

            // Build URL
            let url = `${API_BASE_URL}/flights/${origin}/${destination}/${selectedTripType}/${flightClass}/${departureDate}`;

            if (returnDate) {
                url += `/${returnDate}`;
            }

            url += `/${adult}/${child}/${infant}`;

            console.log("Flight Search URL:", url);
            window.location.href = url;

            return false;
        }


        // ========== HOTEL FORM FUNCTIONALITY ==========

        // Hotel Destination
        const hotelDestinationBtn = document.getElementById('hotelDestinationBtn');
        const hotelDestinationDropdown = document.getElementById('hotelDestinationDropdown');
        const hotelDestinationDisplay = document.getElementById('hotelDestinationDisplay');
        const hotelDestinationValue = document.getElementById('hotelDestinationValue');
        const hotelDestinationSearch = document.getElementById('hotelDestinationSearch');
        const hotelDestinationList = document.getElementById('hotelDestinationList');

        hotelDestinationBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            hotelDestinationDropdown.classList.add('active');
            showOverlay();
            hotelDestinationSearch.focus();
        });

        hotelDestinationDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        hotelDestinationSearch.addEventListener('input', (e) => {
            loadHotelDestinations(e.target.value, hotelDestinationList);
        });

        // Delegate click event for dynamically loaded destinations
        hotelDestinationList.addEventListener('click', (e) => {
            const destItem = e.target.closest('.destination-item');
            if (destItem) {
                e.stopPropagation();
                const city = destItem.dataset.name;
                const country = destItem.dataset.country;
                hotelDestinationDisplay.textContent = `${city}, ${country}`;
                hotelDestinationValue.value = city;
                hotelDestinationSearch.value = '';
                closeAllDropdowns();
            }
        });

        // Hotel Dates
        const hotelCheckinPicker = flatpickr("#hotelCheckinDate", {
            dateFormat: "d-m-Y",
            minDate: "today",
            defaultDate: "2025-10-22",
            onChange: function(selectedDates) {
                if (selectedDates.length > 0) {
                    const checkin = new Date(selectedDates[0]);

                    //  Auto checkout = checkin + 2 days
                    const autoCheckout = new Date(checkin);
                    autoCheckout.setDate(autoCheckout.getDate() + 2);

                    hotelCheckoutPicker.set('minDate', checkin);
                    hotelCheckoutPicker.setDate(autoCheckout, true);
                }
            }
        });

        const hotelCheckoutPicker = flatpickr("#hotelCheckoutDate", {
            dateFormat: "d-m-Y",
            minDate: "today",
            defaultDate: "2025-10-25"
        });


        // Hotel Travelers
        const hotelTravelerBtn = document.getElementById('hotelTravelerBtn');
        const hotelTravelerDropdown = document.getElementById('hotelTravelerDropdown');
        const hotelTravelerDisplay = document.getElementById('hotelTravelerDisplay');
        const hotelApplyTravelerBtn = document.getElementById('hotelApplyTravelerBtn');

        let hotelTravelers = { adult: 2, child: 0, room: 1 };

        hotelTravelerBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            hotelTravelerDropdown.classList.add('active');
            showOverlay();
        });

        hotelTravelerDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
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

                document.getElementById(`hotel${type.charAt(0).toUpperCase() + type.slice(1)}Count`).textContent = hotelTravelers[type];
            });
        });

                hotelApplyTravelerBtn.addEventListener('click', (e) => {
                    e.stopPropagation();

                    const adults = hotelTravelers.adult;
                    const children = hotelTravelers.child;
                    const rooms = hotelTravelers.room;

                    // Total travelers count
                    const totalTravelers = adults + children;

                    // Short final text (as you required)
                    const finalText = `${totalTravelers} Travelers, ${rooms} Room`;

                    // Check whether element is input or div/span
                    if ('value' in hotelTravelerDisplay) {
                        hotelTravelerDisplay.value = finalText;   // ✅ INPUT ke liye
                    } else {
                        hotelTravelerDisplay.textContent = finalText; // ✅ DIV/SPAN ke liye
                    }

                    closeAllDropdowns();
                });

        // Hotel Nationality
        const hotelNationalityBtn = document.getElementById('hotelNationalityBtn');
        const hotelCountryDropdown = document.getElementById('hotelCountryDropdown');
        const hotelNationalityDisplay = document.getElementById('hotelNationalityDisplay');
        const hotelNationalityValue = document.getElementById('hotelNationalityValue');
        const hotelCountrySearch = document.getElementById('hotelCountrySearch');
        const hotelCountryList = document.getElementById('hotelCountryList');

        // Load countries when nationality button is clicked
        hotelNationalityBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            hotelCountryDropdown.classList.add('active');
            showOverlay();

            // Load countries if not already loaded
            if (!hotelCountryList.querySelector('.country-item')) {
                hotelCountryList.innerHTML = '<div class="loading">Loading countries...</div>';
                loadCountries(hotelCountryList, hotelCountrySearch);
            }

            hotelCountrySearch.focus();
        });

        hotelCountryDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // Delegate click event for dynamically loaded countries
        hotelCountryList.addEventListener('click', (e) => {
            const countryItem = e.target.closest('.country-item');
            if (countryItem) {
                e.stopPropagation();
                hotelNationalityDisplay.textContent = `${countryItem.dataset.flag} ${countryItem.dataset.name}`;
                hotelNationalityValue.value = countryItem.dataset.code;
                hotelCountrySearch.value = '';
                hotelCountryList.querySelectorAll('.country-item').forEach(i => i.style.display = 'flex');
                closeAllDropdowns();
            }
        });

        // ========== FLIGHT FORM FUNCTIONALITY ==========

        // Flight From
        const flightFromBtn = document.getElementById('flightFromBtn');
        const flightFromDropdown = document.getElementById('flightFromDropdown');
        const flightFromDisplay = document.getElementById('flightFromDisplay');
        const flightFromValue = document.getElementById('flightFromValue');
        const flightFromSearch = document.getElementById('flightFromSearch');
        const flightFromList = document.getElementById('flightFromList');

        flightFromBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            flightFromDropdown.classList.add('active');
            showOverlay();
            flightFromSearch.focus();
        });

        flightFromDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        flightFromSearch.addEventListener('input', (e) => {
            loadAirports(e.target.value, flightFromList);
        });

        // Delegate click event for dynamically loaded airports
        flightFromList.addEventListener('click', (e) => {
            const airportItem = e.target.closest('.airport-item');
            if (airportItem) {
                e.stopPropagation();
                flightFromDisplay.textContent = `${airportItem.dataset.name} (${airportItem.dataset.code})`;
                flightFromValue.value = airportItem.dataset.code;
                flightFromSearch.value = '';
                closeAllDropdowns();
            }
        });

        // Flight To
        const flightToBtn = document.getElementById('flightToBtn');
        const flightToDropdown = document.getElementById('flightToDropdown');
        const flightToDisplay = document.getElementById('flightToDisplay');
        const flightToValue = document.getElementById('flightToValue');
        const flightToSearch = document.getElementById('flightToSearch');
        const flightToList = document.getElementById('flightToList');

        flightToBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            flightToDropdown.classList.add('active');
            showOverlay();
            flightToSearch.focus();
        });

        flightToDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        flightToSearch.addEventListener('input', (e) => {
            loadAirports(e.target.value, flightToList);
        });

        // Delegate click event for dynamically loaded airports
        flightToList.addEventListener('click', (e) => {
            const airportItem = e.target.closest('.airport-item');
            if (airportItem) {
                e.stopPropagation();
                flightToDisplay.textContent = `${airportItem.dataset.name} (${airportItem.dataset.code})`;
                flightToValue.value = airportItem.dataset.code;
                flightToSearch.value = '';
                closeAllDropdowns();
            }
        });

        // Flight Dates
        const flightDeparturePicker = flatpickr("#flightDepartureDate", {
            dateFormat: "d-m-Y",
            minDate: "today",
            defaultDate: "2025-10-22",
            onChange: function(selectedDates) {
                if (selectedDates.length > 0) {
                    const depart = new Date(selectedDates[0]);

                    // Auto return = departure + 2 days
                    const autoReturn = new Date(depart);
                    autoReturn.setDate(autoReturn.getDate() + 2);

                    flightReturnPicker.set('minDate', depart);
                    flightReturnPicker.setDate(autoReturn, true);
                }
            }
        });

        const flightReturnPicker = flatpickr("#flightReturnDate", {
            dateFormat: "d-m-Y",
            minDate: "today",
            defaultDate: "2025-10-25"
        });


        // Flight Passengers
        const flightPassengerBtn = document.getElementById('flightPassengerBtn');
        const flightPassengerDropdown = document.getElementById('flightPassengerDropdown');
        const flightPassengerDisplay = document.getElementById('flightPassengerDisplay');
        const flightApplyPassengerBtn = document.getElementById('flightApplyPassengerBtn');

        let flightPassengers = { adult: 1, child: 0, infant: 0 };

        flightPassengerBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            flightPassengerDropdown.classList.add('active');
            showOverlay();
        });

        flightPassengerDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
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

                document.getElementById(`flight${type.charAt(0).toUpperCase() + type.slice(1)}Count`).textContent = flightPassengers[type];
            });
        });

        flightApplyPassengerBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const total = flightPassengers.adult + flightPassengers.child + flightPassengers.infant;
            const text = total === 1 ? '1 Passenger' : `${total} Passengers`;
            flightPassengerDisplay.textContent = text;
            closeAllDropdowns();
        });

        // Flight Class
        const flightClassBtn = document.getElementById('flightClassBtn');
        const flightClassDropdown = document.getElementById('flightClassDropdown');
        const flightClassDisplay = document.getElementById('flightClassDisplay');
        const flightClassValue = document.getElementById('flightClassValue');
        const flightClassList = document.getElementById('flightClassList');

        flightClassBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllDropdowns();
            flightClassDropdown.classList.add('active');
            showOverlay();
        });

        flightClassDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        flightClassList.querySelectorAll('.class-item').forEach(item => {
            item.addEventListener('click', (e) => {
                e.stopPropagation();
                flightClassDisplay.textContent = item.querySelector('.class-name').textContent;
                flightClassValue.value = item.dataset.class;
                closeAllDropdowns();
            });
        });

        // Global click handlers
        document.addEventListener('click', (e) => {
            const clickedInsideDropdown = e.target.closest('.destination-dropdown, .airport-dropdown, .traveler-dropdown, .passenger-dropdown, .country-dropdown, .class-dropdown');
            const clickedButton = e.target.closest('[id$="Btn"]');

            if (!clickedInsideDropdown && !clickedButton) {
                closeAllDropdowns();
            }
        });

        dropdownOverlay.addEventListener('click', (e) => {
            if (e.target === dropdownOverlay) {
                closeAllDropdowns();
            }
        });
</script>

</body>
</html>
