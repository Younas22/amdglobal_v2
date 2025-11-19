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
.seg-dest{
    top:-25px;
    white-space:nowrap;
    position:absolute
}
.seg-time{
    bottom:-25px;
    position:absolute
}
.left-column{
    background: white;
    border-radius: 8px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
.search-header{
    display:none
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
            <div class="col-xl-3 col-12">
                <div class="left-column bhw-left-column p-3">
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

                        <!-- Flight Duration -->
                        <div class="FL-filter-section mb-5" style="display: none;">
                            <div class="FL-filter-label">
                                Flight Duration
                                <span class="FL-range-display" id="FL-durationRange">0h - 24h</span>
                            </div>
                            <div class="FL-slider-container">
                                <div class="FL-slider-track">
                                    <div class="FL-slider-range" id="FL-durationRangeTrack"></div>
                                </div>
                                <input type="range" min="0" max="24" value="0" id="FL-durationMin" class="FL-range-input">
                                <input type="range" min="0" max="24" value="24" id="FL-durationMax" class="FL-range-input">
                                <div class="FL-slider-label" style="left: 0%;">0h</div>
                                <div class="FL-slider-label" style="left: 100%; transform: translateX(-100%);">24h</div>
                            </div>
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
                <!-- offering tabs -->
                <div class="row">
                    {{--<div class="options-container">
                        <div class="options-row first-row">
                            <!-- Cheapest Option -->
                            <div class="option-tab active" onclick="setActiveTab(this)">
                                <div class="option-title">Cheapest</div>
                                <div class="option-details">
                                    <span class="option-price">$120.00</span>
                                    <span class="divider"></span>
                                    <span class="option-time">1h 53min</span>
                                </div>
                            </div>

                            <!-- Best Offering -->
                            <div class="option-tab" onclick="setActiveTab(this)">
                                <div class="option-title">Best Offering</div>
                                <div class="option-details">
                                    <span class="option-price">$153.00</span>
                                    <span class="divider"></span>
                                    <span class="option-time">1h 49min</span>
                                </div>
                            </div>
                        </div>

                        <div class="options-row">
                            <!-- Fastest -->
                            <div class="option-tab" onclick="setActiveTab(this)">
                                <div class="option-title">Fastest</div>
                                <div class="option-details">
                                    <span class="option-price">$185.00</span>
                                    <span class="divider"></span>
                                    <span class="option-time">1h 40min</span>
                                </div>
                            </div>

                            <!-- Sort by dropdown -->
                            <div class="sort-by-section border-start">
                                <div class="dropdown-wrapper">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle dropdown-toggle-custom" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ url('public/assets/images/sort.png') }}" class="sort-icon" alt="Sort">
                                            Sort by
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">Price</a></li>
                                            <li><a class="dropdown-item" href="#">Best offering</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>


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
                            <!-- logo -->
                            <div
                                class="col-md-2 col-12 list-logo-border bg-white border-end d-flex justify-content-center align-items-center">
                                <div
                                    class="col-md-2 col-12 list-logo-border bg-white border-end d-flex justify-content-center align-items-center">
                                    <img width="100px" height="100px"
                                         src="https://assets.duffel.com/img/airlines/for-light-background/full-color-logo/{{ $segment['segments'][0][0]['carrier']['operating'] ?? 'demo' }}.svg"
                                         alt="Airline Logo"
                                         onerror="this.onerror=null;this.src='{{ url('public/assets/images/list-plane.png') }}';"
                                    />
                                </div>
                            </div>
                            <!-- direction -->
                        <div class=" col-md-7 col-12 p-4 direction-border bg-white position-relative d-flex flex-column justify-content-center">
    <!-- departure -->
    <div class="list-departure">
        <div>{{ $segment['segments'][0][0]['departure']['date_convert'] }}</div>
        <div>{{ end($segment['segments'][0])['arrival']['date_convert'] }}</div>
    </div>

    <!-- flight direction with stop -->
    <div class="flight-direction position-relative mt-3 d-flex align-items-center justify-content-between">
        <!-- Departure -->
        <div class="list-country">{{ $segment['segments'][0][0]['departure']['airport'] }}</div>

        <!-- Middle section with stop -->
        <div class="flex-grow-1 mx-3 position-relative d-flex align-items-center justify-content-center">
            <!-- Line -->
            <div class="w-100 border-top border-secondary position-absolute" style="top: 50%;"></div>

            @php
                $oneWaySegments = $segment['segments'][0];
                  $stopsCount = count($oneWaySegments) - 1;

                  if ($stopsCount == 0) {
                      @endphp
            <div class="d-flex flex-column align-items-center mx-5 text-center px-2 bg-white  position-relative">
                <!-- Airport code on top -->
                <div class="fw-bold seg-dest position-absolute">Direct</div>

                <!-- Circle -->
                <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center"
                     style="width:10px; height:10px; background:#fff;">

                </div>

                <!-- Layover time at bottom -->
                <div class="small text-muted seg-time position-absolute">{{ $segment['segments'][0][0]['total_duration'] }}</div>
            </div>
            @php
                  } else {
                      $stopCities = [];
                      for ($s = 0; $s < $stopsCount; $s++) {
                          $arrivalTime   = new DateTime($oneWaySegments[$s]['arrival']['time']);
                          $departureTime = new DateTime($oneWaySegments[$s + 1]['departure']['time']);
                          $interval = $arrivalTime->diff($departureTime);
            @endphp
            <!-- Stop Circle -->
            <div class="d-flex flex-column align-items-center mx-5 text-center px-2 bg-white  position-relative">
                <!-- Airport code on top -->
                <div class="fw-bold position-absolute seg-dest">{{$oneWaySegments[$s]['arrival']['city']}}</div>

                <!-- Circle -->
                <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center"
                     style="width:10px; height:10px; background:#fff;">

                </div>
                <!-- Layover time at bottom -->
                <div class="small text-muted position-absolute seg-time">{{$interval->h."h".$interval->i."m"}}</div>
            </div>
            @php
                      }
       }
       @endphp

        </div>

        <!-- Arrival -->
        <div class="list-country">{{ end($segment['segments'][0])['arrival']['airport'] }}</div>
    </div>

    <!-- total time -->
    <div class="total-time mt-3">
        <div>{{ $segment['segments'][0][0]['departure']['time'] }}</div>

         <div class="d-flex align-items-center gap-2">
            <div><i class="bi bi-suitcase2-fill"></i><span class="ms-1">{{ $segment['segments'][0][0]['baggage']}}</span></div>
            <div><i class="bi bi-suitcase-lg-fill"></i><span class="ms-1">{{ $segment['segments'][0][0]['cabin_baggage']}}</span></div>
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

                                        <h3 class="text-primary fw-bold mb-1 seat-text-size3">{{$segment['segments'][0][0]['currency']}} {{$segment['segments'][0][0]['price']}}
                                        </h3>
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


                @if(isset($flight_search['trip_type']) && $flight_search['trip_type'] == "round")
                    @php
                        $i = 1;
                    @endphp

                    @foreach($flights_data as $key=>$segment)

                        <!-- round way section code -->
                        <div class="row mt-4 main-row-ticket-card"
                             data-stops="{{count($segment['segments'][0]) - 1 }}"
                             data-airline="{{htmlspecialchars($segment['segments'][0][0]['carrier']['operating'])}}"
                             data-price="{{floatval(str_replace(',', '', $segment['segments'][0][0]['price']))}}"
                        >
                            <div class="col-sm-9 col-12 bg-white" style="border-radius: 15px 0px 0px 15px;">
                                <!-- Go -->
                                <div class="row">
                                    <!-- logo -->
                                    <div
                                        class="col-md-2 col-12 p-2 list-logo-border bg-white border-end d-flex justify-content-center align-items-center">
                                        <img width="100px" height="100px"
                                             src="https://assets.duffel.com/img/airlines/for-light-background/full-color-logo/{{ $segment['segments'][0][0]['carrier']['operating'] ?? 'demo' }}.svg"
                                             alt="Airline Logo"
                                             onerror="this.onerror=null;this.src='{{ url('public/assets/images/list-plane.png') }}';"
                                        />
                                    </div>
                                    <!-- direction -->
                                    <div
                                        class=" col-md-10 col-12 p-4 bg-white position-relative d-flex flex-column justify-content-center">
                                        <!-- departure -->
                                        <div class="list-departure">
                                            <div>{{$segment['segments'][0][0]['departure']['date_convert']}}</div>
                                            <div>{{end($segment['segments'][0])['arrival']['date_convert'] }}</div>
                                        </div>
                                        <!-- flight direction -->
                                        <div class="flight-direction position-relative mt-3 d-flex align-items-center justify-content-between">
                                            <!-- Departure -->
                                            <div class="list-country">{{ $segment['segments'][0][0]['departure']['airport'] }}</div>

                                            <!-- Middle section with stop -->
                                            <div class="flex-grow-1 mx-3 position-relative d-flex align-items-center justify-content-center">
                                                <!-- Line -->
                                                <div class="w-100 border-top border-secondary position-absolute" style="top: 50%;"></div>

                                                @php
                                                    $oneWaySegments = $segment['segments'][0];
                                                      $stopsCount = count($oneWaySegments) - 1;

                                                      if ($stopsCount == 0) {
                                                @endphp
                                                <div class="d-flex flex-column align-items-center mx-5 text-center px-2 bg-white  position-relative">
                                                    <!-- Airport code on top -->
                                                    <div class="fw-bold seg-dest position-absolute">Direct</div>

                                                    <!-- Circle -->
                                                    <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center"
                                                         style="width:10px; height:10px; background:#fff;">

                                                    </div>

                                                    <!-- Layover time at bottom -->
                                                    <div class="small text-muted seg-time position-absolute">{{ $segment['segments'][0][0]['total_duration'] }}</div>
                                                </div>
                                                @php
                                                    } else {
                                                        $stopCities = [];
                                                        for ($s = 0; $s < $stopsCount; $s++) {
                                                            $arrivalTime   = new DateTime($oneWaySegments[$s]['arrival']['time']);
                                                            $departureTime = new DateTime($oneWaySegments[$s + 1]['departure']['time']);
                                                            $interval = $arrivalTime->diff($departureTime);
                                                @endphp
                                                    <!-- Stop Circle -->
                                                <div class="d-flex flex-column align-items-center mx-5 text-center px-2 bg-white  position-relative">
                                                    <!-- Airport code on top -->
                                                    <div class="fw-bold position-absolute seg-dest">{{$oneWaySegments[$s]['arrival']['city']}}</div>

                                                    <!-- Circle -->
                                                    <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center"
                                                         style="width:10px; height:10px; background:#fff;">

                                                    </div>
                                                    <!-- Layover time at bottom -->
                                                    <div class="small text-muted seg-time">{{$interval->h."h".$interval->i."m"}}</div>
                                                </div>
                                                @php
                                                    }
                                     }
                                                @endphp

                                            </div>

                                            <!-- Arrival -->
                                            <div class="list-country">{{ end($segment['segments'][0])['arrival']['airport'] }}</div>
                                        </div>

                                        <!-- total time -->
                                        <div class="total-time mt-3">
                                            <div>{{$segment['segments'][0][0]['departure']['time']}}</div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div><i class="bi bi-suitcase2-fill"></i><span class="ms-1">{{ $segment['segments'][0][0]['baggage']}}</span></div>
                                                <div><i class="bi bi-suitcase-lg-fill"></i><span class="ms-1">{{ $segment['segments'][0][0]['cabin_baggage']}}</span></div>
                                            </div>
                                            <div class="bh-city-adjust">{{ end($segment['segments'][0])['arrival']['time'] }}</div>
                                        </div>
                                        <img src="{{ url('public/assets/images/list-rigth-img.png') }}" class="list-right-img">
                                    </div>
                                </div>
                                <hr>
                                <!-- return -->
                                <div class="row">
                                    <!-- logo -->
                                    <div
                                        class="col-md-2 col-12 list-logo-border bg-white border-end d-flex justify-content-center align-items-center">
                                        <img width="100px" height="100px"
                                             src="https://assets.duffel.com/img/airlines/for-light-background/full-color-logo/{{ $segment['segments'][0][0]['carrier']['operating'] ?? 'demo' }}.svg"
                                             alt="Airline Logo"
                                             onerror="this.onerror=null;this.src='{{ url('public/assets/images/return-list-plane.png') }}';"
                                        />
                                    </div>
                                    <!-- direction -->
                                    <div
                                        class="col-md-10 col-12 p-4 return-direction-border bg-white position-relative d-flex flex-column justify-content-center">
                                        <!-- departure -->
                                        <div class="list-departure">
                                            <div>{{$segment['segments'][1][0]['departure']['date_convert']}}</div>
                                            {{--<div class="text-dark">{{$segment['segments'][1][0]['total_duration']}}</div>--}}
                                            <div>{{end($segment['segments'][1])['arrival']['date_convert']}}</div>
                                        </div>
                                        <!-- flight direction -->
                                        <div class="flight-direction position-relative mt-3 d-flex align-items-center justify-content-between">
                                            <!-- Departure -->
                                            <div class="list-country">{{ $segment['segments'][1][0]['departure']['airport'] }}</div>

                                            <!-- Middle section with stop -->
                                            <div class="flex-grow-1 mx-3 position-relative d-flex align-items-center justify-content-center">
                                                <!-- Line -->
                                                <div class="w-100 border-top border-secondary position-absolute" style="top: 50%;"></div>

                                                @php
                                                    $oneWaySegments = $segment['segments'][1];
                                                      $stopsCount = count($oneWaySegments) - 1;

                                                      if ($stopsCount == 0) {
                                                @endphp
                                                <div class="d-flex flex-column align-items-center mx-5 text-center px-2 bg-white  position-relative">
                                                    <!-- Airport code on top -->
                                                    <div class="fw-bold seg-dest position-absolute">Direct</div>

                                                    <!-- Circle -->
                                                    <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center"
                                                         style="width:10px; height:10px; background:#fff;">

                                                    </div>

                                                    <!-- Layover time at bottom -->
                                                    <div class="small text-muted seg-time position-absolute">{{ $segment['segments'][1][0]['total_duration'] }}</div>
                                                </div>
                                                @php
                                                    } else {
                                                        $stopCities = [];
                                                        for ($s = 0; $s < $stopsCount; $s++) {
                                                            $arrivalTime   = new DateTime($oneWaySegments[$s]['arrival']['time']);
                                                            $departureTime = new DateTime($oneWaySegments[$s + 1]['departure']['time']);
                                                            $interval = $arrivalTime->diff($departureTime);
                                                @endphp
                                                    <!-- Stop Circle -->
                                                <div class="d-flex flex-column align-items-center mx-5 text-center px-2 bg-white  position-relative">
                                                    <!-- Airport code on top -->
                                                    <div class="fw-bold position-absolute seg-dest">{{$oneWaySegments[$s]['arrival']['city']}}</div>

                                                    <!-- Circle -->
                                                    <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center"
                                                         style="width:10px; height:10px; background:#fff;">

                                                    </div>
                                                    <!-- Layover time at bottom -->
                                                    <div class="small text-muted position-absolute seg-time">{{$interval->h."h".$interval->i."m"}}</div>
                                                </div>
                                                @php
                                                    }
                                     }
                                                @endphp

                                            </div>
                                            <!-- Arrival -->
                                            <div class="list-country">{{ end($segment['segments'][1])['arrival']['airport'] }}</div>
                                        </div>
                                        <div class="total-time mt-3">
                                            <div>{{$segment['segments'][1][0]['departure']['time']}}</div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div><i class="bi bi-suitcase2-fill"></i><span class="ms-1">{{ $segment['segments'][1][0]['baggage']}}</span></div>
                                                <div><i class="bi bi-suitcase-lg-fill"></i><span class="ms-1">{{ $segment['segments'][1][0]['cabin_baggage']}}</span></div>
                                            </div>
                                            <div class="bh-city-adjust">{{ end($segment['segments'][1])['arrival']['time'] }}</div>
                                        </div>
                                        <img src="{{ url('public/assets/images/list-rigth-img.png') }}" class="list-right-img">
                                    </div>
                                </div>
                            </div>
                            <!-- price and seat -->
                            <div class="col-sm-3 col-12 total-price-border bg-white d-flex align-items-center justify-content-center">
                                <div class="col">
                                    <div class="p-2">
                                        <div class="per-seat-price">
                                            <p class="text-muted mb-1 seat-text-size1">Price</p>

                                            <h3 class="text-primary fw-bold mb-1 seat-text-size3">{{$segment['segments'][0][0]['currency']}} {{$segment['segments'][0][0]['price']}}
                                            </h3>
                                        </div>

                                        <form class="" action="{{ route('booking') }}" name="" method="post">
                                            @csrf
                                            <input name="routes" type="hidden" value="{{ encrypt(json_encode($segment))}}">
                                            <input name="booking_data" type="hidden" value="{{ encrypt(json_encode($segment['segments'][0][0]['booking_data'])) }}">
                                            <div class="d-grid mb-2">
                                                <button class="btn btn-primary fw-bold bh-book-now" >Book Now</button>
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


    @php
        $i = 1;
    @endphp
        <!-- first tickets -->
    @foreach($flights_data as $key=>$segments)

        <!-- fligth deatil popup section -->
        <div class="offcanvas offcanvas-end BP-offcanvas-flight-details" tabindex="-1" id="flightDetailsOffcanvas_{{$i}}" data-bs-backdrop="true">
            <div class="BP-offcanvas-header d-flex justify-content-end">
                <button type="button" class="BP-close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="offcanvas-body p-0">
                <ul class="nav BP-nav-tabs px-3 pt-1" id="flightDetailsTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="flight-tab" data-bs-toggle="tab" data-bs-target="#flight_{{$i}}" type="button" role="tab">Flight details</button>
                    </li>
                </ul>
                <div class="tab-content m-3" id="flightDetailsTabContent">


                    <!-- Flight Details Tab -->
                    <div class="tab-pane fade show active" id="flight_{{$i}}" role="tabpanel">
                        @if(isset($flight_search['trip_type']) && $flight_search['trip_type'] == "oneway")
                            @foreach($segments['segments'] as $segment)
                                @foreach($segment as $seg)
                                <div class="row mb-5">
                                    <div class="col-md-2 col-12 BP-logo-main">
                                        <div class="text-center">
                                            <img src="https://assets.duffel.com/img/airlines/for-light-background/full-color-logo/<?= htmlspecialchars($seg['carrier']['operating']) ?>.svg" width="89px" height="89px">
                                        </div>
                                        <div class="BP-logo-sec d-flex justify-content-center align-items-center">
                            <span class="text-center">

                                <span class="text-primary">{{$seg['airline_name']}}</span><br>{{$seg['flight_number']}}<br>{{ isset($flight_search['flight_type']) && $flight_search['flight_type'] ? strtoupper($flight_search['flight_type']) : '' }}
                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-12">
                                        <div class="BP-time-sec">
                                            <div class="BP-city-adjust BP-add-width">{{$seg['departure']['city']}} - {{$seg['departure']['time']}}</div>
                                            <div class="BP-city-adjust text-center text-dark">{{$seg['duration']}}</div>
                                            <div class="BP-city-adjust BP-add-width"><span class="">{{$seg['arrival']['time']}} - {{$seg['arrival']['city']}}</span></div>
                                        </div>
                                        <div class="BP-airport-loc fw-bold">
                                            <div style="width: 30%;">{{$seg['departure']['city_name']}}, {{$seg['departure']['airport_name']}}</div>
                                            <div class="text-center" style="width: 40%;">
                                                <img src="{{ url('public/assets/images/direction.png') }}" class="mb-1 BP-mb-direction1" width="160px" height="9px">
                                            </div>
                                            <div style="width: 30%;">{{$seg['arrival']['airport_name']}}, {{$seg['arrival']['city_name']}}</div>
                                            <img src="{{ url('public/assets/images/BP-circle.png') }}" class="BP-circle-img" width="38px" height="34px">
                                            <img src="{{ url('public/assets/images/list-plane.png') }}" class="BP-plane-icon" width="30px" height="30px">
                                        </div>
                                        <div class="BP-time-sec mt-3">
                                            <div class="BP-city-adjust BP-add-width">{{$seg['departure']['date_convert']}}<br> @if (!empty($seg['departure']['terminal']))Terminal {{ $seg['departure']['terminal'] }}@endif</div>
                                            <div class="BP-city-adjust text-center  text-dark">Non-Stop</div>
                                            <div class="BP-city-adjust BP-add-width"><span class="">{{$seg['arrival']['date_convert']}} <br>@if (!empty($seg['arrival']['terminal']))Terminal {{ $seg['arrival']['terminal'] }}@endif</span></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- layover time -->
                                {{--<div class="row mt-4 mb-4">
                                    <div class="col-md-10 col-12 offset-md-2 position-relative d-flex justify-content-center align-items-center">
                                        <div class="layover-time">Layover: <span class="fw-bold ms-2">14h 35m</span> </div>
                                        <img src="{{ url('public/assets/images/direction.png') }}" width="430px" height="15px" class="position-absolute BP-mb-direction2">
                                    </div>
                                </div>--}}
                            @endforeach
                            @endforeach
                        @endif

                            @if(isset($flight_search['trip_type']) && $flight_search['trip_type'] == "round")
                                @foreach($segments['segments']  as $k => $seg)
                                    @foreach($seg as $key=>$value)

                                        @if($k == 0 )
                                            <div class="mb-2 text-center fs-4 fw-bold">Oneway</div>
                                        @endif
                                        @if($k == 1)
                                            <div class="mb-2 text-center fs-4 fw-bold">Round</div>
                                        @endif
                                        <!-- go way -->
                                        <div class="row border-bottom pb-3">
                                            <div class="col-md-2 col-12 BP-logo-main">
                                                <div class="text-center">
                                                    <img src="https://assets.duffel.com/img/airlines/for-light-background/full-color-logo/<?= htmlspecialchars($value['carrier']['operating']) ?>.svg" width="89px" height="89px">
                                                </div>
                                                <div class="BP-logo-sec d-flex justify-content-center align-items-center">
                                                <span class="text-center">
                                                    <span class="text-primary">{{$value['airline_name']}}</span><br>{{$value['flight_number']}}<br>{{ isset($flight_search['flight_type']) && $flight_search['flight_type'] ? strtoupper($flight_search['flight_type']) : '' }}
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-12">
                                                <div class="BP-time-sec">
                                                    <div class="BP-city-adjust BP-add-width">{{$value['departure']['city']}} - {{$value['departure']['time']}}</div>
                                                    <div class="BP-city-adjust text-center text-dark">{{$value['duration']}}</div>
                                                    <div class="BP-city-adjust BP-add-width"><span class="">{{$value['arrival']['time']}} - {{$value['arrival']['city']}}</span></div>
                                                </div>
                                                <div class="BP-airport-loc fw-bold">
                                                    <div style="width: 30%;">{{$value['departure']['city_name']}}, {{$value['departure']['airport_name']}}</div>
                                                    <div class="text-center" style="width: 40%;">
                                                        <img src="{{ url('public/assets/images/direction.png') }}" class="mb-1 BP-mb-direction1" width="160px" height="9px">
                                                    </div>
                                                    <div style="width: 30%;">{{$value['arrival']['airport_name']}}, {{$value['arrival']['city_name']}}</div>
                                                    <img src="{{ url('public/assets/images/BP-circle.png') }}" class="BP-circle-img" width="38px" height="34px">
                                                    <img src="{{ url('public/assets/images/list-plane.png') }}" class="BP-plane-icon" width="30px" height="30px">
                                                </div>
                                                <div class="BP-time-sec mt-3">
                                                    <div class="BP-city-adjust BP-add-width">{{$value['departure']['date_convert']}}<br> @if (!empty($value['departure']['terminal']))Terminal {{ $value['departure']['terminal'] }}@endif</div>
                                                    <div class="BP-city-adjust text-center  text-dark">Non-Stop</div>
                                                    <div class="BP-city-adjust BP-add-width"><span class="">{{$value['arrival']['date_convert']}} <br>@if (!empty($value['arrival']['terminal']))Terminal {{ $value['arrival']['terminal'] }}@endif</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @endif
                    </div>
                </div>

            </div>

            <!-- popup footer section -->
            <div class="BP-popup-footer">
                <div class="BP-price">
                    <span class="BP-total-price">{{$segments['segments'][0][0]['currency']}} {{$segments['segments'][0][0]['price']}}</span>
                    <span class="text-secondary">/pax</span>
                </div>
                <div class="BP-footer-button">
                    <img src="{{ url('public/assets/images/BP-footer-btn.png') }}" width="36px" height="36px">
                    <button class="BP-footr-button" onclick="window.location.href='{{ url('my_booking') }}'">Book Now</button>
                </div>
            </div>
        </div>
        @php  $i++; @endphp
    @endforeach
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const menuIcon = document.querySelector(".bhw-menu-icon");
            const leftColumn = document.querySelector(".bhw-left-column");

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
        });

    </script>

    <script>

        const toggleBtn = document.getElementById('toggleSearchForm');
        const searchSection = document.getElementById('searchFormSection');

        toggleBtn.addEventListener('click', function () {
            if (searchSection.style.display === "none" || searchSection.style.display === "") {
                searchSection.style.display = "block";
            } else {
                searchSection.style.display = "none";
            }
        });
        // fligth deatail popup
        // Close when clicking outside
        document.getElementById('flightDetailsOffcanvas').addEventListener('click', function(e) {
            if (e.target === this) {
                const offcanvas = bootstrap.Offcanvas.getInstance(this);
                offcanvas.hide();
            }
        });

        // flight list offering tab
        function setActiveTab(clickedTab) {
            // Remove active class from all tabs
            document.querySelectorAll('.option-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Add active class to clicked tab
            clickedTab.classList.add('active');
        }

        function toggleDropdown() {
            // Get the dropdown button and trigger click
            const dropdownButton = document.getElementById('dropdownMenuButton');
            const dropdown = new bootstrap.Dropdown(dropdownButton);
            dropdown.toggle();
        }
        // flight list page
        document.addEventListener("DOMContentLoaded", function() {
            var menuIcon = document.querySelector(".menu-icon");
            var leftColumn = document.querySelector(".left-column");
            var overlay = document.querySelector(".popup-overlay");
            var body = document.body;

            menuIcon.addEventListener("click", function() {
                var isHidden = getComputedStyle(leftColumn).display === "none";

                if (isHidden) {
                    leftColumn.style.display = "block";
                    overlay.style.display = "block";
                    menuIcon.innerHTML = "&#10006;";
                    body.classList.add("popup-open");
                } else {
                    leftColumn.style.display = "none";
                    overlay.style.display = "none";
                    menuIcon.innerHTML = "&#9776;";
                    body.classList.remove("popup-open");
                }
            });

            overlay.addEventListener("click", function() {
                leftColumn.style.display = "none";
                overlay.style.display = "none";
                menuIcon.innerHTML = "&#9776;";
                body.classList.remove("popup-open");
            });
        });





        // fee assistant
        document.addEventListener('DOMContentLoaded', function() {
            // Get all counter buttons
            const decrementButtons = document.querySelectorAll('.FL-decrement');
            const incrementButtons = document.querySelectorAll('.FL-increment');

            // Add event listeners to decrement buttons
            decrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const counterValue = this.nextElementSibling;
                    let value = parseInt(counterValue.textContent);
                    if (value > 0) {
                        value--;
                        counterValue.textContent = value;
                    }
                });
            });

            // Add event listeners to increment buttons
            incrementButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const counterValue = this.previousElementSibling;
                    let value = parseInt(counterValue.textContent);
                    value++;
                    counterValue.textContent = value;
                });
            });

            // Add event listeners to checkboxes to enable/disable counters
            const checkboxes = document.querySelectorAll('.FL-form-check-input');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const counter = this.closest('.FL-fee-item').querySelector('.FL-counter');
                    if (this.checked) {
                        counter.style.opacity = '1';
                        counter.querySelector('.FL-counter-value').textContent = '1';
                    } else {
                        counter.style.opacity = '0.5';
                        counter.querySelector('.FL-counter-value').textContent = '0';
                    }
                });
            });
        });

        // all airlines
        document.addEventListener('DOMContentLoaded', function() {
            // Select all functionality
            const selectAllCheckbox = document.getElementById('FL-selectAllAirlines');
            const airlineCheckboxes = document.querySelectorAll('.FL-airline-checkbox');

            selectAllCheckbox.addEventListener('change', function() {
                const isChecked = this.checked;
                airlineCheckboxes.forEach(checkbox => {
                    checkbox.checked = isChecked;
                });
            });

            // Individual checkbox logic
            airlineCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // If any checkbox is unchecked, uncheck "Select all"
                    if (!this.checked) {
                        selectAllCheckbox.checked = false;
                    }
                    // If all checkboxes are checked, check "Select all"
                    else {
                        const allChecked = Array.from(airlineCheckboxes).every(cb => cb.checked);
                        selectAllCheckbox.checked = allChecked;
                    }
                });
            });

            // Show all airlines functionality
            const showAllBtn = document.getElementById('FL-showAllAirlines');
            const hiddenAirlines = document.getElementById('FL-hiddenAirlines');

            showAllBtn.addEventListener('click', function() {
                if (hiddenAirlines.classList.contains('FL-hidden-airline')) {
                    hiddenAirlines.classList.remove('FL-hidden-airline');
                    this.textContent = 'Show less airlines';
                } else {
                    hiddenAirlines.classList.add('FL-hidden-airline');
                    this.textContent = 'Show all airlines';
                }
            });
        });

        // departure and arivel section

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Duration
            const durationMinInput = document.getElementById('FL-durationMin');
            const durationMaxInput = document.getElementById('FL-durationMax');
            const durationRangeTrack = document.getElementById('FL-durationRangeTrack');
            const durationRangeDisplay = document.getElementById('FL-durationRange');

            function updateDurationSlider() {
                let minVal = parseInt(durationMinInput.value);
                let maxVal = parseInt(durationMaxInput.value);

                if (minVal > maxVal) {
                    [minVal, maxVal] = [maxVal, minVal];
                    durationMinInput.value = minVal;
                    durationMaxInput.value = maxVal;
                }

                const handleWidthPercent = (20 / durationRangeTrack.parentElement.offsetWidth) * 100;
                const minPercent = (minVal / 24) * (100 - handleWidthPercent) + (handleWidthPercent / 2);
                const maxPercent = (maxVal / 24) * (100 - handleWidthPercent) + (handleWidthPercent / 2);

                durationRangeTrack.style.left = minPercent + '%';
                durationRangeTrack.style.right = (100 - maxPercent) + '%';
                durationRangeDisplay.textContent = `${minVal}h - ${maxVal}h`;
            }

            durationMinInput.addEventListener('input', updateDurationSlider);
            durationMaxInput.addEventListener('input', updateDurationSlider);

            // Price
            const priceMinInput = document.getElementById('FL-priceMin');
            const priceMaxInput = document.getElementById('FL-priceMax');
            const priceRangeTrack = document.getElementById('FL-priceRangeTrack');
            const priceRangeDisplay = document.getElementById('FL-priceRange');

            function updatePriceSlider() {
                let minVal = parseInt(priceMinInput.value);
                let maxVal = parseInt(priceMaxInput.value);

                if (minVal > maxVal) {
                    [minVal, maxVal] = [maxVal, minVal];
                    priceMinInput.value = minVal;
                    priceMaxInput.value = maxVal;
                }

                const handleWidthPercent = (20 / priceRangeTrack.parentElement.offsetWidth) * 100;
                const minPercent = ((minVal - {{$minPrice}}) / ({{$maxPrice}} - {{$minPrice}})) * (100 - handleWidthPercent) + (handleWidthPercent / 2);
                const maxPercent = ((maxVal - {{$minPrice}}) / ({{$maxPrice}} - {{$minPrice}})) * (100 - handleWidthPercent) + (handleWidthPercent / 2);

                priceRangeTrack.style.left = minPercent + '%';
                priceRangeTrack.style.right = (100 - maxPercent) + '%';
                priceRangeTrack.style.transition = 'all 0.3s ease';

                priceRangeDisplay.textContent = `$${minVal} - $${maxVal}`;
            }

            priceMinInput.addEventListener('input', updatePriceSlider);
            priceMaxInput.addEventListener('input', updatePriceSlider);

            // Initial load
            updateDurationSlider();
            updatePriceSlider();
        });
    </script>

    <script>
        let selectedAirlines = [];
        let selectedStop = '';
        let selectedReturnStop = '';
        // Place these at the top of DOMContentLoaded
        let selectedMinPrice = null;
        let selectedMaxPrice = null;

        // Wait until DOM is ready
        document.addEventListener('DOMContentLoaded', function () {
            const flightCards = document.querySelectorAll('.main-row-ticket-card');

            // Get price slider elements
            const priceMinSlider = document.getElementById('FL-priceMin');
            const priceMaxSlider = document.getElementById('FL-priceMax');

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

                applyFilters(); // Your filtering logic
            });

            // Oneway stop filter
            document.querySelectorAll('input[name="stop_filter"]').forEach(input => {
                input.addEventListener('change', function () {
                    selectedStop = this.value;

                    applyFilters();
                });
            });

            // Return stop filter
            document.querySelectorAll('input[name="return_stop_filter"]').forEach(input => {
                input.addEventListener('change', function () {
                    selectedReturnStop = this.value;
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
                    const returnStops = card.getAttribute('data-returnstops');
                    const priceAttr = card.getAttribute('data-price');

                    // Convert price to number (removing comma if needed)
                    let price = parseFloat(priceAttr?.replace(/,/g, '') || 0);

                    const airlineMatch = selectedAirlines.length === 0 || selectedAirlines.includes(airline);
                    const stopMatch = selectedStop === '' || selectedStop === stops;
                    const returnStopMatch = selectedReturnStop === '' || selectedReturnStop === returnStops;
                    const priceMatch = (!selectedMinPrice || price >= selectedMinPrice) &&
                        (!selectedMaxPrice || price <= selectedMaxPrice);

                    if (airlineMatch && stopMatch && returnStopMatch && priceMatch) {
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

        });

        function clear_filters() {
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

            // Return stops UI reset
            document.querySelectorAll('input[name="return_stop_filter"]').forEach(r => r.checked = false);
            document.querySelector('input[name="return_stop_filter"][value=""]')?.click();



            const priceMinSlider = document.getElementById('FL-priceMin');
            const priceMaxSlider = document.getElementById('FL-priceMax');
            const priceRangeDisplay = document.getElementById('FL-priceRange');
            const priceRangeTrack = document.getElementById('FL-priceRangeTrack');

            if (priceMinSlider && priceMaxSlider) {
                // Set sliders to default min/max (you can change 100/2000 to dynamic if needed)
                priceMinSlider.value = priceMinSlider.min;
                priceMaxSlider.value = priceMaxSlider.max;

                // Update global variables
                selectedMinPrice = parseInt(priceMinSlider.value);
                selectedMaxPrice = parseInt(priceMaxSlider.value);

                // Update display text
                priceRangeDisplay.textContent = `$${selectedMinPrice} - $${selectedMaxPrice}`;

                // Update visual track
                priceRangeTrack.style.left = "0%";
                priceRangeTrack.style.width = "100%";
            }


            // Show all
            document.querySelectorAll('.main-row-ticket-card').forEach(card => card.style.display = 'flex');
            document.getElementById('flight-count').textContent = `${document.querySelectorAll('.main-row-ticket-card').length} flights found`;

        }

    </script>

@endsection
