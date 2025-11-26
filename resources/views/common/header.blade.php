<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Dynamic Meta Title --}}
    <title>{{ getSetting('meta_title', 'seo', 'Default Title') }}</title>

    {{-- Dynamic Meta Description --}}
    <meta name="description" content="{{ getSetting('meta_description', 'seo', 'Default description here...') }}">

    {{-- Dynamic Meta Keywords --}}
    <meta name="keywords" content="{{ getSetting('keywords', 'seo', '') }}">

    {{-- Open Graph (for social sharing) --}}
    <meta property="og:title" content="{{ getSetting('meta_title', 'seo', 'Default OG Title') }}">
    <meta property="og:description" content="{{ getSetting('meta_description', 'seo', 'Default OG Description') }}">
    <meta property="og:image" content="{{ getSettingImage('business_logo', 'branding') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ getSetting('meta_title', 'seo', 'Default Twitter Title') }}">
    <meta name="twitter:description" content="{{ getSetting('meta_description', 'seo', 'Default Twitter Description') }}">
    <meta name="twitter:image" content="{{ getSettingImage('business_logo', 'branding') }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ getSettingImage('favicon', 'branding') }}" type="image/png">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- style.css -->
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/css/style.css') }}">

     <style>
        .top-border{
            border-top-left-radius: 12px; 
            border-top-right-radius: 12px;
        }
        @media (min-width: 1025px) {
            .top-border {
                border-top-left-radius: 0px; 
                border-top-right-radius: 0px;
            }
        }
    </style>

    <!-- Loader Styles -->
    <style>
        #pageLoader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #pageLoader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        #pageLoader img {
            width: 30vw;
            max-width: 300px;
            height: auto;
        }


        .loader-text {
            position: absolute;
            bottom: 30%;
            font-size: 14px;
            color: #0077BE;
            font-weight: 600;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }




    </style>
</head>
<body>


    <!-- Page Loader -->
    <div id="pageLoader">
        <div style="text-align: center;">
            <img id="loaderImage" src="{{ url('public/assets/images/settings/main.gif') }}" alt="Loading...">
            <!-- <p class="loader-text">Loading...</p> -->
        </div>
    </div>

    <!-- <div id="dropdownOverlay" class="dropdown-overlay"></div> -->
    <!-- NAVIGATION BAR -->
    <nav class="nav-bar sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-1 md:py-2 flex items-center justify-between">
            
            <!-- Logo & Name -->
            <!-- <div class="flex items-center gap-2">
                <i class="fas fa-plane text-blue-600 text-2xl"></i>
                <div class="text-xl md:text-2xl font-bold" style="color: #003580;">Travel</div>
            </div> -->

            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ getSettingImage('business_logo','branding') }}" 
                    alt="TravelBookingPanel Logo" 
                    class="img-fluid" 
                    style="max-height: 63px; height: auto; width: auto;">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex gap-8 items-center flex-1 justify-center">
                @foreach (get_menu_items('header') as $item)
                    <a href="{{ $item->full_url }}" class="nav-item">
                        <i class="{{ $item->icon }}"></i>
                        <span>{{ $item->name }}</span>
                    </a>
                @endforeach
            </div>

            <!-- Desktop Sign In Button -->
            <!-- Desktop Sign In + Currency Dropdown -->
            <div class="hidden md:flex gap-3 items-center">
                <button class="btn-signin px-6 py-2.5 font-semibold rounded-lg transition duration-300 text-sm flex items-center gap-2">
                    <i class="fas fa-user"></i>
                    <span>Sign In</span>
                </button>

                <!-- Currency Dropdown -->
                <div class="relative">
                    <select class="currency-select border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white">
                        <option value="USD">$ USD</option>
                        <option value="EUR">€ EUR</option>
                        <option value="GBP">£ GBP</option>
                        <option value="PKR">₨ PKR</option>
                    </select>
                </div>
            </div>


            <!-- Hamburger Menu (Mobile) -->
            <!-- <button class="hamburger md:hidden flex flex-col gap-1.5 cursor-pointer" onclick="toggleMobileMenu()">
                <span class="w-5 h-0.5 transition-all" style="background-color: #1A1A1A;"></span>
                <span class="w-5 h-0.5 transition-all" style="background-color: #1A1A1A;"></span>
                <span class="w-5 h-0.5 transition-all" style="background-color: #1A1A1A;"></span>
            </button> -->

            <button class="hamburger md:hidden flex flex-col gap-1.5 cursor-pointer" onclick="toggleMobileMenu()">
                <span class="line w-6 h-[3px] bg-black rounded transition-all duration-300"></span>
                <span class="line w-6 h-[3px] bg-black rounded transition-all duration-300"></span>
                <span class="line w-6 h-[3px] bg-black rounded transition-all duration-300"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu md:hidden border-t" style="background-color: #F7F9FC; border-color: #E5E7EB;">
            <div class="px-4 py-4 space-y-2">

            @foreach (get_menu_items('header') as $item)
                <a href="{{ $item->full_url }}" class="block font-medium py-3 px-4 rounded-lg hover:bg-blue-50 transition text-sm flex items-center gap-3" style="color: #003580;">
                    <i class="{{ $item->icon }}"></i>
                    <span>{{ $item->name }}</span>
                </a>
            @endforeach


              
                <hr class="border-gray-300 my-4">
<!-- Mobile Sign In + Currency Dropdown -->
<div class="px-4 py-4 space-y-2">
    <button class="btn-signin w-full px-4 py-2.5 font-semibold rounded-lg transition text-sm flex items-center justify-center gap-2">
        <i class="fas fa-user"></i>
        <span>Sign In</span>
    </button>

    <!-- Currency Dropdown -->
    <select class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm bg-white mt-2">
        <option value="USD">$ USD</option>
        <option value="EUR">€ EUR</option>
        <option value="GBP">£ GBP</option>
        <option value="PKR">₨ PKR</option>
    </select>
</div>

            </div>
        </div>
    </nav>