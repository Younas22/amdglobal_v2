<?php

use App\Http\Controllers\API\AmadeusEnterpriseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FlightsController;
use App\Http\Controllers\API\Hotels\HotelbedsController;
use App\Http\Controllers\API\Hotels\AgodaController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(FlightsController::class)->group(function(){
    Route::get('flights_airports', 'flights_airports');
});

Route::get('/hotel_destinations', [FlightsController::class, 'hotelDestinations']);
Route::get('/countries', [FlightsController::class, 'countries']);

/*
|--------------------------------------------------------------------------
| AmadeusEnterprise API ROUTES
|--------------------------------------------------------------------------
| These routes handle integration with the Amadeus Enterprise API.
|
*/

Route::controller(AmadeusEnterpriseController::class)->group(function(){
    Route::post('amadeus_enterprise/flight_search', 'flight_search');
});
Route::controller(AmadeusEnterpriseController::class)->group(function(){
    Route::post('amadeus_enterprise/booking', 'booking');
});
//Route::controller(AmadeusEnterpriseController::class)->group(function(){
//    Route::post('amadeus_enterprise/get_fare_calendar', 'get_fare_calendar');
//});

/*
|--------------------------------------------------------------------------
| HOTELBEDS API ROUTES
|--------------------------------------------------------------------------
|
| These routes handle integration with the Hotelbeds API.
| Each route corresponds to a specific endpoint used to
| search and retrieve hotel data from Hotelbeds.
|
*/
Route::controller(HotelbedsController::class)->group(function(){
    Route::post('hotelbeds/hotel_search', 'hotel_search');
});

Route::controller(HotelbedsController::class)->group(function(){
    Route::post('hotelbeds/hotel_details', 'hotel_details');
});

/*
|--------------------------------------------------------------------------
| Agoda API ROUTES
|--------------------------------------------------------------------------
|
| These routes handle integration with the Agoda API.
| Each route corresponds to a specific endpoint used to
| search and retrieve hotel data from Agoda.
|
*/
Route::controller(AgodaController::class)->group(function(){
    Route::post('agoda/hotel_search', 'hotel_search');
});

