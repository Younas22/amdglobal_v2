<?php
// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'user_id',
        'partner_id',
        'origin_code',
        'destination_code',
        'origin_city',
        'destination_city',
        'route_type',
        'flight_number',
        'airline_name',
        'airline_code',
        'aircraft_type',
        'departure_date',
        'departure_time',
        'arrival_date',
        'arrival_time',
        'flight_duration',
        'adults_count',
        'children_count',
        'infants_count',
        'total_passengers',
        'passengers_details',
        'cabin_class',
        'trip_type',
        'base_amount',
        'taxes_amount',
        'fees_amount',
        'total_amount',
        'currency',
        'commission_amount',
        'commission_rate',
        'payment_status',
        'payment_method',
        'payment_reference',
        'payment_date',
        'status',
        'confirmation_status',
        'pnr_number',
        'ticket_number',
        'special_requests',
        'baggage_info',
        'seat_preferences',
        'meal_preferences',
        'booking_source',
        'api_response',
        'external_booking_id',
        'booked_at',
        'confirmed_at',
        'cancelled_at',
        'refunded_at',
        'cancellation_reason',
        'refund_reason',
        'admin_notes',
        'customer_notes',
        'ip_address',
        'user_agent',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'arrival_date' => 'date',
        'departure_time' => 'datetime:H:i',
        'arrival_time' => 'datetime:H:i',
        'passengers_details' => 'array',
        'baggage_info' => 'array',
        'seat_preferences' => 'array',
        'meal_preferences' => 'array',
        'api_response' => 'array',
        'base_amount' => 'decimal:2',
        'taxes_amount' => 'decimal:2',
        'fees_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'commission_amount' => 'decimal:2',
        'commission_rate' => 'decimal:2',
        'adults_count' => 'integer',
        'children_count' => 'integer',
        'infants_count' => 'integer',
        'total_passengers' => 'integer',
        'flight_duration' => 'integer',
        'booked_at' => 'datetime',
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'refunded_at' => 'datetime',
        'payment_date' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function partner()
    {
        return $this->belongsTo(TravelPartner::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // Scopes
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeRefunded($query)
    {
        return $query->where('status', 'refunded');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('departure_date', '>=', now()->toDateString());
    }

    public function scopePast($query)
    {
        return $query->where('departure_date', '<', now()->toDateString());
    }

    public function scopeToday($query)
    {
        return $query->whereDate('departure_date', today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month);
    }

    // Accessors
    public function getRouteAttribute()
    {
        return $this->origin_code . ' → ' . $this->destination_code;
    }

    public function getBookedDateFormattedAttribute()
    {
        return $this->created_at->format('M j, Y');
    }

    public function getDepartureDateFormattedAttribute()
    {
        return $this->departure_date->format('M j, Y');
    }

    public function getDepartureTimeFormattedAttribute()
    {
        return $this->departure_time->format('H:i');
    }

    public function getArrivalTimeFormattedAttribute()
    {
        return $this->arrival_time->format('H:i');
    }

    public function getFlightTimeRangeAttribute()
    {
        $departure = $this->departure_time->format('H:i');
        $arrival = $this->arrival_time->format('H:i');
        
        // Check if arrival is next day
        if ($this->arrival_date > $this->departure_date) {
            $arrival .= '+1';
        }
        
        return $departure . ' - ' . $arrival;
    }

    public function getPassengersSummaryAttribute()
    {
        $summary = [];
        
        if ($this->adults_count > 0) {
            $summary[] = $this->adults_count . ' Adult' . ($this->adults_count > 1 ? 's' : '');
        }
        
        if ($this->children_count > 0) {
            $summary[] = $this->children_count . ' Child' . ($this->children_count > 1 ? 'ren' : '');
        }
        
        if ($this->infants_count > 0) {
            $summary[] = $this->infants_count . ' Infant' . ($this->infants_count > 1 ? 's' : '');
        }
        
        return implode(', ', $summary);
    }

    public function getTotalAmountFormattedAttribute()
    {
        return '$' . number_format($this->total_amount, 0);
    }

    public function getStatusBadgeClassAttribute()
    {
        return match($this->status) {
            'confirmed' => 'status-confirmed',
            'pending' => 'status-pending',
            'cancelled' => 'status-cancelled',
            'refunded' => 'status-refunded',
            'expired' => 'status-expired',
            default => 'status-pending'
        };
    }

    public function getPartnerNameAttribute()
    {
        return $this->partner ? $this->partner->company_name : 'Direct Booking';
    }

    public function getCustomerAvatarAttribute()
    {
        $initials = strtoupper(substr($this->user->first_name, 0, 1) . substr($this->user->last_name, 0, 1));
        return $initials;
    }

    // Mutators
    public function setBookingReferenceAttribute($value)
    {
        $this->attributes['booking_reference'] = $value ?: $this->generateBookingReference();
    }

    // Methods
    public static function generateBookingReference()
    {
        $year = date('Y');
        $lastBooking = self::whereYear('created_at', $year)
                          ->orderBy('id', 'desc')
                          ->first();
        
        $nextNumber = $lastBooking ? 
            (int) substr($lastBooking->booking_reference, -3) + 1 : 1;
        
        return 'BK-' . $year . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    public function confirm()
    {
        $this->update([
            'status' => 'confirmed',
            'confirmation_status' => 'confirmed',
            'confirmed_at' => now()
        ]);
        
        // Update partner revenue if applicable
        if ($this->partner) {
            $this->partner->incrementBookings();
            $commissionAmount = $this->partner->getCommissionAmount($this->total_amount);
            $this->update(['commission_amount' => $commissionAmount]);
        }
    }

    public function cancel($reason = null)
    {
        $this->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'cancellation_reason' => $reason
        ]);
    }

    public function refund($reason = null)
    {
        $this->update([
            'status' => 'refunded',
            'payment_status' => 'refunded',
            'refunded_at' => now(),
            'refund_reason' => $reason
        ]);
    }

    public function markAsPaid($paymentMethod = null, $paymentReference = null)
    {
        $this->update([
            'payment_status' => 'paid',
            'payment_method' => $paymentMethod,
            'payment_reference' => $paymentReference,
            'payment_date' => now()
        ]);
    }

    public function canBeCancelled()
    {
        return in_array($this->status, ['pending', 'confirmed']) && 
               $this->departure_date->isFuture();
    }

    public function canBeRefunded()
    {
        return $this->status === 'cancelled' && 
               $this->payment_status === 'paid';
    }

    public function isUpcoming()
    {
        return $this->departure_date->isFuture();
    }

    public function isPast()
    {
        return $this->departure_date->isPast();
    }

    public function getDaysUntilDeparture()
    {
        return $this->departure_date->diffInDays(now());
    }

    // Static methods
    public static function getTotalBookings()
    {
        return self::count();
    }

    public static function getConfirmedBookings()
    {
        return self::confirmed()->count();
    }

    public static function getPendingBookings()
    {
        return self::pending()->count();
    }

    public static function getTotalRevenue()
    {
        return self::confirmed()->sum('total_amount');
    }

    public static function getMonthlyRevenue()
    {
        return self::confirmed()->thisMonth()->sum('total_amount');
    }
}