@extends('common.layout')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">
    <!-- Main Content -->
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Booking Form -->
        <div class="flex-1">
            <form action="{{ route('booking') }}" method="POST">
                @csrf
                <input type="hidden" name="room" value="{{ encrypt(json_encode($room)) }}">
                <input type="hidden" name="option" value="{{ encrypt(json_encode($booking_option)) }}">
                <input type="hidden" name="booking_data" value="{{ encrypt(json_encode($booking_data)) }}">
                
                <!-- Guest Information -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-5 flex items-center">
                        <i class="fas fa-user mr-3" style="color: #0077BE;"></i>
                        Guest Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition" style="focus:ring-color: #0077BE;" name="user[first_name]" placeholder="Enter first name" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition" name="user[last_name]" placeholder="Enter last name" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition" name="user[email]" placeholder="example@email.com" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition" name="user[phone]" placeholder="+92 300 1234567" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="user[country]" required>
                                <option value="">Select Country</option>
                                <option value="pk">Pakistan</option>
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="ae">United Arab Emirates</option>
                                <option value="sa">Saudi Arabia</option>
                                <option value="fr">France</option>
                                <option value="de">Germany</option>
                                <option value="jp">Japan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Travellers Information -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-5 flex items-center">
                        <i class="fas fa-users mr-3" style="color: #0077BE;"></i>
                        Travellers Information
                    </h2>

                    @for($i=1; $i<=$hotel_search['adults']; $i++)
                    <!-- Adult Traveller -->
                    <div class="mb-6 last:mb-0 p-5 rounded-xl border-2" style="background: linear-gradient(to right, #E6F3FA, #F0F8FC); border-color: #0077BE;">
                        <div class="flex items-center justify-between mb-4 pb-3 border-b-2" style="border-color: #0077BE;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: #0077BE;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">Traveller {{$i}}</h3>
                                    <span class="inline-block px-3 py-0.5 text-white text-xs font-semibold rounded-full mt-0.5" style="background-color: #0077BE;">Adult</span>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="traveller_type_{{$i}}" value="adults"/>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender *</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="adult_gender_{{$i}}" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="adult_first_name_{{$i}}" placeholder="Enter first name" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="adult_last_name_{{$i}}" placeholder="Enter last name" required>
                            </div>
                        </div>
                    </div>
                    @endfor

                    @for($i=1; $i<=$hotel_search['childs']; $i++)
                    <!-- Child Traveller -->
                    <div class="mb-6 last:mb-0 p-5 rounded-xl border-2 mt-6" style="background: linear-gradient(to right, #E6F3FA, #F0F8FC); border-color: #0077BE;">
                        <div class="flex items-center justify-between mb-4 pb-3 border-b-2" style="border-color: #0077BE;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: #0077BE;">
                                    <i class="fas fa-child text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">Child {{$i}}</h3>
                                    <span class="inline-block px-3 py-0.5 text-white text-xs font-semibold rounded-full mt-0.5" style="background-color: #0077BE;">Children</span>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="traveller_child_{{$i}}" value="child"/>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gender *</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="child_gender_{{$i}}" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="child_first_name_{{$i}}" placeholder="Enter first name" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:border-transparent transition bg-white" name="child_last_name_{{$i}}" placeholder="Enter last name" required>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button type="button" class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition flex items-center justify-center gap-2">
                        <i class="fas fa-chevron-left"></i>
                        Back
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 text-white font-semibold rounded-lg transition shadow-lg flex items-center justify-center gap-2" style="background-color: #0077BE;" onmouseover="this.style.backgroundColor='#005A9C'" onmouseout="this.style.backgroundColor='#0077BE'">
                        <i class="fas fa-check"></i>
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>

        <!-- Booking Summary Sidebar -->
        <div class="lg:w-96">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 sticky top-4">
                <div class="text-white p-5 rounded-t-xl" style="background-color: #0077BE;">
                    <h3 class="text-lg font-bold">Booking Summary</h3>
                </div>

                <div class="p-5">
                    <div class="mb-5 pb-5 border-b border-gray-200">
                        <h4 class="text-lg font-bold text-gray-800 mb-2">{{$booking_data['hotel_name']}}</h4>
                        <p class="text-sm text-gray-600 flex items-center gap-2 mb-2">
                            <i class="fas fa-map-pin" style="color: #0077BE;"></i> 
                            {{$booking_data['address']}}
                        </p>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-500">{!! str_repeat('★', $booking_data['stars']) !!}</span>
                            <span class="text-sm text-gray-600">{{$booking_data['stars']}} Star Hotel</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-5 pb-5 border-b border-gray-200">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Room Type</span>
                            <span class="font-semibold text-gray-800">{{$room->name}}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Check-in</span>
                            <span class="font-semibold text-gray-800">{{\Carbon\Carbon::parse($booking_data['checkin'])->format('M d, Y')}}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Check-out</span>
                            <span class="font-semibold text-gray-800">{{\Carbon\Carbon::parse($booking_data['checkout'])->format('M d, Y')}}</span>
                        </div>
                        @php
                            $days = (new DateTime($booking_data['checkin']))->diff(new DateTime($booking_data['checkout']))->days;
                        @endphp
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Nights</span>
                            <span class="font-semibold text-gray-800">{{$days}}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Guests</span>
                            <span class="font-semibold text-gray-800">{{$booking_data['adults']}} Adults</span>
                        </div>
                    </div>

                    <div class="space-y-2 mb-5 pb-5 border-b border-gray-200">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Room Charges ({{$days}} nights)</span>
                            <span class="font-semibold text-gray-800">{{$booking_option['price']}}</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-800">Total Amount</span>
                        <span class="text-2xl font-bold" style="color: #0077BE;">{{$booking_option['price']}}</span>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-xs text-gray-500 flex items-center justify-center gap-1">
                            <i class="fas fa-lock"></i> 
                            Secure & encrypted payment
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    input:focus, select:focus {
        ring-color: #0077BE !important;
        border-color: #0077BE !important;
    }
</style>
@endsection