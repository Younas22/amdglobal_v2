<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\HotelController;

// Admin Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/signin', [AuthController::class, 'login'])->name('admin.signin.post');



//Route::get('flight_list', function () {
//    return view('flight_list');
//});
Route::get('my_booking', function () {
    return view('my_booking');
});
Route::get('booked_successfully', function () {
    return view('booked_successfully');
});
Route::get('contact_us', function () {
    return view('contact_us');
});
Route::get('about_us', function () {
    return view('about_us');
});
Route::get('privacy_policy', function () {
    return view('privacy_policy');
});
Route::get('terms_of_use', function () {
    return view('terms_of_use');
});


// HotelController
Route::controller(HotelController::class)->prefix('hotel')->group(function () {
    // Route::get('/', 'index')->name('hotel.home');
    Route::get('/search', 'search')->name('hotel.search');
    Route::get('/details/{hotel_id}/{hotel_name}/{checkin}/{checkout}/{adults}/{chlids}/{rooms}/{supplier_name}', 'details')->name('hotel.details');
    Route::post('/hotel_booking', 'hotel_booking')->name('hotel_booking');
    Route::post('booking',  'booking')->name('booking');
    Route::get('/invoice/{bookingRef}', 'invoice')->name('hotel.invoice');
    Route::get('/demomsg/{bookingRef}', 'hotelbooking')->name('hotel.hotelbooking');
});



// Airport search route for Select2
Route::get('/airports/search', [FlightsController::class, 'searchAirports'])->name('airports.search');



Route::get('/rs', [FlightsController::class, 'remove_session'])->name('remove_session');
Route::get('/flights', [FlightsController::class, 'index'])->name('flights.index');
Route::get('/rs', [FlightsController::class, 'remove_session'])->name('remove_session');
Route::get('/flights/{origin}/{destination}/{trip}/{flight_type}/{departure_date}/{return_date?}/{adult}/{child?}/{infant?}', [FlightsController::class, 'search'])->name('search');
Route::post('/flight_booking', [FlightsController::class, 'flight_booking'])->name('flight_booking');
Route::post('/flights/booking', [FlightsController::class, 'booking'])->name('flights.booking');
Route::get('/flight/invoice/{booking_ref}',  [FlightsController::class, 'invoice'])->name('flight.invoice');

Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('hotels/{country}/{checkin}/{checkout}/{adult}/{child}/{room}/{nationality}', [HotelController::class, 'search']);


Route::get('/payment/{gateway_name}/{booking_ref}',  [FlightsController::class, 'payment'])->name('payment');
Route::get('/payment/success',  [FlightsController::class, 'payment_success'])->name('payment_success');

// visa
Route::get('/visa', [VisaController::class, 'create'])->name('visa.create');
Route::get('/other-visa', [VisaController::class, 'othervisa'])->name('visa.othervisa');
Route::post('/visa-form', [VisaController::class, 'store'])->name('visa.store');
Route::post('/other-visa', [VisaController::class, 'store'])->name('visa.store.other'); // Add this for other visa
Route::get('/visa-success', [VisaController::class, 'success'])->name('visa.success');

// all pages
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/blog', [PagesController::class, 'index'])->name('blog.index');
Route::get('/page/{slug}', [PagesController::class, 'staticPage'])
    ->where('slug', 'about|contact|sitemap|privacy-policy|terms-conditions');
Route::get('/{slug}', [PagesController::class, 'detail'])->name('blog.detail');


