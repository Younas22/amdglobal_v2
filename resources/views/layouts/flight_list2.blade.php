@extends('common.layout')
@section('content')
    <style>
        body {
            background-color: #fafafa !important;
        }
        
        /* pagination code */
        .pagination {
            margin-top: 50px;
            margin-bottom: 30px;
        }
        nav.flex.items-center.justify-between {
            width: 100%;
        }
        svg.w-5.h-5 {
            width: 35px;
            color: #0d6efd;
        }
        .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
            text-align: center;
        }
        .flex.justify-between.flex-1.sm\:hidden {
            text-align: center;
            margin-bottom: 20px;
        }
        a.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\:text-gray-500.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150.dark\:bg-gray-800.dark\:border-gray-600.dark\:text-gray-300.dark\:focus\:border-blue-700.dark\:active\:bg-gray-700.dark\:active\:text-gray-300 {
            color: white;
            background: #0d6efd !important;
            text-decoration: none;
            border-radius: 8px;
            margin: 5px;
        }
        span.relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md.dark\:text-gray-600.dark\:bg-gray-800.dark\:border-gray-600 {
            color: white;
            background: #0d6efd !important;
            text-decoration: none;
            border-radius: 8px;
        }
        a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\:text-gray-500.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150.dark\:bg-gray-800.dark\:border-gray-600.dark\:text-gray-400.dark\:hover\:text-gray-300.dark\:active\:bg-gray-700.dark\:focus\:border-blue-800 {
            text-decoration: none;
        }

        .animated-toggle-btn {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            padding: 12px 28px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 8px 15px rgba(13, 110, 253, 0.3);
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .animated-toggle-btn:hover {
            box-shadow: 0 12px 24px rgba(102, 16, 242, 0.4);
            transform: translateY(-2px);
            background: linear-gradient(135deg, #6610f2, #0d6efd);
        }

        .list-hero-section {
            animation: fadeIn 0.4s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* stop tooltipe hover */
        .custom-tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .custom-tooltip .tooltip-content {
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s;
            background: #0d6efd;
            color: #fff;
            padding: 8px 20px;
            border-radius: 8px;
            position: absolute;
            top: 105%;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 999;
        }

        .custom-tooltip:hover .tooltip-content {
            visibility: visible;
            opacity: 1;
        }
        
        /* modify search container */
        .modify-search-main-container{
            background: white;
            border: 1px solid #e0e0e0;
            padding: 20px 0px;
        }
        .flight-location-L span{
            font-size: 17px;
            font-weight: 600;
        }
        .flight-date-L span{
            font-size: 14px;
            font-weight: 500;
            color: gray;
        }

        /* Date Slider Styles */
        .date-slider-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .date-slider {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 10px 0;
            scroll-behavior: smooth;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE and Edge */
        }

        .date-slider::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .date-card {
            min-width: 150px;
            padding: 16px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            flex-shrink: 0;
        }

        .date-card:hover {
            border-color: #0d6efd;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        }

        .date-card.active {
            border-color: #0d6efd;
            background: #f0f8ff;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
        }

        .date-text {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        .price-text {
            font-size: 16px;
            font-weight: 700;
            color: #0d6efd;
        }

        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .nav-arrow:hover {
            border-color: #0d6efd;
            background: #f0f8ff;
        }

        .nav-arrow.left {
            left: 10px;
        }

        .nav-arrow.right {
            right: 10px;
        }

        .nav-arrow svg {
            width: 18px;
            height: 18px;
            fill: #666;
        }

        .nav-arrow:hover svg {
            fill: #0d6efd;
        }

        /* Filter Options */
        .filter-options {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .filter-tabs {
            display: flex;
            gap: 0;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }

        .filter-tab {
            flex: 1;
            padding: 15px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            background: white;
            font-size: 14px;
            font-weight: 500;
        }

        .filter-tab.active {
            background: #0d6efd;
            color: white;
        }

        .filter-tab:not(.active):hover {
            background: #f5f5f5;
        }

        .filter-label {
            font-size: 12px;
            color: inherit;
            margin-bottom: 5px;
        }

        .filter-value {
            font-size: 14px;
            font-weight: 600;
            color: inherit;
        }

        .sort-dropdown {
            position: relative;
            display: inline-block;
            margin-left: auto;
        }

        .sort-button {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .sort-button:hover {
            border-color: #0d6efd;
        }

        .sort-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            z-index: 100;
            min-width: 150px;
            margin-top: 5px;
        }

        .sort-dropdown.active .sort-dropdown-content {
            display: block;
        }

        .sort-option {
            padding: 12px 16px;
            cursor: pointer;
            transition: background 0.2s ease;
            font-size: 14px;
        }

        .sort-option:hover {
            background: #f5f5f5;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .date-slider-container {
                margin: 0 -10px;
                border-radius: 0;
            }
            
            .nav-arrow {
                display: none;
            }
            
            .filter-tabs {
                flex-direction: column;
            }
            
            .date-card {
                min-width: 120px;
                padding: 12px 16px;
            }
        }
    </style>
    
    <!-- list hero section -->
    <div class="container-fluid modify-search-main-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8 col-12 mt-3 d-flex">
                    <div class="flight-location-L me-3">
                        <span>{{strtoupper(isset($flight_search['origin']) && $flight_search['origin'] ? $flight_search['origin'] : "")}}</span>
                        <span>→</span>
                        <span>{{ strtoupper(isset($flight_search['destination']) && $flight_search['destination'] ? $flight_search['destination'] : "")}}</span>
                    </div>
                    <div class="flight-date-L me-3">
                        <img src="{{ url('public/assets/images/calendar-l.png') }}" alt="" width="18px">
                        <span>{{ isset($flight_search['departure_date']) && $flight_search['departure_date'] ? \Carbon\Carbon::parse($flight_search['departure_date'])->format('M d, Y') : '' }}</span>
                    </div>

                    @if($flight_search['trip_type'] == "round")
                        <div class="flight-date-L me-3">
                            <img src="{{ url('public/assets/images/calendar-l.png') }}" alt="" width="18px">
                            <span>{{ isset($flight_search['return_date']) && $flight_search['return_date'] ? \Carbon\Carbon::parse($flight_search['return_date'])->format('M d, Y') : '' }}</span>
                        </div>
                    @endif

                    <div class="flight-date-L me-3">
                        <img src="{{ url('public/assets/images/user-l.png') }}" alt="" width="18px">
                        <span>{{isset($flight_search['passenger_count']) && $flight_search['passenger_count'] ? $flight_search['passenger_count'] : ""}} Passenger</span>
                        <span>{{ucfirst(isset($flight_search['flight_type']) && $flight_search['flight_type'] ? $flight_search['flight_type'] : "")}}</span>
                    </div>
                </div>
                <div class="col-sm-4 col-12 text-center mt-3">
                    <button id="toggleSearchForm" class="animated-toggle-btn">Modify Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="list-hero-section" id="searchFormSection" style="display: none;">
        @include('serach-forms.flight_search')
    </div>

    <!-- Menu Icon -->
    <div class="bhw-menu-icon">&#9776;</div>

    <div class="container pt-5 bh-list-main-container">
        <div class="row">
            <!-- Left Column (Filters) - col-md-4 -->
            <div class="col-xl-3 col-12 left-column bhw-left-column popup-content p-3">
                <span class="bhw-popup-close">&times;</span>
                <div class="FL-results-header border-bottom pb-2">
                    <h5 id="flight-count" >{{ $flights_data->firstItem() }} to {{ $flights_data->lastItem() }} of {{ $flights_data->total() }} flights found</h5>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <button class="btn FL-filter-header mb-0">
                        <img src="{{ url('public/assets/images/filter_list.png') }}" width="24px" height="24px">
                        Filter
                    </button>
                    <button class="btn text-primary" onclick="clear_filters()">Reset</button>
                </div>
                
                @php
                    $check_stops = [];
                    foreach ($flights_data as $item) {
                        foreach ($item['segments'] as $segments) {
                            $stops = count($segments) - 1;
                            $check_stops[$stops] = true;
                        }
                    }
                    ksort($check_stops);
                @endphp
                
                <div class="FL-filter-section-main">
                    <!-- stops -->
                    <div class="p-4 border-bottom">
                        <h6 class="FL-filter-header">Stops </h6>
                        <div class="FL-form-check">
                            <input  class="FL-form-check-input" value="" name="stop_filter" type="radio"  checked>
                            <label class="FL-form-check-label"  for="FL-directFlight">All </label>
                        </div>
                        @foreach ($check_stops as $stop_count => $value)
                        <div class="FL-form-check">
                            <input  class="FL-form-check-input" name="stop_filter" value="{{ $stop_count }}" type="radio" >
                            @if ($stop_count === 0)
                            <label class="FL-form-check-label" for="FL-directFlight">Direct</label>
                            @elseif ($stop_count === 1)
                                <label class="FL-form-check-label" for="FL-directFlight">1 stop</label>
                            @else
                                <label class="FL-form-check-label" for="FL-directFlight"> {{ $stop_count }} stops</label>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    @php
                        $displayed_airlines = [];
                        $airline_map = [];
                    @endphp
                    <!-- all airlines -->
                    <div class="p-4 border-bottom">
                        <div class="FL-airlines-filter">
                            <h5 class="mb-3">Airlines</h5>
                            <div id="FL-visibleAirlines" class="airline-list">
                                @foreach ($flights_data as $item)
                                    @foreach ($item['segments'] as $segments)
                                        @php
                                            $airline_code = $segments[0]['carrier']['operating'];
                                            $airline_name = $segments[0]['airline_name'] ?? '';
                                            if (!in_array($airline_code, $displayed_airlines) && !empty($airline_name)) {
                                                $displayed_airlines[] = $airline_code;
                                                $airline_map[$airline_code] = $airline_name;
                                            }
                                        @endphp
                                    @endforeach
                                @endforeach

                                @foreach ($airline_map as $code => $name)
                                    @if (!empty($name))
                                        <div class="FL-form-check airline-option" data-airlines="{{ $code }}">
                                            <input class="FL-form-check-input FL-airline-checkbox airline-checkbox" type="checkbox" id="FL-airline-{{ $code }}">
                                            <label class="FL-form-check-label" for="FL-airline-{{ $code }}">{{ $name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- time and price filter -->
                    <div class="p-2 border-bottom">
                        @php
                            $prices = [];
                            foreach ($flights_data as $item) {
                                if (isset($item['segments'][0][0]['price'])) {
                                    // Remove comma and convert to float
                                    $cleanPrice = floatval(str_replace(',', '', $item['segments'][0][0]['price']));
                                    $prices[] = $cleanPrice;
                                }
                            }
                            $minPrice = !empty($prices) ? min($prices) : 0;
                            $maxPrice = !empty($prices) ? max($prices) : 0;
                        @endphp

                        <!-- Price -->
                        <div class="FL-filter-section mb-5">
                            <div class="FL-filter-label">
                                Price Range
                                <span class="FL-range-display" id="FL-priceRange">{{ $minPrice}} - {{$maxPrice}}</span>
                            </div>
                            <div class="FL-slider-container">
                                <div class="FL-slider-track">
                                    <div class="FL-slider-range" id="FL-priceRangeTrack"></div>
                                </div>
                                <input type="range" min="{{ $minPrice}}" max="{{$maxPrice}}" value="{{ $minPrice}}" id="FL-priceMin" class="FL-range-input">
                                <input type="range" min="{{ $minPrice}}" max="{{$maxPrice}}" value="{{$maxPrice}}" id="FL-priceMax" class="FL-range-input">
                                <div class="FL-slider-label" style="left: 0%;">{{ $minPrice}}</div>
                                <div class="FL-slider-label" style="left: 100%; transform: translateX(-100%);">{{$maxPrice}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column (Content) - col-md-8 -->
            <div class="col-xl-9 col-12 right-column">
                <!-- flight heading -->
                <div class="row">
                    <div class="col-12 text-secondary fs-4">
                        Flight from <span class="fw-bold text-dark">{{ isset($flight_search['origin_name']) && $flight_search['origin_name'] ? ucfirst($flight_search['origin_name']) : '' }}</span> to <span class="fw-bold text-dark">{{ isset($flight_search['destination_name']) && $flight_search['destination_name'] ? ucfirst($flight_search['destination_name']) : '' }}</span>
                    </div>
                    <div class="col text-secondary" style="font-size: 14px;">
                        <p>The price is average for one person. Included all taxes and fees.</p>
                    </div>
                </div>
                
                <!-- Date Selection and Filter Section -->
                <div class="row">
                    <div class="col-12">
                        <!-- Date Selection Slider with PHP Generated Dates -->
                        <div class="date-slider-container">
                            <div class="nav-arrow left" onclick="scrollDates('left')">
                                <svg viewBox="0 0 24 24">
                                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                </svg>
                            </div>
                            
                            <div class="date-slider" id="dateSlider">
                                @php
                                    // Generate 30 days calendar starting from departure date or today
                                    $startDate = isset($flight_search['departure_date']) && $flight_search['departure_date'] 
                                        ? \Carbon\Carbon::parse($flight_search['departure_date'])
                                        : \Carbon\Carbon::today();
                                    
                                    $selectedDate = $startDate->format('Y-m-d');
                                @endphp
                                
                                @for($i = 0; $i < 30; $i++)
                                    @php
                                        $currentDate = $startDate->copy()->addDays($i);
                                        $isActive = $i === 0 ? 'active' : '';
                                        // Random price generator for demo - replace with actual flight prices
                                        $randomPrice = rand(180, 250);
                                    @endphp
                                    
                                    <div class="date-card {{ $isActive }}" data-date="{{ $currentDate->format('Y-m-d') }}">
                                        <div class="date-text">{{ $currentDate->format('D, j M') }}</div>
                                        <div class="price-text">${{ $randomPrice }}</div>
                                    </div>
                                @endfor
                            </div>
                            
                            <div class="nav-arrow right" onclick="scrollDates('right')">
                                <svg viewBox="0 0 24 24">
                                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Filter Options -->
                        <div class="filter-options">
                            <div class="filter-tabs">
                                <button class="filter-tab active" data-filter="best">
                                    <div class="filter-label">Best</div>
                                    <div class="filter-value">$202 · 3h 15m</div>
                                </button>
                                <button class="filter-tab" data-filter="cheapest">
                                    <div class="filter-label">Cheapest</div>
                                    <div class="filter-value">$202 · 3h 15m</div>
                                </button>
                                <button class="filter-tab" data-filter="fastest">
                                    <div class="filter-label">Fastest</div>
                                    <div class="filter-value">$202 · 3h 15m</div>
                                </button>
                                <div class="sort-dropdown">
                                    <button class="sort-button" id="sortDropdownBtn">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M3 18h6v-2H3v2zM3 6v2h18V6H3zm0 7h12v-2H3v2z"/>
                                        </svg>
                                        Sort by
                                    </button>
                                    <div class="sort-dropdown-content" id="sortDropdownContent">
                                        <div class="sort-option" data-sort="price">Price</div>
                                        <div class="sort-option" data-sort="duration">Duration</div>
                                        <div class="sort-option" data-sort="departure">Departure Time</div>
                                        <div class="sort-option" data-sort="arrival">Arrival Time</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flight Cards continue here... -->
                @if(isset($flight_search['trip_type']) && $flight_search['trip_type'] == "oneway")
                @php
                    $i = 1;
                @endphp
                    @foreach($flights_data as $key=>$segment)
                        <div class="row mt-4  main-row-ticket-card"
                             data-stops="{{count($segment['segments'][0]) - 1 }}"
                             data-airline="{{htmlspecialchars($segment['segments'][0][0]['carrier']['operating'])}}"
                             data-price="{{floatval(str_replace(',', '', $segment['segments'][0][0]['price']))}}"
                        >
                            <!-- Flight card content remains the same... -->
                            <!-- logo -->
                            <div class="col-md-2 col-12 list-logo-border bg-white border-end d-flex justify-content-center align-items-center">
                                <img src="https://assets.duffel.com/img/airlines/for-light-background/full-color-logo/<?= htmlspecialchars($segment['segments'][0][0]['carrier']['operating']) ?>.svg" width="100px" height="100px">
                            </div>
                            <!-- direction -->
                            <div class=" col-md-7 col-12 p-4 direction-border bg-white position-relative d-flex flex-column justify-content-center">
                                <!-- departure -->
                                <div class="list-departure">
                                    <div>{{$segment['segments'][0][0]['departure']['date_convert']}}</div>
                                    <div class="text-dark">{{$segment['segments'][0][0]['total_duration']}}</div>
                                    <div>{{ end($segment['segments'][0])['arrival']['date_convert'] }}</div>
                                </div>
                                <!-- flight direction -->
                                <div class="flight-direction position-relative mt-3">
                                    <div class="list-country">{{$segment['segments'][0][0]['departure']['airport']}}</div>
                                    <div class="direction-image"><img src="{{ url('public/assets/images/direction.png') }}" width="80%"></div>
                                    <div class="list-country">{{ end($segment['segments'][0])['arrival']['airport'] }}</div>
                                    <img src="{{ url('public/assets/images/list-plane.png') }}" class="plane-direction-image">
                                </div>
                                <!-- total time -->
                                <div class="total-time mt-3">
                                    <div>{{$segment['segments'][0][0]['departure']['time']}}</div>
                                    <div class="text-dark">
                                        @php
                                            $oneWaySegments = $segment['segments'][0];
                                            $stopsCount = count($oneWaySegments) - 1;

                                            if ($stopsCount == 0) {
                                            echo "Direct";
                                            } else {
                                            $stopCities = [];
                                            for ($s = 0; $s < $stopsCount; $s++) {
                                            $stopCities[] = $oneWaySegments[$s]['arrival']['city'];
                                            }
                                            $cities = implode(', ', $stopCities);
                                        @endphp

                                        <span class="custom-tooltip">
                                    Stops {{ $stopsCount }}
                                    <span class="tooltip-content">{{ $cities }}</span>
                                    </span>

                                        @php
                                            }
                                        @endphp

                                    </div>
                                    <div class="bh-city-adjust">{{ end($segment['segments'][0])['arrival']['time'] }}</div>
                                </div>
                                <img src="{{ url('public/assets/images/list-rigth-img.png') }}" class="list-right-img">
                            </div>
                            <!-- price and seat -->
                            <div class="col-md-3 col-12 total-price-border bg-white">
                                <div class="p-2">
                                    <div class="per-seat-price">
                                        <p class="text-muted mb-1 seat-text-size1">Price</p>
                                        <h3 class="text-primary fw-bold mb-1 seat-text-size3">{{$segment['segments'][0][0]['currency']}} {{$segment['segments'][0][0]['price']}}</h3>
                                    </div>

                                    <form class="" action="{{ route('booking') }}" name="" method="post">
                                        @csrf
                                        <input name="routes" type="hidden" value="{{ encrypt(json_encode($segment))}}">
                                        <input name="booking_data" type="hidden" value="{{ encrypt(json_encode($segment['segments'][0][0]['booking_data'])) }}">
                                        <div class="d-grid mb-2">
                                            <button class="btn btn-primary fw-bold" >Book Now</button>
                                        </div>
                                    </form>

                                    <div class="d-flex justify-content-between">
                                        <div class="mb-2">
                                            <span class="badge bg-primary"> {{ isset($flight_search['trip_type']) && $flight_search['trip_type'] ? strtoupper($flight_search['trip_type']) : '' }}</span>
                                        </div>
                                        <a href="#" class="text-warning d-block mb-2 seat-text-size1" data-bs-toggle="offcanvas" data-bs-target="#flightDetailsOffcanvas_{{$i}}">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php  $i++; @endphp
                    @endforeach
                @endif

                <!-- Pagination links -->
                <div class="pagination">
                    {{ $flights_data->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Date slider functionality
            const dateSlider = document.getElementById('dateSlider');
            
            // Date card selection
            document.querySelectorAll('.date-card').forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    document.querySelectorAll('.date-card').forEach(c => c.classList.remove('active'));
                    
                    // Add active class to clicked card
                    this.classList.add('active');
                    
                    const selectedDate = this.dataset.date;
                    console.log('Selected date:', selectedDate);
                    
                    // Here you can add AJAX call to filter flights by date
                    // filterFlightsByDate(selectedDate);
                });
            });

            // Filter tabs functionality
            document.querySelectorAll('.filter-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    const filterType = this.dataset.filter;
                    console.log('Filter selected:', filterType);
                    
                    // Here you can add logic to filter flights
                    // filterFlights(filterType);
                });
            });

            // Sort dropdown functionality
            const sortDropdownBtn = document.getElementById('sortDropdownBtn');
            
            sortDropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                document.querySelector('.sort-dropdown').classList.toggle('active');
            });

            // Sort options
            document.querySelectorAll('.sort-option').forEach(option => {
                option.addEventListener('click', function() {
                    const sortType = this.dataset.sort;
                    console.log('Sort by:', sortType);
                    
                    // Close dropdown
                    document.querySelector('.sort-dropdown').classList.remove('active');
                    
                    // Here you can add logic to sort flights
                    // applySorting(sortType);
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const dropdown = document.querySelector('.sort-dropdown');
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove('active');
                }
            });

            // Existing filter functionality
            let selectedAirlines = [];
            let selectedStop = '';
            let selectedMinPrice = null;
            let selectedMaxPrice = null;

            // Get price slider elements
            const priceMinSlider = document.getElementById('FL-priceMin');
            const priceMaxSlider = document.getElementById('FL-priceMax');

            if (priceMinSlider && priceMaxSlider) {
                // Initialize selected prices
                selectedMinPrice = parseInt(priceMinSlider.value);
                selectedMaxPrice = parseInt(priceMaxSlider.value);

                priceMinSlider.addEventListener('input', function () {
                    selectedMinPrice = parseInt(this.value);
                    applyFilters();
                });

                priceMaxSlider.addEventListener('input', function () {
                    selectedMaxPrice = parseInt(this.value);
                    applyFilters();
                });
            }

            // Handle airline checkbox click events
            document.querySelector('.airline-list')?.addEventListener('click', function (e) {
                const option = e.target.closest('.airline-option');
                if (!option) return;

                const checkbox = option.querySelector('.airline-checkbox');
                const airline = option.getAttribute('data-airlines');

                // If clicked on label instead of checkbox, toggle checkbox manually
                if (e.target.tagName !== 'INPUT') {
                    checkbox.checked = !checkbox.checked;
                }

                // Update selectedAirlines based on checked status
                if (checkbox.checked) {
                    if (!selectedAirlines.includes(airline)) {
                        selectedAirlines.push(airline);
                    }
                } else {
                    selectedAirlines = selectedAirlines.filter(a => a !== airline);
                }

                applyFilters();
            });

            // Oneway stop filter
            document.querySelectorAll('input[name="stop_filter"]').forEach(input => {
                input.addEventListener('change', function () {
                    selectedStop = this.value;
                    applyFilters();
                });
            });

            // Filter logic
            function applyFilters() {
                const flightCards = document.querySelectorAll('.main-row-ticket-card');
                let visibleCount = 0;

                flightCards.forEach(card => {
                    const airline = card.getAttribute('data-airline');
                    const stops = card.getAttribute('data-stops');
                    const priceAttr = card.getAttribute('data-price');

                    // Convert price to number (removing comma if needed)
                    let price = parseFloat(priceAttr?.replace(/,/g, '') || 0);

                    const airlineMatch = selectedAirlines.length === 0 || selectedAirlines.includes(airline);
                    const stopMatch = selectedStop === '' || selectedStop === stops;
                    const priceMatch = (!selectedMinPrice || price >= selectedMinPrice) &&
                        (!selectedMaxPrice || price <= selectedMaxPrice);

                    if (airlineMatch && stopMatch && priceMatch) {
                        card.style.display = 'flex';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                const countEl = document.getElementById('flight-count');
                if (countEl) {
                    countEl.textContent = `${visibleCount} flights found`;
                }
            }

            // Clear filters function
            window.clear_filters = function() {
                selectedAirlines = [];
                selectedStop = '';

                document.querySelectorAll('.airline-option').forEach(el => {
                    const checkbox = el.querySelector('.airline-checkbox');
                    if (checkbox) {
                        checkbox.checked = false;
                    }
                });

                // Stops UI reset
                document.querySelectorAll('input[name="stop_filter"]').forEach(r => r.checked = false);
                document.querySelector('input[name="stop_filter"][value=""]')?.click();

                const priceMinSlider = document.getElementById('FL-priceMin');
                const priceMaxSlider = document.getElementById('FL-priceMax');
                const priceRangeDisplay = document.getElementById('FL-priceRange');
                const priceRangeTrack = document.getElementById('FL-priceRangeTrack');

                if (priceMinSlider && priceMaxSlider) {
                    priceMinSlider.value = priceMinSlider.min;
                    priceMaxSlider.value = priceMaxSlider.max;

                    selectedMinPrice = parseInt(priceMinSlider.value);
                    selectedMaxPrice = parseInt(priceMaxSlider.value);

                    priceRangeDisplay.textContent = `${selectedMinPrice} - ${selectedMaxPrice}`;
                    priceRangeTrack.style.left = "0%";
                    priceRangeTrack.style.width = "100%";
                }

                // Show all
                document.querySelectorAll('.main-row-ticket-card').forEach(card => card.style.display = 'flex');
                document.getElementById('flight-count').textContent = `${document.querySelectorAll('.main-row-ticket-card').length} flights found`;
            };

            // Toggle search form
            const toggleBtn = document.getElementById('toggleSearchForm');
            const searchSection = document.getElementById('searchFormSection');

            toggleBtn.addEventListener('click', function () {
                if (searchSection.style.display === "none" || searchSection.style.display === "") {
                    searchSection.style.display = "block";
                } else {
                    searchSection.style.display = "none";
                }
            });

            // Menu functionality
            const menuIcon = document.querySelector(".bhw-menu-icon");
            const leftColumn = document.querySelector(".bhw-left-column");

            if (menuIcon && leftColumn) {
                // Create overlay element
                const overlay = document.createElement("div");
                overlay.classList.add("bhw-overlay-background");
                document.body.appendChild(overlay);

                // Function to open left column
                function openLeftColumn() {
                    leftColumn.classList.add("bhw-overlay-active");
                    overlay.style.display = "block";
                }

                // Function to close left column
                function closeLeftColumn() {
                    leftColumn.classList.remove("bhw-overlay-active");
                    overlay.style.display = "none";
                }

                // Menu icon click
                menuIcon.addEventListener("click", function(e) {
                    e.stopPropagation();
                    openLeftColumn();
                });

                // Close button inside left column
                const closeBtn = leftColumn.querySelector(".bhw-popup-close");
                if (closeBtn) {
                    closeBtn.addEventListener("click", function() {
                        closeLeftColumn();
                    });
                }

                // Click outside left column (on overlay or anywhere else)
                document.addEventListener("click", function(e) {
                    if (!leftColumn.contains(e.target) && !menuIcon.contains(e.target)) {
                        closeLeftColumn();
                    }
                });

                // Prevent clicks inside left column from closing it
                leftColumn.addEventListener("click", function(e) {
                    e.stopPropagation();
                });
            }
        });

        // Global scroll function for arrows
        function scrollDates(direction) {
            const slider = document.getElementById('dateSlider');
            const scrollAmount = 200;
            
            if (direction === 'left') {
                slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }
    </script>

@endsection