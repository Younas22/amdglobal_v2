<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlightBooking;
use App\Models\HotelBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    
    /**
     * Display all bookings with filters and search
     */
    public function allBookings(Request $request)
    {
        // Get booking type filter (default: all)
        $bookingType = $request->get('type', 'all');

        // Determine which models to query
        if ($bookingType === 'flight') {
            $bookings = $this->getFlightBookings($request);
        } elseif ($bookingType === 'hotel') {
            $bookings = $this->getHotelBookings($request);
        } else {
            // Merge both flight and hotel bookings
            $bookings = $this->getAllBookings($request);
        }
        


        // Calculate statistics
        $stats = $this->getBookingStats($bookingType);

        return view('admin.bookings.all', compact('bookings', 'stats', 'bookingType'));
    }

    /**
     * Get flight bookings with filters
     */
    private function getFlightBookings(Request $request)
    {
        $query = FlightBooking::query();

        // Apply search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Apply payment state filter
        if ($request->filled('payment_state')) {
            $query->byPaymentState($request->payment_state);
        }

        // Apply date range filter
        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        // Get paginated results and add booking_type to each
        $bookings = $query->latest()->paginate(15)->withQueryString();

        // Add booking_type to each item in the collection
        $bookings->getCollection()->transform(function($booking) {
            $booking->booking_type = 'flight';
            return $booking;
        });

        return $bookings;
    }

    /**
     * Get hotel bookings with filters
     */
    private function getHotelBookings(Request $request)
    {
        $query = HotelBooking::query();

        // Apply search filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->byStatus($request->status);
        }

        // Apply payment state filter
        if ($request->filled('payment_state')) {
            $query->byPaymentState($request->payment_state);
        }

        // Apply date range filter
        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        // Get paginated results and add booking_type to each
        $bookings = $query->latest()->paginate(15)->withQueryString();

        // Add booking_type to each item in the collection
        $bookings->getCollection()->transform(function($booking) {
            $booking->booking_type = 'hotel';
            return $booking;
        });

        return $bookings;
    }

    /**
     * Get all bookings (flight + hotel) merged and paginated
     */
    private function getAllBookings(Request $request)
    {
        // Flight bookings query
        $flightQuery = FlightBooking::select(
            'id',
            'booking_code_ref',
            'booking_status_flag',
            'booking_payment_state',
            'booking_user_data',
            'booking_guest',
            'booking_currency_origin',
            'booking_fare_base',
            'created_at'
        )->when($request->filled('search'), fn($q) => $q->search($request->search))
        ->when($request->filled('status'), fn($q) => $q->byStatus($request->status))
        ->when($request->filled('payment_state'), fn($q) => $q->byPaymentState($request->payment_state))
        ->when($request->filled('date_from') || $request->filled('date_to'), function($q) use ($request) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $q->byDateRange($dateFrom, $dateTo);
        })
        ->addSelect(\DB::raw("'flight' as booking_type"));

        // Hotel bookings query
        $hotelQuery = HotelBooking::select(
            'id',
            'booking_code_ref',
            'booking_status_flag',
            'booking_payment_state',
            'booking_user_data',
            'booking_guest',
            'booking_currency_origin',
            'booking_fare_base',
            'created_at'
        )->when($request->filled('search'), fn($q) => $q->search($request->search))
        ->when($request->filled('status'), fn($q) => $q->byStatus($request->status))
        ->when($request->filled('payment_state'), fn($q) => $q->byPaymentState($request->payment_state))
        ->when($request->filled('date_from') || $request->filled('date_to'), function($q) use ($request) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $q->byDateRange($dateFrom, $dateTo);
        })
        ->addSelect(\DB::raw("'hotel' as booking_type"));

        // Union and order by created_at
        $allBookings = $flightQuery->unionAll($hotelQuery)
            ->orderByDesc('created_at')
            ->paginate(15);

        return $allBookings;
    }


    /**
     * Display cancelled and refunded bookings
     */
    public function cancelledRefunds(Request $request)
    {
        $bookingType = $request->get('type', 'all');

        if ($bookingType === 'flight') {
            $bookings = $this->getCancelledFlightBookings($request);
        } elseif ($bookingType === 'hotel') {
            $bookings = $this->getCancelledHotelBookings($request);
        } else {
            $bookings = $this->getAllCancelledBookings($request);
        }

        $stats = $this->getBookingStats($bookingType);
        return view('admin.bookings.cancelled-refunds', compact('bookings', 'stats', 'bookingType'));
    }

    /**
     * Get cancelled flight bookings
     */
    private function getCancelledFlightBookings(Request $request)
    {
        $query = FlightBooking::query()
            ->whereIn('booking_status_flag', ['cancelled'])
            ->orWhere('booking_payment_state', 'refunded');

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        return $query->latest()->paginate(15)->withQueryString();
    }

    /**
     * Get cancelled hotel bookings
     */
    private function getCancelledHotelBookings(Request $request)
    {
        $query = HotelBooking::query()
            ->whereIn('booking_status_flag', ['cancelled'])
            ->orWhere('booking_payment_state', 'refunded');

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        return $query->latest()->paginate(15)->withQueryString();
    }

    /**
     * Get all cancelled bookings
     */
    private function getAllCancelledBookings(Request $request)
    {
        // Flight cancelled/refunded bookings
        $flightQuery = FlightBooking::select(
            'id',
            'booking_code_ref',
            'booking_status_flag',
            'booking_payment_state',
            'booking_user_data',
            'booking_guest',
            'booking_currency_origin',
            'booking_fare_base',
            'created_at'
        )
        ->whereIn('booking_status_flag', ['cancelled'])
        ->orWhere('booking_payment_state', 'refunded')
        ->when($request->filled('search'), fn($q) => $q->search($request->search))
        ->when($request->filled('date_from') || $request->filled('date_to'), function($q) use ($request) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $q->byDateRange($dateFrom, $dateTo);
        })
        ->addSelect(\DB::raw("'flight' as booking_type"));

        // Hotel cancelled/refunded bookings
        $hotelQuery = HotelBooking::select(
            'id',
            'booking_code_ref',
            'booking_status_flag',
            'booking_payment_state',
            'booking_user_data',
            'booking_guest',
            'booking_currency_origin',
            'booking_fare_base',
            'created_at'
        )
        ->whereIn('booking_status_flag', ['cancelled'])
        ->orWhere('booking_payment_state', 'refunded')
        ->when($request->filled('search'), fn($q) => $q->search($request->search))
        ->when($request->filled('date_from') || $request->filled('date_to'), function($q) use ($request) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $q->byDateRange($dateFrom, $dateTo);
        })
        ->addSelect(\DB::raw("'hotel' as booking_type"));

        // Union all and order by created_at
        $allBookings = $flightQuery->unionAll($hotelQuery)
            ->orderByDesc('created_at')
            ->paginate(15);

        return $allBookings;
    }


    /**
     * Display pending confirmations
     */
    public function pendingConfirmations(Request $request)
    {
        $bookingType = $request->get('type', 'all');

        if ($bookingType === 'flight') {
            $bookings = $this->getPendingFlightBookings($request);
        } elseif ($bookingType === 'hotel') {
            $bookings = $this->getPendingHotelBookings($request);
        } else {
            $bookings = $this->getAllPendingBookings($request);
        }

        $stats = $this->getBookingStats($bookingType);
        return view('admin.bookings.pending-confirmations', compact('bookings', 'stats', 'bookingType'));
    }

    /**
     * Get pending flight bookings
     */
    private function getPendingFlightBookings(Request $request)
    {
        $query = FlightBooking::query()->byStatus('pending');

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        return $query->latest()->paginate(15)->withQueryString();
    }

    /**
     * Get pending hotel bookings
     */
    private function getPendingHotelBookings(Request $request)
    {
        $query = HotelBooking::query()->byStatus('pending');

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('date_from') || $request->filled('date_to')) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $query->byDateRange($dateFrom, $dateTo);
        }

        return $query->latest()->paginate(15)->withQueryString();
    }

    /**
     * Get all pending bookings
     */
    private function getAllPendingBookings(Request $request)
    {
        // Flight pending bookings
        $flightQuery = FlightBooking::select(
            'id',
            'booking_code_ref',
            'booking_status_flag',
            'booking_payment_state',
            'booking_user_data',
            'booking_guest',
            'booking_currency_origin',
            'booking_fare_base',
            'created_at'
        )->byStatus('pending')
        ->when($request->filled('search'), fn($q) => $q->search($request->search))
        ->when($request->filled('date_from') || $request->filled('date_to'), function($q) use ($request) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $q->byDateRange($dateFrom, $dateTo);
        })
        ->addSelect(\DB::raw("'flight' as booking_type"));

        // Hotel pending bookings
        $hotelQuery = HotelBooking::select(
            'id',
            'booking_code_ref',
            'booking_status_flag',
            'booking_payment_state',
            'booking_user_data',
            'booking_guest',
            'booking_currency_origin',
            'booking_fare_base',
            'created_at'
        )->byStatus('pending')
        ->when($request->filled('search'), fn($q) => $q->search($request->search))
        ->when($request->filled('date_from') || $request->filled('date_to'), function($q) use ($request) {
            $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
            $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
            $q->byDateRange($dateFrom, $dateTo);
        })
        ->addSelect(\DB::raw("'hotel' as booking_type"));

        // Union all and order by created_at
        $allBookings = $flightQuery->unionAll($hotelQuery)
            ->orderByDesc('created_at')
            ->paginate(15);

        return $allBookings;
    }



    /**
     * Get booking statistics
     */
    private function getBookingStats($bookingType = 'all')
    {
        if ($bookingType === 'flight') {
            return [
                'total' => FlightBooking::count(),
                'confirmed' => FlightBooking::byStatus('confirmed')->count(),
                'pending' => FlightBooking::byStatus('pending')->count(),
                'cancelled' => FlightBooking::byStatus('cancelled')->count(),
                'paid' => FlightBooking::byPaymentState('paid')->count(),
                'unpaid' => FlightBooking::byPaymentState('unpaid')->count(),
                'refunded' => FlightBooking::byPaymentState('refunded')->count(),
            ];
        } elseif ($bookingType === 'hotel') {
            return [
                'total' => HotelBooking::count(),
                'confirmed' => HotelBooking::byStatus('confirmed')->count(),
                'pending' => HotelBooking::byStatus('pending')->count(),
                'cancelled' => HotelBooking::byStatus('cancelled')->count(),
                'paid' => HotelBooking::byPaymentState('paid')->count(),
                'unpaid' => HotelBooking::byPaymentState('unpaid')->count(),
                'refunded' => HotelBooking::byPaymentState('refunded')->count(),
            ];
        } else {
            // Combined stats
            return [
                'total' => FlightBooking::count() + HotelBooking::count(),
                'confirmed' => FlightBooking::byStatus('confirmed')->count() + HotelBooking::byStatus('confirmed')->count(),
                'pending' => FlightBooking::byStatus('pending')->count() + HotelBooking::byStatus('pending')->count(),
                'cancelled' => FlightBooking::byStatus('cancelled')->count() + HotelBooking::byStatus('cancelled')->count(),
                'paid' => FlightBooking::byPaymentState('paid')->count() + HotelBooking::byPaymentState('paid')->count(),
                'unpaid' => FlightBooking::byPaymentState('unpaid')->count() + HotelBooking::byPaymentState('unpaid')->count(),
                'refunded' => FlightBooking::byPaymentState('refunded')->count() + HotelBooking::byPaymentState('refunded')->count(),
            ];
        }
    }
    
}