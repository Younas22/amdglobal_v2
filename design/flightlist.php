<?php include 'header.php'; ?>
<style>
            .flight-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Search Info */
        .flight-search-info {
            background-color: white;
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 4px solid #0077BE;
        }

        .flight-search-info-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        .flight-info-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .flight-info-label {
            font-size: 11px;
            font-weight: 600;
            color: #003580;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .flight-info-value {
            font-size: 13px;
            font-weight: 600;
            color: #1A1A1A;
        }

        .flight-info-icon {
            color: #0077BE;
            font-size: 14px;
        }

        .flight-modify-btn {
            margin-left: auto;
            background-color: #F0F9FF;
            color: #0077BE;
            border: 1px solid #0077BE;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .flight-modify-btn:hover {
            background-color: #0077BE;
            color: white;
        }

        /* Main Content */
        .flight-main-content {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        @media (min-width: 1024px) {
            .flight-main-content {
                grid-template-columns: 220px 1fr;
            }
        }
</style>


    <div class="flight-container">
            <!-- Search Collapse -->
    <div class="hotel-search-collapse">
        <button class="hotel-search-collapse-btn" id="searchCollapseBtn">
            <span><i class="fas fa-search"></i> Modify Search</span>
            <i class="fas fa-chevron-down" id="collapseIcon"></i>
        </button>
        <div class="hotel-search-collapse-content" id="searchCollapseContent">
             <?php include 'flightform.php'; ?>
        </div>
    </div>
    <!-- Search Info Bar -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex flex-wrap items-center gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-[#0077BE]"></i>
                    <div>
                        <p class="text-xs font-bold text-gray-600">FROM</p>
                        <p class="font-bold text-gray-900">LHE</p>
                    </div>
                </div>
                <i class="fas fa-arrow-right text-gray-400"></i>
                <div class="flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-[#0077BE]"></i>
                    <div>
                        <p class="text-xs font-bold text-gray-600">TO</p>
                        <p class="font-bold text-gray-900">DXB</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-calendar text-[#0077BE]"></i>
                    <div>
                        <p class="text-xs font-bold text-gray-600">DATE</p>
                        <p class="font-bold text-gray-900">22 Oct 2025</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-users text-[#0077BE]"></i>
                    <div>
                        <p class="text-xs font-bold text-gray-600">PASSENGERS</p>
                        <p class="font-bold text-gray-900">2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-5 sticky top-20">
                    <h3 class="text-sm font-bold text-gray-900 mb-4">FILTERS</h3>
                    
                    <!-- Stops (Radio Buttons) -->
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <p class="text-xs font-bold text-gray-600 mb-3">STOPS</p>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="stops" checked class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-sm text-gray-700">All Flights</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="stops" class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-sm text-gray-700">Non Stop</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="stops" class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-sm text-gray-700">1 Stop</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="stops" class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-sm text-gray-700">2 Stops</span>
                            </label>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-6 pb-6 border-b border-gray-200">
                        <p class="text-xs font-bold text-gray-600 mb-3">PRICE</p>
                        <input type="range" min="100" max="2000" value="1000" class="w-full accent-[#0077BE]">
                        <div class="flex justify-between text-xs text-gray-600 mt-2">
                            <span>AED 500</span>
                            <span>AED 2000+</span>
                        </div>
                    </div>

                    <!-- Preferred Airlines -->
                    <div>
                        <p class="text-xs font-bold text-gray-600 mb-3">PREFERRED AIRLINES</p>
                        <div class="space-y-3">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <div class="w-6 h-6 bg-gradient-to-br from-pink-500 to-red-600 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-white">FJ</span>
                                </div>
                                <input type="checkbox" checked class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-xs text-gray-700">Fly Jinnah</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <div class="w-6 h-6 bg-gradient-to-br from-[#0077BE] to-[#0077BE] rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-white">PK</span>
                                </div>
                                <input type="checkbox" checked class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-xs text-gray-700">Pakistan Int'l</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <div class="w-6 h-6 bg-gradient-to-br from-orange-400 to-orange-600 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-white">FN</span>
                                </div>
                                <input type="checkbox" class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-xs text-gray-700">Flynas</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <div class="w-6 h-6 bg-gradient-to-br from-[#0077BE] to-blue-800 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-white">EK</span>
                                </div>
                                <input type="checkbox" class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-xs text-gray-700">Emirates</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <div class="w-6 h-6 bg-gradient-to-br from-red-600 to-red-800 rounded flex items-center justify-center">
                                    <span class="text-xs font-bold text-white">SA</span>
                                </div>
                                <input type="checkbox" class="w-4 h-4 accent-[#0077BE]">
                                <span class="text-xs text-gray-700">Saudi Arabian</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flight Cards -->
            <div class="lg:col-span-3 space-y-4">
                <!-- Flight Card 1 - One Way -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xs text-gray-600 font-semibold">Lahore to Dubai • 0h 0m</p>
                            <p class="text-sm text-gray-500">Wed, 22 Oct 2025</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-600">Total fare</p>
                            <p class="text-2xl font-bold text-gray-900">AED 560.83</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                        <div class="flex-1">
                            <p class="text-3xl font-bold text-gray-900">04:20</p>
                            <p class="text-sm font-semibold text-gray-700">LHE</p>
                        </div>
                        <div class="flex-1 text-center">
                            <div class="flex items-center justify-center mb-2">
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                                <i class="fas fa-plane text-gray-400 mx-4"></i>
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                            </div>
                            <p class="text-xs text-gray-600">11h 20m</p>
                            <p class="text-xs font-semibold text-[#0077BE]">Direct</p>
                        </div>
                        <div class="flex-1 text-right">
                            <p class="text-3xl font-bold text-gray-900">18:55</p>
                            <p class="text-sm font-semibold text-gray-700">DXB</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-suitcase text-gray-600"></i>
                                <span class="text-sm text-gray-700">7 kg</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-ban text-gray-600"></i>
                                <span class="text-sm text-gray-700">No Luggage</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="openDetailsModal()" class="p-2 hover:bg-gray-100 rounded-lg transition" title="Details">
                                <i class="fas fa-circle-info text-gray-600"></i>
                            </button>
                            <button onclick="shareModal()" class="p-2 hover:bg-gray-100 rounded-lg transition" title="Share">
                                <i class="fas fa-share text-gray-600"></i>
                            </button>
                            <button class="px-6 py-2 bg-[#0077BE] text-white rounded-full font-semibold text-sm hover:bg-[#0077BE]">
                                Book →
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Flight Card 2 -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xs text-gray-600 font-semibold">Lahore to Dubai • 0h 0m</p>
                            <p class="text-sm text-gray-500">Wed, 22 Oct 2025</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-600">Total fare</p>
                            <p class="text-2xl font-bold text-gray-900">AED 745.20</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                        <div class="flex-1">
                            <p class="text-3xl font-bold text-gray-900">14:45</p>
                            <p class="text-sm font-semibold text-gray-700">LHE</p>
                        </div>
                        <div class="flex-1 text-center">
                            <div class="flex items-center justify-center mb-2">
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                                <i class="fas fa-plane text-gray-400 mx-4"></i>
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                            </div>
                            <p class="text-xs text-gray-600">10h 30m</p>
                            <p class="text-xs font-semibold text-[#0077BE]">1 Stop</p>
                        </div>
                        <div class="flex-1 text-right">
                            <p class="text-3xl font-bold text-gray-900">17:15</p>
                            <p class="text-sm font-semibold text-gray-700">DXB</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-suitcase text-gray-600"></i>
                                <span class="text-sm text-gray-700">7 kg</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-ban text-gray-600"></i>
                                <span class="text-sm text-gray-700">No Luggage</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="openDetailsModal2()" class="p-2 hover:bg-gray-100 rounded-lg transition" title="Details">
                                <i class="fas fa-circle-info text-gray-600"></i>
                            </button>
                            <button onclick="shareModal()" class="p-2 hover:bg-gray-100 rounded-lg transition" title="Share">
                                <i class="fas fa-share text-gray-600"></i>
                            </button>
                            <button class="px-6 py-2 bg-[#0077BE] text-white rounded-full font-semibold text-sm hover:bg-[#0077BE]">
                                Book →
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Flight Card 3 - Round Trip -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-xs text-gray-600 font-semibold">Lahore ↔ Dubai • Round Trip</p>
                            <p class="text-sm text-gray-500">Wed, 22 Oct - Wed, 29 Oct 2025</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-600">Total fare</p>
                            <p class="text-2xl font-bold text-gray-900">AED 1,128.35</p>
                        </div>
                    </div>

                    <!-- Outbound -->
                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                        <div class="flex-1">
                            <p class="text-3xl font-bold text-gray-900">14:45</p>
                            <p class="text-sm font-semibold text-gray-700">LHE</p>
                        </div>
                        <div class="flex-1 text-center">
                            <div class="flex items-center justify-center mb-2">
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                                <i class="fas fa-plane text-gray-400 mx-4"></i>
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                            </div>
                            <p class="text-xs text-gray-600">10h 30m</p>
                            <p class="text-xs font-semibold text-[#0077BE]">Direct</p>
                        </div>
                        <div class="flex-1 text-right">
                            <p class="text-3xl font-bold text-gray-900">17:15</p>
                            <p class="text-sm font-semibold text-gray-700">DXB</p>
                        </div>
                    </div>

                    <!-- Return -->
                    <div class="flex items-center justify-between mb-4 pb-4 border-gray-200">
                        <div class="flex-1">
                            <p class="text-3xl font-bold text-gray-900">14:45</p>
                            <p class="text-sm font-semibold text-gray-700">DXB</p>
                        </div>
                        <div class="flex-1 text-center">
                            <div class="flex items-center justify-center mb-2">
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                                <i class="fas fa-plane text-gray-400 mx-4"></i>
                                <div class="flex-1 h-0.5 bg-gray-300"></div>
                            </div>
                            <p class="text-xs text-gray-600">10h 30m</p>
                            <p class="text-xs font-semibold text-[#0077BE]">Direct</p>
                        </div>
                        <div class="flex-1 text-right">
                            <p class="text-3xl font-bold text-gray-900">17:15</p>
                            <p class="text-sm font-semibold text-gray-700">LHE</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-suitcase text-gray-600"></i>
                                <span class="text-sm text-gray-700">7 kg</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-ban text-gray-600"></i>
                                <span class="text-sm text-gray-700">No Luggage</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="openRoundTripModal()" class="p-2 hover:bg-gray-100 rounded-lg transition" title="Details">
                                <i class="fas fa-circle-info text-gray-600"></i>
                            </button>
                            <button onclick="shareModal()" class="p-2 hover:bg-gray-100 rounded-lg transition" title="Share">
                                <i class="fas fa-share text-gray-600"></i>
                            </button>
                            <button class="px-6 py-2 bg-[#0077BE] text-white rounded-full font-semibold text-sm hover:bg-[#0077BE]">
                                Book →
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- One Way Modal direct -->
    <div id="flightModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-3xl w-full max-w-2xl border-8 border-white shadow-2xl">
            <div class="">
                <div class="bg-[#0077BE] text-white px-6 py-4 rounded-t-2xl flex justify-between items-start">
                    <div>
                    <h2 class="text-lg font-bold-">Lahore to DXB - 3h 15m</h2>
                    <p class="text-xs text-blue-200">Wed, 22 Oct 2025</p>
                    </div>
                    <button onclick="closeModal()" class="p-1 hover:bg-blue-800 rounded-lg transition">
                    <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <!-- ✳️ Added side borders here -->
                <div class="bg-white px-6 py-5 rounded-b-2xl border-2 border-gray-200 relative">
                    <!-- Airline Info -->
                    <div class="flex justify-between items-start pb-4 border-b border-gray-200 mb-5">
                    <div class="flex gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#0077BE] to-[#0077BE] rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-xs">OV</span>
                        </div>
                        <div>
                        <p class="text-sm font-bold text-gray-900">Salam Air</p>
                        <p class="text-xs text-gray-600">OV 0522 • Economy • NA • E • 0</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="flex gap-2 justify-end mb-1">
                        <i class="fas fa-suitcase text-gray-600 text-xs"></i>
                        <p class="text-xs text-gray-600">7 kg</p>
                        </div>
                        <div class="flex gap-2 justify-end">
                        <i class="fas fa-ban text-gray-600 text-xs"></i>
                        <p class="text-xs text-gray-600">No Luggage</p>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Baggage Policy: -</p>
                    </div>
                    </div>

                    <!-- First Segment -->
                    <div class="grid grid-cols-3 gap-4 border-gray-200">
                    <div class="text-left">
                        <p class="text-2xl font-bold- text-gray-900">LHE 04:20</p>
                        <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                        <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Terminal</p>
                        </div>
                        <p class="text-xs text-gray-600">Lahore</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-clock text-gray-400 text-lg mb-1"></i>
                        <p class="text-xs font-bold text-gray-700">3h 0m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold- text-gray-900">DXB 06:20</p>
                        <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                        <div class="flex items-center justify-end gap-1 mt-2">
                        <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Terminal</p>
                        </div>
                        <p class="text-xs text-gray-600">Muscat International</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- One Way Modal one stop-->
    <div id="flightModal2" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-3xl w-full max-w-2xl border-8 border-white shadow-2xl">
            <div class="">
            <div class="bg-[#0077BE] text-white px-6 py-4 rounded-t-2xl flex justify-between items-start">
                <div>
                <h2 class="text-lg font-bold-">Lahore to Sharjah - 3h 15m</h2>
                <p class="text-xs text-blue-200">Wed, 22 Oct 2025</p>
                </div>
                <button onclick="closeModal2()" class="p-1 hover:bg-blue-800 rounded-lg transition">
                <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- ✳️ Added side borders here -->
            <div class="bg-white px-6 py-5 rounded-b-2xl border-2 border-gray-200 relative">
                <!-- Airline Info -->
                <div class="flex justify-between items-start pb-4 border-b border-gray-200 mb-5">
                <div class="flex gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#0077BE] to-[#0077BE] rounded-lg flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-bold text-xs">OV</span>
                    </div>
                    <div>
                    <p class="text-sm font-bold text-gray-900">Salam Air</p>
                    <p class="text-xs text-gray-600">OV 0522 • Economy • NA • E • 0</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex gap-2 justify-end mb-1">
                    <i class="fas fa-suitcase text-gray-600 text-xs"></i>
                    <p class="text-xs text-gray-600">7 kg</p>
                    </div>
                    <div class="flex gap-2 justify-end">
                    <i class="fas fa-ban text-gray-600 text-xs"></i>
                    <p class="text-xs text-gray-600">No Luggage</p>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Baggage Policy: -</p>
                </div>
                </div>

                <!-- First Segment -->
                <div class="grid grid-cols-3 gap-4 border-gray-200">
                <div class="text-left">
                    <p class="text-2xl font-bold- text-gray-900">LHE 04:20</p>
                    <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                    <div class="flex items-center gap-1 mt-2">
                    <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                    <p class="text-xs text-gray-500">Terminal</p>
                    </div>
                    <p class="text-xs text-gray-600">Lahore</p>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <i class="fas fa-clock text-gray-400 text-lg mb-1"></i>
                    <p class="text-xs font-bold text-gray-700">3h 0m</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold- text-gray-900">MCT 06:20</p>
                    <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                    <div class="flex items-center justify-end gap-1 mt-2">
                    <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                    <p class="text-xs text-gray-500">Terminal</p>
                    </div>
                    <p class="text-xs text-gray-600">Muscat International</p>
                </div>
                </div>

                <!-- Layover Info -->
                <div class="relative flex items-center justify-center my-6">
                <!-- Horizontal line -->
                <div class="absolute w-full h-px bg-gray-300"></div>

                <!-- Center text box -->
                <div class="relative bg-gray-100 border border-gray-300 rounded-full px-4 py-1 shadow-sm">
                    <p class="text-xs font-bold text-gray-700 text-center">
                    Muscat - Layover for 11h 20m
                    </p>
                </div>
                </div>

                <!-- Airline Info Second Flight -->
                <div class="flex justify-between items-start pb-4 border-b border-gray-200 mb-5">
                <div class="flex gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-[#0077BE] to-[#0077BE] rounded-lg flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-bold text-xs">OV</span>
                    </div>
                    <div>
                    <p class="text-sm font-bold text-gray-900">Salam Air</p>
                    <p class="text-xs text-gray-600">OV 0247 • Economy • NA • E • 0</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="flex gap-2 justify-end mb-1">
                    <i class="fas fa-suitcase text-gray-600 text-xs"></i>
                    <p class="text-xs text-gray-600">7 kg</p>
                    </div>
                    <div class="flex gap-2 justify-end">
                    <i class="fas fa-ban text-gray-600 text-xs"></i>
                    <p class="text-xs text-gray-600">No Luggage</p>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Baggage Policy: -</p>
                </div>
                </div>

                <!-- Second Segment -->
                <div class="grid grid-cols-3 gap-4">
                <div class="text-left">
                    <p class="text-2xl font-bold- text-gray-900">MCT 17:40</p>
                    <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                    <div class="flex items-center gap-1 mt-2">
                    <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                    <p class="text-xs text-gray-500">Terminal</p>
                    </div>
                    <p class="text-xs text-gray-600">Muscat International</p>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <i class="fas fa-clock text-gray-400 text-lg mb-1"></i>
                    <p class="text-xs font-bold text-gray-700">1h 15m</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold- text-gray-900">DXB 18:55</p>
                    <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                    <div class="flex items-center justify-end gap-1 mt-2">
                    <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                    <p class="text-xs text-gray-500">Terminal</p>
                    </div>
                    <p class="text-xs text-gray-600">Dubai</p>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>

    <!-- Round Trip Modal -->
    <div id="roundTripModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-3xl w-full max-w-2xl border-8 border-white shadow-2xl">
            <div class="">
                <div class="bg-[#0077BE] text-white px-6 py-4 rounded-t-2xl flex justify-between items-start">
                    <div>
                    <h2 class="text-lg font-bold-">Lahore to DXB - 3h 15m</h2>
                    <p class="text-xs text-blue-200">Wed, 22 Oct 2025</p>
                    </div>
                    <button onclick="closeRoundTripModal()" class="p-1 hover:bg-blue-800 rounded-lg transition">
                    <i class="fas fa-times text-lg"></i>
                    </button>
                </div>

                <!-- ✳️ Added side borders here -->
                <div class="bg-white px-6 py-5 rounded-b-2xl border-2 border-gray-200 relative">
                    <!-- Airline Info -->
                    <div class="flex justify-between items-start pb-4 border-b border-gray-200 mb-5">
                    <div class="flex gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#0077BE] to-[#0077BE] rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-xs">OV</span>
                        </div>
                        <div>
                        <p class="text-sm font-bold text-gray-900">Salam Air</p>
                        <p class="text-xs text-gray-600">OV 0522 • Economy • NA • E • 0</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="flex gap-2 justify-end mb-1">
                        <i class="fas fa-suitcase text-gray-600 text-xs"></i>
                        <p class="text-xs text-gray-600">7 kg</p>
                        </div>
                        <div class="flex gap-2 justify-end">
                        <i class="fas fa-ban text-gray-600 text-xs"></i>
                        <p class="text-xs text-gray-600">No Luggage</p>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Baggage Policy: -</p>
                    </div>
                    </div>

                    <!-- First Segment -->
                    <div class="grid grid-cols-3 gap-4 border-gray-200">
                    <div class="text-left">
                        <p class="text-2xl font-bold- text-gray-900">LHE 04:20</p>
                        <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                        <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Terminal</p>
                        </div>
                        <p class="text-xs text-gray-600">Lahore</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-clock text-gray-400 text-lg mb-1"></i>
                        <p class="text-xs font-bold text-gray-700">3h 0m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold- text-gray-900">DXB 06:20</p>
                        <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                        <div class="flex items-center justify-end gap-1 mt-2">
                        <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Terminal</p>
                        </div>
                        <p class="text-xs text-gray-600">Muscat International</p>
                    </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="bg-[#0077BE] text-white px-6 py-4 rounded-t-2xl flex justify-between items-start mt-4">
                    <div>
                    <h2 class="text-lg font-bold-">DXB to Lahore - 3h 15m</h2>
                    <p class="text-xs text-blue-200">Wed, 22 Oct 2025</p>
                    </div>
                </div>

                <!-- ✳️ Added side borders here -->
                <div class="bg-white px-6 py-5 rounded-b-2xl border-2 border-gray-200 relative">
                    <!-- Airline Info -->
                    <div class="flex justify-between items-start pb-4 border-b border-gray-200 mb-5">
                    <div class="flex gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-[#0077BE] to-[#0077BE] rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-xs">OV</span>
                        </div>
                        <div>
                        <p class="text-sm font-bold text-gray-900">Salam Air</p>
                        <p class="text-xs text-gray-600">OV 0522 • Economy • NA • E • 0</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="flex gap-2 justify-end mb-1">
                        <i class="fas fa-suitcase text-gray-600 text-xs"></i>
                        <p class="text-xs text-gray-600">7 kg</p>
                        </div>
                        <div class="flex gap-2 justify-end">
                        <i class="fas fa-ban text-gray-600 text-xs"></i>
                        <p class="text-xs text-gray-600">No Luggage</p>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Baggage Policy: -</p>
                    </div>
                    </div>

                    <!-- First Segment -->
                    <div class="grid grid-cols-3 gap-4 border-gray-200">
                    <div class="text-left">
                        <p class="text-2xl font-bold- text-gray-900">LHE 04:20</p>
                        <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                        <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Terminal</p>
                        </div>
                        <p class="text-xs text-gray-600">Lahore</p>
                    </div>
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-clock text-gray-400 text-lg mb-1"></i>
                        <p class="text-xs font-bold text-gray-700">3h 0m</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold- text-gray-900">DXB 06:20</p>
                        <p class="text-xs text-gray-600 mt-1">Wed, 22 Oct 2025</p>
                        <div class="flex items-center justify-end gap-1 mt-2">
                        <i class="fas fa-location-dot text-gray-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Terminal</p>
                        </div>
                        <p class="text-xs text-gray-600">Muscat International</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openDetailsModal() {
            document.getElementById('flightModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('flightModal').classList.add('hidden');
        }

        function openDetailsModal2() {
            document.getElementById('flightModal2').classList.remove('hidden');
        }

        function closeModal2() {
            document.getElementById('flightModal2').classList.add('hidden');
        }



        function openRoundTripModal() {
            document.getElementById('roundTripModal').classList.remove('hidden');
        }

        function closeRoundTripModal() {
            document.getElementById('roundTripModal').classList.add('hidden');
        }

        function shareModal() {
            alert('Share flight details - Integration with social/email coming soon');
        }

        document.getElementById('flightModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        document.getElementById('roundTripModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRoundTripModal();
            }
        });
    </script>

    </div>



<?php include 'footer.php';