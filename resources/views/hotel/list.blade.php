@extends('common.layout')
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

<div class="hotel-container">
    <!-- Search Collapse -->
    <div class="hotel-search-collapse">
        <button class="hotel-search-collapse-btn" id="searchCollapseBtn">
            <span><i class="fas fa-search"></i> Modify Search</span>
            <i class="fas fa-chevron-down" id="collapseIcon"></i>
        </button>
        <div class="hotel-search-collapse-content" id="searchCollapseContent">
            <style>
            .form-container {
                max-width: 1200px !important;
            }
            </style>
            @include('forms.hotel-form')
        </div>
    </div>
    <!-- Search Info -->
    <div class="hotel-search-info">
        <div class="hotel-search-info-row">
            <div class="hotel-info-item">
                <i class="fas fa-map-pin hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Destination</div>
                    <div class="hotel-info-value">{{ strtoupper(isset($hotel_search['city']) && $hotel_search['city'] ? $hotel_search['city'] : "")}}</div>
                </div>
            </div>
            <div class="hotel-info-item">
                <i class="fas fa-calendar hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Check-in</div>
                    <div class="hotel-info-value">{{ isset($hotel_search['checkin']) && $hotel_search['checkin'] ? \Carbon\Carbon::parse($hotel_search['checkin'])->format('M d, Y') : '' }}</div>
                </div>
            </div>
            <div class="hotel-info-item">
                <i class="fas fa-calendar hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Check-out</div>
                    <div class="hotel-info-value">{{ isset($hotel_search['checkout']) && $hotel_search['checkout'] ? \Carbon\Carbon::parse($hotel_search['checkout'])->format('M d, Y') : '' }}</div>
                </div>
            </div>
            <div class="hotel-info-item">
                <i class="fas fa-users hotel-info-icon"></i>
                <div>
                    <div class="hotel-info-label">Guests</div>
                    <div class="hotel-info-value">{{isset($hotel_search['adults']) && $hotel_search['adults'] ? $hotel_search['adults'] : ""}} Adults, {{isset($hotel_search['rooms']) && $hotel_search['rooms'] ? $hotel_search['rooms'] : ""}} Room</div>
                </div>
            </div>
        </div>
    </div>



    <!-- Main Content -->
    <div class="hotel-main-content">
        <!-- Sidebar Filter -->
        <div class="hotel-sidebar">
            <div class="hotel-filter-section">
                <div class="hotel-filter-title">Price Range</div>
                <input type="range" id="priceSlider" class="hotel-price-slider" min="0" max="20000" value="10000" step="500">
                <div class="hotel-price-display">
                    <span class="hotel-price-label-sm">Max Price:</span>
                    <span class="hotel-price-value-sm" id="priceValue">10,000 PKR</span>
                </div>
            </div>

            <div class="hotel-filter-section">
                <div class="hotel-filter-title">Star Rating</div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="star5" checked>
                    <label for="star5">⭐⭐⭐⭐⭐ 5 Star</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="star4" checked>
                    <label for="star4">⭐⭐⭐⭐ 4 Star</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="star3" checked>
                    <label for="star3">⭐⭐⭐ 3 Star</label>
                </div>
            </div>

            <div class="hotel-filter-section">
                <div class="hotel-filter-title">Amenities</div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="wifi" checked>
                    <label for="wifi">Free WiFi</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="parking" checked>
                    <label for="parking">Free Parking</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="pool" checked>
                    <label for="pool">Swimming Pool</label>
                </div>
                <div class="hotel-filter-option">
                    <input type="checkbox" id="ac" checked>
                    <label for="ac">Air Conditioning</label>
                </div>
            </div>
        </div>


        <!-- Hotel Cards -->
        <div class="hotel-cards-container">

            @if(!empty($hotels) && count($hotels))
            @foreach($hotels as $hotel)
                <div class="hotel-card">
                    <div style="position: relative;">
                        <img src="{{$hotel['images']}}" alt="Pearl Continental" class="hotel-card-image">
                        <div class="hotel-card-badge">{{$hotel['supplier_name']}}</div>
                    </div>
                    <div class="hotel-card-body">
                        <div class="hotel-card-header">
                            <div>
                                <div class="hotel-card-title">{{$hotel['name']}}</div>
                                <div class="hotel-card-location">
                                    <i class="fas fa-map-pin hotel-card-location-icon"></i>
                                    <span>{{$hotel['address']}}</span>
                                </div>
                            </div>
                            <div class="hotel-card-rating">
                                <span class="hotel-card-stars"> {!! str_repeat('★', $hotel['stars']) !!}</span>
                                <span class="hotel-card-rating-number">{{$hotel['stars']}}</span>
                            </div>
                        </div>
                        @if(isset($hotel['room_name']) && $hotel['room_name'])
                        <div class="hotel-card-room-type">{{$hotel['room_name']}}</div>
                        @endif

                        <div class="hotel-card-amenities">
                            <div class="hotel-amenity">
                                <i class="fas fa-wifi hotel-amenity-icon"></i>
                                <span>WiFi</span>
                            </div>
                            <div class="hotel-amenity">
                                <i class="fas fa-car hotel-amenity-icon"></i>
                                <span>Parking</span>
                            </div>
                            <div class="hotel-amenity">
                                <i class="fas fa-water hotel-amenity-icon"></i>
                                <span>Pool</span>
                            </div>
                            <div class="hotel-amenity">
                                <i class="fas fa-snowflake hotel-amenity-icon"></i>
                                <span>AC</span>
                            </div>
                        </div>

                        <div class="hotel-card-footer">
                            <div class="hotel-card-price">
                                <div class="hotel-card-price-label">Per Night</div>
                                <div>
                                    <div class="hotel-card-price-value">{{$hotel['minRate']}} {{$hotel['currency']}}</div>
                                    {{--<div class="hotel-card-price-original">10,000 PKR</div>--}}
                                </div>
                            </div>
                            @if(isset($hotel['redirect']) && $hotel['redirect'])
                                <a href="{{$hotel['redirect']}}" target="_blank">
                                    <button class="hotel-select-btn">Select & Continue</button></a>
                            @else
                            <a href="{{url("hotel/details")}}/{{$hotel['hotel_id']}}/{{ Str::slug(Str::limit($hotel['name'], 30), '-') }}/{{(isset($hotel_search['checkin']) && $hotel_search['checkin'] ? $hotel_search['checkin'] : "")}}/{{(isset($hotel_search['checkout']) && $hotel_search['checkout'] ? $hotel_search['checkout'] : "")}}/{{isset($hotel_search['adults']) && $hotel_search['adults'] ? $hotel_search['adults'] : ""}}/{{isset($hotel_search['childs']) && $hotel_search['childs'] ? $hotel_search['childs'] : "0"}}/{{isset($hotel_search['rooms']) && $hotel_search['rooms'] ? $hotel_search['rooms'] : ""}}/{{$hotel['supplier_name']}}">
                            <button class="hotel-select-btn">Select & Continue</button></a>
                            @endif
                        </div>

                    </div>
                </div>
            @endforeach
            @else
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
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
</script>


@endsection
