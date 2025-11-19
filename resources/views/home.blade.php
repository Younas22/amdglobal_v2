@extends('common.layout')
@section('content')

@php
    $activeModules = getActiveModule(); // All active modules
@endphp

<style>
    /* Hero Background Image - Crystal Clear */
    .hero-section {
        background: url('<?=getSettingImage('cover_image', 'homepage')?>') center/cover no-repeat;
        min-height: 700px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding-top: 60px;
    }

    /* Curved Bottom Shape */
    .hero-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 150px;
        background: #F5F7FA;
        border-radius: 50% 50% 0 0 / 100% 100% 0 0;
        z-index: 1;
    }

    .form-container {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        width: 100%;
        max-width: 1000px;
        z-index: 20;
        position: relative;
        margin: 0 auto;
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
        white-space: nowrap;
        min-width: 0;
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

    /* Responsive */
    @media (max-width: 768px) {
        .tab-btn {
            padding: 10px 12px;
            font-size: 13px;
            gap: 4px;
        }

        .tab-btn i {
            font-size: 14px;
        }
    }

    @media (max-width: 640px) {
        .tab-btn {
            padding: 8px 10px;
            font-size: 12px;
            gap: 3px;
        }

        .tab-btn i {
            font-size: 13px;
        }
    }
</style>

<section class="hero-section">
    <div class="hero-content">
        <h1 style="color: white; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
            {{ getSetting('cover_title', 'homepage') }}
        </h1>
        <p style="color: white; text-shadow: 0 2px 8px rgba(0,0,0,0.2);">
            {{ getSetting('cover_subtitle', 'homepage') }}
        </p>
    </div>

    <!-- Search Form Container -->
    <div class="form-container">
        <!-- Tab Buttons -->
        <div class="tab-buttons">
            @php $first = true; @endphp
            @foreach($activeModules as $module)
                @if($module->slug === 'visa')
                    <!-- Visa as a link, not a button -->
                    <a href="{{ route('visa.create') }}" 
                    style="
                        text-decoration: none;
                        flex: 1;
                        padding: 14px 24px;
                        background: transparent;
                        border: none;
                        font-weight: 600;
                        font-size: 15px;
                        color: #6b7280;
                        cursor: pointer;
                        transition: all 0.3s 
                        ease;
                        position: relative;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 8px;
                        white-space: nowrap;
                        min-width: 0;
                    ">
                        <i class="fas fa-passport"></i>
                        {{ ucfirst($module->name) }}
                    </a>
                @else
                    <!-- Hotel and Flight as buttons with data-tab -->
                    <button type="button" class="tab-btn {{ $first ? 'active' : '' }}" data-tab="{{ $module->slug }}">
                        <i class="fas fa-{{ $module->slug === 'hotel' ? 'hotel' : 'plane' }}"></i>
                        {{ ucfirst($module->name) }}
                    </button>
                    @php $first = false; @endphp
                @endif
            @endforeach
        </div>

        <!-- Tab Contents - Include separate files -->
        @php $first = true; @endphp
        @foreach($activeModules as $module)
            @if($module->slug === 'hotel')
                <div class="tab-content {{ $first ? 'active' : '' }}" id="form-{{ $module->slug }}">
                    @include('forms.hotel-form')
                </div>
                @php $first = false; @endphp
            @elseif($module->slug === 'flight')
                <div class="tab-content {{ $first ? 'active' : '' }}" id="form-{{ $module->slug }}">
                    @include('forms.flight-form')
                </div>
            @endif
        @endforeach
    </div>
</section>

    <!-- TRUST & FEATURES SECTION -->
    <div class="bg-white py-12 md:py-16 px-4 mt-10" style="display: none;">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3 style="color: #003580;" class="text-lg md:text-xl font-bold mb-2">Best Price Guarantee</h3>
                    <p style="color: #6B7280;" class="text-sm leading-relaxed">We match any lower price you find on competitor websites</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3 style="color: #003580;" class="text-lg md:text-xl font-bold mb-2">Secure Payment</h3>
                    <p style="color: #6B7280;" class="text-sm leading-relaxed">Your data is encrypted and protected with SSL technology</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3 style="color: #003580;" class="text-lg md:text-xl font-bold mb-2">Trusted by Millions</h3>
                    <p style="color: #6B7280;" class="text-sm leading-relaxed">Real reviews from real travelers booking real hotels</p>
                </div>
            </div>
        </div>
    </div>

@php
    $flightModule = getActiveModule('flight'); // active or null
@endphp
        <!-- POPULAR DESTINATIONS SECTION -->
    <div style="background-color: #F7F9FC; padding: 60px 20px; {{ $flightModule ? '' : 'display:none;' }}">
        <div style="max-width: 1200px; margin: 0 auto;">
            
            <!-- Section Header -->
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 32px; font-weight: bold; color: #003580; margin-bottom: 10px;">Popular Destinations</h2>
                <p style="font-size: 16px; color: #6B7280;">Discover the most loved travel destinations</p>
            </div>

            <!-- Destinations Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                
                <!-- Destination Card 1 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400&h=300&fit=crop" alt="New York" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; right: 12px; background: #FF6B35; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">Popular</div>
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">New York</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">2,450 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $85/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 2 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400&h=300&fit=crop" alt="Paris" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; right: 12px; background: #FF6B35; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">Popular</div>
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">Paris</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">1,890 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $92/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 3 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1480714378408-67cf0d13bc1b?w=400&h=300&fit=crop" alt="Dubai" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; right: 12px; background: #FF6B35; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: bold;">Sale</div>
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">Dubai</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">1,650 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $75/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 4 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=300&fit=crop" alt="Tokyo" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">Tokyo</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">2,120 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $95/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 5 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=300&fit=crop" alt="London" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">London</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">1,750 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $88/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 6 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop" alt="Sydney" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">Sydney</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">980 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $105/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 7 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400&h=300&fit=crop" alt="Bangkok" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">Bangkok</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">1,340 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $45/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

                <!-- Destination Card 8 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 24px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-4px)'" onmouseout="this.style.boxShadow='0 2px 8px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 200px;">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&h=300&fit=crop" alt="Bali" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div style="padding: 16px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 8px;">Bali</h3>
                        <p style="font-size: 14px; color: #6B7280; margin-bottom: 12px;">1,200 hotels available</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 14px; color: #0077BE; font-weight: bold;">From $35/night</span>
                            <span style="font-size: 12px; color: #FF6B35;">→</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- View All Button -->
            <!-- <div style="text-align: center; margin-top: 40px;">
                <button style="background-color: #0077BE; color: white; border: none; padding: 12px 40px; font-size: 14px; font-weight: bold; border-radius: 6px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 119, 190, 0.15);" onmouseover="this.style.backgroundColor='#0066A1'; this.style.boxShadow='0 4px 12px rgba(0, 119, 190, 0.3)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.backgroundColor='#0077BE'; this.style.boxShadow='0 2px 8px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(0)'">
                    View All Destinations
                </button>
            </div> -->
        </div>
    </div>

@php
    $hotelModule = getActiveModule('hotel'); // active or null
@endphp
    <!-- FEATURED HOTELS SECTION -->
    <div style="background-color: white; padding: 60px 20px; {{ $hotelModule ? '' : 'display:none;' }}">
        <div style="max-width: 1200px; margin: 0 auto;">
            
            <!-- Section Header -->
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="font-size: 32px; font-weight: bold; color: #003580; margin-bottom: 10px;">Trending Hotels</h2>
                <p style="font-size: 16px; color: #6B7280;">Stay at the most loved and highly-rated hotels</p>
            </div>

            <!-- Hotels Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px;">
                
                <!-- Hotel Card 1 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 12px 32px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-8px)'" onmouseout="this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 220px;">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=400&h=300&fit=crop" alt="Luxury Hotel" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; left: 12px; background: #FF6B35; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: bold;">Featured</div>
                        <div style="position: absolute; top: 12px; right: 12px; background: white; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; font-size: 18px;" onmouseover="this.style.backgroundColor='#FF6B35'; this.style.color='white'" onmouseout="this.style.backgroundColor='white'; this.style.color='#FF6B35'">♥</div>
                    </div>
                    <div style="padding: 20px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 6px;">Grand Luxury Hotel</h3>
                        <p style="font-size: 13px; color: #6B7280; margin-bottom: 12px;">New York, United States</p>
                        
                        <!-- Rating -->
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="display: flex; gap: 2px;">
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                            </div>
                            <span style="font-size: 12px; color: #6B7280;">(324 reviews)</span>
                        </div>

                        <!-- Amenities -->
                        <div style="display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap;">
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">WiFi</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Pool</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Gym</span>
                        </div>

                        <!-- Price -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #F0F4F8;">
                            <div>
                                <span style="font-size: 12px; color: #6B7280;">Starting from</span>
                                <p style="font-size: 20px; font-weight: bold; color: #0077BE; margin: 0;">$245</p>
                            </div>
                            <button style="background-color: #0077BE; color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0066A1'" onmouseout="this.style.backgroundColor='#0077BE'">View</button>
                        </div>
                    </div>
                </div>

                <!-- Hotel Card 2 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 12px 32px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-8px)'" onmouseout="this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 220px;">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=300&fit=crop" alt="Modern Hotel" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; left: 12px; background: #FF6B35; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: bold;">Featured</div>
                        <div style="position: absolute; top: 12px; right: 12px; background: white; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; font-size: 18px;" onmouseover="this.style.backgroundColor='#FF6B35'; this.style.color='white'" onmouseout="this.style.backgroundColor='white'; this.style.color='#FF6B35'">♥</div>
                    </div>
                    <div style="padding: 20px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 6px;">Modern Boutique Hotel</h3>
                        <p style="font-size: 13px; color: #6B7280; margin-bottom: 12px;">Paris, France</p>
                        
                        <!-- Rating -->
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="display: flex; gap: 2px;">
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #D1D5DB;">★</span>
                            </div>
                            <span style="font-size: 12px; color: #6B7280;">(287 reviews)</span>
                        </div>

                        <!-- Amenities -->
                        <div style="display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap;">
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">WiFi</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Restaurant</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Parking</span>
                        </div>

                        <!-- Price -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #F0F4F8;">
                            <div>
                                <span style="font-size: 12px; color: #6B7280;">Starting from</span>
                                <p style="font-size: 20px; font-weight: bold; color: #0077BE; margin: 0;">$189</p>
                            </div>
                            <button style="background-color: #0077BE; color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0066A1'" onmouseout="this.style.backgroundColor='#0077BE'">View</button>
                        </div>
                    </div>
                </div>

                <!-- Hotel Card 3 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 12px 32px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-8px)'" onmouseout="this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 220px;">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=300&fit=crop" alt="Beach Resort" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; left: 12px; background: #FF6B35; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: bold;">Trending</div>
                        <div style="position: absolute; top: 12px; right: 12px; background: white; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; font-size: 18px;" onmouseover="this.style.backgroundColor='#FF6B35'; this.style.color='white'" onmouseout="this.style.backgroundColor='white'; this.style.color='#FF6B35'">♥</div>
                    </div>
                    <div style="padding: 20px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 6px;">Tropical Beach Resort</h3>
                        <p style="font-size: 13px; color: #6B7280; margin-bottom: 12px;">Bali, Indonesia</p>
                        
                        <!-- Rating -->
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="display: flex; gap: 2px;">
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                            </div>
                            <span style="font-size: 12px; color: #6B7280;">(412 reviews)</span>
                        </div>

                        <!-- Amenities -->
                        <div style="display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap;">
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Beach</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Spa</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">WiFi</span>
                        </div>

                        <!-- Price -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #F0F4F8;">
                            <div>
                                <span style="font-size: 12px; color: #6B7280;">Starting from</span>
                                <p style="font-size: 20px; font-weight: bold; color: #0077BE; margin: 0;">$128</p>
                            </div>
                            <button style="background-color: #0077BE; color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0066A1'" onmouseout="this.style.backgroundColor='#0077BE'">View</button>
                        </div>
                    </div>
                </div>

                <!-- Hotel Card 4 -->
                <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 12px 32px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(-8px)'" onmouseout="this.style.boxShadow='0 2px 12px rgba(0, 0, 0, 0.08)'; this.style.transform='translateY(0)'">
                    <div style="position: relative; overflow: hidden; height: 220px;">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=300&fit=crop" alt="City Hotel" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                        <div style="position: absolute; top: 12px; left: 12px; background: #FF6B35; color: white; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: bold;">Sale</div>
                        <div style="position: absolute; top: 12px; right: 12px; background: white; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease; font-size: 18px;" onmouseover="this.style.backgroundColor='#FF6B35'; this.style.color='white'" onmouseout="this.style.backgroundColor='white'; this.style.color='#FF6B35'">♥</div>
                    </div>
                    <div style="padding: 20px;">
                        <h3 style="font-size: 18px; font-weight: bold; color: #003580; margin-bottom: 6px;">Downtown City Hotel</h3>
                        <p style="font-size: 13px; color: #6B7280; margin-bottom: 12px;">Dubai, UAE</p>
                        
                        <!-- Rating -->
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                            <div style="display: flex; gap: 2px;">
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #FF6B35;">★</span>
                                <span style="color: #D1D5DB;">★</span>
                            </div>
                            <span style="font-size: 12px; color: #6B7280;">(195 reviews)</span>
                        </div>

                        <!-- Amenities -->
                        <div style="display: flex; gap: 8px; margin-bottom: 14px; flex-wrap: wrap;">
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Gym</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">WiFi</span>
                            <span style="background-color: #F0F4F8; color: #0077BE; padding: 4px 8px; border-radius: 4px; font-size: 11px;">Balcony</span>
                        </div>

                        <!-- Price -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 12px; border-top: 1px solid #F0F4F8;">
                            <div>
                                <span style="font-size: 12px; color: #6B7280;">Starting from</span>
                                <p style="font-size: 20px; font-weight: bold; color: #0077BE; margin: 0;">$156</p>
                            </div>
                            <button style="background-color: #0077BE; color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#0066A1'" onmouseout="this.style.backgroundColor='#0077BE'">View</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- View All Button -->
            <!-- <div style="text-align: center; margin-top: 50px;">
                <button style="background-color: #0077BE; color: white; border: none; padding: 14px 48px; font-size: 15px; font-weight: bold; border-radius: 6px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0, 119, 190, 0.15);" onmouseover="this.style.backgroundColor='#0066A1'; this.style.boxShadow='0 4px 12px rgba(0, 119, 190, 0.3)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.backgroundColor='#0077BE'; this.style.boxShadow='0 2px 8px rgba(0, 119, 190, 0.15)'; this.style.transform='translateY(0)'">
                    Explore More Hotels
                </button>
            </div> -->
        </div>
    </div>



    <section class="how-it-works">
            <div class="section-header">
                <h2>How It Works</h2>
                <p>Book your perfect hotel in just <span class="accent-text">4 simple steps</span>. Fast, easy, and transparent.</p>
            </div>

            <div class="steps-container">
                <!-- Step 1 -->
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-icon">🔍</div>
                    <h3 class="step-title">Search</h3>
                    <p class="step-description">Enter your destination, travel dates, and number of guests to explore available hotels</p>
                    <div class="connector"></div>
                </div>

                <!-- Step 2 -->
                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-icon">⭐</div>
                    <h3 class="step-title">Select</h3>
                    <p class="step-description">Browse through hotels with detailed information, ratings, reviews, and photos</p>
                    <div class="connector"></div>
                </div>

                <!-- Step 3 -->
                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-icon">💳</div>
                    <h3 class="step-title">Book</h3>
                    <p class="step-description">Secure payment with multiple options. Your booking confirmation arrives instantly</p>
                    <div class="connector"></div>
                </div>

                <!-- Step 4 -->
                <div class="step-card">
                    <div class="step-number">4</div>
                    <div class="step-icon">🎉</div>
                    <h3 class="step-title">Enjoy</h3>
                    <p class="step-description">Check in and enjoy your stay. We're here to help if you need anything</p>
                </div>
            </div>

            <div class="cta-section">
                <button class="cta-button">Start Booking Now →</button>
            </div>
    </section>

@endsection