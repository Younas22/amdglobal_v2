<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HotelBooking extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hotels_booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'booking_code_ref',
        'booking_status_flag',
        'booking_hotel_pnr',
        'booking_fare_base',
        'booking_adult_count',
        'booking_child_count',
        'booking_currency_origin',
        'booking_data',
        'booking_response_json',
        'booking_response_error',
        'booking_payment_state',
        'booking_supplier_name',
        'booking_txn_id',
        'booking_user_data',
        'booking_guest',
        'booking_nationality_code',
        'booking_payment_gateway',
    ];

}
