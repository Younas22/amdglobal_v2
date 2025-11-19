<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .btn-primary {
            background-color: #0077BE;
        }
        .btn-primary:hover {
            background-color: #005A9C;
        }
    </style>
</head>
<body class="bg-gray-50">

<div class="max-w-4xl mx-auto p-4">
    <!-- Action Buttons -->
    <div class="flex gap-2 mb-4 justify-end print:hidden">
        <button onclick="window.print()" class="px-3 py-2 border border-gray-300 bg-white text-gray-800 rounded-lg font-semibold text-xs hover:border-blue-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-1.5">
            <i class="fas fa-print"></i> Print
        </button>
        <button onclick="downloadPDF()" class="px-3 py-2 border border-gray-300 bg-white text-gray-800 rounded-lg font-semibold text-xs hover:border-blue-600 hover:bg-blue-50 hover:text-blue-600 transition flex items-center gap-1.5">
            <i class="fas fa-download"></i> Download PDF
        </button>
        <button onclick="sendEmail()" class="px-3 py-2 text-white rounded-lg font-semibold text-xs transition shadow-lg flex items-center gap-1.5 btn-primary">
            <i class="fas fa-envelope"></i> Send Email
        </button>
    </div>

    @php
        $data = json_decode($booking->booking_data);
        $days = (new DateTime($data->booking_data->checkin))->diff(new DateTime($data->booking_data->checkout))->days;
        $guestData = isset($data->guests) ? (is_array($data->guests) ? $data->guests : json_decode($data->guests, true)) : [];
    @endphp

    <!-- Invoice -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-white border-b-4 border-blue-600 p-5" style="border-color: #0077BE;">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-center gap-3">
                    <img src="{{ getSettingImage('business_logo','branding') }}" 
                         alt="FlightHub Logo" 
                         class="h-16 w-auto object-contain">
                </div>

                <div class="text-right">
                    <p class="text-xs text-gray-600 uppercase">Invoice</p>
                    <strong class="text-base font-bold text-gray-800 block">#INV-{{ $booking->booking_code_ref }}</strong>
                    <p class="text-xs text-gray-600">{{ $booking->created_at->format('d M Y') }}</p>
                </div>
            </div>
            
            <!-- Status Badges -->
            <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-gray-700">Booking Status:</span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-800 border border-green-300 rounded font-bold text-xs">
                        <i class="fas fa-check-circle"></i>
                        Confirmed
                    </span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-gray-700">Payment Status:</span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded font-bold text-xs">
                        <i class="fas fa-clock"></i>
                        Pending
                    </span>
                </div>
            </div>
        </div>

        <!-- Body -->
        <div class="p-5">

            <!-- Hotel Information -->
            <div class="mb-4">
                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-200">Hotel Information</h3>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                    <h4 class="font-bold text-gray-900 text-sm mb-1">{{$data->booking_data->hotel_name}}</h4>
                    <p class="text-xs text-gray-600 flex items-center gap-1 mb-1">
                        <i class="fas fa-map-marker-alt text-blue-600"></i>
                        {{$data->booking_data->address}}
                    </p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-yellow-500 text-sm">{!! str_repeat('★', $data->booking_data->stars ?? 5) !!}</span>
                        <span class="text-xs text-gray-600">{{$data->booking_data->stars ?? 5}} Star Hotel</span>
                    </div>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-3 mb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-xs">
                    <div>
                        <div class="text-gray-600 font-semibold mb-0.5">Booking Ref</div>
                        <div class="font-bold text-gray-800">{{$booking->booking_code_ref}}</div>
                    </div>
                    <div>
                        <div class="text-gray-600 font-semibold mb-0.5">Check-in</div>
                        <div class="font-bold text-gray-800">{{\Carbon\Carbon::parse($data->booking_data->checkin)->format('d M Y')}}</div>
                    </div>
                    <div>
                        <div class="text-gray-600 font-semibold mb-0.5">Check-out</div>
                        <div class="font-bold text-gray-800">{{\Carbon\Carbon::parse($data->booking_data->checkout)->format('d M Y')}}</div>
                    </div>
                    <div>
                        <div class="text-gray-600 font-semibold mb-0.5">Nights</div>
                        <div class="font-bold text-gray-800">{{$days}}</div>
                    </div>
                </div>
            </div>

            <!-- Room Details -->
            <div class="mb-4">
                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-200">Room Details</h3>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm mb-1">{{$data->room->name}}</h4>
                            <p class="text-xs text-gray-600">{{$days}} nights</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-bold text-blue-900">{{$data->room->price}} {{$booking->booking_currency_origin}}</div>
                            <div class="text-xs text-gray-600">per stay</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Guest Details Table -->
            <div class="mb-4">
                <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-200">Guest Information</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-[10px] border-collapse">
                        <thead>
                            <tr class="bg-blue-50 border border-gray-300">
                                <th class="border border-gray-300 px-2 py-1.5 text-left font-bold text-blue-900">No.</th>
                                <th class="border border-gray-300 px-2 py-1.5 text-left font-bold text-blue-900">Guest Type</th>
                                <th class="border border-gray-300 px-2 py-1.5 text-left font-bold text-blue-900">Name</th>
                                <th class="border border-gray-300 px-2 py-1.5 text-left font-bold text-blue-900">Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($guestData) && is_array($guestData))
                                @foreach($guestData as $index => $guest)
                            <tr class="border border-gray-300 hover:bg-gray-50">
                                <td class="border border-gray-300 px-2 py-1.5 font-semibold">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-2 py-1.5">
                                    @if(isset($guest['traveller_type']) && $guest['traveller_type'] === 'child')
                                        <span class="inline-block px-2 py-0.5 bg-green-100 text-green-800 rounded text-[9px] font-semibold">Child</span>
                                    @else
                                        <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-800 rounded text-[9px] font-semibold">Adult</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-2 py-1.5 font-semibold">
                                    {{ $guest['first_name'] ?? 'N/A' }} {{ $guest['last_name'] ?? 'N/A' }}
                                </td>
                                <td class="border border-gray-300 px-2 py-1.5">
                                    {{ ucfirst($guest['gender'] ?? 'N/A') }}
                                </td>
                            </tr>
                                @endforeach
                            @else
                            <!-- Sample Data -->
                            <tr class="border border-gray-300 hover:bg-gray-50">
                                <td class="border border-gray-300 px-2 py-1.5 font-semibold">1</td>
                                <td class="border border-gray-300 px-2 py-1.5">
                                    <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-800 rounded text-[9px] font-semibold">Adult</span>
                                </td>
                                <td class="border border-gray-300 px-2 py-1.5 font-semibold">Ahmed Khan</td>
                                <td class="border border-gray-300 px-2 py-1.5">Male</td>
                            </tr>
                            <tr class="border border-gray-300 hover:bg-gray-50">
                                <td class="border border-gray-300 px-2 py-1.5 font-semibold">2</td>
                                <td class="border border-gray-300 px-2 py-1.5">
                                    <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-800 rounded text-[9px] font-semibold">Adult</span>
                                </td>
                                <td class="border border-gray-300 px-2 py-1.5 font-semibold">Sarah Khan</td>
                                <td class="border border-gray-300 px-2 py-1.5">Female</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment Method & Price Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
                <!-- Payment Method Dropdown -->
                <div>
                    <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-200">Select Payment Method</h3>
                    <select id="paymentMethod" class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm font-medium text-gray-700 bg-white">
                        <option value="">-- Select Payment Method --</option>
                        <option value="stripe">💳 Stripe (Credit/Debit Card)</option>
                        <option value="paypal">💰 PayPal</option>
                        <option value="bank_transfer">🏦 Bank Transfer</option>
                        <option value="jazz_cash">📱 JazzCash</option>
                        <option value="easypaisa">📱 Easypaisa</option>
                        <option value="credit_card">💳 Credit Card</option>
                        <option value="debit_card">💳 Debit Card</option>
                        <option value="apple_pay">🍎 Apple Pay</option>
                        <option value="google_pay">📱 Google Pay</option>
                        <option value="crypto">₿ Cryptocurrency</option>
                    </select>
                    
                    <div id="paymentError" class="hidden mt-2 text-xs text-red-600 font-semibold">
                        <i class="fas fa-exclamation-circle"></i> Please select a payment method
                    </div>
                </div>

                <!-- Price Summary -->
                <div>
                    <h3 class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2 pb-1 border-b border-gray-200">Price Summary</h3>
                    <div class="bg-blue-50 border-2 border-blue-600 rounded-lg p-3" style="border-color: #0077BE;">
                        <div class="flex justify-between items-center text-xs mb-2 pb-2 border-b border-gray-300">
                            <span class="text-gray-700 font-medium">Room Charges ({{$days}} nights)</span>
                            <span class="font-semibold text-gray-800">{{$data->room->price}} {{$booking->booking_currency_origin}}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs mb-2 pb-2 border-b border-gray-300">
                            <span class="text-gray-700 font-medium">Taxes & Fees</span>
                            <span class="font-semibold text-gray-800">{{$booking->booking_currency_origin}} 0.00</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t-2 border-blue-600" style="border-color: #0077BE;">
                            <span class="text-sm font-bold text-blue-900">Total Amount</span>
                            <span class="text-lg font-bold text-blue-900">{{$data->room->price}} {{$booking->booking_currency_origin}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pay Now Button -->
            <button onclick="processPayment()" class="w-full px-4 py-3 text-white font-bold rounded-lg transition shadow-lg flex items-center justify-center gap-2 text-sm btn-primary print:hidden">
                <i class="fas fa-lock"></i>
                Pay Now
                <i class="fas fa-arrow-right"></i>
            </button>
            
            <div class="mt-2 text-center print:hidden">
                <span class="inline-flex items-center gap-1.5 text-xs text-green-700 bg-green-100 px-2 py-1 rounded-full font-semibold">
                    <i class="fas fa-shield-alt"></i>
                    Secure Payment Gateway
                </span>
            </div>

            <!-- Hotel Policies -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-3 mb-4 mt-4">
                <div class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-2">Hotel Policies</div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-[10px] text-gray-700">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-clock text-blue-600 mt-0.5"></i>
                        <div>
                            <strong>Check-in:</strong> 2:00 PM<br>
                            <strong>Check-out:</strong> 11:00 AM
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fas fa-times-circle text-red-600 mt-0.5"></i>
                        <div>
                            <strong>Cancellation:</strong> Free cancellation until 24 hours before check-in
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fas fa-credit-card text-green-600 mt-0.5"></i>
                        <div>
                            <strong>Payment:</strong> Secure payment via gateway
                        </div>
                    </div>
                    <div class="flex items-start gap-2">
                        <i class="fas fa-concierge-bell text-blue-600 mt-0.5"></i>
                        <div>
                            <strong>Services:</strong> Breakfast included, Free WiFi
                        </div>
                    </div>
                </div>
            </div>

            <!-- Important Information -->
            <div class="bg-gray-50 border-t border-gray-200 rounded-lg p-3">
                <div class="text-xs font-bold text-blue-900 uppercase tracking-wider mb-1">Important Information</div>
                <div class="text-[10px] text-gray-700 leading-relaxed space-y-0.5">
                    <p>• Your booking confirmation will be sent to your email after payment completion.</p>
                    <p>• Valid government-issued photo ID required at check-in.</p>
                    <p>• Early check-in and late check-out subject to availability (additional charges may apply).</p>
                    <p>• For any queries or modifications, contact the hotel directly or visit our website.</p>
                    <p>• This invoice serves as proof of your booking confirmation.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 border-t border-gray-200 p-3 text-center">
            <p class="text-[10px] text-gray-500">© 2025 TravelBooX. All rights reserved. | Computer-generated invoice.</p>
            <p class="text-[10px] text-gray-500">Support: support@travelbooox.com | +92 (21) 1234-5678</p>
        </div>
    </div>
</div>

<script>
    function downloadPDF() {
        alert('PDF download functionality would be implemented');
    }

    function sendEmail() {
        alert('Invoice sent to your email');
    }

    function processPayment() {
        const paymentMethod = document.getElementById('paymentMethod').value;
        const errorDiv = document.getElementById('paymentError');
        
        if (!paymentMethod) {
            errorDiv.classList.remove('hidden');
            document.getElementById('paymentMethod').classList.add('border-red-500', 'ring-2', 'ring-red-500');
            return;
        }
        
        errorDiv.classList.add('hidden');
        document.getElementById('paymentMethod').classList.remove('border-red-500', 'ring-2', 'ring-red-500');
        
        alert('Processing payment via: ' + paymentMethod.toUpperCase().replace('_', ' ') + '...');
        // Add your payment processing logic here
    }

    // Remove error styling when user selects a payment method
    document.getElementById('paymentMethod').addEventListener('change', function() {
        if (this.value) {
            document.getElementById('paymentError').classList.add('hidden');
            this.classList.remove('border-red-500', 'ring-2', 'ring-red-500');
        }
    });
</script>

</body>
</html>