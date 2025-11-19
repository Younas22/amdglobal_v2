@extends('common.layout')
@section('content')

<div class="max-w-7xl mx-auto px-4 py-8">
    <form method="post" id="MSF-multiStepForm" action="{{ route('flight_booking') }}" class="flex flex-col lg:flex-row gap-6">
        @csrf
        <input type="hidden" name="flight_segment" value="{{ encrypt(json_encode($routes))}}">
        <input type="hidden" name="booking_data" value="{{ encrypt(json_encode($booking_data)) }}">
        <input type="hidden" name="currency" value="{{ encrypt($routes->segments[0][0]->currency)}}">
        <input type="hidden" name="price" value="{{ encrypt($routes->segments[0][0]->price)}}">
        <input type="hidden" name="partner_name" value="{{ encrypt($routes->segments[0][0]->supplier)}}">

        <!-- Left Section -->
        <div class="flex-1 space-y-6">
            <!-- Personal Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-user-circle text-blue-600 mr-3" style="color: #0077BE;"></i>
                    Personal Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[first_name]" placeholder="Enter first name" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[last_name]" placeholder="Enter last name" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[email]" placeholder="example@gmail.com" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                        <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[phone]" placeholder="+92-300-1234567" required>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[address]" placeholder="Enter your address" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[city]" placeholder="Enter city" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="user[country]" required>
                            <option value="">Select Country</option>
                            <option value="pk">Pakistan</option>
                            <option value="sa">Saudi Arabia</option>
                            <option value="ae">United Arab Emirates</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Travellers Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-users text-blue-600 mr-3" style="color: #0077BE;"></i>
                    Travellers Information
                </h2>

                @for($i=1; $i<=$session_data['adults']; $i++)
                <div class="mb-8 last:mb-0 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border-2 border-blue-100">
                    <!-- Traveller Header -->
                    <div class="flex items-center justify-between mb-6 pb-4 border-b-2 border-blue-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center"  style="background-color: #0077BE;">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Traveller {{$i}}</h3>
                                <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full mt-1" style="background-color: #0077BE;">Adult</span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="traveller_type_{{$i}}" value="adults"/>

                    <!-- Gender and DOB Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gender *</label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white" name="gender_{{$i}}" required>
                                <option value="">Select Gender</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth *</label>
                            <div class="grid grid-cols-3 gap-2">
                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-sm" name="dob_day_{{$i}}" required>
                                    <option value="">Day</option>
                                    @for($d=1; $d<=31; $d++)
                                    <option value="{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}</option>
                                    @endfor
                                </select>

                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-sm" name="dob_month_{{$i}}" required>
                                    <option value="">Month</option>
                                    <option value="1">Jan</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Mar</option>
                                    <option value="4">Apr</option>
                                    <option value="5">May</option>
                                    <option value="6">Jun</option>
                                    <option value="7">Jul</option>
                                    <option value="8">Aug</option>
                                    <option value="9">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>

                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-sm" name="dob_year_{{$i}}" required>
                                    <option value="">Year</option>
                                    @for($y=2023; $y>=1920; $y--)
                                    <option value="{{$y}}" {{ $y == 1984 ? 'selected' : '' }}>{{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Name Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white" name="first_name_{{$i}}" placeholder="As per passport" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white" name="last_name_{{$i}}" placeholder="As per passport" required>
                        </div>
                    </div>

                    <!-- Passport Details Section -->
                    <div class="mt-6 p-4 bg-white rounded-lg border border-gray-200">
                        <h4 class="font-semibold text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-passport mr-2 text-blue-600" style="color: #0077BE;"></i>
                            Passport Details
                        </h4>

                        <!-- Passport Number and Nationality -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Passport Number *</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="passport_{{$i}}" placeholder="AB123456" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nationality *</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" name="nationality_{{$i}}" required>
                                    <option value="">Select Nationality</option>
                                    <option value="pk">Pakistan</option>
                                    <option value="sa">Saudi Arabia</option>
                                    <option value="ae">United Arab Emirates</option>
                                    <option value="us">United States</option>
                                    <option value="uk">United Kingdom</option>
                                </select>
                            </div>
                        </div>

                        <!-- Passport Issuance Date -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Passport Issuance Date *</label>
                            <div class="grid grid-cols-3 gap-2">
                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm" name="passport_issuance_day_{{$i}}" required>
                                    <option value="">Day</option>
                                    @for($d=1; $d<=31; $d++)
                                    <option value="{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}</option>
                                    @endfor
                                </select>

                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm" name="passport_issuance_month_{{$i}}" required>
                                    <option value="">Month</option>
                                    <option value="1">Jan</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Mar</option>
                                    <option value="4">Apr</option>
                                    <option value="5">May</option>
                                    <option value="6">Jun</option>
                                    <option value="7">Jul</option>
                                    <option value="8">Aug</option>
                                    <option value="9">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>

                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm" name="passport_issuance_year_{{$i}}" required>
                                    <option value="">Year</option>
                                    @for($y=2023; $y>=1920; $y--)
                                    <option value="{{$y}}" {{ $y == 2020 ? 'selected' : '' }}>{{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <!-- Passport Expiry Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Passport Expiry Date *</label>
                            <div class="grid grid-cols-3 gap-2">
                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm" name="passport_day_expiry_{{$i}}" required>
                                    <option value="">Day</option>
                                    @for($d=1; $d<=31; $d++)
                                    <option value="{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}</option>
                                    @endfor
                                </select>

                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm" name="passport_month_expiry_{{$i}}" required>
                                    <option value="">Month</option>
                                    <option value="1">Jan</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Mar</option>
                                    <option value="4">Apr</option>
                                    <option value="5">May</option>
                                    <option value="6">Jun</option>
                                    <option value="7">Jul</option>
                                    <option value="8">Aug</option>
                                    <option value="9">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>

                                <select class="px-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm" name="passport_year_expiry_{{$i}}" required>
                                    <option value="">Year</option>
                                    @for($y=2043; $y>=2023; $y--)
                                    <option value="{{$y}}" {{ $y == 2025 ? 'selected' : '' }}>{{$y}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Payment Methods -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-credit-card text-blue-600 mr-3" style="color: #0077BE;"></i>
                    Payment Methods
                </h2>

                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">
                    <input type="radio" name="accept_payment" value="stripe" checked class="w-5 h-5 text-blue-600">
                    <img src="{{ url('public/assets/images/stripe.png') }}" alt="Stripe" class="w-20 ml-4">
                    <div class="ml-4">
                        <div class="font-semibold text-gray-800">Stripe</div>
                        <div class="text-sm text-gray-600">Credit/Debit Card</div>
                    </div>
                </label>

                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition">
                    <input type="radio" name="accept_payment" value="payone" checked class="w-5 h-5 text-blue-600">
                    <img src="{{ url('public/assets/images/settings/payment/payone.jpeg') }}" alt="payone" class="w-20 ml-4">
                    <div class="ml-4">
                        <div class="font-semibold text-gray-800">Payone</div>
                        <div class="text-sm text-gray-600">Accept 3D secure credit cards</div>
                    </div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4">
                <button type="button" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </button>
                <button type="submit" style="background-color: #0077BE;" class="flex-1 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition flex items-center justify-center gap-2">
                    Pay Now
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <!-- Right Sidebar (Flight Details) - Keep your existing sidebar code here -->
        <div class="lg:w-96">
    <div class="right-sidebar">
        <!-- Flight Details - One Way -->
        @if(isset($session_data['trip_type']) && $session_data['trip_type'] == "oneway")
            @foreach($routes->segments as $rout)
        <div class="sidebar-card">
            <div class="sidebar-card-header">
                <div class="sidebar-card-title">Outbound Flight</div>
            </div>
            <div class="sidebar-card-body">
                <!-- Timer -->
                <div class="timer-box">
                    <div class="timer-icon">
                        <i class="fas fa-hourglass-end"></i>
                    </div>
                    <div class="timer-content">
                        <div class="timer-label">Complete Booking In</div>
                        <div class="timer-time" id="timer">30:00</div>
                    </div>
                </div>

                <!-- Airline Info -->
                <div class="flight-airline">
                    <div class="airline-logo">KU</div>
                    <div class="airline-info">
                        <div class="airline-name">{{$rout[0]->airline_name}}</div>
                        <div class="airline-flight">Flight {{$rout[0]->flight_number}} • {{ $rout[0]->departure->airport }}- {{ end($rout)->arrival->airport }}</div>
                    </div>
                </div>

                <div class="flight-detail">
                    <div class="flight-detail-label">Route</div>
                    <div class="flight-route">
                        <span class="flight-route-item">  {{ $rout[0]->departure->airport }}</span>
                        <span class="flight-route-arrow">→</span>
                        <span class="flight-route-item">{{ end($rout)->arrival->airport }}</span>
                    </div>
                </div>

                <div class="flight-detail">
                    <div class="flight-detail-label">Date</div>
                    <div class="flight-detail-value">{{ $rout[0]->departure->date_convert }}</div>
                </div>

                <div class="flight-detail">
                    <div class="flight-detail-label">Time</div>
                    <div class="flight-detail-value">{{ $rout[0]->departure->time }} - {{ $rout[0]->arrival->time }}</div>
                </div>
                @php
                    $oneWaySegments = $rout;
                    $stopsCount = count($oneWaySegments) - 1;

                    if ($stopsCount == 0) {
                        $stop = "";
                    } else {
                        $stop = "($stopsCount Stop)";
                    }
                @endphp

               <div class="flight-detail">
                   <div class="flight-detail-label">Duration</div>
                   <div class="flight-detail-value">{{$rout[0]->total_duration}} {{$stop}}</div>
               </div>

               <div class="flight-detail">
                   <div class="flight-detail-label">Baggage</div>
                   <div class="flight-detail-value">{{ $rout[0]->baggage}} + {{ $rout[0]->cabin_baggage}}</div>
               </div>
           </div>
       </div>
            @endforeach
       @endif

       @if(isset($session_data['trip_type']) && $session_data['trip_type'] == 'round')
           @php
               $rout = $routes->segments;
               @endphp

                <div class="sidebar-card">
                    <div class="sidebar-card-header">
                        <div class="sidebar-card-title">Outbound Flight</div>
                    </div>
                    <div class="sidebar-card-body">
                        <!-- Timer -->
                        <div class="timer-box">
                            <div class="timer-icon">
                                <i class="fas fa-hourglass-end"></i>
                            </div>
                            <div class="timer-content">
                                <div class="timer-label">Complete Booking In</div>
                                <div class="timer-time" id="timer">30:00</div>
                            </div>
                        </div>

                        <!-- Airline Info -->
                        <div class="flight-airline">
                            <div class="airline-logo">{{$rout[0][0]->carrier->marketing}}</div>
                            <div class="airline-info">
                                <div class="airline-name">{{$rout[0][0]->airline_name}}</div>
                                <div class="airline-flight">Flight {{$rout[0][0]->flight_number}} • {{ $rout[0][0]->departure->airport }}- {{ end($rout[0])->arrival->airport }}</div>
                            </div>
                        </div>

                        <div class="flight-detail">
                            <div class="flight-detail-label">Route</div>
                            <div class="flight-route">
                                <span class="flight-route-item">  {{ $rout[0][0]->departure->airport }}</span>
                                <span class="flight-route-arrow">→</span>
                                <span class="flight-route-item">{{ end($rout[0])->arrival->airport }}</span>
                            </div>
                        </div>

                        <div class="flight-detail">
                            <div class="flight-detail-label">Date</div>
                            <div class="flight-detail-value">{{ $rout[0][0]->departure->date_convert }}</div>
                        </div>

                        <div class="flight-detail">
                            <div class="flight-detail-label">Time</div>
                            <div class="flight-detail-value">{{ $rout[0][0]->departure->time }} - {{ $rout[0][0]->arrival->time }}</div>
                        </div>
                        @php
                            $oneWaySegments = $rout[0];
                            $stopsCount = count($oneWaySegments) - 1;

                            if ($stopsCount == 0) {
                                $stop = "";
                            } else {
                                $stop = "($stopsCount Stop)";
                            }
                        @endphp

                        <div class="flight-detail">
                            <div class="flight-detail-label">Duration</div>
                            <div class="flight-detail-value">{{$rout[0][0]->total_duration}} {{$stop}}</div>
                        </div>

                        <div class="flight-detail">
                            <div class="flight-detail-label">Baggage</div>
                            <div class="flight-detail-value">{{ $rout[0][0]->baggage}} + {{ $rout[0][0]->cabin_baggage}}</div>
                        </div>
                    </div>
                </div>

       <!-- Flight Details - Return -->
       <div class="sidebar-card">
           <div class="sidebar-card-header">
               <div class="sidebar-card-title">Return Flight</div>
           </div>
           <div class="sidebar-card-body">
               <!-- Airline Info -->
               <div class="flight-airline">
                   <div class="airline-logo">{{$rout[1][0]->carrier->marketing}}</div>
                   <div class="airline-info">
                       <div class="airline-name">{{$rout[1][0]->airline_name}}</div>
                       <div class="airline-flight">Flight {{$rout[1][0]->flight_number}} • {{ $rout[1][0]->departure->airport }}- {{ end($rout[1])->arrival->airport }}</div>
                   </div>
               </div>

               <div class="flight-detail">
                   <div class="flight-detail-label">Route</div>
                   <div class="flight-route">
                       <div class="flight-route">
                           <span class="flight-route-item">  {{ $rout[1][0]->departure->airport }}</span>
                           <span class="flight-route-arrow">→</span>
                           <span class="flight-route-item">{{ end($rout[1])->arrival->airport }}</span>
                       </div>
                   </div>
               </div>

               <div class="flight-detail">
                   <div class="flight-detail-label">Date</div>
                   <div class="flight-detail-value">{{ $rout[1][0]->departure->date_convert }}</div>
               </div>

               <div class="flight-detail">
                   <div class="flight-detail-label">Time</div>
                   <div class="flight-detail-value">{{ $rout[1][0]->departure->time }} - {{ $rout[1][0]->arrival->time }}</div>
               </div>

               @php
                   $retunrSegments = $rout[1];
                   $retunrCount = count($retunrSegments) - 1;

                   if ($retunrCount == 0) {
                       $return_stop = "";
                   } else {
                       $return_stop = "($retunrCount Stop)";
                   }
               @endphp
               <div class="flight-detail">
                   <div class="flight-detail-label">Duration</div>
                   <div class="flight-detail-value">{{$rout[1][0]->total_duration}} {{$return_stop}}</div>
               </div>

               <div class="flight-detail">
                   <div class="flight-detail-label">Baggage</div>
                   <div class="flight-detail-value">{{ $rout[0][0]->baggage}} + {{ $rout[0][0]->cabin_baggage}}</div>
               </div>
           </div>
       </div>
       @endif

       <!-- Price Summary -->
       <div class="sidebar-card">
           <div class="sidebar-card-header">
               <div class="sidebar-card-title">Price Summary</div>
           </div>
           <div class="sidebar-card-body">
               <div class="price-summary">
                   <div class="price-row">
                       <span class="price-label">Base Fare </span>
                       <span class="price-value">{{$routes->segments[0][0]->currency}} {{$routes->segments[0][0]->price}}</span>
                   </div>
                   <div class="price-row">
                       <span class="price-label">Taxes & Fees</span>
                       <span class="price-value">{{$routes->segments[0][0]->currency}} 0.00</span>
                   </div>
                   <div class="price-row">
                       <span class="price-label price-total">Total</span>
                       <span class="price-value price-total">{{$routes->segments[0][0]->currency}} {{$routes->segments[0][0]->price}}</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
        </div>
    </form>
</div>

<script>
   // 30 Minute Timer
   function startTimer() {
       let timeLeft = 30 * 60; // 30 minutes in seconds
       const timerDisplay = document.getElementById('timer');

       const interval = setInterval(() => {
           let minutes = Math.floor(timeLeft / 60);
           let seconds = timeLeft % 60;

           timerDisplay.textContent =
               String(minutes).padStart(2, '0') + ':' +
               String(seconds).padStart(2, '0');

           // Change color when time is running out
           if (timeLeft < 300) { // Last 5 minutes
               timerDisplay.style.color = '#DC2626';
           }

           if (timeLeft === 0) {
               clearInterval(interval);
               timerDisplay.textContent = '00:00';
               alert('Booking time expired! Please start over.');
           }

           timeLeft--;
       }, 1000);
   }

   // Start timer when page loads
   document.addEventListener('DOMContentLoaded', startTimer);
</script>


@endsection
